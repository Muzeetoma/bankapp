@extends('layouts.navbar')

@section('body')

<div class="col-12 col-md-10">
<div class="container-fluid bg-light py-0 pe-3 pe-md-4">

<h6 class="text-dark my-3">Payments</h6>

<div class="row">
    @foreach($userCards as $index => $userCard)
    <div class="col-12 col-md-4 mb-3">
        <div class="container {{ $cardGradients->get($index) }} p-3 rounded-4 {{ $index == 2 ? 'shadow-sm' : '' }}">
            <div class="d-flex justify-content-between">
                <div class="p-1">
                    <h6 class="fw-bold {{ $index == 2 ? 'text-dark' : 'text-light' }} fsm-9">{{ strtoupper(Auth::user()?->name) }}</h6>
                </div>
                <div class="p-1">
                    <img src="{{ asset('images/'.$userCard->cardType.'.png') }}" height="24px" width="24px"/>
                </div>
            </div>

            <div class="p-1">
                <img src="{{ asset('images/chip-card.png') }}" height="24px" width="24px"/>
            </div>

            <div class="p-1">
               <h6 class="{{ $index == 2 ? 'text-dark' : 'text-light' }}">**** **** **** **** {{ substr($userCard->cardNumber, -4) }}</h6> 
            </div>
         
            <div class="d-flex">
                <div class="p-1">
                    <h6 class="fw-bold fsm-9 {{ $index == 2 ? 'text-dark' : 'text-light' }}">{{ $userCard->cardExpiry }}</h6>
                </div>
                <div class="p-1">
                </div>
                <div class="p-1">
                    <h6 class="fw-bold fsm-9 {{ $index == 2 ? 'text-dark' : 'text-light' }}">{{ $userCard->cardCvv }}</h6>
                </div>
            </div>
        </div>

    </div>
@endforeach
</div>



<div class="row">
  <div class="col-12 col-md-6">
    <div class="container bg-white rounded-4 p-3 my-3" >
        <h6 class="fsm-8 my-3">Payment History</h6>
        <canvas id="myChart" height="120"></canvas>
    </div>
  </div>
  <div class="col-12 col-md-6">
    <div class="container bg-white rounded-4 p-3 my-3 fsm-8">
        <h6 class="fsm-8 my-3">Frequent Payments</h6>
        @foreach($generatedBills as $bill)
        <div class="row py-2 my-2">
            <div class="col-6 col-md-4">
                <img src="{{ asset('images/'.$bill->getLogo() ) }}" height="24px" width="24px"/> 
                <span class="ms-1">{{ $bill->getType() }}</span></div>
             <div class="col-6 col-md-8">
                <div class="progress mt-2" role="progressbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="height: 10px;">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 75%"></div>
            </div>
            </div>
        </div>
        @endforeach

    </div>
  </div>
</div>

</div>
</div>


<script>
    const ctx = document.getElementById('myChart');
  
    new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        datasets: [{
          label: '',
          data: [1200, 200, 2000, 1500, 400, 300],
          borderWidth: 2,
          tension:0.4,
          borderColor: '#4169e1'
        },
        {
          label: '',
          data: [1000, 700, 200, 1100, 600, 700],
          borderWidth: 2,
          tension:0.4,
          borderColor: '#d3d3d3'
        }
    ]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true,
            grid: {
              color: '#fff',
              lineWidth: 1,
            },
          },
          x: {
             beginAtZero: true,
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