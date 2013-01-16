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
		For now you can only do it via you github account
	</p>

	<a class="btn btn-primary btn-large" href="auth/login">Login</a>
</div>
@endsection