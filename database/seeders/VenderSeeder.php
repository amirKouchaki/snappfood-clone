<?php

namespace Database\Seeders;

use App\Models\Vender;
use Database\Factories\VenderFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class VenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws \Exception
     */
    public function run()
    {
        Vender::factory(200)->create();
    }

//SELECT DISTINCT (c.id) AS id,
//c.body,
//c.user_rating,
//c.user_id,
//c.created_at,
//c.updated_at
//FROM `comments` as `c`
//inner join `comment_menu_item` as `cmi` on `cmi`.`comment_id` = `c`.`id`
//inner join `menu_items` as `mi` on `mi`.`id` = `cmi`.`menu_item_id`
//inner join `menu_categories` as `mc` on `mc`.`id` = `mi`.`menu_category_id`
//WHERE mc.vender_id in (6)
//ORDER BY `id` ASC
//LIMIT 100;


//SELECT DISTINCT (c.id) AS id,
//c.body,
//c.user_rating,
//c.user_id,
//c.created_at,
//c.updated_at
//FROM `comments` as `c`
//inner join `comment_menu_item` as `cmi` on `cmi`.`comment_id` = `c`.`id`
//inner join `menu_items` as `mi` on `mi`.`id` = `cmi`.`menu_item_id`
//inner join `menu_categories` as `mc` on `mc`.`id` = `mi`.`menu_category_id`
//inner join `venders` as `v` on `v`.`id` = `mc`.`vender_id`
//WHERE `v`.`id` in (5)
//ORDER BY `id` ASC
//LIMIT 100;


//SELECT mc.vender_id, COUNT(DISTINCT cmi.comment_id) AS comment_count
//FROM
//`comment_menu_item` cmi
//inner join `menu_items` as `mi` on `mi`.`id` = `cmi`.`menu_item_id`
//inner join `menu_categories`  mc ON mc.id = mi.menu_category_id
//GROUP BY mc.vender_id;

}
