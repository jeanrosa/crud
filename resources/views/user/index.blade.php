@extends('layouts.layout')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>User List</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('user.create') }}" class="btn btn-info" >+ User</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Name</th>
               <th>Email</th>
             </thead>
             <tbody>
             @if($users->count())  
              @foreach($users as $users) 
              <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td><a class="btn btn-primary btn-xs" href="{{action('UserController@edit', $user->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{action('UserController@destroy', $user->id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">
 
                   <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                 </td>
               </tr>
               @endforeach 
               @else
               <tr>
                <td colspan="8">No hay User !!</td>
              </tr>
              @endif
            </tbody>
 
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
 
@endsection