@extends('layouts.site')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-6 mt-5">
				<form action="{{route('numeros')}}" method="GET">
					<div class="row">
						<div class="col-md-4">
							<input class="form-control" type="txt" placeholder="Digite aqui" name="num[]" maxlength="3">
						</div>
						<div class="col-md-4">
							<input class="form-control" type="txt" placeholder="Digite aqui" name="num[]" maxlength="3">
						</div>
						<div class="col-md-4">
							<input class="form-control" type="txt" placeholder="Digite aqui" name="num[]" maxlength="3">
						</div>
						<div class="col-md-4 mt-4">
							<input class="form-control" type="txt" placeholder="Digite aqui" name="num[]" maxlength="3">
						</div>
						<div class="col-md-4 mt-4">
							<input class="form-control" type="txt" placeholder="Digite aqui" name="num[]" maxlength="3">
						</div>
						<div class="col-md-4 mt-4">
							<input class="form-control" type="txt" placeholder="Digite aqui" name="num[]" maxlength="3">
						</div>
						<div class="col-md-4 mt-4">
							<input class="form-control" type="txt" placeholder="Digite aqui" name="num[]" maxlength="3">
						</div>
						<div class="col-md-4 mt-4">
							<input class="form-control" type="txt" placeholder="Digite aqui" name="num[]" maxlength="3">
						</div>
						<div class="col-md-4 mt-4">
							<input class="form-control" type="txt" placeholder="Digite aqui" name="num[]" maxlength="3">
						</div>
						<div class="col-md-4 mt-4">
							<input class="form-control" type="txt" placeholder="Digite aqui" name="num[]" maxlength="3">
						</div>
						<div class="col-md-4 mt-4">
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
			@if(isset($erro))
				<div class="col-md-6 mt-5">
					<div class="alert alert-{{$errorclass}}">
						{!! $erro !!}
					</div>
				</div>
			@endif
		</div>
	</div>

@endsection
