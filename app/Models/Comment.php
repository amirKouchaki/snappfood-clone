<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Comment extends Model
{
    use HasFactory;


    public function menuItems()
    {
        return $this->belongsToMany(MenuItem::class);
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'user_id')->select('id', 'name');
    }


    public static function commentsFor($vender_ids = []): Collection
    {
        return self::from('comments As c')->with('sender','menuItems')
            ->join('comment_menu_item AS cmi', 'cmi.comment_id', 'c.id')
            ->join('menu_items AS mi', 'mi.id', 'cmi.menu_item_id')
            ->join('menu_categories AS mc', 'mc.id', 'mi.menu_category_id')
            ->whereIn('mc.vender_id', collect($vender_ids))
            ->selectRaw('DISTINCT (c.id) AS id,
                c.body,
                c.user_rating,
                c.user_id,
                c.created_at,
                c.updated_at')
            ->limit(100)
            ->get();

    }

    public static function commentsCountFor($vender_ids = []): Collection
    {
        return DB::table('comment_menu_item AS cmi')
            ->join('menu_items AS mi', 'mi.id', 'cmi.menu_item_id')
            ->join('menu_categories AS mc', 'mc.id', 'mi.menu_category_id')
            ->whereIn('mc.vender_id', collect($vender_ids))
            ->selectRaw('mc.vender_id,COUNT(DISTINCT cmi.comment_id) AS comments_count')
            ->groupBy('mc.vender_id')
            ->get();
    }

}
