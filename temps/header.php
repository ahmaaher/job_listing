<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title><?php echo SITE_TITLE; ?></title>
	<link rel="stylesheet" href="includes/libs/bootstrap.min.css" />
	<link rel="stylesheet" href="includes/styles/jl_style.css"/>
	<link rel="stylesheet" href="includes/styles/custom_style.css"/>
</head>
	<body>
		<div class="container">
			<div class="header clearfix">
				<nav>
					<h3 class="text-muted"><?php echo SITE_TITLE; ?></h3>
					<ul class="nav nav-pills pull-right">
						<li role="presentation"><a href="index.php">Home</a></li>
						<li role="presentation"><a href="create.php">Create listing</a></li>
					</ul>
				</nav>
			</div>
			<?php getRedirectMsg(); ?>