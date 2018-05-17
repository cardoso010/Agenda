@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
            	<ol class="breadcrumb panel-heading">
                	<li><a href="{{route('atendente.index')}}">Atendente</a></li>
                	<li class="active">Editar</li>
                </ol>
                <div class="panel-body">
	                <form action="{{ route('atendente.update', $atendente->id) }}" method="POST" enctype="multipart/form-data">
	                	{{ csrf_field() }}
						<input type="hidden" name="_method" value="put">
						<div class="form-group">
						  	<label for="perfil">Perfil</label>
						    <input type="text" class="form-control" name="perfil" id="perfil" placeholder="Perfil" value="{{ $atendente->perfil }}">
						</div>
						<div class="form-group">
						  	<label for="cargo">Cargo</label>
						    <input type="text" class="form-control" name="cargo" id="cargo" placeholder="Cargo" value="{{ $atendente->cargo }}">
						</div>
						<div class="form-group">
							<label for="matricula">Matricula</label>
							<input type="number" class="form-control" name="matricula" id="matricula" max="99999999999" value="{{ $atendente->matricula }}">
						</div>
						<div class="form-group">
							<label for="setor">Setor</label>
							<input type="number" class="form-control" name="setor" id="setor" max="99999999999" value="{{ $atendente->setor }}">
						</div>
						<div class="form-group">
							<label for="local">Local</label>
							<input type="text" class="form-control" name="local" id="local" value="{{ $atendente->local }}">
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
