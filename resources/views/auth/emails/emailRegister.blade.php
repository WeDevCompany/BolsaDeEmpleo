<p>
	Hola {{ $user->email }}, por favor confirma tu correo electrónico presionando en el enlace e introduciendo el siguiente codigo:
</p>
<p>
	{{ $user->code }}
</p>
<p>
	<a href="{{ $url }}">{{ $url }}</a>
</p>