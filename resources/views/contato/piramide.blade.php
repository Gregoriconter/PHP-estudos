@extends('layouts.site')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-7 mt-5">
				<form action="{{route('piramide')}}" method="GET">
					<div class="row">
						<div class="col-md-4">
							<input class="form-control" type="text" name="pira" placeholder="Insira um número">
						</div>
						<div class="col-md-4">
							<select class="form-control" name="tipo_pira">
								<option value="">Selecione</option>
								<option value="2">Par</option>
								<option value="3">Impar</option>
							</select>
						</div>
						<div class="col-md-4">
							<button class="btn btn-dark" type="submit">SUBMIT</button>
						</div>
					</div>
				</form>
			</div>

		</div>
		<div class="row">
			<div class="col-md-12 mt-3">
				<p class="white">{!! $resultado !!}</p>
			</div>
			
		</div>
	</div>

@endsection
