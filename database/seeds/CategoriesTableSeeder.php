<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'user_id' => '1',
                'name' => 'Laravel',
                'slug' => 'laravel',
                'is_published' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => '1',
                'name' => 'Bootstrap',
                'slug' => 'bootstrap',
                'is_published' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => '1',
                'name' => 'Python',
                'slug' => 'python',
                'is_published' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => '1',
                'name' => 'JavaScript',
                'slug' => 'javascript',
                'is_published' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => '1',
                'name' => 'Tailwind CSS',
                'slug' => 'tailwind-css',
                'is_published' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
