<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Vender;
use App\Models\VenderType;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class VenderFilterSerivce
{
    private Collection $categoryIds;
    private Collection $venders;
    private Collection $vendersRatings;

    public function __construct(private Collection $filters, private int $venderLimit)
    {
    }

    public function getFilteredCategories(): static
    {
        if ($this->filters->has('subCategory')) {
            $this->categoryIds = collect(Category::find($this->filters['subCategory'])->id);
        } else if ($this->filters->has('category')) {
            $category = Category::with('subCategories')->where('id', $this->filters['category'])->first() ?? [];

            $this->categoryIds = collect($category->id)
                ->merge(array_column($category->subCategories->toArray(), 'id'));
        }

        return $this;
    }


    public function getFilteredVenders(): static
    {
        $this->venders = DB::table('venders AS v')
            ->when($this->filters->has('category') || $this->filters->has('SubCategory'), function ($query) {
                $query->join('category_vender AS cv', 'v.id', '=', 'cv.vender_id')
                    ->join('categories AS c', 'c.id', '=', 'cv.category_id')
                    ->whereIn('c.id', $this->categoryIds);
            })
            ->where('v.vender_type_id', $this->filters['type'] ?? VenderType::first('id')->id)
            ->when($this->filters->has('search'),function ($query) {
                $query->where('v.title','like','%'.$this->filters['search'].'%');
            })
            ->select('v.*')->distinct()->limit($this->venderLimit)->get();

        return $this;
    }


    public function getVendersRatings(): static
    {

        $venderIds = array_column($this->venders->toArray(), 'id');
        if ($venderIds)
            $this->vendersRatings = Vender::getAllRatings($venderIds);
        return $this;
    }

    public function mergeVendersAndTheirRatings(): Collection
    {
        return $this->venders->each( function ($vender)  {
            $venderRating = $this->vendersRatings->where('vender_id', $vender->id)->first();
            $vender->total_ratings = number_format($venderRating->total_ratings);
            $vender->average_ratings = (int)($venderRating->average_ratings * 10) /10;
            $vender->delivery_fee = number_format($vender->delivery_fee);
        });
    }


}
