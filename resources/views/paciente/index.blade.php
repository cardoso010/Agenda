@extends('layouts.app')

@section('content')
    <script>
        var pacientes = @json($pacientes).data;
    </script>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">PACIENTES</h4>
                    <p class="category">LISTAGEM DE PACIENTES</p>
                </div>
            
                @if (!Auth::user()->hasRole('paciente') || (Auth::user()->role == 0) )
                <br>
                <div class="form-group">
                    <div clas="row" style="display : flex; align-items : center;">
                        <div class="col-md-4">
                            <div class="form-group">
								<label for="nome">Pesquisar por cpf</label>
								<input type="text" class="form-control busca-cpf" name="cpf" id="cpf" placeholder="Cpf">
							</div>
                        </div>
                        <div class="col-md-8">
                            <a href="{{route('paciente.create')}}" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-plus"></i> Adicionar</a>
                        </div>
                    </div>
                </div>
                @endif

                <div class="content table-responsive table-full-width">
                    <table class="table table-hover table-striped">
                        <thead>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Telefone</th>
                            <th>Atendimentos</th>
                            <th>Ação</th>
                        </thead>
                        <tbody>
                            @foreach($pacientes as $paciente)
                            
                                <tr>
                                    <th scope="row" class="text-center">{{ $paciente->id }}</th>
                                    <td>{{ $paciente->nome }}</td>
                                    <td>{{ $paciente->cpf }}</td>
                                    <td>{{ $paciente->telefone }}</td>
                                    <td>
                                        <a href="{{route('atendimento.atendimentos_paciente', $paciente->id)}}" class="btn btn-default">
                                            Atendimentos
                                        </a>
                                    </td>
                                    <td class="text-center">
                                       <div class="row">
                                        <div class="col-md-6">
                                            <a href="{{route('paciente.edit', $paciente->id)}}" class="btn btn-default btn-sm">Editar</a>
                                        </div>
                                        <div class="col-md-6">
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['paciente.destroy', $paciente->id]]) !!}
                                                {!! Form::submit('Excluir', ['class' => 'btn btn-danger btn-sm']) !!}
                                            {!! Form::close() !!}
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
