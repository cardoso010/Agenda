@extends('layouts.app')

@section('content')
<div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
            	<ol class="breadcrumb panel-heading">
                	<li><a href="{{route('paciente.index')}}">Editar Paciente</a></li>
                	<li class="active">Editar</li>
                </ol>
                <div class="panel-body">
	                <form action="{{ route('paciente.update', $paciente->id) }}" method="POST" enctype="multipart/form-data">
	                	{{ csrf_field() }}
						<input type="hidden" name="_method" value="put">
						
						<div class="row">

						<div class="col-md-6 ">
							<div class="form-group">
								<label for="nome">Nome</label>
								<input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" value="{{ $paciente->nome }}">
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{ $paciente->email }}">
							</div>
						</div>

					</div>

					<div class="row">

						<div class="col-md-2">
							<div class="form-group">
								<label for="endereco">CEP</label>
								<input type="text" class="form-control" name="cep" id="cep" placeholder="CEP" value="{{ $paciente->cep }}">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="bairro">Bairro</label>
								<input type="text" class="form-control" name="bairro" id="bairro" placeholder="Bairro" value="{{ $paciente->bairro }}">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="endereco">Endereço</label>
								<input type="text" class="form-control" name="endereco" id="endereco" placeholder="Endereço" value="{{ $paciente->endereco }}">
							</div>
						</div>

						<div class="col-md-1">
							<div class="form-group">
								<label for="prontuario">Numero</label>
								<input type="number" class="form-control" name="prontuario" id="prontuario" placeholder="Numero" value="{{ $paciente->prontuario }}">
							</div>
						</div>
						
						<div class="col-md-3">
							<div class="form-group">
								<label for="uf">Complemento</label>
								<input type="text" class="form-control" name="complemento" id="complemento" placeholder="Complemento" value="{{ $paciente->complemento }}">
							</div>
						</div>

					</div>

						<div class="row">

							<div class="col-md-4">
								<div class="form-group">
									<label for="cidade">Cidade</label>
									<input type="text" class="form-control" name="cidade" id="cidade" placeholder="Cidade" value="{{ $paciente->cidade }}">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="uf">UF</label>
									<input type="text" class="form-control" name="uf" id="uf" placeholder="UF" value="{{ $paciente->uf }}">
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<label for="hospital">Hospital de cadastro</label>
									<select name="hospital" class="form-control" id="hospital" {{ (!Auth::user()->hasRole('paciente') || (Auth::user()->role == 0)) ? '' : 'disabled' }}>
										<option value="UPA Rocinha" {{ $paciente->hospital == 'UPA Rocinha' ? 'selected' : '' }}> UPA Rocinha</option>
										<option value="UPA Cidade de Deus" {{ $paciente->hospital == 'UPA Cidade de Deus' ? 'selected' : '' }}>UPA Cidade de Deus</option>
										<option value="UPA Praca Seca" {{ $paciente->hospital == 'UPA Praca Seca' ? 'selected' : '' }}>UPA Praca Seca</option>
										<option value="UPA São Cristóvão" {{ $paciente->hospital == 'UPA São Cristóvão' ? 'selected' : '' }}>UPA São Cristóvão</option>
										<option value="UPA Taquara" {{ $paciente->hospital == 'UPA Taquara' ? 'selected' : '' }}>UPA Taquara</option>
									</select>
								</div>
							</div>
							
						</div>

					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="identidade">Identidade</label>
								<input type="text" class="form-control" name="identidade" id="identidade" placeholder="Identidade" value="{{ $paciente->identidade }}">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="cpf">CPF</label>
								<input type="text" class="form-control" name="cpf" id="cpf" placeholder="CPF" value="{{ $paciente->cpf }}">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="telefone">Telefone</label>
								<input type="text" class="form-control" name="telefone" id="telefone" placeholder="Telefone" value="{{ $paciente->telefone }}">
							</div>
						</div>
					</div>
						
					<div class="row">

						<div class="col-md-6 pr-1">
							<div class="form-group">
								<label for="password">Senha</label>
								<input type="password" class="form-control" name="password" id="password" placeholder="Senha" value="{{ $paciente->password }}">
							</div>
						</div>

						<div class="col-md-6 pr-1">
							<div class="form-group">
								<label for="data_nascimento">Data nascimento</label>
								<input type="date" class="form-control" name="data_nascimento" id="data_nascimento" placeholder="Data nascimento" value="{{ $paciente->data_nascimento }}">
							</div>
						</div>
					
					</div>

					<div class="control-group" style="opacity: 0;">
						<div class="controls">
							<input name="image" type="hidden" value="0">
						</div>
					</div>
					
					<br />
					@if (!Auth::user()->hasRole('paciente') || (Auth::user()->role == 0))
						<button type="submit" class="btn btn-primary">Salvar</button>
					@endif
	                </form>
                </div>
            </div>
        </div>
    </div>
@endsection
