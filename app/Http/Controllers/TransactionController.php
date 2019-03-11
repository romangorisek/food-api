<?php

namespace App\Http\Controllers;

use App\Account;
use App\Click;
use App\Transaction;
use Illuminate\Support\Facades\DB;

class TransactionController extends CrudController
{
    protected $model = Transaction::class;
    protected $fields = ["done_on", "amount", "type_id", "account_id"];

    public function all()
    {
        $filters = request(["start", "end", "transactionType", "account"]);
        $transactions = DB::table('transactions');
        $transactions = $this->applyFilters($filters, $transactions);
        return $transactions->get();
    }

    public function create()
    {
        if ($transaction = Transaction::create(request($this->fields))) {
            Click::registerAll($transaction, auth()->user());
            Account::apply($transaction);
            return $transaction;
        }
        throw new \Exception("Item could not be created");
    }

    private function applyFilters($filters, $transactions) {
        if (isset($filters["start"])) {
            $transactions = $transactions->where("done_on", ">=", $filters["start"]);
        }
        if (isset($filters["end"])) {
            $transactions = $transactions->where("done_on", "<=", $filters["end"]);
        }
        if (isset($filters["transactionType"])) {
            $transactions = $transactions->where("type_id", $filters["transactionType"]);
        }
        if (isset($filters["account"])) {
            $transactions = $transactions->where("account_id", $filters["account"]);
        }
        $transactions->orderBy("done_on", 'desc');
        return $transactions;
    }
}
