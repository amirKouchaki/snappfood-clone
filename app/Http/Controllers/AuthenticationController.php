<?php

namespace App\Http\Controllers;

use App\Http\Requests\registerRequest;
use App\Mail\User;
use App\Models\EmailVerification;
use http\Env\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Js;
use Illuminate\Support\Str;
use function MongoDB\BSON\toJSON;

class AuthenticationController extends Controller
{
    /**
     * @throws \JsonException
     */
    public function register(registerRequest $request) {
        $email = $request->validated()['email'];
        $EmailVerificationModel = EmailVerification::where('email',$email);
        $emailVerification = $EmailVerificationModel->get();

        if($emailVerification !== null){
            $EmailVerificationModel->delete();
        }

        $randomToken = Str::random(8);
        $hashedRandomToken = Hash::make($randomToken);

        $newEmailVerificationModel = [
            'email' => $email,
            'verification_code' => $hashedRandomToken,
            'expire_date' => now()->addMinutes(4)
        ];
        EmailVerification::create($newEmailVerificationModel);

        Mail::to($email)->send(new User($randomToken));

        return new JsonResponse([
            'success' =>true,
            'expire_date' => $newEmailVerificationModel['expire_date'],
            'message' => 'Email has been successfully sent.'
        ]);
    }
}
