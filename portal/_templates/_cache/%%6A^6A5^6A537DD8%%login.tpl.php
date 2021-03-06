<?php /* Smarty version 2.6.31, created on 2019-01-01 22:19:36
         compiled from login.tpl */ ?>
<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from www.ansonika.com/findoctor/login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Nov 2018 11:17:23 GMT -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Find easily a doctor and book online an appointment">
	<meta name="author" content="Ansonika">
	<title>FINDOCTOR - Find easily a doctor and book online an appointment</title>

	<!-- Favicons-->
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

	<!-- BASE CSS -->
	<link href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
css/style.css" rel="stylesheet">
	<link href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
css/menu.css" rel="stylesheet">
	<link href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
css/vendors.css" rel="stylesheet">
	<link href="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
css/icon_fonts/css/all_icons_min.css" rel="stylesheet">
	<!-- YOUR CUSTOM CSS -->
	<link href="css/custom.css" rel="stylesheet">

</head>

<body>

	<div id="preloader" class="Fixed">
		<div data-loader="circle-side"></div>
	</div> 
	<!-- /Preload-->
	<div id="page">		
		<main>
			<div class="bg_color_2">
				<div class="container margin_60_35" style="padding-bottom: 144px;padding-top: 100px;">
					<div id="login">
						<h1>Please login to your dashboard!</h1>
						<div class="box_form">
							<?php if (isset ( $this->_tpl_vars['errors']['incorrect'] )): ?>
							<div class="alert alert-danger alert-dismissible fade show mx-auto my-3 text-center" role="alert">
								<strong><?php echo $this->_tpl_vars['errors']['incorrect']; ?>
</strong>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							</div>
							<?php endif; ?>
							<form method="post" action="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
">
								<div class="<?php if (isset ( $this->_tpl_vars['errors'] ) && $this->_tpl_vars['errors']['username']): ?> error<?php endif; ?> form-group">
									<input type="text" name="username" id="username" value="<?php if (! empty ( $_POST['username'] )): ?><?php echo $_POST['username']; ?>
<?php endif; ?>" class="form-control" placeholder="Username" />
									<?php if (isset ( $this->_tpl_vars['errors'] ) && $this->_tpl_vars['errors']['username']): ?><div class="suggestion"><?php echo $this->_tpl_vars['errors']['username']; ?>
</div><?php endif; ?>
								</div>
								<div class="<?php if ($this->_tpl_vars['errors']['password']): ?> error<?php endif; ?> form-group">
									<input type="password" name="password" id="password"	value=""  class="form-control" placeholder="Password"/>
									<?php if (isset ( $this->_tpl_vars['errors'] ) && $this->_tpl_vars['errors']['password']): ?><div class="suggestion"><?php echo $this->_tpl_vars['errors']['password']; ?>
</div><?php endif; ?>
								</div>
								<div class="form-group text-center add_top_20">
									<button type="submit" name="submit" id="submit" class="btn_1 medium">Login</button>
									<input type="hidden" name="action" value="login" />
								</div>
							</form>
						</div>
					</div>
					<!-- /login -->
				</div>
			</div>
		</main>
		<!-- /main -->
	</div>
	<!-- page -->

	<div id="toTop"></div>
	<!-- Back to top button -->
	<?php echo '
	<style type="text/css">
	.suggestion{
		color: red;
		font-size: 11px;
		padding-left: 2px;
		padding-top: 2px;
	}
</style>
'; ?>

<!-- COMMON SCRIPTS -->
<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
js/jquery-2.2.4.min.js"></script>
<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
js/common_scripts.min.js"></script>
<script src="<?php echo $this->_tpl_vars['BASE_URL_ADMIN']; ?>
js/functions.js"></script>



</body>

<!-- Mirrored from www.ansonika.com/findoctor/login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Nov 2018 11:17:23 GMT -->
</html>