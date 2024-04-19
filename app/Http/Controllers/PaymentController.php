<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\BillService;
use Illuminate\Support\Collection;
use App\Models\UserDetail;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    private BillService $billService;

    public function __construct(BillService $billService){
        $this->billService = $billService;
    }


    public function view(){
        $user = Auth::user();
        $generatedBills = $this->billService->getGeneratedBills()
                                ->take(4);   
        
        $userCards = UserDetail::where('user_id',$user->id)
                                ->take(3)
                                ->get();

        $cardGradients = collect(['bg-primary-gradient','bg-danger-gradient','bg-white-gradient']);

        return view('payments',['generatedBills'=>$generatedBills,
                                 'userCards'=>$userCards,
                                 'cardGradients'=>$cardGradients
                                ]);
    }

    public function pay(Request $request){
        return back()->with('error', 'Payments have been suspended. Please contact your nearest branch');
    }
}
