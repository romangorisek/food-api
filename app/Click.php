<?php

namespace App;

class Click extends Model
{
    private $transaction;
    private $user;

    public static function registerAll(Transaction $transaction, User $user)
    {
        $click = new static;
        $click->transaction = $transaction;
        $click->user = $user;
        $click->saveAccountClick();
        $click->saveTypeClick();
    }

    private function saveAccountClick()
    {
        self::create([
            'user_id' => $this->user->id,
            'model' => \App\Account::class,
            'value' => $this->transaction->account_id
        ]);
    }

    private function saveTypeClick()
    {
        self::create([
            'user_id' => $this->user->id,
            'model' => $this->transaction->type(),
            'value' => $this->transaction->type_id
        ]);
    }
}
