<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexDashboardRequest;
use App\Models\Vender;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index(IndexDashboardRequest $request)
    {
//        dd($request['type']);
        $filters = $request->validated();
        $limit = 20;
        $venders = Vender::filter($filters)->paginate($limit);

        $venderIds = array_column($venders->toArray()['data'],'id');
        $venderRatings = [];
        if($venderIds)
           $venderRatings = Vender::getAllRatings($venderIds);

        return ['venders' => $venders->each( static function ($vender,$index)  use ($venderRatings){
            $vender->total_ratings = $venderRatings[$index]->total_ratings;
            $vender->average_ratings = $venderRatings[$index]->average_ratings;
        })];
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
