<p>
	Hola {{ $user->email }}, por favor confirma tu correo electrónico presionando en el siguiente enlace:
</p>
<p>
	<a href="{{ $url }}">{{ $url }}</a>
</p>
<p>
	Si no funcionara entre en el siguiente enlace e introduzca este código:
</p>
<p>
	{{ $user->code }}
</p>
<p>
	<a href="{{ $urlCode }}">{{ $urlCode }}</a>
</p>