<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		{{ Form::open() }}
			<ul>
				<li>
					{{ Form::label('email', 'Email:') }}
					{{ Form::text('email') }}
				</li>

				<li>
					{{ Form::label('password', 'Password:') }}
					{{ Form::password('password') }}
				</li>

				<li>
					{{ Form::submit() }}
				</li>
			</ul>
		{{ Form::close() }}
	</body>
</html>