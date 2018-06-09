@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
            	<ol class="breadcrumb panel-heading">
                	<li><a href="{{route('doenca.index')}}">Cadastrar Doença</a></li>
                	<li class="active">Adicionar</li>
                </ol>
                <div class="panel-body">
	                <form action="{{ route('doenca.store') }}" method="POST" enctype="multipart/form-data">
	                	{{ csrf_field() }}
						<div class="form-group">
						  	<label for="nome">Nome</label>
						    <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome">
						</div>
						<div class="form-group">
						  	<label for="sintomas">Sintomas</label>
						    <textarea class="form-control" rows="5" name="sintomas" id="sintomas"></textarea>
						</div>
						<div class="form-group">
						  	<label for="tratamento">Tratamento</label>
							<textarea class="form-control" rows="5" name="tratamento" id="tratamento"></textarea>
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
