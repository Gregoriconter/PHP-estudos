@extends('layouts.site')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-9 mt-5 mb-5">
				<h1 class="text-left">Página Inicial</h1>
			</div>

			<div class="col-md-3 mt-5 mb-5">
				<form class="input-group" action="/contatos" method="GET">
					<input class="form-control" type="text" name="contato">
					<div class="input-group-append">
						<button class="btn btn-dark btn-outline">Buscar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection
