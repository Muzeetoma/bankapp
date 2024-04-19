@extends('layouts.navbar')

@section('body')

<style>
    .w-px-75{
        width: 100% !important;
    }
</style>

<div class="col-12 col-md-10">
<div class="container-fluid bg-light py-0 pe-3 pe-md-4">
<form action="/admin/create-user" method="post">
    @csrf
<h6 class="text-dark my-3">Create User</h6>

<div class="container bg-white p-3 rounded-3 my-3">
    <h6 class="text-dark mt-2">Personal</h6>
    <br>
  <div class="row">
    <div class="col-12 col-md-6 mb-3">
       <div class="row">
        <div class="col-2 col-md-1"><i class="bi bi-person rounded-circle p-1 text-dark fs-4"></i></div>
        <div class="col-10 col-md-11">
            <div class="input-group w-75">
                <input type="text" class="form-control fsm-8 w-75" name="firstname" placeholder="Firstname"
                 aria-label="Recipient's username" aria-describedby="basic-addon2" required>
            </div>
        </div>
       </div>
    </div>
    <div class="col-12 col-md-6 mb-4">
        <div class="row">
            <div class="col-2 col-md-1"><i class="bi bi-person rounded-circle p-1 text-dark fs-4"></i></div>
            <div class="col-10 col-md-11">
                <div class="input-group w-75">
                    <input type="text" class="form-control fsm-8 " name="lastname" placeholder="Last name"
                     aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                </div>
            </div>
           </div>
    </div>
    <div class="col-12 col-md-6 mb-4">
        <div class="row">
            <div class="col-2 col-md-1"><i class="bi bi-calendar rounded-circle p-1 text-dark fs-5"></i></div>
            <div class="col-10 col-md-11">
                <div class="input-group w-75">
                    <input type="date" class="form-control fsm-8" name="dob" placeholder="Date of birth"
                     aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                </div>
            </div>
           </div>
    </div>
    <div class="col-12 col-md-6 mb-4">
        <div class="row">
            <div class="col-2 col-md-1"><i class="bi bi-phone rounded-circle p-1 text-dark fs-5"></i></div>
            <div class="col-10 col-md-11">
                <div class="input-group w-75">
                    <input type="email" class="form-control fsm-8" name="email" placeholder="Email"
                     aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                </div>
            </div>
           </div>
    </div>
  </div>
</div>


<div class="container bg-white p-3 rounded-3 my-3">
    <h6 class="text-dark mt-2">Address</h6>
    <br>
    <div class="row">
      <div class="col-12 col-md-6 mb-4">
         <div class="row">
          <div class="col-2 col-md-1"><i class="bi bi-globe rounded-circle p-1 text-dark fs-6"></i></div>
          <div class="col-10 col-md-11">
            <div class="input-group w-75">
                <input type="text" class="form-control fsm-8" name="country" placeholder="Country"
                 aria-label="Recipient's username" aria-describedby="basic-addon2" required>
            </div>     
          </div>
         </div>
      </div>
      <div class="col-12 col-md-6 mb-3">
          <div class="row">
              <div class="col-2 col-md-1"><i class="bi bi-buildings rounded-circle p-1 text-dark fs-6"></i></div>
              <div class="col-10 col-md-11">
                <div class="input-group w-75">
                    <input type="text" class="form-control fsm-8" name="state" placeholder="State"
                     aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                </div>
              </div>
             </div>
      </div>
      <div class="col-12 col-md-6 mb-3">
          <div class="row">
              <div class="col-2 col-md-1"><i class="bi bi-building rounded-circle p-1 text-dark fs-6"></i></div>
              <div class="col-10 col-md-11">
                <div class="input-group w-75">
                    <input type="text" class="form-control fsm-8" name="address" placeholder="Address"
                     aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                </div>
              </div>
             </div>
      </div>
      <div class="col-12 col-md-6 mb-3">
        <div class="row">
            <div class="col-2 col-md-1"><i class="bi bi-geo rounded-circle p-1 text-dark fs-6"></i></div>
            <div class="col-10 col-md-11">
                <div class="input-group w-75">
                    <input type="number" class="form-control fsm-8" name="postalCode" placeholder="Postal Code"
                     aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                </div>
            </div>
           </div>
      </div>
    </div>
  </div>

  <div class="container bg-white p-3 rounded-3 my-3">
    <h6 class="text-dark mt-2">Credentials</h6>
    <br>
    <div class="row">
      <div class="col-12 col-md-6 mb-4">
         <div class="row">
          <div class="col-2 col-md-1"><i class="bi bi-key rounded-circle p-1 text-dark fs-6"></i></div>
          <div class="col-10 col-md-11">
            <div class="input-group w-75">
                <input type="password" class="form-control fsm-8" name="password" placeholder="Password"
                 aria-label="Recipient's password" aria-describedby="basic-addon2" required>
            </div>     
          </div>
         </div>
      </div>
      <div class="col-12 col-md-6 mb-3">
          <div class="row">
              <div class="col-2 col-md-1"><i class="bi bi-key rounded-circle p-1 text-dark fs-6"></i></div>
              <div class="col-10 col-md-11">
                <div class="input-group w-75">
                    <input type="password" class="form-control fsm-8" name="confirmPassword" placeholder="Confirm Password"
                     aria-label="Recipient's confirm Password" aria-describedby="basic-addon2" required>
                </div>
              </div>
             </div>
      </div>
    </div>
  </div>

  <div class="container bg-white p-3 rounded-3 my-3">
    <div class="d-grid gap-2 ">
        <button class="btn btn-primary-gradient" type="submit">
            <span class="text-light fsm-8 me-2">Create User</span>
        </button>
      </div>
  </div>
</form>
</div>
</div>
@endsection
