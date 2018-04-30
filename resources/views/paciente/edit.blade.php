@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
            	<ol class="breadcrumb panel-heading">
                	<li><a href="{{route('paciente.index')}}">Pacientes</a></li>
                	<li class="active">Editar</li>
                </ol>
                <div class="panel-body">
	                <form action="{{ route('paciente.update', $paciente->id) }}" method="POST" enctype="multipart/form-data">
	                	{{ csrf_field() }}
						<input type="hidden" name="_method" value="put">
						<div class="form-group">
						  	<label for="nome">Nome</label>
						    <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" value="{{ $paciente->nome }}">
						</div>
						<div class="form-group">
						  	<label for="prontuario">Prontuario</label>
						    <input type="text" class="form-control" name="prontuario" id="prontuario" placeholder="Prontuario" value="{{ $paciente->prontuario }}">
						</div>
						<div class="form-group">
						  	<label for="data_nascimento">Data nascimento</label>
						    <input type="date" class="form-control" name="data_nascimento" id="data_nascimento" placeholder="Data nascimento" value="{{ $paciente->data_nascimento }}">
						</div>
						<div class="form-group">
						  	<label for="endereco">Endereço</label>
						    <input type="text" class="form-control" name="endereco" id="endereco" placeholder="Endereço" value="{{ $paciente->endereco }}">
						</div>
						<div class="form-group">
						  	<label for="bairro">Bairro</label>
						    <input type="text" class="form-control" name="bairro" id="bairro" placeholder="Bairro" value="{{ $paciente->bairro }}">
						</div>
						<div class="form-group">
						  	<label for="cidade">Cidade</label>
						    <input type="text" class="form-control" name="cidade" id="cidade" placeholder="Cidade" value="{{ $paciente->cidade }}">
						</div>
						<div class="form-group">
						  	<label for="uf">UF</label>
						    <input type="text" class="form-control" name="uf" id="uf" placeholder="UF" value="{{ $paciente->uf }}">
						</div>
						<div class="form-group">
						  	<label for="identidade">Identidade</label>
						    <input type="text" class="form-control" name="identidade" id="identidade" placeholder="Identidade" value="{{ $paciente->identidade }}">
						</div>
						<div class="form-group">
						  	<label for="cpf">CPF</label>
						    <input type="text" class="form-control" name="cpf" id="cpf" placeholder="CPF" value="{{ $paciente->cpf }}">
						</div>
						<div class="form-group">
						  	<label for="telefone">Telefone</label>
						    <input type="text" class="form-control" name="telefone" id="telefone" placeholder="Telefone" value="{{ $paciente->telefone }}">
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
