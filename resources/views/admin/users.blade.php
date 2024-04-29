@extends('layouts.navbar')

@section('body')

<div class="col-12 col-md-10">
<div class="container-fluid bg-light py-0 pe-3 pe-md-4">

<h6 class="text-dark my-3">Users</h6>

<div class="container-fluid p-1 bg-white rounded-4 my-2">
    <table class="table rounded-4 fsm-7">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">UserId</th>
          </tr>
        </thead>
        <tbody> 
          
 
            @foreach($users as $user)
            <tr>
            <td> {{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role }}</td>
            <td>{{ $user->userId }}</td>
          </tr>
         @endforeach
        </tbody>
      </table>
</div>

</div>
</div>
@endsection