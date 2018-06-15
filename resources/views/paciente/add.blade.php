@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card" style="padding: 10px;">
			<div class="card-header">
				<h4 class="card-title">Cadastrar Paciente</h4>
			</div>
			<div class="card-body">
				<form action="{{ route('paciente.store') }}" method="POST" enctype="multipart/form-data">
					{{ csrf_field() }}

					<input type="hidden" name="prontuario" id="prontuario" value="prontuario">
					
					<div class="row">

						<div class="col-md-6 ">
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

						<div class="col-md-3">
							<div class="form-group">
								<label for="cep">CEP</label>
								<input type="text" class="form-control" name="cep" id="cep" placeholder="CEP">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="bairro">Bairro</label>
								<input type="text" class="form-control" name="bairro" id="bairro" placeholder="Bairro">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="endereco">Endereço</label>
								<input type="text" class="form-control" name="endereco" id="endereco" placeholder="Endereço">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="complemento">Complemento</label>
								<input type="text" class="form-control" name="complemento" id="complemento" placeholder="Complemento">
							</div>
						</div>

						</div>

						<div class="row">

							<div class="col-md-4">
								<div class="form-group">
									<label for="cidade">Cidade</label>
									<input type="text" class="form-control" name="cidade" id="cidade" placeholder="Cidade">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="uf">UF</label>
									<input type="text" class="form-control" name="uf" id="uf" placeholder="UF">
								</div>
							</div>
							
					</div>

					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="identidade">Identidade</label>
								<input type="text" class="form-control" name="identidade" id="identidade" placeholder="Identidade">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="cpf">CPF</label>
								<input type="text" class="form-control" name="cpf" id="cpf" placeholder="CPF">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="telefone">Telefone</label>
								<input type="text" class="form-control" name="telefone" id="telefone" placeholder="Telefone">
							</div>
						</div>
					</div>
						
					<div class="row">

						<div class="col-md-6 pr-1">
							<div class="form-group">
								<label for="password">Senha</label>
								<input type="password" class="form-control" name="password" id="password" placeholder="Senha">
							</div>
						</div>

						<div class="col-md-6 pr-1">
							<div class="form-group">
								<label for="data_nascimento">Data nascimento</label>
								<input type="date" class="form-control" name="data_nascimento" id="data_nascimento" placeholder="Data nascimento">
							</div>
						</div>
					
					</div>

					<div class="control-group" style="opacity: 0;">
						<div class="controls">
							<input name="image" type="hidden" value="0">
						</div>
					</div>

					<button type="submit" class="btn btn-primary">Salvar</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
