@extends('layouts.layout')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Edit Comment</h3>
            </div>
            <div class="panel-body">
                <div class="table-container">
                    <form method="POST" action="{{ route('comment.update', $comment->id) }}" role="form">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PATCH">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label>Content</label>
                                <textarea name="content" id="content" row="5" cols="50" class="form-control">{{$comment->content}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>status</label>
                                <input type="text" 
                                name="status" 
                                id="status" 
                                class="form-control input-sm"
                                value="{{$comment->status}}"
                                placeholder="status"
                                >
                            </div>
                        </div>
                    </div>
                    <div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12">
							<input type="submit"  value="Actualizar" class="btn btn-success btn-block">
							<a href="{{ route('comment.index') }}" class="btn btn-info btn-block" >Atrás</a>
						</div>	
					</div>
                    </form>
                </div>
            </div>
        </div>
    </div>  
  </section>
</div>
@endsection