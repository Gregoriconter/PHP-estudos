@extends('layouts.site')

@section('content')
	
	<div class="container">
		<div class="row">
			<div class="col-md-12 mt-5 mb-5">
				<h1 class="text-center">Cadastrar contato</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<form name="formCard" id="formCard" method="post" action="{{url('contatos')}}" enctype="multipart/form-data">
					@csrf
					<div class="row">
						
						<div class="col-md-12 mb-3">
							<input type="file" name="image" class="form-control-file">
						</div>

						<div class="col-md-6 mb-3">
							<input class="form-control @error('nome') error @enderror" value="{{ old('nome') }}" type="text" name="nome" placeholder="Nome" required >
							@error("nome")
								<div class="text-danger">
									<span>{{$message}}</span>
								</div>
							@enderror
						</div>
						<div class="col-md-3 mb-3">
							<input class="form-control telefone @error('telefone') error @enderror" value="{{ old('telefone') }}" type="text" name="telefone" placeholder="Telefone" required>
							@error("telefone")
								<div class="text-danger">
									<span>{{$message}}</span>
								</div>
							@enderror
						</div>
						<div class="col-md-3 mb-3">
							<select class="form-control @error('tipotelef') error @enderror" name="tipotelef" aria-label="Default select example">
								<option value="">Selecione</option>
								<option value="Celular">Celular</option>
								<option value="Fixo">Fixo</option>
								<option value="Fax">Fax</option>
							</select>
							@error("tipotelef")
								<div class="text-danger">
									<span>{{$message}}</span>
								</div>
							@enderror
						</div>
						<div class="col-md-6 mb-3">
							<input class="datepicker form-control @error('data_nasc') error @enderror" value="{{ old('data_nasc') }}" type="text" name="data_nasc" placeholder="Data de nascimento" autocomplete='off' required>
							@error("data_nasc")
								<div class="text-danger">
									<span>{{$message}}</span>
								</div>
							@enderror
						</div>
						<div class="col-md-6 mb-3">
							<input class="form-control @error('email') error @enderror" value="{{ old('email') }}" type="text" name="email" placeholder="Email" required>
							@error("email")
								<div class="text-danger">
									<span>{{$message}}</span>
								</div>
							@enderror
						</div>
						<div class="col-md-12">
							<input class="btn btn-dark" type="submit" value="Cadastrar">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection
