@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
            	<ol class="breadcrumb panel-heading">
                	<li><a href="{{route('especialista.index')}}">Especialistas</a></li>
                	<li class="active">Adicionar</li>
                </ol>
                <div class="panel-body">
	                <form action="{{ route('especialista.store') }}" method="POST" enctype="multipart/form-data">
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
						  	<label for="perfil">Perfil</label>
						    <input type="text" class="form-control" name="perfil" id="perfil" placeholder="Perfil">
						</div>
						<div class="form-group">
						  	<label for="cargo_espec">Cargo</label>
						    <input type="text" class="form-control" name="cargo_espec" id="cargo_espec" placeholder="Cargo">
						</div>
						<div class="form-group">
						  	<label for="crm_mat">Crm</label>
						    <input type="text" class="form-control" name="crm_mat" id="crm_mat" placeholder="Crm">
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
