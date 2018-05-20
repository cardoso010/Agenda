@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card" style="padding: 10px;">
			<div class="card-header">
				<h4 class="card-title">Especialista</h4>
			</div>
			<div class="card-body">
				<form action="{{ route('especialista.store') }}" method="POST" enctype="multipart/form-data">
					{{ csrf_field() }}

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
								<label for="cargo_espec">Especialidade</label>
								<input type="text" class="form-control" name="cargo_espec" id="cargo_espec" placeholder="Cargo">
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
								<label for="crm_mat">Crm</label>
								<input type="number" class="form-control" name="crm_mat" id="crm_mat" max="99999999999" placeholder="Crm">
							</div>
						</div>
						<div class="col-md-6">
							<div class="control-group" style="opacity: 0;">
								<div class="controls">
									<input name="image" type="hidden" value="0">
								</div>
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
