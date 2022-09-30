<?php

namespace App\Http\Controllers;

use App\Models\Vender;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $venderComments = Vender::getAllCommentsCounts();
        $venderRatings = Vender::getAllRatings();
        return new JsonResponse(['venders' => Vender::with('venderType')->get()->each(static function ($vender) use($venderComments,$venderRatings){
            $vender->comment_count = number_format($venderComments[$vender->id - 1]->comment_count);
            $vender->ratings = number_format($venderRatings[$vender->id - 1]->ratings,1);
        })]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
