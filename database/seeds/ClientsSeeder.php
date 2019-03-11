<?php

use Illuminate\Database\Seeder;

class ClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = new \App\Client;
        $client->title = "dev";
        $client->ip = "172.16.238.1";
        $client->token = "kasj089u039oriwef230498fjdkjfsdiu3r";
        $client->save();
    }
}
