@extends('layouts.site')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-4 mt-5">
				<form action="{{route('tabuada')}}" method="GET">
					<div class="row">
						<div class="col-md-6">
							<input type="text" class="form-control" name="nume" placeholder="Insira um número" maxlength="30">
						</div>
						<div class="col-md-4">
							<button type="submit" class="btn btn-dark">CALCULAR</button>
						</div>
					</div>
				</form>
			</div>
		</div>

		<div class="row">
			<div class="col-md-5 mt-3">
				@foreach($resultado as $key => $value)
					<p class="text-white">{{$value}}</p>
				@endforeach
			</div>
		</div>
	</div>

@endsection
