<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Vender;
use Exception;
use Illuminate\Database\Seeder;

class CommentMenuItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        Vender::all(['id'])->each(function ($vender) {
            $menu = $vender->menu(['id']);
            $random = random_int(1000,1500);
            for ($j = 0; $j < $random; $j++) {
                $items_for_comment_count = random_int(1, 5);
                $menu_item_ids = [];
                for ($i = 0; $i < $items_for_comment_count; $i++)
                    $menu_item_ids[] = random_int($menu[0]->id, $menu[$menu->count() - 1]->id);
                Comment::factory()->create()->menuItems()->attach($menu_item_ids);
            }
        });
    }
}
