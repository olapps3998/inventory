<?php /* Smarty version Smarty-3.1.11, created on 2017-09-01 14:00:50
         compiled from ".\templates\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2485059a8157c7c0742-24216570%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '749422d4cfc3eb5677cf499730392b6accd4d1c7' => 
    array (
      0 => '.\\templates\\index.tpl',
      1 => 1504249246,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2485059a8157c7c0742-24216570',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_59a8157cabdda9_07487291',
  'variables' => 
  array (
    'nama_pt' => 0,
    'msg' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59a8157cabdda9_07487291')) {function content_59a8157cabdda9_07487291($_smarty_tpl) {?><!doctype html>
<head>

	<!-- General Metas -->
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">	<!-- Force Latest IE rendering engine -->
	<title>Login Form <?php echo $_smarty_tpl->tpl_vars['nama_pt']->value;?>
</title>
	<meta name="description" content="This is inventory application system ">
	<meta name="author" content="CV. ASFA Solution - asfasolution.co.id - agussaputra.com">
	
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
	
	<!-- Stylesheets -->
	<link rel="stylesheet" href="design/css/base.css">
	<link rel="stylesheet" href="design/css/skeleton.css">
	<link rel="stylesheet" href="design/css/layout.css">
	
</head>
<body>

	<!-- Primary Page Layout -->
	
	<div class="alert-danger-login"><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</div>
	<div class="container">
		
		<div class="form-bg">
			<form method="POST" action="index.php?module=login&act=submit">
				<h2>LOGIN <?php echo $_smarty_tpl->tpl_vars['nama_pt']->value;?>
</h2>
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
</html><?php }} ?>