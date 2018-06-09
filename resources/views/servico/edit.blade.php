@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
            	<ol class="breadcrumb panel-heading">
                	<li><a href="{{route('servico.index')}}">Editar Serviço</a></li>
                	<li class="active">Editar</li>
                </ol>
                <div class="panel-body">
	                <form action="{{ route('servico.update', $servico->id) }}" method="POST" enctype="multipart/form-data">
	                	{{ csrf_field() }}
                        <input type="hidden" name="_method" value="put">
						<div class="form-group">
						  	<label for="nome">Nome</label>
						    <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" value="{{ $servico->nome }}">
						</div>
                        <div class="form-group">
                            <label for="name">Categorias</label>
                            {!! Form::select('categoria', $categorias, $servico->categoria_id, ['class' => 'form-control selectpicker']) !!}
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
