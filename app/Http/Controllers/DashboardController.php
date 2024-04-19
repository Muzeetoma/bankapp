<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserDetail;
use App\Service\BillService;
use App\Service\TransactionService;

class DashboardController extends Controller
{
    private BillService $billService;
    private TransactionService $transactionService;

    public function __construct(BillService $billService,TransactionService $transactionService){
        $this->billService = $billService;
        $this->transactionService = $transactionService;
    }

    public function view(){

        $user = Auth::user();
        $masterCard = UserDetail::where('user_id',$user->id)
                                    ->where('cardType','mastercard')
                                    ->first();

        $userCards = UserDetail::where('user_id',$user->id)
                                 ->take(2)
                                 ->get();  
                                 
        $generatedBills = $this->billService->getGeneratedBills()
                                            ->take(2);     

        $analytics = $this->transactionService->getAnalytics();

        $transactions = $this->transactionService->getGeneratedTransactions()
                                                 ->take(3);

        return view('dashboard', ['userCards'=>$userCards,
                     'masterCard'=>$masterCard,
                     'generatedBills'=>$generatedBills,
                     'analytics'=>$analytics,
                     'transactions'=>$transactions
                    ]);
    }

}
