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
            new Transaction('Mindef','', $this->getDateDaysAgo(1), 'S$ +3,760', 'mastercard', 'failed',-5100),
            new Transaction('Netflix','netflix-icon', $this->getDateDaysAgo(3), 'S$ -100', 'visacard', 'failed',-100),
            new Transaction('Air Ticket','british-airlines', $this->getDateDaysAgo(5), 'S$ -2100', 'visacard', 'success',-2100),
            new Transaction('Dad','', $this->getDateDaysAgo(8), 'S$ +3100', 'paypal', 'success',3100),
            new Transaction('Lawyer L','', $this->getDateDaysAgo(11), 'S$ +41500', 'stripe', 'success',41500),
            new Transaction('Nicholas','', $this->getDateDaysAgo(11), 'S$ -4500', 'stripe', 'success',-4500),
            new Transaction('Eu-Pass','eu-flag', $this->getDateDaysAgo(15), 'S$ +1400', 'mastercard', 'success',1400),
            new Transaction('Air Ticket','british-airlines', $this->getDateDaysAgo(5), 'S$ -2100', 'visacard', 'success',-2100), 
            new Transaction('Kid Toys','amazon', $this->getDateDaysAgo(20), 'S$ -1100', 'mastercard', 'success',-1100), ]);
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