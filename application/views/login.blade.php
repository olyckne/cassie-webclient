@layout("layouts/main")


@section("header")

@endsection

@section("content")
<div class="login hero-unit">
	@if ( Session::has("status") )
		<div class="alert alert-error">
			{{ Session::get("status") }}
		</div>
	@endif
	<h2>Cassie web client</h2>
	<p class="lead">You need to login. <br>
	</p>
	{{ Form::open("auth/login", "POST", array("class" => "form-horizontal")) }}
		{{ Form::text('username', "", array("placeholder" => "username")) }}
		<br>
		<br>
		{{ Form::password('password', array("placeholder" => "password")) }}
		<br><br>
		{{ Form::submit("Login", array("class" => "btn btn-primary")) }}
		<a class="btn btn-primary" href="{{ URL::to("auth/login/github")}}">Login via github</a>
	{{ Form::close() }}
</div>
@endsection