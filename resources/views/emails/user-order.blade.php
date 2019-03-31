<!DOCTYPE html>
<html>
<head>
	<title>Pedido Actualizado</title>
</head>
<body>
	<p>Tu pedido ha sido actualizado!</p>
	<p>Estos son los datos de tu pedido realizado:</p>
	<ul>
		<li>
			<strong>Solicitado por:</strong>
			{{ $user->name }}
        </li>
		<li>
                <strong>Status del Pedido:</strong>
                {{ $cart->status }}
            </li>
		<li>
			<strong>Tu E-mail:</strong>
			{{ $user->email }}
		</li>
		<li>
			<strong>Fecha del Pedido:</strong>
			{{ $cart->order_date }}
		</li>
	</ul>
	<hr>
	<p>Detalles del Pedido</p>
	<ul>
		@foreach ( $cart->details as $detail)
		<li>
			{{ $detail->product->name }} x {{ $detail->quantity }} ($ {{ $detail->quantity * $detail->product->price }})
		</li>

		@endforeach
	</ul>
	<hr>
	<p><strong>Importe Total Cantidad Total a Pagar: $ </strong>{{ $cart->total }}</p>
	<p>
		<a href="{{ url('order/'.$cart->id) }}">Hace Click acá</a>
		Para ver más información de tu pedido.
	</p>

</body>
</html>
