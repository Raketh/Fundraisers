<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(App\Fundraiser::class, 5)->create()->each(function ($fundraiser) {
            $fundraiser->review()->saveMany(factory(App\Review::class, 10)
                ->make(['fundraiser_id' => $fundraiser->id]));
        });
    }
}