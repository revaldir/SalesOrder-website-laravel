<?php

use Illuminate\Database\Seeder;
use App\Category as Model;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $category = [
            ['name' => 'Biaya Gaji'],
            ['name' => 'Biaya Jasa Driver'],
            ['name' => 'Biaya Komunikasi'],
            ['name' => 'Biaya BBM Kendaraan'],
            ['name' => 'Biaya Support Kendaraan'],
            ['name' => 'Biaya Parkir Kendaraan'],
            ['name' => 'Biaya Tol Kendaraan'],
            ['name' => 'Biaya ATK'],
            ['name' => 'Biaya Support Android'],
            ['name' => 'Biaya Penyusutan Tools'],
            ['name' => 'Biaya Sewa Homebase'],
            ['name' => 'Biaya Overhead'],
            ['name' => 'Project Management'],
            ['name' => 'ATP/BAST & GPS'],
            ['name' => 'Sewa HB + WH'],
            ['name' => 'Comcase'],
            ['name' => 'LMD'],
            ['name' => 'Biaya Lembur'],
            ['name' => 'Manpower WH'],
            ['name' => 'Cadangan 1'],
            ['name' => 'Cadangan 2'],
        ];

        Model::insert($category);
    }
}
