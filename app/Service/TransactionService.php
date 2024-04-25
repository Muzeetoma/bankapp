<?php

namespace App\Service;
use App\Service\Dto\Transaction;
use Illuminate\Support\Collection;
use App\Service\Dto\Analytics;


class TransactionService {

    public function __construct(){

    }

    public function getGeneratedTransactions(){
        return collect([
            new Transaction('Mindef','', $this->getDateDaysAgo(1), 'S$ +3,760.90', 'mastercard', 'success',3760),
            new Transaction('Mindef','', $this->getDateDaysAgo(1), 'S$ +3,560.71', 'paypal', 'success',3560),
            new Transaction('Mindef','', $this->getDateDaysAgo(1), 'S$ +3,060.12', 'mastercard', 'success',3060),
            new Transaction('Mindef','', $this->getDateDaysAgo(1), 'S$ +3,160.14', 'stripe', 'success',3160),
            new Transaction('Mindef','', $this->getDateDaysAgo(1), 'S$ +3,760.18', 'mastercard', 'success',3760),
            new Transaction('Mindef','', $this->getDateDaysAgo(1), 'S$ +3,720.21', 'mastercard', 'success',3720),
            new Transaction('Mindef','', $this->getDateDaysAgo(1), 'S$ +3,720.21', 'mastercard', 'success',3720),
            new Transaction('Mindef','', $this->getDateDaysAgo(1), 'S$ +3,080.21', 'stripe', 'success',3080), ]);
    }

    public function getAnalytics(): Analytics{
        $tnxs = $this->getGeneratedTransactions()->map(function ($transaction) {
            return $transaction->getTnxAmount();
        });

        $debits = $this->getGeneratedTransactions()->map(function ($transaction) {
            $tnxAmount = $transaction->getTnxAmount();
            if($tnxAmount<0)
               return $tnxAmount;
        });

        $credits = $this->getGeneratedTransactions()->map(function ($transaction) {
            $tnxAmount = $transaction->getTnxAmount();
            if($tnxAmount>0)
               return $tnxAmount;
        });

        $totalTransactions = $tnxs->sum();
        $totalExpenses = $debits->sum();
        $totalIncome = $credits->sum();
        $savings = $totalIncome - $totalExpenses;

        return new Analytics($totalTransactions,$totalIncome,$savings,$totalExpenses);
    }

    private function getDateDaysAgo($days) {
        $date = date('Y-m-d', strtotime("-$days days"));
        return $date;
    }
}