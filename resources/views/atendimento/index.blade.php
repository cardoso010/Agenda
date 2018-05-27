@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">ATENDIMENTOS</h4>
                    <p class="category">LISTAGEM DE ATENDIMENTOS</p>
                </div>
                @if (!Auth::user()->hasRole('paciente') || (Auth::user()->role == 0))
                <div class="form-group" style="float: right;">
                    <p><a href="{{route('atendimento.create')}}" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-plus"></i> Adicionar</a></p>
                </div>
                @endif
                <div class="content table-responsive table-full-width">
                    <table class="table table-hover table-striped">
                        <thead>
                            <th>ID</th>
                            <th>Prioridade</th>
                            <th>Especialista</th>
                            <th>Descricao</th>
                            <th>Status</th>
                            <th>Data Solução</th>
                            <th>Data Fechamento</th>
                            <th>Ação</th>
                        </thead>
                        <tbody>
                            @foreach($atendimentos as $atendimento)
                                <tr>
                                    <th scope="row" class="text-center">{{ $atendimento->id }}</th>
                                    <td> <span class='label-{{ $atendimento->prioridade }}'>{{ $atendimento->prioridade }}</span></td>
                                    <td>{{ $atendimento->name }}</td>
                                    <td>{{ $atendimento->descricao }}</td>
                                    <td>{{ $atendimento->status == 1 ? 'Aberto' : 'Fechado' }}</td>
                                    <td>{{ $atendimento->data_solucao }}</td>
                                    <td>{{ $atendimento->data_fechamento }}</td>
                                    <td>{{ $atendimento->acao }}</td>
                                    <td width="155" class="text-center">
                                        <a href="{{route('atendimento.edit', $atendimento->id)}}" class="btn btn-default">
                                            @if (!Auth::user()->hasRole('paciente'))
                                                Editar
                                            @else
                                                Ver
                                            @endif
                                        </a>
                                        @if (!Auth::user()->hasRole('paciente'))
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['atendimento.destroy', $atendimento->id]]) !!}
                                                {!! Form::submit('Excluir', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                        @endif
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
