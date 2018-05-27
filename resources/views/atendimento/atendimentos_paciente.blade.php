@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">ATENDIMENTO DO {{ isset($paciente->nome) ? $paciente->nome : 'Paciente' }}</h4>
                    <p class="category">LISTAGEM DE ATENDIMENTOS</p>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-hover table-striped">
                        <thead>
                            <th>ID</th>
                            <th>Resumo</th>
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
                                    <td>{{ $atendimento->resumo }}</td>
                                    <td>{{ $atendimento->descricao }}</td>
                                    <td>{{ $atendimento->status }}</td>
                                    <td>{{ $atendimento->data_solucao }}</td>
                                    <td>{{ $atendimento->data_fechamento }}</td>
                                    <td>{{ $atendimento->acao }}</td>
                                    <td width="155" class="text-center">
                                        <a href="{{route('atendimento.edit', $atendimento->id)}}" class="btn btn-default">Ver</a>
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
