<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>NTUIM Alumni Web</title>
		<meta name="description" content="The Alumni System For Department of Information Management of National Taiwan University">
		<meta name="author" content="Group1">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">
		<link rel="stylesheet" href="./css/page.css">
		<link rel="stylesheet" href="./css/object.css">
		<script type='text/javascript' src='./js/functions.js'></script>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script type='text/javascript' src='./js/bootstrap.js'></script>
	</head>
	
	<body>
		<div id="login">
			<span style="margin-left: 80px;">Please login first!!</span>
			<div style="margin-left: 20px; margin-top: 27px;">
				<div>
					<span>Account&nbsp;&nbsp;&nbsp;: </span><input type="text" id="StudentId"/>
				</div>
				<div>
					<span>Password : </span><input type="password" id="password" />
				</div>
				<div style="float: right; margin-right: 40px;">
					<button class="loginbutton" onclick="do_login()" >Login</button>
				</div>
				<div style="margin-left: -10px;margin-top: 50px;">
					First time login please use BIRTHDAY(ex.19900101) as password
				</div>
				<div id="alertdiv" class="alert alert-danger">
					d
				</div>
			</div>
		</div>
	</body>
	<script>
	index_check();
	</script>
</html>

