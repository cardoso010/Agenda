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
                <div clas="row" style="display : flex; align-items : center;">
                @if (!Auth::user()->hasRole('paciente') || (Auth::user()->role == 0))
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="nome">Pesquisar paciente por cpf</label>
                            <input type="text" class="form-control busca-cpf" name="cpf" id="cpf" placeholder="Cpf">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <p><a href="{{route('atendimento.create')}}" class="btn btn-info btn-sm">Novo Atendimento</a></p>
                        </div>
                    </div>
                @endif
                    <div class="col-md-3">
                        <div class="form-group">
                            <p><button id="buttonAbertos" class="btn btn-default btn-sm">Esconder Abertos</button></p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <p><button id="buttonFechados" class="btn btn-danger btn-sm"> Exibir Fechados</button></p>
                        </div>
                    </div>
                </div>
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
                                <tr class="{{$atendimento->status == 1 ? 'atendimento-aberto' : 'atendimento-fechado'}}">
                                    <th scope="row" class="text-center">{{ $atendimento->id }}</th>
                                    <td> <span class='label-{{ $atendimento->prioridade }}'>{{ $atendimento->prioridade }}</span></td>
                                    <td>{{ isset($atendimento->paciente) ? $atendimento->paciente->nome : '' }}</td>
                                    <td>{{ $atendimento->name }}</td>
                                    <td> <span style="color : {{ $atendimento->status == 1 ? 'blue' : 'red' }}; font-weight: bolder;">{{ $atendimento->status == 1 ? 'Aberto' : 'Fechado' }}</span></td>
                                    <td width="155" class="text-center">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <a href="{{route('atendimento.edit', $atendimento->id)}}" class="btn btn-default">
                                                    @if (Auth::user()->hasRole('especialista'))
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
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>

        $("#buttonAbertos").click(()=>{
            $(".atendimento-aberto").toggle();
            if((this.tog1 = !this.tog1)){
                $("#buttonAbertos").text('Exibir Abertos')
            }else{
                $("#buttonAbertos").text('Esconder Abertos')
            }
        });

        $("#buttonFechados").click(()=>{
            $(".atendimento-fechado").toggle();
            if((this.tog2 = !this.tog2)){
                $("#buttonFechados").text('Esconder Fechados')
            }else{
                $("#buttonFechados").text('Exibir Fechados')
            }
        });
    
    </script>
@endsection
