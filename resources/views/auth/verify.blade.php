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
          height: 100vh;
          width: 100vw;
          overflow-x: hidden;
        }
        .btn-primary-gradient{
          background: linear-gradient(85deg, rgb(40, 17, 247), rgb(45, 45, 45));
        }
        .btn-primary-gradient:hover{
          background: linear-gradient(85deg, rgb(45, 45, 45),rgb(40, 17, 247));
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
        .h-40{
            height: 40px !important;
        }

        .form-size{
            height: 60vh;
            width: 27vw;
        }
        .border-strong{
           border: 2px solid black !important;
        }

        @media only screen and (max-width: 768px) {

            .form-size{
                width: 45vw;
            }

        }

        @media only screen and (max-width: 425px) {

            .form-size{
                width: 85vw;
            }

        }
        
        </style>
        </head>

        

        <body class="container-fluid bg-light d-flex justify-content-center align-items-center">
            <div class="container form-size ">

                <div class="container p-3 bg-white shadow rounded-3">
                   <center><img src="{{ asset('images/logo.png') }}" height="48px" width="48px"/>
                    <h6 class="text-center fsm-7"><span class="text-primary fw-bold">STC</span><span class="text-dark fw-bold">Online</span></h6>
                    </center>
                    <h6 class="text-center fw-light mt-4 mb-4">Enter your OTP to contine</h6>
                   <form action="/verify" method="POST">
    
                    @csrf
    
                    <div class="input-group my-3">
                        <input type="text" class="form-control fsm-8 h-40" name="otp" placeholder="XXXXXX"
                         aria-label="Recipient's otp" aria-describedby="basic-addon2">
                    </div>
    
                    <div class="d-grid gap-2 mt-4 mb-2">
                        <button class="btn btn-primary-gradient h-40" type="submit">
                            <span class="text-light fsm-8 me-2">Verify </span>
                        </button>
                      </div>
                   </form>
                </div>
                
                @if (session('error'))
                <div class="container mt-3 p-2 text-center border-strong bg-white rounded-3 fsm-7">
                    <i class="bi bi-exclamation-circle text-danger me-2"></i>
                    <span class="text-danger"> {{ session('error') }} </span>
                </div>
               @endif
            </div>
        </body>

        </html>


