@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
            	<ol class="breadcrumb panel-heading">
                	<li><a href="{{route('paciente.index')}}">Pacientes</a></li>
                	<li class="active">Adicionar</li>
                </ol>
                <div class="panel-body">
	                <form action="{{ route('paciente.store') }}" method="POST" enctype="multipart/form-data">
	                	{{ csrf_field() }}
						<div class="form-group">
						  	<label for="nome">Nome</label>
						    <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome">
						</div>
						<div class="form-group">
						  	<label for="email">Email</label>
						    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
						</div>
						<div class="form-group">
						  	<label for="password">Senha</label>
						    <input type="password" class="form-control" name="password" id="password" placeholder="Senha">
						</div>
						<div class="form-group">
						  	<label for="prontuario">Prontuario</label>
						    <input type="text" class="form-control" name="prontuario" id="prontuario" placeholder="Prontuario">
						</div>
						<div class="form-group">
						  	<label for="data_nascimento">Data nascimento</label>
						    <input type="date" class="form-control" name="data_nascimento" id="data_nascimento" placeholder="Data nascimento">
						</div>
						<div class="form-group">
						  	<label for="endereco">Endereço</label>
						    <input type="text" class="form-control" name="endereco" id="endereco" placeholder="Endereço">
						</div>
						<div class="form-group">
						  	<label for="bairro">Bairro</label>
						    <input type="text" class="form-control" name="bairro" id="bairro" placeholder="Bairro">
						</div>
						<div class="form-group">
						  	<label for="cidade">Cidade</label>
						    <input type="text" class="form-control" name="cidade" id="cidade" placeholder="Cidade">
						</div>
						<div class="form-group">
						  	<label for="uf">UF</label>
						    <input type="text" class="form-control" name="uf" id="uf" placeholder="UF">
						</div>
						<div class="form-group">
						  	<label for="identidade">Identidade</label>
						    <input type="text" class="form-control" name="identidade" id="identidade" placeholder="Identidade">
						</div>
						<div class="form-group">
						  	<label for="cpf">CPF</label>
						    <input type="text" class="form-control" name="cpf" id="cpf" placeholder="CPF">
						</div>
						<div class="form-group">
						  	<label for="telefone">Telefone</label>
						    <input type="text" class="form-control" name="telefone" id="telefone" placeholder="Telefone">
						</div>
						<div class="control-group">
                            <div class="controls">
                                <input name="image" type="file">
                            </div>
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
