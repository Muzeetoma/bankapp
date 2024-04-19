<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\TransactionService;

class TransactionController extends Controller
{

    private TransactionService $transactionService;

    public function __construct(TransactionService $transactionService){
        $this->transactionService = $transactionService;
    }

    public function view(){
        $transactions = $this->transactionService->getGeneratedTransactions();
        $analytics = $this->transactionService->getAnalytics();
        return view('transactions',['transactions'=>$transactions,'analytics'=>$analytics]);
    }
}
