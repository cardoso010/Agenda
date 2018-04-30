@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Striped Table with Hover</h4>
                    <p class="category">Here is a subtitle for this table</p>
                </div>
                <div class="form-group" style="float: right;">
                    <p><a href="{{route('paciente.create')}}" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-plus"></i> Adicionar</a></p>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-hover table-striped">
                        <thead>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Telefone</th>
                            <th>Ação</th>
                        </thead>
                        <tbody>
                            @foreach($pacientes as $paciente)
                            <a href="{{route('paciente.atendimentos', $paciente->id)}}">
                                <tr>
                                    <th scope="row" class="text-center">{{ $paciente->id }}</th>
                                    <td>{{ $paciente->nome }}</td>
                                    <td>{{ $paciente->cpf }}</td>
                                    <td>{{ $paciente->telefone }}</td>
                                    <td width="155" class="text-center">
                                        <a href="{{route('paciente.edit', $paciente->id)}}" class="btn btn-default">Editar</a>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['paciente.destroy', $paciente->id]]) !!}
                                            {!! Form::submit('Excluir', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            </a>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
