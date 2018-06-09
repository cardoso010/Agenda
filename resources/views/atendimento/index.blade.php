@extends('layouts.app')

@section('content')
    <script>
        var pacientes = @json($pacientes).data;
        var atendimentos = @json($atendimentos);
    </script>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">ATENDIMENTOS</h4>
                </div>
                <br>
                @if (!Auth::user()->hasRole('paciente') || (Auth::user()->role == 0))
                <div clas="row" style="display : flex; align-items : center;">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nome">Pesquisar paciente por cpf</label>
                            <input type="text" class="form-control busca-cpf" name="cpf" id="cpf" placeholder="Cpf">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group" style="float: right;">
                            <p><a href="{{route('atendimento.create')}}" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-plus"></i> Adicionar</a></p>
                        </div>
                    </div>
                </div>
                @endif
                <div class="content table-responsive table-full-width">
                    <table class="table table-hover table-striped">
                        <thead>
                            <th>ID</th>
                            <th>Prioridade</th>
                            <th>Paciente</th>
                            <th>Especialista</th>
                            <th>Status</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach($atendimentos as $atendimento)
                                @if($atendimento->status == 1 || (Auth::user()->role == 0))
                                <tr>
                                    <th scope="row" class="text-center">{{ $atendimento->id }}</th>
                                    <td> <span class='label-{{ $atendimento->prioridade }}'>{{ $atendimento->prioridade }}</span></td>
                                    <td>{{ isset($atendimento->paciente) ? $atendimento->paciente->nome : '' }}</td>
                                    <td>{{ $atendimento->name }}</td>
                                    <td>{{ $atendimento->status == 1 ? 'Aberto' : 'Fechado' }}</td>
                                    <td width="155" class="text-center">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <a href="{{route('atendimento.edit', $atendimento->id)}}" class="btn btn-default">
                                                    @if (!Auth::user()->hasRole('paciente'))
                                                        Atender
                                                    @else
                                                        Ver
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="col-md-6">
                                            @if (Auth::user()->role == 0)
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['atendimento.destroy', $atendimento->id]]) !!}
                                                    {!! Form::submit('Excluir', ['class' => 'btn btn-danger']) !!}
                                                {!! Form::close() !!}
                                            @endif
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
