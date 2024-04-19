<?php

namespace App\Service\Dto;

class Bill{

   private string $logo; 
   private string $type;
   private string $renewal;
   private string $amount;
   private string $frequency;

    public function __construct(string $logo, string $type, string $renewal, string $amount, string $frequency) {
        $this->logo = $logo;   
        $this->type = $type;
        $this->renewal = $renewal;
        $this->amount = $amount;
        $this->frequency = $frequency;
    }
    
    public function getLogo(): string{
        return $this->logo;
    }

    public function getType(): string {
        return $this->type;
    }

    public function getRenewal(): string {
        return $this->renewal;
    }

    public function getAmount(): string {
        return $this->amount;
    }

    public function getFrequency(): string {
        return $this->frequency;
    }
}