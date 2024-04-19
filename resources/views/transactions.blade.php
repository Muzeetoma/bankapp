@extends('layouts.navbar')

@section('body')

<div class="col-12 col-md-10">
<div class="container-fluid bg-light py-0 pe-3 pe-md-4">

<h6 class="text-dark my-3">Transactions</h6>

<div class="row">
    <div class="col-12 col-md-4 mb-3">
        <div class="container p-3 rounded-3 bg-primary">
            <h6 class="text-light fsm-9">Total Transactions</h6>
            <h1 class="text-light">${{ number_format($analytics->getTotalTransactions()) }}</h1>
            <h6 class="fsm-6">
                <span class="text-light">Profit last month</span>
                 <i class="bi bi-arrow-up-right-square-fill text-light ms-2"></i>
                 <span class="text-light">+4%</span>
            </h6>
        </div>
    </div>
    <div class="col-12 col-md-4 mb-3">
        <div class="container p-3 rounded-3 bg-white">
            <h6 class="text-dark fsm-9">Total Income</h6>
            <h1 class="text-dark">${{ number_format($analytics->getTotalIncome()) }}</h1>
            <h6 class="fsm-6">
                <span class="text-dark">Profit last month</span>
                 <i class="bi bi-arrow-down-right-square-fill text-danger ms-2"></i>
                 <span class="text-dark">-6%</span>
            </h6>
        </div>
    </div>
    <div class="col-12 col-md-4 mb-3">
        <div class="container p-3 rounded-3 bg-white">
            <h6 class="text-dark fsm-9">Total Expenses</h6>
            <h1 class="text-dark">${{ number_format($analytics->getTotalExpenses()) }}</h1>
            <h6 class="fsm-6">
                <span class="text-dark">Profit last month</span>
                 <i class="bi bi-arrow-down-right-square-fill text-danger ms-2"></i>
                 <span class="text-dark">-6%</span>
            </h6>
        </div>
    </div>
</div> 

<div class="container-fluid p-1 bg-white rounded-4 my-2">
    <h6 class="fsm-8 my-3 mx-2">Latest Transactions</h6>
    <table class="table rounded-4 fsm-7">
        <thead>
          <tr>
            <th scope="col">Recipient</th>
            <th scope="col" class="d-none d-sm-table-cell">Date</th>
            <th scope="col">Amount</th>
            <th scope="col">Paid by</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody> 
          
 
            @foreach($transactions as $transaction)
            <tr>
            <td>
            @if( empty($transaction->getLogo()) )
           <span class="py-1 px-2 rounded-3 bg-light-primary text-primary fw-bold">{{ substr($transaction->getName(),0,1) }}</span>
            @elseif( !empty($transaction->getLogo()) )
            <img src="{{ asset('images/'.$transaction->getLogo().'.png') }}" height="24px" width="24px"/>
            @endif
            <span class="ms-2"> {{ $transaction->getName() }}</span>
            </td>
            <td class="d-none d-sm-table-cell">{{ $transaction->getDate() }}</td>
            <td>{{ $transaction->getAmount() }}</td>
            <td><img src="{{ asset('images/'.$transaction->getPaidBy().'.png') }}" height="24px" width="24px"/></td>
            @if( $transaction->getStatus() == 'failed')
            <td><span class="px-2 py-1 bg-light-danger text-danger rounded-3">{{ $transaction->getStatus() }}</span></td>
             @elseif( $transaction->getStatus() == 'success')  
             <td><span class="px-2 py-1 bg-light-success text-success rounded-3">{{ $transaction->getStatus() }}</span></td>
            @endif
          </tr>
         @endforeach
        </tbody>
      </table>
</div>

</div>
</div>
@endsection