@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <ol class="breadcrumb panel-heading">
                    <li class="active">Setores</li>
                </ol>
                <div class="panel-body">
                    <form class="form-inline" action="{{ route('setor.search') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="put">
                        <div class="form-group" style="float: right;">
                            <p><a href="{{route('setor.create')}}" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-plus"></i> Adicionar</a></p>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
                        </div>
                        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i> Buscar</button>
                    </form>
                    <br />
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nome</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($setores as $setor)
                                <tr>
                                    <th scope="row" class="text-center">{{ $setor->id }}</th>
                                    <td>{{ $setor->nome }}</td>
                                    <td width="155" class="text-center">
                                        <a href="{{route('setor.edit', $setor->id)}}" class="btn btn-default">Editar</a>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['setor.destroy', $setor->id]]) !!}
                                            {!! Form::submit('Excluir', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if(!isset($search))
                    <div align="center">
                        {!! $setores->links() !!}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection