<?php

use Illuminate\Database\Seeder;
use App\Budget as Model;

class BudgetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $months = [7];
        $categories = [1, 2, 3, 4, 5, 6];
        $values = [
            200000,
            3500000,
            1000000,
            500000,
            250000
        ];

        // foreach ($months as $month) {
        //     Model::create([
        //         'month_id' => $month,
        //         'category_id' => ,
        //         'value' => 2000, 5000
        //     ]);
        // }
        // $budget = [
        //     [
        //         'month_id' => '7',
        //         'category_id' => '1',
        //         'value' => '1000000',
        //     ],
        //     [
        //         'month_id' => '7',
        //         'category_id' => '2',
        //         'value' => '2500000',
        //     ],
        //     [
        //         'month_id' => '7',
        //         'category_id' => '3',
        //         'value' => '500000',
        //     ],
        //     [
        //         'month_id' => '7',
        //         'category_id' => '4',
        //         'value' => '2000000',
        //     ],
        //     [
        //         'month_id' => '7',
        //         'category_id' => '5',
        //         'value' => '1250000',
        //     ],
        //     [
        //         'month_id' => '7',
        //         'category_id' => '6',
        //         'value' => '250000',
        //     ],
        //     [
        //         'month_id' => '7',
        //         'category_id' => '7',
        //         'value' => '7500000',
        //     ],
        //     [
        //         'month_id' => '7',
        //         'category_id' => '8',
        //         'value' => '1500000',
        //     ],
        // ];

        // Model::insert($budget);
    }
}
