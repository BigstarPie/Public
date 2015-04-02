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
		<link rel="stylesheet" href="./css/bootstrap-theme.css">
		<link rel="stylesheet" href="./css/bootstrap.css">
		<script type='text/javascript' src='./js/functions.js'></script>
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script type='text/javascript' src='./js/bootstrap.js'></script>
		<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
		<link href="css/bootstrap-responsive.css" rel="stylesheet" type="text/css">
		<link href="css/page.css" rel="stylesheet" type="text/css">
		<link href="css/object.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		
		<div id="alumnilogo" align="center"><img  src="img/logo.gif"></div>
		<div id="function">
			<div class="btn-group">
				<a class="btn btn-primary" href="#"><i class="icon-user icon-white"></i>Member</a>
				<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
				</button>
				<ul class="dropdown-menu" role="menu">
					<li>
						<a onClick="load_page('member_update')"><i class="icon-pencil"></i> 修改資料</a>
					</li>
					<li>
						<a onClick="load_page('member_query')"><i class="icon-search"></i> 查詢成員</a>
					</li>
					<li>
						<a onClick="load_page('member_passwordchange')"><i class="icon-pencil"></i> 更改密碼</a>
					</li>
					<li class="divider"></li>
					<li>
						<a href="#">Separated link</a>
					</li>
				</ul>
			</div>
			<div class="btn-group">
				<a class="btn btn-success" href="#"><i class="icon-book icon-white"></i>Forum</a>
				<a class="btn btn-success dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
					<li>
						<a href="#" onClick="load_page('forum_office')">系所公告</a>
					</li>
					<li>
						<a href="#" onClick="load_page('forum_grades')">屆次分類</a>
					</li>
					<li>
						<a href="#" onClick="load_page('forum_courses')">課業討論</a>
					</li>
					<li>
						<a href="#" onClick="load_page('forum_jobs')">徵才訊息</a>
					</li>
					<li>
						<a href="#" onClick="load_page('forum_teams')">系隊訊息</a>
					</li>
					<li class="divider"></li>
				</ul>
			</div>
			<div class="logoutArea">
			    <input type="button" class="btn btn-warning btn-small" value="登 出" onclick="logout()"/>
			</div>
		</div>
		<div id="main">
			<h1>歡迎來到台大資管校友系統!!</h1>
		</div>
		<script>main_check();</script>
	</body>
</html>
		
