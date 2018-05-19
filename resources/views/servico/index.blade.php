@extends('layouts.app')
@section('content')

<div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <ol class="breadcrumb panel-heading">
                    <li class="active">Serviços</li>
                </ol>
                <div class="panel-body">
                    <form class="form-inline" action="{{ route('servico.search') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="put">
                        <div class="form-group" style="float: right;">
                            <p><a href="{{route('servico.create')}}" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-plus"></i> Adicionar</a></p>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
                        </div>
                        <div class="form-group" style="width: 200px; max-width: 200px;">
                            <select name="categoria" class="form-control selectpicker" data-live-search="true" title="Categorias">
                                <?php 
                                if(!empty($categorias)){
                                    foreach($categorias as $categoria){ ?>
                                    <option value="<?= $categoria->id ?>" <?= in_array($categoria->id, $selected_cat) ? "selected" : NULL ; ?>><?= $categoria->nome ?></option>
                                <?php }
                            } ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i> Buscar</button>
                    </form>
                    <br>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nome</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($servicos as $servico)
                                <tr>
                                    <th scope="row" class="text-center">{{ $servico->id }}</th>
                                    <td>{{ $servico->nome }}</td>
                                    <td width="155" class="text-center">
                                    <a href="{{route('servico.edit', $servico->id)}}" class="btn btn-default">Editar</a>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['servico.destroy', $servico->id]]) !!}
                                            {!! Form::submit('Excluir', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection