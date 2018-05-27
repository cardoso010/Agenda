@extends('layouts.app')

@section('content')
<div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
            	<ol class="breadcrumb panel-heading">
                	<li><a href="{{route('paciente.index')}}">ATENDIMENTOS</a></li>
                	<li class="active">Adicionar</li>
                </ol>
                <div class="panel-body">
	                <form action="{{ route('atendimento.store') }}" method="POST" enctype="multipart/form-data">
	                	{{ csrf_field() }}
						<div class="form-group">
						  	<label for="resumo">Resumo</label>
							<textarea class="form-control" rows="5" name="resumo" id="resumo"></textarea>
						</div>
						<div class="form-group">
						  	<label for="descricao">Descrição</label>
							<textarea class="form-control" rows="5" name="descricao" id="descricao"></textarea>
						</div>
						<div class="form-group">
							<label for="setor">Hospital</label>
							<select name="prioridade" class="form-control" id="prioridade">
								<option value="upda_1">Upda_1</option>
								<option value="upda_2">Upda_2</option>
							</select>
						</div>
						<div class="form-group">
							<label for="setor">Prioridade</label>
							<select name="prioridade" class="form-control" id="prioridade">
								<option value="Prioritário">Prioritário</option>
								<option value="Moderado">Moderado</option>
								<option value="Normal">Normal</option>
							</select>
						</div>
						<div class="form-group">
						  	<label for="status">Ativo</label>
							<select name="status" class="form-control selectpicker" data-live-search="true">
							  <option value="1">Sim</option>
							  <option value="0">Não</option>
							</select>
						</div>
						<div class="form-group">
						  	<label for="data_solucao">Data solução</label>
						    <input type="datetime-local" class="form-control" name="data_solucao" id="data_solucao" placeholder="Data solução">
						</div>
						<div class="form-group">
						  	<label for="data_fechamento">Data fechamento</label>
						    <input type="datetime-local" class="form-control" name="data_fechamento" id="data_fechamento" placeholder="Data fechamento">
						</div>
						<div class="form-group">
						  	<label for="acao">Ação</label>
							<textarea class="form-control" rows="5" name="acao" id="acao"></textarea>
						</div>
						<div class="form-group">
						  	<label for="tipo_chamado">Tipo Chamado</label>
						    <input type="text" class="form-control" name="tipo_chamado" id="tipo_chamado" placeholder="Tipo Chamado">
						</div>
						<div class="form-group">
                            <label for="paciente_id">Paciente</label>
                            <select name="paciente_id" class="form-control selectpicker" data-live-search="true" title="Paciente">
                                @foreach($pacientes as $paciente)
                                <option value="{{ $paciente->id }}">{{ $paciente->nome }}</option>
                                @endforeach()
                            </select>
                        </div>
						<div class="form-group">
                            <label for="setor_id">Setor</label>
                            <select name="setor_id" class="form-control selectpicker" data-live-search="true" title="Setor">
                                @foreach($setores as $setor)
                                <option value="{{ $setor->id }}">{{ $setor->nome }}</option>
                                @endforeach()
                            </select>
                        </div>
						<div class="form-group">
                            <label for="especialista_id">Especialista</label>
                            <select name="especialista_id" class="form-control selectpicker" data-live-search="true" title="Especialista">
                                @foreach($especialistas as $especialista)
                                <option value="{{ $especialista->id }}">{{ $especialista->user->name }}</option>
                                @endforeach()
                            </select>
                        </div>
						<div class="form-group">
                            <label for="servico_id">Serviço</label>
                            <select name="servico_id" class="form-control selectpicker" data-live-search="true" title="Serviço">
                                @foreach($servicos as $servico)
                                <option value="{{ $servico->id }}">{{ $servico->nome }}</option>
                                @endforeach()
                            </select>
                        </div>
                        <br />
						<button type="submit" class="btn btn-primary">Salvar</button>
	                </form>
                </div>
            </div>
        </div>
    </div>
@endsection
