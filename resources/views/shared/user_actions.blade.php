
<ul class="nav navbar-nav navbar-right">

	@if ( Auth::check() )

		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown"
				role="button" aria-haspopup="true" aria-expanded="false">
				{{ Auth::user()->first_name }} <span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="{{ action('ProfileController@profile') }}">Profile</a></li>
					<li><a href="{{ action('Auth\AuthController@getLogout') }}">Logout</a></li>
				</ul>
		</li>

	@else
		
		<li><a href="{{ action('Auth\AuthController@getLogin') }}">Login</a></li>
		<li><a href="{{ action('Auth\AuthController@getRegister') }}">Register</a></li>

	@endif

</ul>
