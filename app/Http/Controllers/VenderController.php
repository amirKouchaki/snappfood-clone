<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexDashboardRequest;
use App\Models\Category;
use App\Models\Vender;
use App\Models\VenderType;
use App\Services\VenderFilterSerivce;
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
