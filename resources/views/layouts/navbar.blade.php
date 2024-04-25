<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>StcOnline</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        
   <style>
       body{
        margin: 0;
        padding: 0;
        overflow-x: hidden;
       }
       .fsm-8{
          font-size: .8rem !important;
        }
        .fsm-9{
            font-size: .9rem !important;
        }
        .fsm-7{
            font-size: .7rem !important;
        }
        .fsm-6{
            font-size: .6rem !important;
        }
       .bg-light{
           background-color: #eee !important;
        }
        .text-primary{
            color: #0637ca !important;
        }
        .bg-primary{
            background-color: royalblue !important;
        }
        .bg-primary-gradient{
            background: linear-gradient(85deg, rgb(40, 17, 247), rgb(45, 45, 45));
        }
        .bg-danger-gradient{
            background: linear-gradient(85deg, rgb(247, 17, 17), rgb(45, 45, 45));
        }
        .bg-white-gradient{
            background: linear-gradient(85deg, rgb(255, 255, 255), rgb(255, 255, 255));
        }
        .btn-primary-gradient{
          background: linear-gradient(85deg, rgb(40, 17, 247), rgb(45, 45, 45));
        }
        .btn-primary-gradient:hover{
          background: linear-gradient(85deg, rgb(45, 45, 45),rgb(40, 17, 247));
        }
        .nav-link:hover{
            background-color: #eee; 
            border-radius: 5px;     
        }
        .bg-light-warning{
            background-color: rgba(255, 255, 0, 0.495) !important;
        }
        .bg-light-success{
            background-color: rgba(155, 247, 212, 0.495) !important;
        }
        .bg-light-danger{
            background-color: rgba(252, 165, 148, 0.317) !important;
        }
        .bg-light-primary{
            background-color: rgba(118, 129, 251, 0.495) !important;
        }
        .text-danger{
          color: rgb(171, 2, 2) !important;
        }
        .text-warning{
           color: rgb(180, 177, 0) !important;
        }
        .text-success{
          color: rgb(0, 110, 0) !important;
        }
        .rounded-circle{
          border-radius: 100px !important;
        }
        td{
          padding-top: 10px !important;
          padding-bottom: 10px !important;
        }
        .border-strong{
           border: 2px solid black !important;
        }

   </style>
      </head>

    <body>

        <div class="container-fluid bg-light p-0">

          @if(session('error'))
          <div class="toast show position-fixed top-0 end-0 mt-2 me-2" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <i class="bi bi-exclamation-circle text-danger me-2"></i>
                <strong class="me-auto text-danger">Error</strong>
                <small>now</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body text-danger">
                {{ session('error') }}
            </div>
          </div>        
          @endif

         
          @if(session('success'))
          <div class="toast show position-fixed top-0 end-0 mt-2 me-2" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <i class="bi bi-check2-circle text-success me-2"></i>
                <strong class="me-auto text-success">Success</strong>
                <small>now</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body text-success">
                {{ session('success') }}
            </div>
          </div>        
          @endif

          <button class="btn btn-light text-dark d-block d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            <i class="bi bi-list"></i>
          </button>

            <div class="row">

                <div class="col-12 col-md-2 bg-light ps-3 d-block d-md-none">

                  <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                      <ul class="nav flex-column">
                        <li class="nav-item border-bottom py-2 mb-2">
                          <a class="nav-link active" aria-current="page" href="#">
                          <center><img src="{{ asset('images/logo.png') }}" height="48px" width="48px"/>
                    <h6 class="text-center fsm-7"><span class="text-primary fw-bold">STC</span><span class="text-dark fw-bold">Online</span></h6>
                    </center>
                          </a>
                        </li>
                        <li class="nav-item mb-1">
                          <a class="nav-link" href="/dashboard">
                            <i class="bi bi-house text-dark fsm-9"></i>
                            <span class="text-dark fsm-8 ms-2">Dashboard</span>
                          </a>
                        </li>
                        <li class="nav-item mb-1">
                          <a class="nav-link" href="/transactions">
                            <i class="bi bi-hdd-stack text-dark fsm-9"></i>
                            <span class="text-dark fsm-8 ms-2">Transactions</span></a>
                        </li>
                        <li class="nav-item mb-1">
                          <a class="nav-link" href="/payments">
                            <i class="bi bi-wallet text-dark fsm-9"></i>
                            <span class="text-dark fsm-8 ms-2">Payments</span></a>
                        </li>
                        <li class="nav-item mb-1">
                          <a class="nav-link" href="/profile">
                            <i class="bi bi-person-gear text-dark fs-5"></i>
                            <span class="text-dark fsm-8 ms-2">Profile</span></a>
                        </li>

                        @auth
                        <li class="nav-item mb-1">
                          <a class="nav-link" href="/logout">
                            <i class="bi bi-escape text-dark fsm-9"></i>
                            <span class="text-dark fsm-8 ms-2">Logout</span></a>
                        </li>
                        @endauth

                        @if(Auth::user()?->role == 'admin')
                        <li class="nav-item mt-4 mb-1 pt-3 border-top">
                          <a class="nav-link" href="/admin/create-user">
                            <i class="bi bi-database-add text-dark fs-6"></i>
                            <span class="text-dark fsm-8 ms-2">Add User</span></a>
                        </li>
                        <li class="nav-item mb-1">
                          <a class="nav-link" href="/admin/users">
                            <i class="bi bi-database text-dark fs-6"></i>
                            <span class="text-dark fsm-8 ms-2">Users</span></a>
                        </li>
                        @endif
                      </ul>
                    </div>
                  </div>

                </div> 
                <div class="col-12 col-md-2 bg-white ps-3 d-none d-md-block">
                    <ul class="nav flex-column">
                        <li class="nav-item border-bottom py-1 mb-1">
                          <a class="nav-link ms-2" aria-current="page" href="#">
                         <img src="{{ asset('images/logo.png') }}" height="48px" width="48px"/>
                         <h6 class="fsm-7"><span class="text-primary fw-bold">STC</span><span class="text-dark fw-bold">Online</span></h6>
                     
                          </a>
                        </li>
                        <li class="nav-item mb-1">
                          <a class="nav-link" href="/dashboard">
                            <i class="bi bi-house text-dark fsm-9"></i>
                            <span class="text-dark fsm-8 ms-2">Dashboard</span>
                          </a>
                        </li>
                        <li class="nav-item mb-1">
                          <a class="nav-link" href="/transactions">
                            <i class="bi bi-hdd-stack text-dark fsm-9"></i>
                            <span class="text-dark fsm-8 ms-2">Transactions</span></a>
                        </li>
                        <li class="nav-item mb-1">
                          <a class="nav-link" href="/payments">
                            <i class="bi bi-wallet text-dark fsm-9"></i>
                            <span class="text-dark fsm-8 ms-2">Payments</span></a>
                        </li>
                        <li class="nav-item mb-1">
                          <a class="nav-link" href="/profile">
                            <i class="bi bi-person-gear text-dark fs-5"></i>
                            <span class="text-dark fsm-8 ms-2">Profile</span></a>
                        </li>
                        @auth
                        <li class="nav-item mb-1">
                          <a class="nav-link" href="/logout">
                            <i class="bi bi-escape text-dark fsm-9"></i>
                            <span class="text-dark fsm-8 ms-2">Logout</span></a>
                        </li>
                        @endauth
                        @if(Auth::user()?->role == 'admin')
                        <li class="nav-item mt-4 mb-1 pt-3 border-top">
                          <a class="nav-link" href="/admin/create-user">
                            <i class="bi bi-database-add text-dark fs-6"></i>
                            <span class="text-dark fsm-8 ms-2">Add User</span></a>
                        </li>
                        <li class="nav-item mb-1">
                          <a class="nav-link" href="/admin/users">
                            <i class="bi bi-database text-dark fs-6"></i>
                            <span class="text-dark fsm-8 ms-2">Users</span></a>
                        </li>
                        
                        @endif
                      </ul>
                </div>
                @yield('body')
            </div>

        </div>

    </body>


</html>