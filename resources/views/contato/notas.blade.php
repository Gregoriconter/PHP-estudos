@extends('layouts.site')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12 mt-5">
				<h1>Verificar Aprovação</h1>
			</div> 
			<div class="col-md-6 mt-5">
				<form action="{{route('notas')}}" method="GET">
					<div class="row">
						<div class="col-md-4">
							<label><span class="white">Nota 1</span></label>
							<input placeholder="Digite aqui" class="form-control" type="txt" name="notas[]">
						</div>
						<div class="col-md-4">
							<label><span class="white">Nota 2</span></label>
							<input placeholder="Digite aqui" class="form-control" type="txt" name="notas[]">
						</div>
						<div class="col-md-4">
							<label><span class="white">Nota 3</span></label>
							<input placeholder="Digite aqui" class="form-control" type="txt" name="notas[]">
						</div>
						<div class="col-md-4 mt-3">
							<label><span class="white">Nota 4</span></label>
							<input placeholder="Digite aqui" class="form-control" type="txt" name="notas[]">
						</div>
						<div class="col-md-4 mt-3">
							<label><span class="white">Nota 5</span></label>
							<input placeholder="Digite aqui" class="form-control" type="txt" name="notas[]">
						</div>
						<div class="col-md-4 mt-5">
							<button class="btn btn-primary" type="submit">VER RESULTADO</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="row">
			@if(isset($resultado))
				<div class="col-md-6 mt-5">
					<p class="white">{!! $resultado !!}</p>
				</div>
			@endif
			@if(isset($error))
				<div class="col-md-6 mt-5">
					<div class="alert alert-{{$error['class']}}" role="alert">
						{{ $error['msg'] }}
					</div>
				</div>
			@endif
		</div>
	</div>	


@endsection