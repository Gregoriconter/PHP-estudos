@extends('layouts.site')

@section('content')
    <div class='container'>
		<form action="{{route('tabuada.store')}}" method='post'>
			@csrf
			<div class='row'>
				<div class='mb-3 col-md-3'>
					<label for='exampleInputPassword1' class='form-label'>Tabuada</label>
					<input type='text' name='nume' class='form-control' id='exampleInputPassword1' placeholder='Digite o número aqui.'>
				</div>
				<div class='mb-3 col-md-12'>
					<button type='submit' class='btn btn-primary w-10'> Faça o calculo!</button>
				</div>
			</div>
		</form>
		<div class='row'>
			<div class='mb-3 col-md-2 animate__animated animate__fadeInRight animate__slow'>
				@foreach($tabuada as $key => $value)
					<p>{{$value}}</p>
				@endforeach
			</div>
		</div>
	</div>
@endsection