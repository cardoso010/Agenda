@extends('layouts.app')
@section('content')

<div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <ol class="breadcrumb panel-heading">
                    <li class="active">SERVIÇO</li>
                </ol>
                <div class="panel-body">
                    <form class="form-inline" action="{{ route('servico.search') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="put">
                        <div class="form-group" style="float: right;">
                            <p><a href="{{route('servico.create')}}" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-plus"></i> Novo Serviço</a></p>
                        </div>
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