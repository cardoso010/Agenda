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
                            <th>Prioridade</th>
                            <th>Data do atendimento</th>
                            <th>Paciente</th>
                            <th>Status</th>
                            <th></th>
                        </thead>
                        <tbody>
                        @foreach($atendimentos as $atendimento)
                            <tr class="{{$atendimento->status == 1 ? 'atendimento-aberto' : 'atendimento-fechado'}}">
                                <th scope="row" class="text-center">{{ $atendimento->id }}</th>
                                <td> <span class='label-{{ $atendimento->prioridade }}'>{{ $atendimento->prioridade }}</span></td>
                                <td>
                                    <input type="text" disabled class="data_solucao{{ $atendimento->id }}" style="border: none;" value="{{ $atendimento->data_solucao }}">
                                    <script>
                                        $(document).ready(function(){
                                            $(".data_solucao{{ $atendimento->id }}").val(formataData($(".data_solucao{{ $atendimento->id }}").val()))
                                        });
                                    </script>
                                </td>
                                <td>{{ isset($atendimento->paciente) ? $atendimento->paciente->nome : '' }}</td>
                                <td> <span style="color : {{ $atendimento->status == 1 ? 'blue' : 'red' }}; font-weight: bolder;">{{ $atendimento->status == 1 ? 'Aberto' : 'Fechado' }}</span></td>
                                <td width="155" class="text-center">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a href="{{route('atendimento.edit', $atendimento->id)}}?paciente={{ $atendimento->paciente_id }}" class="btn btn-default">
                                                @if (Auth::user()->hasRole('especialista'))
                                                    Atender
                                                @else
                                                    Ver
                                                @endif
                                            </a>
                                        </div>
                                    </div>
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
