<?php

use Illuminate\Database\Seeder;

class AccountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $accounts = [
            ["title" => "SKB", "balance" => 0, "thumb" => "http://money-api.loc/imgs/skb.png"],
            ["title" => "Delavska hranilnica", "balance" => 0, "thumb" => "http://money-api.loc/imgs/dh.png"],
            ["title" => "Gotovina", "balance" => 0, "thumb" => "http://money-api.loc/imgs/cash.png"],
            ["title" => "MasterCard", "balance" => 0, "thumb" => "http://money-api.loc/imgs/mc.png"]
        ];
        foreach ($accounts as $account) {
            \App\Account::create($account);
        }
    }
}
