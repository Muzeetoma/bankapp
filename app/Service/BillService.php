<?php

namespace App\Service;
use App\Service\Dto\Bill;
use Illuminate\Support\Collection;

class BillService {

    public function __construct(){

    }

    public function getGeneratedBills(){
        return collect([new Bill('apple-icon.png','Apple Tv', 'subscription', '2500', 'mo'),
                        new Bill('british-airlines.png','AirTicket', 'subscription', '1500', 'year'),
                        new Bill('eu-flag.png','Eu Pass','payment', '1500', 'year'),
                        new Bill('netflix-icon.png','Netflix','subscription', '100', 'year'),
                        new Bill('stripe.png','Health care','insurance', '2500', 'year') ]);
    }
}