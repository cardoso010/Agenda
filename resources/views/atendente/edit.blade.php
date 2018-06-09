@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<ol class="breadcrumb panel-heading">
				<li><a href="{{route('atendente.index')}}">Editar Atendente</a></li>
				<li class="active">Editar</li>
			</ol>
			<div class="panel-body">
				<form action="{{ route('atendente.update', $atendente->id) }}" method="POST" enctype="multipart/form-data">
					{{ csrf_field() }}
					<input type="hidden" name="_method" value="put">
					<input type="hidden" name="image" value="1">

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="nome">Nome</label>
								<input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" value="{{ $atendente->name }}">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{ $atendente->email }}">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="perfil">Perfil</label>
								<input type="text" class="form-control" name="perfil" id="perfil" placeholder="Perfil" value="{{ $atendente->perfil }}">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="cargo">Cargo</label>
								<input type="text" class="form-control" name="cargo" id="cargo" placeholder="Cargo" value="{{ $atendente->cargo }}">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="matricula">Matricula</label>
								<input type="number" class="form-control" name="matricula" id="matricula" max="99999999999" value="{{ $atendente->matricula }}">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="setor">Setor</label>
								<input type="text" class="form-control" name="setor" id="setor" value="{{ $atendente->setor }}">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="local">Local</label>
								<input type="text" class="form-control" name="local" id="local" value="{{ $atendente->local }}">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="setor">Unidade</label>
								<select name="hospital" class="form-control" id="hospital" value="{{ $atendente->hospital }}">
									<option value="UPA Rocinha" {{ $atendente->hospital == 'UPA Rocinha' ? 'selected' : '' }} > UPA Rocinha</option>
									<option value=">UPA Cidade de Deus" {{ $atendente->hospital == 'UPA Cidade de Deus' ? 'selected' : '' }} > UPA Cidade de Deus</option>
									<option value="UPA Praca Seca" {{ $atendente->hospital == 'UPA Praca Seca' ? 'selected' : '' }}  UPA Praca Seca</option>
									<option value="UPA Praca Sec" {{ $atendente->hospital == 'UPA São Cristóvão' ? 'selected' : '' }} > UPA São Cristóvão</option>
									<option value="Taquara" {{ $atendente->hospital == 'Taquara' ? 'selected' : '' }} > Taquara</option>
								</select>
							</div>
						</div>
					</div>
					<br />
					<button type="submit" class="btn btn-primary">Salvar</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
