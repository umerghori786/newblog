<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AmazonBook;

class AmazonBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AmazonBook::factory()
                        ->count(30)
                        ->create();
    }
}
