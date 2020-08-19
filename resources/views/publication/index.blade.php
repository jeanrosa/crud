@extends('layouts.layout')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Publication List</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('publication.create') }}" class="btn btn-info" >+ Publication</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Author</th>
               <th>Title</th>
               <th>Content</th>
             </thead>
             <tbody>
             @if($publications->count())  
              @foreach($publications as $publication) 
              <tr>
                <td>{{$publication->auth}}</td>
                <td>{{$publication->title}}</td>
                <td>{{$publication->content}}</td>
                <td><a href="{{ route('comment.index') }}">Comments</a></td>
                <td><a class="btn btn-primary btn-xs" href="{{action('PublicationController@edit', $publication->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{action('PublicationController@destroy', $publication->id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">
 
                   <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                 </td>
               </tr>
               @endforeach 
               @else
               <tr>
                <td colspan="8">No hay registro !!</td>
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