<?php

namespace App\Service\Dto;

class Analytics
{
    private int $totalTransactions;
    private int $totalIncome; 
    private int $totalSavings;
    private int $totalExpenses;

    public function __construct(int $totalTransactions,
                                int $totalIncome, 
                                int $totalSavings, 
                                int $totalExpenses)
    {
        $this->totalTransactions = $totalTransactions;
        $this->totalIncome = $totalIncome;
        $this->totalSavings = $totalSavings;
        $this->totalExpenses = $totalExpenses;
    }

    public function getTotalTransactions(): int
    {
        return $this->totalTransactions;
    }

    public function getTotalIncome(): int
    {
        return $this->totalIncome;
    }

    public function getTotalSavings(): int
    {
        return $this->totalSavings;
    }

    public function getTotalExpenses(): int
    {
        return $this->totalExpenses;
    }
}

