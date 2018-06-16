@extends('layouts.app')

@section('content')
<div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
            	<ol class="breadcrumb panel-heading">
                	<li><a href="{{route('paciente.index')}}">Cadastro de Atendimento</a></li>
                	<li class="active">Adicionar</li>
                </ol>
                <div class="panel-body">
	                <form action="{{ route('atendimento.store') }}" method="POST" enctype="multipart/form-data">
	                	{{ csrf_field() }}

						<input type="hidden" name="data_fechamento" id="data_fechamento" value="2018-01-01 00:00:00">
						<input type="hidden" name="tipo_chamado" id="tipo_chamado" value="1">
						<input type="hidden" name="acao" id="acao" value="1">
						<input type="hidden" name="servico_id" id="servico_id" value="2">


						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="paciente_id">Paciente</label>
									<select name="paciente_id" class="form-control selectpicker" data-live-search="true" title="Paciente">
										@foreach($pacientes as $paciente)
										<option value="{{ $paciente->id }}" {{ Request::get('paciente') == $paciente->id ? 'selected' : ''}} >{{ $paciente->nome }}</option>
										@endforeach()
									</select>
                        		</div>
							</div>
						</div>

						<div class="form-group">
						  	<label for="descricao">Descrição</label>
							<textarea class="form-control" rows="5" name="descricao" id="descricao"></textarea>
						</div>

						@if (Auth::user()->hasRole('medico'))
							<div class="form-group">
								<label for="prontuario">Prontuario</label>
								<textarea class="form-control" rows="5" name="resumo" id="resumo" placeholder="resumo"></textarea>
							</div>
						@endif


						<div class="row">

							<div class="col-md-3">
								<div class="form-group">
									<label for="setor">Hospital</label>
									<select name="hospital" class="form-control" id="hospital">
										<option value="UPA Rocinha"> UPA Rocinha</option>
										<option value=">UPA Cidade de Deus">UPA Cidade de Deus</option>
										<option value="UPA Praca Seca">UPA Praca Seca</option>
										<option value="UPA Praca Sec">UPA São Cristóvão</option>
										<option value="Taquara">Taquara</option>
									</select>
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group">
									<label for="setor_id">Ambulatório</label>
									<select name="setor_id" class="form-control selectpicker" data-live-search="true" title="Setor">
										@foreach($setores as $setor)
										<option value="{{ $setor->id }}">{{ $setor->nome }}</option>
										@endforeach()
									</select>
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group">
									<label for="especialista_id">Especialista</label>
									<select name="especialista_id" class="form-control selectpicker" data-live-search="true" title="Especialista">
										@foreach($especialistas as $especialista)
										<option value="{{ $especialista->id }}">{{ $especialista->user->name }}</option>
										@endforeach()
                            		</select>
								</div>
							</div>

						</div>

						<h4>Tipo Atendimento</h4>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="setor">Prioridade</label>
									<select name="prioridade" class="form-control" id="prioridade">
										<option value="Normal">Normal</option>
										<option value="Moderado">Moderado</option>
										<option value="Prioritário">Prioritário</option>
									</select>
								</div>
							</div>
						</div>
						
					
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="status">Ativo</label>
									<select name="status" class="form-control selectpicker" data-live-search="true">
										<option value="1">Sim</option>
										<option value="0">Não</option>
									</select>
								</div>
							</div>
						</div>	
                        
						<br />

						<button type="submit" class="btn btn-primary">Salvar</button>
	                </form>
                </div>
            </div>
        </div>
	</div>
	<script>
		CKEDITOR.replace('resumo');
		CKEDITOR.replace('descricao');
	</script>
@endsection
