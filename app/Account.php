<?php

namespace App;

class Account extends ModelWithClicks
{
    protected static $tableName = 'accounts';

    public static function apply(Transaction $transaction)
    {
        $acc = self::find($transaction->account_id);
        $acc->balance = (double) $acc->balance + (double) $transaction->amount;
        return $acc->save();
    }
}
