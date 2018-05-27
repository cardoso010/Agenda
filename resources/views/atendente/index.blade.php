@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">ATENDENTES</h4>
                    <p class="category">LISTAGEM DE ATENDENTES</p>
                </div>
                <div class="form-group" style="float: right;">
                    <p><a href="{{route('atendente.create')}}" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-plus"></i> Adicionar</a></p>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-hover table-striped">
                        <thead>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Perfil</th>
                            <th>Cargo</th>
                            <th>Matricula</th>
                            <th>Ação</th>
                        </thead>
                        <tbody>
                            @foreach($atendentes as $atendente)
                            
                                <tr>
                                    <th scope="row" class="text-center">{{ $atendente->id }}</th>
                                    <td>{{ $atendente->user->name }}</td>
                                    <td>{{ $atendente->perfil }}</td>
                                    <td>{{ $atendente->cargo }}</td>
                                    <td>{{ $atendente->matricula }}</td>
                                    <td width="155" class="text-center">
                                        <a href="{{route('atendente.edit', $atendente->id)}}" class="btn btn-default">Editar</a>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['atendente.destroy', $atendente->id]]) !!}
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
