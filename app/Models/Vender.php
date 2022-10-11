<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Vender extends Model
{
    use HasFactory;

    protected $casts = [
        'has_coupon' => 'boolean'
    ];
    protected $hidden = ['pivot'];

    public function coupons()
    {
        return $this->hasMany(Coupon::class);
    }


    public function menuCategories()
    {
        return $this->hasMany(MenuCategory::class);
    }

    public function menu($columns = ['*'])
    {
        return DB::table('menu_items')
            ->whereIn('menu_category_id', function ($query) {
                $query->select('id')->from('menu_categories')->where('vender_id', $this->id)->get();
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

    public static function getAllRatings($vender_ids = [])
    {
        return DB::select("SELECT vender_id,SUM(user_rating) AS total_ratings,AVG(user_rating) AS average_ratings FROM
                (SELECT  DISTINCT (mi.comment_id) as comment_id,v.id as vender_id ,c.user_rating
                    FROM venders v
                    INNER JOIN menu_categories mc ON v.id = mc.vender_id
                    INNER JOIN menu_items i ON mc.id = i.menu_category_id
                    INNER JOIN comment_menu_item mi  ON mi.menu_item_id = i.id
                    INNER JOIN comments c ON c.id = mi.comment_id) vci
                    WHERE vender_id IN (" . implode(',', $vender_ids) . ")
                    GROUP BY vender_id
                ORDER BY vci.vender_id  ASC");

    }

//        SELECT
//    COUNT(DISTINCT comment_id) AS comment_count,
//    vci.id AS vender_id,
//    vci.title,
//    vci.title_image,
//    vci.background_image,
//    vci.description,
//    vci.address,
//    vci.is_express,
//    vci.is_economical,
//    vci.delivery_fee,
//    vci.vender_type_id,
//    vci.created_at,
//    vci.updated_at
//FROM
//(
//    SELECT
//        v.*,
//        mc.id AS menu_category_id,
//        i.id AS menu_item_id,
//        mi.comment_id
//    FROM
//        venders v
//    INNER JOIN menu_categories mc ON
//        v.id = mc.vender_id
//    INNER JOIN menu_items i ON
//        mc.id = i.menu_category_id
//    INNER JOIN comment_menu_item mi ON
//        mi.menu_item_id = i.id
//) vci
//GROUP BY
//    vci.id
//ORDER BY
//    'vender_id` ASC;


    //unoptimized
//        SELECT vender_id,AVG(star) AS ratings FROM (SELECT DISTINCT mi.comment_id,mc.vender_id,c.star
//                FROM venders v
//                INNER JOIN menu_categories mc ON v.id = mc.vender_id
//                INNER JOIN menu_items i ON mc.id = i.menu_category_id
//                INNER JOIN comment_menu_item mi  ON mi.menu_item_id = i.id
//                INNER JOIN comments c on c.id = mi.comment_id) vcic
//                GROUP BY vender_id
//                ORDER BY `vcic`.`vender_id` ASC;


    // more optimized
//        SELECT vender_id,AVG(star) AS ratings FROM venders v
//                INNER JOIN menu_categories mc ON v.id = mc.vender_id
//                INNER JOIN menu_items i ON mc.id = i.menu_category_id
//                INNER JOIN (SELECT MIN(menu_item_id) AS menu_item_id,comment_id FROM comment_menu_item GROUP BY comment_id) mi  ON mi.menu_item_id = i.id
//                INNER JOIN comments c on c.id = mi.comment_id
//                GROUP BY vender_id
//                ORDER BY `vender_id` ASC;



    public function scopeFilter($query,$filters) {
        return $query->where('vender_type_id',$filters['type'] ?? VenderType::first('id')->id);
    }

}
