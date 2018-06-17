@extends('layouts.app')

@section('content')
<div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
            	<ol class="breadcrumb panel-heading">
                	<li><a href="{{route('atendimento.index')}}">Editar atendimento</a></li>
                	<li class="active">Editar</li>
                </ol>
                <div class="panel-body">
	                <form action="{{ route('atendimento.update', $atendimento->id) }}" method="POST" enctype="multipart/form-data">
	                	{{ csrf_field() }}

						<input type="hidden" name="_method" value="put">
						<input type="hidden" name="data_fechamento" id="data_fechamento" value="2018-01-01 00:00:00">
						<input type="hidden" name="tipo_chamado" id="tipo_chamado" value="1">
						<input type="hidden" name="acao" id="acao" value="1">
						<input type="hidden" name="servico_id" id="servico_id" value="2">

						@if (!Auth::user()->hasRole('paciente') || (Auth::user()->role == 0))
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="paciente_id">Paciente</label>
									<!--{!! Form::select('paciente_id', $pacientes, $atendimento->paciente_id, ['class' => 'form-control selectpicker']) !!}-->

									<select name="paciente_id" class="form-control selectpicker" data-live-search="true" {{ $atendimento->id ? 'disabled' : '' }} title="Paciente">
										@foreach($pacientes as $paciente)
										<option value="{{ $paciente->id }}" {{ Request::get('paciente') == $paciente->id ? 'selected' : ''}} >{{ $paciente->nome }}</option>
										@endforeach()
									</select>
								</div>
							</div>
						</div>
						@endif

						
						<div class="form-group">
						  	<label for="descricao">Descrição</label>
							@if (!Auth::user()->hasRole('paciente') || (Auth::user()->role == 0))
								<textarea class="form-control" rows="5" name="descricao" id="descricao">{{ $atendimento->descricao }}</textarea>
							@else
								<textarea class="form-control" rows="5" name="descricao" id="descricao" disabled>{{ $atendimento->descricao }}</textarea>
							@endif
						</div>

						<div class="form-group">
							<label for="prontuario">Prontuario</label>
							@if (Auth::user()->hasRole('especialista') || (Auth::user()->role == 0))
								<textarea class="form-control" rows="5" name="resumo" id="resumo">{{ $atendimento->resumo }}</textarea>
							@else
								<textarea class="form-control" rows="5" name="resumo" id="resumo" disabled>{{ $atendimento->resumo }}</textarea>
							@endif
						</div>


						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label for="data_solucao">Data do Atendimento</label>
									<input type=" {{ $atendimento->data_solucao ? 'datetime-local' : 'text' }}" {{ $atendimento->data_solucao ? 'disabled' : '' }} class="form-control" name="data_solucao" id="data_solucao" value="{{ $atendimento->data_solucao }}">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="setor">Hospital</label>
									<select name="hospital" class="form-control" id="hospital" {{ (!Auth::user()->hasRole('paciente') || (Auth::user()->role == 0)) ? '' : 'disabled' }}>
										<option value="UPA Rocinha" {{ $atendimento->hospital == 'UPA Rocinha' ? 'selected' : '' }}> UPA Rocinha</option>
										<option value="UPA Cidade de Deus" {{ $atendimento->hospital == 'UPA Cidade de Deus' ? 'selected' : '' }}>UPA Cidade de Deus</option>
										<option value="UPA Praca Seca" {{ $atendimento->hospital == 'UPA Praca Seca' ? 'selected' : '' }}>UPA Praca Seca</option>
										<option value="UPA Praca Sec" {{ $atendimento->hospital == 'UPA Praca Sec' ? 'selected' : '' }}>UPA São Cristóvão</option>
										<option value="UPA Taquara" {{ $atendimento->hospital == 'UPA Taquara' ? 'selected' : '' }}>UPA Taquara</option>
									</select>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="setor_id">Setores</label>
									@if (!Auth::user()->hasRole('paciente') || (Auth::user()->role == 0))
										{!! Form::select('setor_id', $setores, $atendimento->setor_id, ['class' => 'form-control selectpicker']) !!}
									@else
										{!! Form::select('setor_id', $setores, $atendimento->setor_id, ['class' => 'form-control selectpicker', 'disabled' => 'true']) !!}
									@endif
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="especialista_id">Especialista</label>
									@if (!Auth::user()->hasRole('paciente') || (Auth::user()->role == 0))
										{!! Form::select('especialista_id', $especialistas, $atendimento->especialista_id, ['class' => 'form-control selectpicker']) !!}
									@else
										{!! Form::select('especialista_id', $especialistas, $atendimento->especialista_id, ['class' => 'form-control selectpicker', 'disabled' => true]) !!}
									@endif
								</div>
							</div>
						</div>


						<h4>Tipo Atendimento</h4>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="setor">Prioridade</label>
									<select name="prioridade" class="form-control" id="prioridade" value="{{ $atendimento->prioridade }}" {{ (!Auth::user()->hasRole('paciente') || (Auth::user()->role == 0)) ? '' : 'disabled' }}>
										<option value="Prioritário" {{ $atendimento->prioridade == 'Prioritário' ? 'selected' : '' }}>Prioritário</option>
										<option value="Moderado" {{ $atendimento->prioridade == 'Moderado' ? 'selected' : '' }}> Moderado</option>
										<option value="Normal" {{ $atendimento->prioridade == 'Normal' ? 'selected' : '' }}> Normal</option>
									</select>
								</div>
							</div>
						</div>
						
					
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="status">Ativo</label>
									@if (Auth::user()->hasRole('especialista') || (Auth::user()->role == 0))
										{!! Form::select('status', array(true => 'Sim', false => 'Não'), $atendimento->status, ['class' => 'form-control selectpicker']) !!}
									@else
										{!! Form::select('status', array(true => 'Sim', false => 'Não'), $atendimento->status, ['class' => 'form-control selectpicker', 'disabled' => true]) !!}
									@endif
								</div>
							</div>
						</div>	
		
                        <br />

						@if (!Auth::user()->hasRole('paciente') || (Auth::user()->role == 0) )
							<button type="submit" class="btn btn-primary">Salvar</button>
						@endif
						
							<a href="/atendimento" class="btn btn-danger">Voltar</a>
	                </form>
                </div>
            </div>
        </div>
    </div>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#data_solucao").val(formataData($("#data_solucao").val()))
		});

		CKEDITOR.replace('resumo');
		CKEDITOR.replace('descricao');
	</script>
@endsection
