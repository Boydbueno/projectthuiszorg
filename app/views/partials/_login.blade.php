{{ Form::open() }}
	<ul>
		<li class="form-group">
			{{ Form::label('email', 'Email:') }}
			{{ Form::text('email') }}
		</li>

		<li class="form-group">
			{{ Form::label('password', 'Password:') }}
			{{ Form::password('password') }}
		</li>

		<li class="form-group">
			{{ Form::submit('Login', array('class' => 'btn btn-primary')) }}
			{{ Session::get('notice') }}
		</li>
	</ul>
{{ Form::close() }}