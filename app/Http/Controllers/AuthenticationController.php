<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\VerifyRegisterWithCodeRequest;
use App\Http\Requests\VerifyRegisterWithPassRequest;
use App\Mail\User;
use App\Models\EmailVerification;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthenticationController extends Controller
{
    /**
     * @throws \JsonException
     */
    public function register(RegisterRequest $request): JsonResponse
    {

        $email = $request->validated()['email'];
        /**
         * @var app\models\user $user
         */
        $user = \App\Models\User::where('email',$email)->first();



        if($user?->hasPassword()) {
            return new JsonResponse([
                'success' =>true,
                'userPassExists' => true,
            ]);
        }



        $EmailVerificationModel = EmailVerification::where('email',$email);
        $emailVerification = $EmailVerificationModel->get();

        if($emailVerification !== null){
            $EmailVerificationModel->delete();
        }

        $randomToken = Str::random(8);
        $hashedRandomToken = Hash::make($randomToken);

        $newEmailVerification = [
            'email' => $email,
            'verification_code' => $hashedRandomToken,
            'expire_date' => now()->addMinutes(4)
        ];
        EmailVerification::create($newEmailVerification);

        Mail::to($email)->send(new User($randomToken));

        return new JsonResponse([
            'success' =>true,
            'userPassExists' => false,
            'expire_date' => $newEmailVerification['expire_date'],
            'message' => 'Email has been successfully sent.'
        ]);
    }

    public function loginWithCode(VerifyRegisterWithCodeRequest $request): JsonResponse
    {
        $data = $request->validated();
        $emailVerification = EmailVerification::where('email',$data['email'])->first();
        $user = \App\Models\User::where('email',$data['email'])->first();


        if(now() > $emailVerification->expire_date) {
            return new JsonResponse([
                'loginSuccess' => false,
                'errors' => ['verification code is expired.'],
                'message' => ''
            ],402);
        }

        if(!Hash::check($data['verification_code'],$emailVerification->verification_code)) {
            return new JsonResponse([
                'loginSuccess' => false,
                'errors' => ['verification code is not valid.'],
                'message' => ''
            ],402);
        }
        $emailVerification->delete();
        if(!$user){
            $user = \App\Models\User::create([
                'email' => $data['email']
            ]);
        }
        Auth::login($user);
        $request->session()->regenerate();

        return new JsonResponse([
            'loginSuccess' =>true,
            'errors' => [],
            'message' => 'your email has been successfully verified.',
            'user' => \auth()->user()
        ]);

    }

    public function loginWithPassword(VerifyRegisterWithPassRequest $request): JsonResponse
    {
        ['email' => $email,'password' => $password] =  $request->validated();
        $user = \App\Models\User::where('email',$email)->first();
        if(!$user->hasPassword()) {
            return new JsonResponse(['loginSuccess' => false,'errors' => ['No password found for this user.']], 422);
        }

        if(!Auth::attempt(['email' => $email,'password' => $password ])){
            return  new JsonResponse(['loginSuccess' => false,'errors' => ['Password is not valid.']],422);
        }

        $request->session()->regenerate();
        return new JsonResponse([
            'loginSuccess' => true,
            'user' => \auth()->user(),
            'errors' => []
        ]);
    }


    public function logout(Request $request)
    {
        /**
         * @var \app\models\User $user
         */

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $request->session()->regenerateToken();
    }
}
