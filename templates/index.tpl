<!doctype html>
<head>

	<!-- General Metas -->
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">	<!-- Force Latest IE rendering engine -->
	<title>Login Form {$nama_pt}</title>
	<meta name="description" content="This is inventory application system ">
	<meta name="author" content="{$nama_pt}">
	
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
	
	<!-- Stylesheets -->
	<link rel="stylesheet" href="design/css/base.css">
	<link rel="stylesheet" href="design/css/skeleton.css">
	<link rel="stylesheet" href="design/css/layout.css">
	
</head>
<body>

	<!-- Primary Page Layout -->
	
	<div class="alert-danger-login">{$msg}</div>
	<div class="container">
		
		<div class="form-bg">
			<form method="POST" action="index.php?module=login&act=submit">
				<h2>LOGIN {$nama_pt}</h2>
				<p><input type="text" name="username" placeholder="Username" required></p>
				<p><input type="password" name="password" placeholder="Password" required></p>
				<button type="submit"></button>
			<form>
		</div>

	
		<p class="forgot">
			Copyright &copy; AIMPGLOBAL <br>
			Kompleks Ruko RMI Blok B-26<br>
			Jl. Ngagel Jaya Selatan - Surabaya
		
		</p>


	</div><!-- container -->
	
<!-- End Document -->
</body>
</html>