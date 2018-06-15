@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <ol class="breadcrumb panel-heading">
                <li class="active">DOENÇAS</li>
            </ol>
            <div class="panel-body">
                <form class="form-inline" action="{{ route('doenca.search') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="put">
                    <div class="form-group" style="float: right;">
                        <p><a href="{{route('doenca.create')}}" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-plus"></i> Nova doença</a></p>
                    </div>
                </form>
                <br />
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Sintomas</th>
                            <th>Tratamento</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($doencas as $doenca)
                            <tr>
                                <th scope="row" class="text-center">{{ $doenca->id }}</th>
                                <td>{{ $doenca->nome }}</td>
                                <td>{{ $doenca->sintomas }}</td>
                                <td>{{ $doenca->tratamento }}</td>
                                <td width="155" class="text-center">
                                    <a href="{{route('doenca.edit', $doenca->id)}}" class="btn btn-default">Editar</a>
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['doenca.destroy', $doenca->id]]) !!}
                                        {!! Form::submit('Excluir', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @if(!isset($search))
                <div align="center">
                    {!! $doencas->links() !!}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection