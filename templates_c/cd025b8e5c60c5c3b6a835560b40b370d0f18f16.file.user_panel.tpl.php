<?php /* Smarty version Smarty-3.1.11, created on 2017-09-05 06:15:30
         compiled from ".\templates\user_panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1460659a9305ba64ce1-17029257%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cd025b8e5c60c5c3b6a835560b40b370d0f18f16' => 
    array (
      0 => '.\\templates\\user_panel.tpl',
      1 => 1504566557,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1460659a9305ba64ce1-17029257',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_59a9305ba73af5_43249284',
  'variables' => 
  array (
    'loginPhoto' => 0,
    'loginStaffNickName' => 0,
    'loginStaffPosition' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59a9305ba73af5_43249284')) {function content_59a9305ba73af5_43249284($_smarty_tpl) {?><!-- Sidebar user panel -->
<div class="user-panel">
	<div class="pull-left image">
		<?php if ($_smarty_tpl->tpl_vars['loginPhoto']->value!=''){?>
			<img src="img/staffs/thumb/small_<?php echo $_smarty_tpl->tpl_vars['loginPhoto']->value;?>
" class="img-circle" alt="User Image" />
		<?php }?>
	</div>
	<div class="pull-left info">
		<p>Hello, <?php echo $_smarty_tpl->tpl_vars['loginStaffNickName']->value;?>
</p>
		<?php echo $_smarty_tpl->tpl_vars['loginStaffPosition']->value;?>

	</div>
</div>
<?php }} ?>