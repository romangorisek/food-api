<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(AccountsSeeder::class);
        $this->call(ExpensesSeeder::class);
        $this->call(IncomesSeeder::class);
        $this->call(ClientsSeeder::class);
    }
}
