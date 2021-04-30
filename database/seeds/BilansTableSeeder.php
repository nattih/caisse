<?php

use App\Bilan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BilansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bilans')->delete();
        Bilan::create([
            'solde'=>0,
            ]);
    }
}
