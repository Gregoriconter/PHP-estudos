@extends('layouts.site')

@section('content')
	<div class="container">
		@if($contatos->isEmpty())
			<div class="row">
				<div class="col-md-12 mt-5 mb-5 text-left">
					<div class="col-md-12">
						<b><span>Contato não encontrado.</span></b>
					</div>
					<div class="col-md-12">	
						<span>Por favor, pesquise um contato válido.</span>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 mb-5">
					<div class="col-md-3">
						<form class="input-group" action="/contatos" method="GET">
							<input class="form-control" type="text" name="contato">
							<div class="input-group-append">
								<button class="btn btn-dark btn-outline">Buscar</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		@else
			<div class="row">
				<div class="col-md-12 mt-5 mb-5">
					<table class="table text-center table-striped">
					  <thead class="thead-dark">
					    <tr>
					      <th scope="col">ID</th>
					      <th scope="col">Nome</th>
					      <th scope="col">Nascimento</th>
					      <th scope="col">Telefone</th>
					      <th scope="col">Email</th>
					      <th scope="col">
					      	<a href="{{url('contatos/create')}}">
						    	<button class="btn btn-success">Adicionar</button>
						    </a>
					      </th>
					    </tr>
					  </thead>
					  <tbody>
					  	@foreach($contatos as $index => $cada)
						    <tr>
						      <td scope="row" class="text-table">{{str_pad($cada->id, 5, '0', STR_PAD_LEFT)}}</td>
						      <td class="text-table">{{$cada->nome}}</td>
						      <td class="text-table">{{$cada->data_nasc_fmt}}</td>
						      <td class="text-table">{{$cada->telefone}}</td>
						      <td class="text-table">{{$cada->email}}</td>
						      <td class="botoes">

						      	<div class="row">
					      			<div class="col-md-4">
								      	<a class="botton" href="{{url("contatos/$cada->id")}}">
								      		<button class="btn btn-dark">Ver mais...</button>
								      	</a>
					      			</div>

					      			<div class="col-md-3">
								      	<a class="botton" href="{{url("contatos/$cada->id/edit")}}">
								      		<button class="btn btn-primary">Editar</button>
								      	</a>
					      			</div>
					      			<div class="col-md-3">
								      	<form class="botton" action="{{route('contatos.destroy', [$cada->id])}}" method="POST">
								      		@csrf
								      		@method('DELETE')
								      		<button class="btn btn-danger">Deletar</button>
								      	</form>
					      			</div>
						      	</div>

						      </td>
						    </tr>
					    @endforeach
					  </tbody>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="ml-auto mr-auto">
						{{ $contatos->links() }}
				</div>
			</div>
		@endif
	</div>
@endsection
