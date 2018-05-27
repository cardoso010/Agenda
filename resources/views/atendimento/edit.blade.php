@extends('layouts.app')

@section('content')
<div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
            	<ol class="breadcrumb panel-heading">
                	<li><a href="{{route('atendimento.index')}}">ATENDIMENTO</a></li>
                	<li class="active">Editar</li>
                </ol>
                <div class="panel-body">
	                <form action="{{ route('atendimento.update', $atendimento->id) }}" method="POST" enctype="multipart/form-data">
	                	{{ csrf_field() }}
						<input type="hidden" name="_method" value="put">
						<div class="form-group">
							<label for="setor">Prioridade</label>
							<select name="prioridade" class="form-control" id="prioridade" value="{{ $atendimento->prioridade }}">
								<option value="Prioritário" {{ $atendimento->prioridade == 'Prioritário' ? 'selected' : '' }}>Prioritário</option>
								<option value="Moderado" {{ $atendimento->prioridade == 'Moderado' ? 'selected' : '' }}> Moderado</option>
								<option value="Normal" {{ $atendimento->prioridade == 'Normal' ? 'selected' : '' }}> Normal</option>
							</select>
						</div>
						<div class="form-group">
						  	<label for="resumo">Resumo</label>
							<textarea class="form-control" rows="5" name="resumo" id="resumo">{{ $atendimento->resumo }}</textarea>
						</div>
						<div class="form-group">
						  	<label for="descricao">Descrição</label>
							<textarea class="form-control" rows="5" name="descricao" id="descricao">{{ $atendimento->descricao }}</textarea>
						</div>
						<div class="form-group">
						  	<label for="status">Ativo</label>
							  {!! Form::select('status', array(true => 'Sim', false => 'Não'), $atendimento->status, ['class' => 'form-control selectpicker']) !!}
						</div>
						<div class="form-group">
						  	<label for="data_solucao">Data solução</label>
						    <input type="datetime" class="form-control" name="data_solucao" id="data_solucao" value="{{ $atendimento->data_solucao }}">
						</div>
						<div class="form-group">
						  	<label for="data_fechamento">Data fechamento</label>
						    <input type="datetime" class="form-control" name="data_fechamento" id="data_fechamento" value="{{ $atendimento->data_fechamento }}">
						</div>
						<div class="form-group">
						  	<label for="acao">Ação</label>
							<textarea class="form-control" rows="5" name="acao" id="acao">{{ $atendimento->acao }}</textarea>
						</div>
						<div class="form-group">
						  	<label for="tipo_chamado">Tipo Chamado</label>
						    <input type="text" class="form-control" name="tipo_chamado" id="tipo_chamado" value="{{ $atendimento->tipo_chamado }}">
						</div>
						<div class="form-group">
                            <label for="paciente_id">Paciente</label>
                            {!! Form::select('paciente_id', $pacientes, $atendimento->paciente_id, ['class' => 'form-control selectpicker']) !!}
                        </div>
						<div class="form-group">
                            <label for="setor_id">Setor</label>
                            {!! Form::select('setor_id', $setores, $atendimento->setor_id, ['class' => 'form-control selectpicker']) !!}
                        </div>
						<div class="form-group">
                            <label for="especialista_id">Especialista</label>
                            {!! Form::select('especialista_id', $especialistas, $atendimento->especialista_id, ['class' => 'form-control selectpicker']) !!}
                        </div>
						<div class="form-group">
                            <label for="servico_id">Serviço</label>
							{!! Form::select('servico_id', $servicos, $atendimento->servico_id, ['class' => 'form-control selectpicker']) !!}
                        </div>
                        <br />
						@if (!Auth::user()->hasRole('paciente'))
							<button type="submit" class="btn btn-primary">Salvar</button>
						@endif
							<a href="/atendimento" class="btn btn-danger">Cancelar</a>
	                </form>
                </div>
            </div>
        </div>
    </div>
@endsection
