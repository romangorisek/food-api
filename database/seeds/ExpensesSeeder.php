<?php

use Illuminate\Database\Seeder;

class ExpensesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $expenses = [
            "Hrana",
            "Malica Roman",
            "Tina s.p.",
            "Bencin",
            "Avto vzdrževanje",
            "Telefon",
            "Zavarovanja",
            "Oblačila",
            "Higijena",
            "Dom",
            "Darila",
            "Roman luksuz",
            "Tina luksuz",
            "Date denar",
            "Posojila",
            "Provizije banke",
            "Dvig gotovine",
            "Polog gotovine",
            "Erik",
            "Potovanja",
            "Drugo"
        ];
        foreach ($expenses as $expense) {
            $ex =  new \App\Expense;
            $ex->title = $expense;
            $ex->save();
        }
    }
}
