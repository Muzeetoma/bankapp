@extends('layouts.navbar')

@section('body')

<div class="col-12 col-md-10">
<div class="container-fluid bg-light py-0 pe-3 pe-md-4">

<h6 class="text-dark my-3">Settings</h6>

<div class="container bg-white p-3 rounded-3">
    <div class="d-flex">
      <div class="p-1">
        <span class="py-2 px-3 rounded-circle bg-light-primary text-primary fw-bold fs-4">{{ substr(Auth::user()?->firstname, 0, 1) }}</span> 
      </div>
      <div class="p-1">
        <h6 class="m-0 fs-5">
            {{ Auth::user()?->firstname }}, {{ Auth::user()?->lastname }}
        </h6>
        <h6 class="m-0 fsm-8 text-secondary">
            <span class="fw-bold">UserId:</span> {{ Auth::user()?->userId }}
        </h6>
      </div>
    </div>
</div>

<div class="container bg-white p-3 rounded-3 my-3">
  <div class="row">
    <div class="col-12 col-md-6 mb-3">
       <div class="d-flex">
        <div class="p-1"><i class="bi bi-person rounded-circle p-1 text-dark fs-4"></i></div>
        <div class="p-1">
            <h6 class="fsm-7 m-0 p-0 text-secondary">Firstname</h6>
            <h6 class="fsm-8">{{ Auth::user()?->firstname }}</h6>
        </div>
       </div>
    </div>
    <div class="col-12 col-md-6 mb-3">
        <div class="d-flex">
            <div class="p-1"><i class="bi bi-person rounded-circle p-1 text-dark fs-4"></i></div>
            <div class="p-1">
                <h6 class="fsm-7 m-0 p-0 text-secondary">Lastname</h6>
                <h6 class="fsm-8">{{ Auth::user()?->lastname }}</h6>
            </div>
           </div>
    </div>
    <div class="col-12 col-md-6 mb-3">
        <div class="d-flex">
            <div class="p-1"><i class="bi bi-calendar rounded-circle p-1 text-dark fs-6"></i></div>
            <div class="p-1">
                <h6 class="fsm-7 m-0 p-0 text-secondary">Date of birth</h6>
                <h6 class="fsm-8"> {{ Carbon\Carbon::parse(Auth::user()?->dob)->format('M d, Y') }}
                </h6>
            </div>
           </div>
    </div>
    <div class="col-12 col-md-6 mb-3">
        <div class="d-flex">
            <div class="p-1"><i class="bi bi-phone rounded-circle p-1 text-dark fs-6"></i></div>
            <div class="p-1">
                <h6 class="fsm-7 m-0 p-0 text-secondary">Mail</h6>
                <h6 class="fsm-8">{{ Auth::user()?->email }}</h6>
            </div>
           </div>
    </div>
    <div class="col-12 pt-3 border-top">
        <div class="d-flex">
            <div class="p-1"><i class="bi bi-building rounded-circle p-1 text-dark fs-6"></i></div>
            <div class="p-1">
                <h6 class="fsm-7 m-0 p-0 text-secondary">Address</h6>
                <h6 class="fsm-8">   {{ Auth::user()?->address }},
                     {{ Auth::user()?->state }},
                     {{ Auth::user()?->country }}
                </h6>
            </div>
           </div>
    </div>
  </div>
</div>


<div class="container bg-white p-3 rounded-3 my-3">
    <div class="row">
      <div class="col-12 col-md-6 mb-3">
         <div class="d-flex">
          <div class="p-1"><i class="bi bi-globe rounded-circle p-1 text-dark fs-6"></i></div>
          <div class="p-1">
              <h6 class="fsm-7 m-0 p-0 text-secondary">Country</h6>
              <h6 class="fsm-8">{{ Auth::user()?->country }}</h6>
          </div>
         </div>
      </div>
      <div class="col-12 col-md-6 mb-3">
          <div class="d-flex">
              <div class="p-1"><i class="bi bi-buildings rounded-circle p-1 text-dark fs-6"></i></div>
              <div class="p-1">
                  <h6 class="fsm-7 m-0 p-0 text-secondary">State</h6>
                  <h6 class="fsm-8">{{ Auth::user()?->state }}</h6>
              </div>
             </div>
      </div>
      <div class="col-12 col-md-6 mb-3">
          <div class="d-flex">
              <div class="p-1"><i class="bi bi-building rounded-circle p-1 text-dark fs-6"></i></div>
              <div class="p-1">
                  <h6 class="fsm-7 m-0 p-0 text-secondary">Address</h6>
                  <h6 class="fsm-8">{{ Auth::user()?->address }}</h6>
              </div>
             </div>
      </div>
      <div class="col-12 col-md-6 mb-3">
        <div class="d-flex">
            <div class="p-1"><i class="bi bi-geo rounded-circle p-1 text-dark fs-6"></i></div>
            <div class="p-1">
                <h6 class="fsm-7 m-0 p-0 text-secondary">Postal code</h6>
                <h6 class="fsm-8">{{ Auth::user()?->postalCode }}</h6>
            </div>
           </div>
      </div>
    </div>
  </div>

</div>
</div>
@endsection
