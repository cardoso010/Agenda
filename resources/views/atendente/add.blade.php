@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card" style="padding: 10px;">
			<div class="card-header">
				<h4 class="card-title">Cadastro de Atendente</h4>
			</div>
			<div class="card-body">
				<form action="{{ route('atendente.store') }}" method="POST" enctype="multipart/form-data">
					{{ csrf_field() }}

					<input type="hidden" name="image" value="1">

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="nome">Nome</label>
								<input type="text" class="form-control" name="nome" id="nome" placeholder="Nome">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" class="form-control" name="email" id="email" placeholder="Email">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="password">Senha</label>
								<input type="password" class="form-control" name="password" id="password" placeholder="Senha">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="cargo">Cargo</label>
								<input type="text" class="form-control" name="cargo" id="cargo" placeholder="Cargo">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<input type="hidden" class="form-control" name="perfil" id="perfil" placeholder="Perfil" value="0">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="matricula">Matricula</label>
								<input type="number" class="form-control" name="matricula" id="matricula" max="99999999999" placeholder="Matricula">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="setor">Setor</label>
								<input type="text" class="form-control" name="setor" id="setor" placeholder="Setor">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="local">Local</label>
								<input type="text" class="form-control" name="local" id="local" placeholder="Local">
							</div>
						</div>
						<div class="col-md-6">
							<div class="control-group">
								<label for="setor">Unidade</label>
								<select name="hospital" class="form-control" id="hospital">
									<option value="UPA Rocinha"> UPA Rocinha</option>
									<option value=">UPA Cidade de Deus">UPA Cidade de Deus</option>
									<option value="UPA Praca Seca" >UPA Praca Seca</option>
									<option value="UPA São Cristóvão">UPA São Cristóvão</option>
									<option value="Taquara">Taquara</option>
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
