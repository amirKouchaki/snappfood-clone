<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexDashboardRequest;
use App\Models\Vender;
use App\Services\VenderFilterSerivce;
use Illuminate\Http\Request;

class VenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index(IndexDashboardRequest $request)
    {

        $filters = collect($request->validated());


        $venders = (new VenderFilterSerivce($filters,20))
            ->getFilteredCategories()
            ->getFilteredVenders()
            ->getVendersRatings()
            ->mergeVendersAndTheirRatings();

        return ['venders' => $venders];
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
     * @return Vender
     */
    public function show(Vender $vender)
    {
        $ratings = Vender::getAllRatings($vender->id);
        $vender->load('menuCategories.menuItems');
        $vender->total_ratings = $ratings[0]->total_ratings;
        $vender->average_ratings = (int)($ratings[0]->average_ratings * 10) /10;
        return $vender;
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
