@extends("layouts.app")

@section('content')
	<div class="container text-center ">
		<div class="card product text-left">
			<h1>{{$product->title}}</h1>
			<div class="row">
				<div class="col-sm-6 col-xs-12"></div>
				<div class="col-sm-6 col-xs-12">
					<p>
						<strong>Descripcióm</strong>
					</p>
					<p>
						{{$product->description}}
					</p>
					<p>
						@include("in_shopping_carts.form",["product" => $product])
					</p>
				</div>
			</div>
		</div>

	</div>

@endsection