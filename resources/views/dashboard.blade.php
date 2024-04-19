@extends('layouts.navbar')

@section('body')

<div class="col-12 col-md-10">
<div class="container-fluid bg-light p-3 p-md-0">
    <div class="row">
        <div class="col-12 col-md-8">
            <div class="container-fluid p-0">
                <h6 class="text-dark my-3">Dashboard</h6>
                <div class="row">
                    <div class="col-12 col-md-6 mb-3">
                        <div class="container p-3 rounded-3 bg-primary">
                            <h6 class="text-light fsm-9">Total Savings</h6>
                            <h1 class="text-light">${{ number_format($analytics->getTotalSavings()) }}</h1>
                            <h6 class="fsm-6">
                                <span class="text-light">Profit last month</span>
                                 <i class="bi bi-arrow-up-right-square-fill text-light ms-2"></i>
                                 <span class="text-light">+4%</span>
                            </h6>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-3">
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
                </div> 
            </div>

            <div class="container bg-white rounded-3 p-3 my-3" >
                <h6 class="fsm-8 my-3">Payment History</h6>
                <canvas id="myChart" height="100"></canvas>
            </div>

            <div class="container-fluid p-1 bg-white rounded-3 mb-3">
                <h6 class="fsm-8 my-3 mx-2">Latest Transactions</h6>
                <table class="table rounded-3 fsm-7">
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
        <div class="col-12 col-md-4">

            <div class="container-fluid bg-white p-3">
                <h6 class="text-dark mb-3">Cards</h6>

                <div class="container bg-primary-gradient p-3 rounded-4">
                    <div class="d-flex justify-content-between">
                        <div class="p-1">
                            <h6 class="fsm-7 text-light">Holders name</h6>
                            <h6 class="fw-bold text-light fsm-9">{{ strtoupper(Auth::user()?->name) }}</h6>
                        </div>
                        <div class="p-1">
                            <img src="{{ asset('images/mastercard.png') }}" height="24px" width="24px"/>
                        </div>
                    </div>
                    <div class="p-1">
                       <h6 class="text-light">**** **** **** **** {{ substr($masterCard->cardNumber, -4) }}</h6> 
                    </div>
                    <div class="d-flex">
                        <div class="p-1">
                            <h6 class="fw-bold fsm-9 text-light">{{ $masterCard->cardExpiry }}</h6>
                        </div>
                        <div class="p-1"></div>
                        <div class="p-1">
                            <h6 class="fw-bold fsm-9 text-light">{{ $masterCard->cardCvv }}</h6>
                        </div>
                    </div>
                </div>

                <div class="container-fluid p-3">
                  @foreach($userCards as $userCard)
                    <div class="row mb-2">
                         <div class="col-3"> <img src="{{ asset('images/'.$userCard->cardType.'.png') }}" height="24px" width="24px"/></div>
                         <div class="col-6"><span class="fsm-8">{{ $userCard->cardType }}</span></div>
                         <div class="col-3"><span class="fsm-8 text-end">**{{ substr($userCard->cardNumber, -2) }} </span></div> 
                    </div>
                   @endforeach
                </div>

                <div class="container-fluid p-2">
                    <h6 class="text-dark mb-3">Bills</h6>
                    <div class="row">
                      @foreach($generatedBills as $bill)
                        <div class="col-6">
                            <div class="container p-2 shadow rounded-3">
                                <img src="{{ asset('images/'.$bill->getLogo() ) }}" height="24px" width="24px"/> 
                                <h6 class="fw-bold fsm-8 mt-1 mb-3">{{ $bill->getType() }}</h6>
                                <h6 class="fsm-7">{{ $bill->getRenewal() }}</h6>
                                <h6 class="fsm-6">{{ $bill->getAmount() }}/{{ $bill->getFrequency() }}</h6>         
                            </div>
                        </div>
                      @endforeach
                    </div>
                </div>

                <div class="container-fluid p-3 shadow rounded-3 my-3">
                    <h6 class="fw-bold fsm-8">Quick Transfer</h6>
                  <form action="/payments" method="post">
                    @csrf
                    <div class="d-flex">
                        <div class="p-2"><div class="p-1 border rounded-circle"><img src="{{ asset('images/paypal.png') }}" height="22px" width="22px"/></div> </div>
                        <div class="p-2"><div class="p-1 border rounded-circle"><img src="{{ asset('images/mastercard.png') }}" height="22px" width="22px"/></div> </div>
                        <div class="p-2"><div class="p-1 border rounded-circle"><img src="{{ asset('images/stripe.png') }}" height="22px" width="22px"/></div></div>
                        <div class="p-2"><div class="p-1 border rounded-circle"><img src="{{ asset('images/visacard.png') }}" height="22px" width="22px"/></div></div>
                    </div>
                    <select class="form-select fsm-8 my-3" aria-label="Default select example">
                        <option selected>Recipient</option>
                        <option value="1">Dad</option>
                        <option value="2">Mum</option>
                        <option value="3">Adrian</option>
                    </select>
                    <div class="input-group my-3">
                        <input type="number" class="form-control fsm-8" placeholder="Amount"
                         aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <span class="input-group-text fsm-8" id="basic-addon2">USD</span>
                    </div>
                    <div class="d-grid gap-2 my-3">
                        <button class="btn btn-primary-gradient" type="submit">
                            <span class="text-light fsm-8 me-2">Send money </span>
                            <i class="bi bi-send text-light fsm-8"></i>
                        </button>
                      </div>
                  </form>       
                </div>
            </div>
        </div>
      </div>
</div>
</div>


<script>
    const ctx = document.getElementById('myChart');
  
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
        datasets: [{
          label: '',
          data: [1200, 1090, 3000, 1500, 120, 300,2200, 2090, 500, 1500, 1020, 3070],
          borderWidth: 0,
          barThickness: 10,
          borderRadius: 5,
          backgroundColor: '#4169e1'
        },
        {
          label: '',
          data: [1000, 1090, 200, 1100, 1120, 300,500, 1090, 1500, 500, 1700, 270],
          borderWidth: 0,
          barThickness: 10,
          borderRadius: 5,
          backgroundColor: '#eee'
        }
    ]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true,
            stacked: true,
            grid: {
              color: '#fff',
              lineWidth: 1,
            },
          },
          x: {
             beginAtZero: true,
             stacked: true,
             grid: {
              color: '#f3f3f3',
              lineWidth: 1,
            }
          }
        },
        plugins:{
          legend:{
            display: false
          }
        }
      }
    });
  </script>

@endsection