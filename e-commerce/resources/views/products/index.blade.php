@extends("layouts.app")

@section("content")
	<div class="big-padding text-center blue-grey white-text">
		<h1>Productos</h1>
	</div>
	<div class="container table-main">
		<table class="table table-bordered">
			<thead>
				<tr>
					<td>ID</td>
					<td>Título</td>
					<td>Descripción</td>
					<td>Precio</td>
					<td>Acciones</td>
				</tr>
			</thead>
			<tbody>
				<tr>
				@foreach($products as $product)
					<td>{{ $product->id }}</td>
					<td>{{ $product->title }}</td>
					<td>{{ $product->description }}</td>
					<td>{{ $product->pricing }}</td>
					<td>Acciones</td>
				@endforeach
				</tr>
			</tbody>
		</table>
	</div>

	<div class="floating">
		<a href="{{url('/products/create')}}" class="btn btn-primary btn-fab">
			<i class="material-icons">add</i>
		</a>
	</div>
@endsection