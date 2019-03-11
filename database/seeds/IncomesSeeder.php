<?php

use Illuminate\Database\Seeder;

class IncomesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $incomes = [
            "Roman plača",
            "Tina plača",
            "Darila",
            "Otroški dokladek",
            "Drugo"
        ];
        foreach ($incomes as $income) {
            $in =  new \App\Income;
            $in->title = $income;
            $in->save();
        }
    }
}
