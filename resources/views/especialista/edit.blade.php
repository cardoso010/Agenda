@extends('layouts.app')

@section('content')
<div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
            	<ol class="breadcrumb panel-heading">
                	<li><a href="{{route('especialista.index')}}">Editar Especialista</a></li>
                	<li class="active">Editar</li>
                </ol>
                <div class="panel-body">
	                <form action="{{ route('especialista.update', $especialista->id) }}" method="POST" enctype="multipart/form-data">
	                	{{ csrf_field() }}
						<input type="hidden" name="_method" value="put">
						<input name="image" type="hidden" value="0">
						<input type="hidden" name="perfil" id="perfil" placeholder="Perfil" value="0">

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="nome">Nome</label>
									<input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" value="{{ $especialista->name }}">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="email">Email</label>
									<input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{ $especialista->email }}">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="password">Senha</label>
									<input type="password" class="form-control" name="password" id="password" placeholder="Senha" value="{{ $especialista->password }}">
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label for="cargo_espec">Especialidade</label>
									<select name="cargo_espec" class="form-control" id="cargo_espec" value="{{ $especialista->cargo_espec }}">
										<option value="Clinico geral" {{ $especialista->cargo_espec == 'Clinico geral' ? 'selected' : '' }}> Clinico geral</option>
										<option value="Cardiologia" {{ $especialista->cargo_espec == 'Cardiologia' ? 'selected' : '' }}> Cardiologia</option>
										<option value="Ortopedia" {{ $especialista->cargo_espec == 'Ortopedia' ? 'selected' : '' }}> Ortopedia</option>
										<option value="Pediatria" {{ $especialista->cargo_espec == 'Pediatria' ? 'selected' : '' }}> Pediatria</option>
										<option value="Oftalmologia" {{ $especialista->cargo_espec == 'Oftalmologia' ? 'selected' : '' }}> Oftalmologia</option>
									</select>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="crm_mat">Crm</label>
									<input type="number" class="form-control" name="crm_mat" id="crm_mat" value="{{ $especialista->crm_mat }}" placeholder="Crm">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="setor">Unidade</label>
									<select name="hospital" class="form-control" id="hospital" value="{{ $especialista->hospital }}">
										<option value="UPA Rocinha" {{ $especialista->hospital == 'UPA Rocinha' ? 'selected' : '' }}> UPA Rocinha</option>
										<option value="UPA Cidade de Deus" {{ $especialista->hospital == 'UPA Cidade de Deus' ? 'selected' : '' }}> UPA Cidade de Deus</option>
										<option value="UPA Praca Seca" {{ $especialista->hospital == 'UPA Praca Seca' ? 'selected' : '' }}> UPA Praca Seca</option>
										<option value="UPA Praca Sec" {{ $especialista->hospital == 'UPA São Cristóvão' ? 'selected' : '' }}> UPA São Cristóvão </option>
										<option value="Taquara" {{ $especialista->hospital == 'Taquara' ? 'selected' : '' }}> Taquara</option>
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
@endsection
