<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Cassie web client</title>
		{{ Asset::styles() }}
		{{ Asset::scripts() }}
	</head>
	<body>
		<header>
			<div class="navbar navbar-inverse navbar-static-top">
				<div class="navbar-inner">
					<div class="container">
						 <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
					    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					    	<span class="icon-bar"></span>
					    	<span class="icon-bar"></span>
					    	<span class="icon-bar"></span>
					    </a>

						<a href="#" class="brand">Cassie web client</a>
						
						<div class="nav-collapse collapse">
							<ul class="nav">
								<li><a href="logout">Logout</a></li>
							</ul>
						</div>
						
					</div>
				</div>
			</div>
		</header>
		<div class="container-fluid">

			<div class="row-fluid">
				<div class="span2">
					
				</div>
				<div class="span8">
					<article class="content">
						@yield("content")
		
					</article>						
				</div>

				<div class="span2">
					
				</div>
			</div>
	</body>
</html>