<?php /* Smarty version Smarty-3.1.11, created on 2017-09-05 06:15:30
         compiled from ".\templates\breadcumb.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2694059a9305bea22a5-62135965%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c9ab77fa106b311b60b50a56c941efc50066e4c4' => 
    array (
      0 => '.\\templates\\breadcumb.tpl',
      1 => 1504566557,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2694059a9305bea22a5-62135965',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_59a9305beace54_76133478',
  'variables' => 
  array (
    'breadcumbTitle' => 0,
    'breadcumbTitleSmall' => 0,
    'breadcumbMenuName' => 0,
    'breadcumbMenuSubName' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59a9305beace54_76133478')) {function content_59a9305beace54_76133478($_smarty_tpl) {?><!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		<?php echo $_smarty_tpl->tpl_vars['breadcumbTitle']->value;?>

		<small><?php echo $_smarty_tpl->tpl_vars['breadcumbTitleSmall']->value;?>
</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> <?php echo $_smarty_tpl->tpl_vars['breadcumbMenuName']->value;?>
</a></li>
		<li class="active"><?php echo $_smarty_tpl->tpl_vars['breadcumbMenuSubName']->value;?>
</li>
	</ol>
</section><?php }} ?>