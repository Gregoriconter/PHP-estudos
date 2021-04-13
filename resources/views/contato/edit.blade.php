@extends('layouts.site')

@section('content')
	
	<div class="container">
		<div class="row">
			<div class="col-md-12 mt-5 mb-5">
				<h1 class="text-center">Editar contato</h1><br>
			</div>	
		</div>
		<div class="row">
			<div class="col-md-12">
				<form name="formEdit" id="formEdit" method="post" action="{{url('contatos/'.$contatoedt->id)}}" enctype="multipart/form-data">
					@method('PUT')
					@csrf
					<div class="row">
						@if ($contatoedt->image)
							<div class="col-md-5 mb-2">
								<span><img src="{{ asset('storage/'.$contatoedt->image) }}"></span>
							</div>
							<div>
								<a href="/apagarfoto/{{$contatoedt->id}}">
									<h6>excluir</h6>
								</a>
							</div>
						@endif
						<div class="col-md-12 mb-3">
							<input type="file" name="image" class="form-control-file">
						</div>
					</div>
					<div class="row">

						<div class="col-md-6 mb-3">
							<input class="form-control @error('nome') error @enderror" type="text" name="nome" id="nome" placeholder="Nome" value="{{ old('nome') ? old('nome') : $contatoedt->nome}}" required>
							@error("nome")
								<div class="text-danger">
									<span>{{$message}}</span>
								</div>
							@enderror
						</div>
						<div class="col-md-3 mb-3">
							<input class="form-control telefone @error('telefone') error @enderror" type="text" name="telefone" id="telefone" placeholder="Telefone" value="{{ old('telefone') ? old('telefone') : $contatoedt->telefone}}" required>
							@error("telefone")
								<div class="text-danger">
									<span>{{$message}}</span>
								</div>
							@enderror
						</div>
						<div class="col-md-3 mb-3">
							<select class="form-control @error('tipotelef') error @enderror" name="tipotelef" aria-label="Default select example">
								<option value="">Selecione</option>

								@if ($contatoedt->tipotelef == "Celular")
								      <option value="Celular" selected>Celular</option>
								@else
								      <option value="Celular">Celular</option>
								@endif

								@if ($contatoedt->tipotelef == "Fixo")
								      <option value="Fixo" selected>Fixo</option>
								@else
								      <option value="Fixo">Fixo</option>
								@endif

								@if ($contatoedt->tipotelef == "Fax")
								      <option value="Fax" selected>Fax</option>
								@else
								      <option value="Fax">Fax</option>
								@endif
							</select>
							@error("tipotelef")
								<div class="text-danger">
									<span>{{$message}}</span>
								</div>
							@enderror
						</div>
						<div class="col-md-6 mb-3">
							<input class="datepicker form-control @error('data_nasc') error @enderror" type="text" name="data_nasc" id="data_nasc" placeholder="Data de nascimento" value="{{ old('data_nasc') ? old('data_nasc') : $contatoedt->data_fmt}}" autocomplete='off' required>
							@error("data_nasc")
								<div class="text-danger">
									<span>{{$message}}</span>
								</div>
							@enderror
						</div>
						<div class="col-md-6 mb-3">
							<input class="form-control @error('email') error @enderror" type="text" name="email" id="email" placeholder="Email" value="{{ old('email') ? old('email') : $contatoedt->email}}" required>
							@error("email")
								<div class="text-danger">
									<span>{{$message}}</span>
								</div>
							@enderror
						</div>
						<div class="col-md-12">
							<input class="btn btn-primary" type="submit" value="Editar">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection
