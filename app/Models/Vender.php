<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Vender extends Model
{
    use HasFactory;

    protected $casts = [
        'has_coupon' => 'boolean'
    ];

    public function coupons()
    {
        return $this->hasMany(Coupon::class);
    }



    public function categories(){
        return $this->belongsToMany(Category::class);
    }


    public function menuCategories()
    {
        return $this->hasMany(MenuCategory::class);
    }

    public function menu($columns = ['*'])
    {
        return DB::table('menu_items')
            ->whereIn('menu_category_id', function ($query) {
                $query->select('id')->from('menu_categories')->where('vender_id', $this->id);
            })->select($columns)->get();
    }

    public function openDays()
    {
        return $this->belongsToMany(Day::class, 'day_vender', 'vender_id', 'day_id')
            ->withPivot(['opens_at', 'closes_at']);
    }

    public function venderType()
    {
        return $this->belongsTo(VenderType::class);
    }

    public function commentCount()
    {
        //TODO: merge with menu
        return DB::table('comment_menu_item')
            ->selectRaw('COUNT(DISTINCT comment_id) as comment_count')
            ->whereIn('menu_item_id', function ($query) {
                $query->select('id')->from('menu_items')->whereIn('menu_category_id', function ($query) {
                    $query->select('id')->from('menu_categories')->where('vender_id', $this->id);
                });
            })->get()[0]->comment_count;
    }

    public static function getAllCommentsCounts()
    {
        return DB::select('SELECT COUNT(DISTINCT comment_id) AS comment_count,vender_id
                FROM (SELECT v.id AS vender_id,mc.id AS menu_category_id,i.id AS menu_item_id,mi.comment_id
                FROM venders v
                INNER JOIN menu_categories mc ON v.id = mc.vender_id
                INNER JOIN menu_items i ON mc.id = i.menu_category_id
                INNER JOIN comment_menu_item mi  ON mi.menu_item_id = i.id ) vci
                GROUP BY vender_id;');
    }

    public static function getAllRatings($vender_ids = []): Collection
    {

            return DB::table(DB::raw('( SELECT  DISTINCT (mi.comment_id) as comment_id,v.id as vender_id ,c.user_rating
                    FROM venders v
                    INNER JOIN menu_categories mc ON v.id = mc.vender_id
                    INNER JOIN menu_items i ON mc.id = i.menu_category_id
                    INNER JOIN comment_menu_item mi  ON mi.menu_item_id = i.id
                    INNER JOIN comments c ON c.id = mi.comment_id ) AS vci'))
                ->whereIn('vender_id',collect($vender_ids))
                ->groupBy('vender_id')
                ->orderBy('vci.vender_id')
                ->selectRaw(DB::raw('vender_id,SUM(user_rating) AS total_ratings,AVG(user_rating) AS average_ratings'))
                ->get();

    }


}
