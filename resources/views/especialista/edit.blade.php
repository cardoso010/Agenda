@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
            	<ol class="breadcrumb panel-heading">
                	<li><a href="{{route('especialista.index')}}">Especialistas</a></li>
                	<li class="active">Editar</li>
                </ol>
                <div class="panel-body">
	                <form action="{{ route('especialista.update', $especialista->id) }}" method="POST" enctype="multipart/form-data">
	                	{{ csrf_field() }}
						<input type="hidden" name="_method" value="put">
						<div class="form-group">
						  	<label for="perfil">Perfil</label>
						    <input type="text" class="form-control" name="perfil" id="perfil" placeholder="Perfil" value="{{ $especialista->perfil }}">
						</div>
						<div class="form-group">
						  	<label for="cargo_espec">Cargo</label>
						    <input type="text" class="form-control" name="cargo_espec" id="cargo_espec" placeholder="Cargo" value="{{ $especialista->cargo_espec }}">
						</div>
						<div class="form-group">
						  	<label for="crm_mat">Crm</label>
						    <input type="text" class="form-control" name="crm_mat" id="crm_mat" placeholder="Crm" value="{{ $especialista->crm_mat }}">
						</div>
                        <br />
						<button type="submit" class="btn btn-primary">Salvar</button>
	                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
