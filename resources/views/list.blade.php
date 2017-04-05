@extends('layouts/app')
@section('content');
<table class="table table-striped">
  <thead>
    <tr>
      <th>#</th>
      <th>Avatar</th>
      <th>Username</th>
      <th>email</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Lastupdate</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($listusers as $user)
    <tr>
      <th scope="row"></th>
      <td><img src="{{ asset("../storage/app/avatar/$user->img")}}" with='50' height='50'></img></td>
      <td>{{$user->username}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->fname}}</td>
      <td>{{$user->lname}}</td>
      <td>{{$user->updated_at}}</td>
      <td><a href="{{url("user/$user->id/edit")}}"><i class="fa fa-edit" style="font-size:24px;color:red"></i></a></td>
    </tr> 
  @endforeach 
  </tbody>
</table>

@endsection