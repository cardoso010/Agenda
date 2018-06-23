@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card" style="padding: 10px;">
			<div class="card-header">
				<h4 class="card-title">Cadastrar Médico</h4>
			</div>
			<div class="card-body">
				<form action="{{ route('especialista.store') }}" method="POST" enctype="multipart/form-data">
					{{ csrf_field() }}

					<input name="image" type="hidden" value="0">
					<input type="hidden" name="perfil" id="perfil" placeholder="Perfil" value="0">

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
						<div class="col-md-6">
							<div class="form-group">
								<label for="password">Senha</label>
								<input type="password" class="form-control" name="password" id="password" placeholder="Senha">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="cargo_espec">Especialidade</label>
								<select name="cargo_espec" class="form-control" id="cargo_espec">
									<option value="Clinico geral">Clinico geral</option>
									<option value="Cardiologia">Cardiologia</option>
									<option value="Ortopedia" >Ortopedia</option>
									<option value="Pediatria">Pediatria</option>
									<option value="Oftalmologia">Oftalmologia</option>
								</select>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="crm_mat">Crm</label>
								<input type="number" class="form-control" name="crm_mat" id="crm_mat" max="99999999999" placeholder="Crm">
							</div>
						</div>
						<div class="col-md-6">
							<label for="setor">Unidade</label>
							<select name="hospital" class="form-control" id="hospital">
								<option value="UPA Rocinha"> UPA Rocinha</option>
								<option value=">UPA Cidade de Deus">UPA Cidade de Deus</option>
								<option value="UPA Praca Seca" >UPA Praca Seca</option>
								<option value="UPA Praca Sec">UPA São Cristóvão</option>
								<option value="Taquara">Taquara</option>
							</select>
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
