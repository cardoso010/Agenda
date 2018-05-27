@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">ESPECIALISTAS</h4>
                    <p class="category">LISTAGEM DE ESPECIALISTAS</p>
                </div>
                <div class="form-group" style="float: right;">
                    <p><a href="{{route('especialista.create')}}" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-plus"></i> Adicionar</a></p>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-hover table-striped">
                        <thead>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Perfil</th>
                            <th>Cargo</th>
                            <th>Crm</th>
                            <th>Ação</th>
                        </thead>
                        <tbody>
                            @foreach($especialistas as $especialista)
                            
                                <tr>
                                    <th scope="row" class="text-center">{{ $especialista->id }}</th>
                                    <td>{{ $especialista->user->name }}</td>
                                    <td>{{ $especialista->perfil }}</td>
                                    <td>{{ $especialista->cargo_espec }}</td>
                                    <td>{{ $especialista->crm_mat }}</td>
                                    <td>
                                        <a href="{{route('atendimento.atendimentos_especialista', $especialista->id)}}" class="btn btn-default">
                                            Atendimentos
                                        </a>
                                    </td>
                                    <td width="155" class="text-center">
                                        <a href="{{route('especialista.edit', $especialista->id)}}" class="btn btn-default">Editar</a>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['especialista.destroy', $especialista->id]]) !!}
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
