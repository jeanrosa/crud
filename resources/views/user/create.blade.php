@extends('layouts.layout')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>New User</h3>
            </div>
            <div class="panel-body">
                <div class="table-container">
                    <form method="POST" action="{{ route('user.store') }}" role="form">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" 
                                name="name" 
                                id="name" 
                                class="form-control input-sm"
                                placeholder="Name"
                                >
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" 
                                name="email" 
                                id="email" 
                                class="form-control input-sm"
                                placeholder="Email"
                                >
                            </div>
                        </div>
                    </div>
                    <div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12">
							<input type="submit"  value="Guardar" class="btn btn-success btn-block">
							<a href="{{ route('user.index') }}" class="btn btn-info btn-block" >Atrás</a>
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
