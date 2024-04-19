<?php

namespace App\Service\Dto;

class Transaction
{
    private string $name; 
    private string $logo;
    private string $date;
    private string $amount;
    private string $paidBy;
    private string $status;
    private int $tnxAmount;

    public function __construct(string $name, 
                                string $logo, 
                                string $date, 
                                string $amount, 
                                string $paidBy, 
                                string $status,
                                int $tnxAmount)
    {
        $this->name = $name;
        $this->logo = $logo;
        $this->date = $date;
        $this->amount = $amount;
        $this->paidBy = $paidBy;
        $this->status = $status;
        $this->tnxAmount = $tnxAmount;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLogo(): string
    {
        return $this->logo;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function getAmount(): string
    {
        return $this->amount;
    }

    public function getPaidBy(): string
    {
        return $this->paidBy;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getTnxAmount(): int
    {
        return $this->tnxAmount;
    }
}
