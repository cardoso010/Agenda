@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
            	<ol class="breadcrumb panel-heading">
                	<li><a href="{{route('servico.index')}}">Serviços</a></li>
                	<li class="active">Editar</li>
                </ol>
                <div class="panel-body">
	                <form action="{{ route('servico.update', $servico->id) }}" method="POST" enctype="multipart/form-data">
	                	{{ csrf_field() }}
						<div class="form-group">
						  	<label for="nome">Nome</label>
						    <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" value="{{ $servico->nome }}">
						</div>
                        <div class="form-group">
                            <label for="name">Categorias</label>
                            <select name="categoria[]" class="form-control selectpicker" multiple="" data-live-search="true" title="Categorias">
                                <?php foreach($categorias as $categoria){ ?>
                                    <option value="<?= $categoria->id ?>" <?= in_array($categoria->id, $selected_cat) ? "selected" : NULL ; ?>><?= $categoria->nome ?></option>
                                <?php } ?>
                            </select>
                            <p class="help-block">Use Crtl para selecionar.</p>
                        </div>
                        <div class="form-group">
                            <label for="name">Imagens</label>
                            @foreach($images as $image)
                            <img src="http://192.168.22.10/laravel/public/images/product/{{ $image->image }}"  width="10%" />
                            @endforeach
                        </div>
                        <div class="control-group">
                            <button type="button" class="btn btn-info btn-xs" id="moreimages"><i class="glyphicon glyphicon-plus"></i></button>
                            <br>
                            <div class="controls input-images">
                                <input name="images[]" type="file">
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
