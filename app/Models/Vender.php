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

    public function schedule()
    {
        return $this->belongsToMany(Day::class, 'day_vender', 'vender_id', 'day_id')
            ->withPivot('opens_at','closes_at')->as('work_hours');
    }

    public function venderType()
    {
        return $this->belongsTo(VenderType::class);
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

    public static function getUserRatingStats($venderId): Collection
    {
        $table = DB::raw('(
            SELECT DISTINCT
        (mi.comment_id) AS comment_id,
                v.id AS vender_id,
                c.user_rating
            FROM
                venders v
            INNER JOIN menu_categories mc ON
                v.id = mc.vender_id
            INNER JOIN menu_items i ON
                mc.id = i.menu_category_id
            INNER JOIN comment_menu_item mi ON
                mi.menu_item_id = i.id
            INNER JOIN comments c ON
                c.id = mi.comment_id
            ) AS vci');
        $sumQuery = DB::table($table) ->where('vender_id','=',$venderId)->selectRaw("'SUM' user_rating,COUNT(user_rating)");
        return DB::table($table)
            ->where('vender_id','=',$venderId)
            ->groupBy('user_rating')
            ->selectRaw('user_rating,COUNT(user_rating) AS star_count')
            ->union($sumQuery)
            ->orderByDesc('user_rating')
            ->get();
    }


//SELECT mc.vender_id, COUNT(DISTINCT cmi.comment_id) AS comment_count
//FROM
//`comment_menu_item` cmi
//inner join `menu_items` as `mi` on `mi`.`id` = `cmi`.`menu_item_id`
//inner join `menu_categories`  mc ON mc.id = mi.menu_category_id
//GROUP BY mc.vender_id;





}
