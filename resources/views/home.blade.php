@extends('layouts.app')

@section('content')
    <script>
        var pacientes = @json($pacientes).data;
        var atendimentos = @json($atendimentos).data;
    </script>
    <div class="panel panel-default">
        <div class="panel-heading">Dashboard</div>

        <div class="panel-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            @if (!Auth::user()->hasRole('paciente') || (Auth::user()->role == 0))
                <div class="form-group">
                    <div clas="row" style="display : flex; align-items : center;">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nome">Pesquisar paciente por cpf</label>
                                <input type="text" class="form-control busca-cpf" name="cpf" id="cpf" placeholder="Cpf">
                            </div>
                        </div>
                       <!-- <div class="col-md-2">
                            <a href="{{route('paciente.create')}}" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-plus"></i> Adicionar</a>
                        </div> -->
                    </div>
                </div>
            @endif

        </div>
    </div>
@endsection
