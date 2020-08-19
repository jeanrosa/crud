@extends('layouts.layout')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>New Comment</h3>
            </div>
            <div class="panel-body">
                <div class="table-container">
                    <form method="POST" action="{{ route('comment.store') }}" role="form">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label>Content</label>
                                <textarea name="content" id="content" row="5" cols="50" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <input type="text" 
                                name="status" 
                                id="status" 
                                class="form-control input-sm"
                                placeholder="Status"
                                >
                            </div>
                        </div>
                    </div>
                    <div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12">
							<input type="submit"  value="Guardar" class="btn btn-success btn-block">
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
