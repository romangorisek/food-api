<?php

namespace App;


class Transaction extends Model
{
    public function type()
    {
        return $this->amount > 0 ? \App\Income::class : \App\Expense::class;
    }
}
