@extends('layouts.site')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-12 mt-5 mb-5">
				<h1 class="text-left">Dados de contato.</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 mb-5">
				@if ($contatos->image)
					<div class="col-md-5">
						<span><img src="{{ asset('storage/'.$contatos->image) }}"></span>
					</div>
				@endif
				<div class="col-md-12">
					<span><b>Nome:</b> {{$contatos->nome}}.</span>
				</div>
				<div class="col-md-12">
					<span><b>Data de Nascimento:</b> {{$contatos->data_nasc_fmt}}.</span>
				</div>
				<div class="col-md-12">
					<span><b>{{$contatos->tipotelef}}: </b><a href="https://wa.me/+55{{$contatos->telefone_fmt}}?text=Bom%20dia" target="_blank">{{$contatos->telefone}}.</a></span>
				</div>
				<div class="col-md-12">
					<span><b>Email:</b> {{$contatos->email}}.</span>
				</div>
			</div>
			<div class="col-md-1">
		      	<a href="{{url("contatos/$contatos->id/edit")}}">
		      		<button class="btn btn-primary">Editar</button>
		      	</a>
		    </div>
		    <div class="col-md-1">
		      	<form class="botton" action="{{route('contatos.destroy', [$contatos->id])}}" method="POST">
		      		@csrf
		      		@method('DELETE')
		      		<button class="btn btn-danger">Deletar</button>
		      	</form>
	    	</div>
		</div>
	</div>

@endsection
