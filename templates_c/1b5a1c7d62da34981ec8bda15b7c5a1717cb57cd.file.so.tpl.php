<?php /* Smarty version Smarty-3.1.11, created on 2017-09-05 10:38:38
         compiled from ".\templates\so.tpl" */ ?>
<?php /*%%SmartyHeaderCode:714659ae1bb0119526-57201474%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1b5a1c7d62da34981ec8bda15b7c5a1717cb57cd' => 
    array (
      0 => '.\\templates\\so.tpl',
      1 => 1504582636,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '714659ae1bb0119526-57201474',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_59ae1bb02b91f3_87442957',
  'variables' => 
  array (
    'module' => 0,
    'act' => 0,
    'soNo' => 0,
    'orderDateIndo' => 0,
    'needDateIndo' => 0,
    'dataCustomer' => 0,
    'customerID' => 0,
    'note' => 0,
    'numsDetilSo' => 0,
    'dataDetilSo' => 0,
    'soID' => 0,
    'soFaktur' => 0,
    'q' => 0,
    'pageNumber' => 0,
    'orderDate' => 0,
    'needDate' => 0,
    'customerName' => 0,
    'dataDetail' => 0,
    'grandtotal' => 0,
    'endDate' => 0,
    'startDate' => 0,
    'dataSo' => 0,
    'page' => 0,
    'pageLink' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59ae1bb02b91f3_87442957')) {function content_59ae1bb02b91f3_87442957($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<style>
	div.ui-datepicker{
		font-size:14px;
	}
</style>

<link rel="stylesheet" type="text/css" media="all" href="design/js/fancybox/jquery.fancybox.css">
<script type="text/javascript" src="design/js/fancybox/jquery.fancybox.js?v=2.0.6"></script>
<script type='text/javascript' src="design/js/jquery.autocomplete.js"></script>
<link rel="stylesheet" type="text/css" href="design/css/jquery.autocomplete.css" />


	<script>
		$(document).ready(function() {
			
			$(".various2").fancybox({
				fitToView: false,
				scrolling: 'no',
				afterLoad: function(){
					this.width = $(this.element).data("width");
					this.height = $(this.element).data("height");
				},
				'afterClose':function () {
					window.location.reload();
				}
			});
			
			$( "#orderDate" ).datepicker({
				changeMonth: true,
				changeYear: true,
				dateFormat: "dd-mm-yy",
				yearRange: 'c-1:c-0'
			});
			
			$( "#startDate" ).datepicker({
				changeMonth: true,
				changeYear: true,
				dateFormat: "dd-mm-yy",
				yearRange: '2014:c-0'
			});
			
			$( "#endDate" ).datepicker({
				changeMonth: true,
				changeYear: true,
				dateFormat: "dd-mm-yy",
				yearRange: '2014:c-0'
			});
			
			$('#needDate').change(function () {
				var soNo = $("#soNo").val();
				var needDate = $("#needDate").val();
				
				$.ajax({
					type: 'POST',
					url: 'save_so_needdate.php',
					dataType: 'JSON',
					data:{
						soNo: soNo,
						needDate: needDate
					},
					success: function(data) {
						setTimeout("$.fancybox.close()", 1000);
						window.location.href = "so.php?module=so&act=add";
					}
				});
			});
			
			$('#orderDate').change(function () {
				var soNo = $("#soNo").val();
				var orderDate = $("#orderDate").val();
				
				$.ajax({
					type: 'POST',
					url: 'save_so_orderdate.php',
					dataType: 'JSON',
					data:{
						soNo: soNo,
						orderDate: orderDate
					},
					success: function(data) {
						setTimeout("$.fancybox.close()", 1000);
						window.location.href = "so.php?module=so&act=add";
					}
				});
			});
			
			$('#note').change(function () {
				var soNo = $("#soNo").val();
				var note = $("#note").val();
				
				$.ajax({
					type: 'POST',
					url: 'save_so_note.php',
					dataType: 'JSON',
					data:{
						soNo: soNo,
						note: note
					},
					success: function(data) {
						setTimeout("$.fancybox.close()", 1000);
						window.location.href = "so.php?module=so&act=add";
					}
				});
			});
			
			$( "#needDate" ).datepicker({
				changeMonth: true,
				changeYear: true,
				dateFormat: "dd-mm-yy",
				yearRange: 'c-1:c+1'
			});
			
			$(".modalbox").fancybox();
			$(".modalbox2").fancybox();
			
			$("#so").submit(function() { return false; });
			$("#so2").submit(function() { return false; });
			
			$("#productBarcode").autocomplete("product_so_autocomplete.php", {
				width: 310
			}).result(function(event, item, a) {
				var myarr = item[0].split(" # ");
				
				document.getElementById('productBarcode').value = myarr[0];
				document.getElementById('productName1').value = myarr[1];
				document.getElementById('productName').value = myarr[1];
				document.getElementById('productID').value = myarr[2];
				document.getElementById('unitPrice1').value = myarr[3];
				document.getElementById('unitPrice2').value = myarr[4];
				document.getElementById('unitPrice3').value = myarr[5];
				document.getElementById('price').value = myarr[6];
			});
			
			$("#customerID").change(function(e){
				var customerID = $("#customerID").val();
				
				$.ajax({
					type: 'POST',
					url: 'save_so_customer.php',
					dataType: 'JSON',
					data:{
						customerID: customerID
					},
					success: function(data) {
						setTimeout("$.fancybox.close()", 1000);
						window.location.href = "so.php?module=so&act=add";
					}
				});
			});
					
			$("#send2").on("click", function(){
				var soNo = $("#soNo").val();
				var productID = $("#productID").val();
				var productName1 = $("#productName1").val();
				var qty = parseInt($("#qty").val());
				var price = parseInt($("#price").val());
				var desc = $("#desc").val();
				
				if (qty != '' && soNo != '' && productID != '' && price != ''){
					
					$.ajax({
						type: 'POST',
						url: 'save_so.php',
						dataType: 'JSON',
						data:{
							qty: qty,
							price: price,
							soNo: soNo,
							productID: productID,
							productName1: productName1,
							desc: desc
						},
						beforeSend: function (data) {
							$('#send2').hide();
						},
						success: function(data) {
							setTimeout("$.fancybox.close()", 1000);
							window.location.href = "so.php?module=so&act=add&msg=Data berhasil disimpan";
						}
					});
				}
			});
		});
	</script>


<header class="header">
	
	<?php echo $_smarty_tpl->getSubTemplate ("logo.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		
	<?php echo $_smarty_tpl->getSubTemplate ("navigation.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		
</header>

<div class="wrapper row-offcanvas row-offcanvas-left">
	<!-- Left side column. contains the logo and sidebar -->
	<aside class="left-side sidebar-offcanvas">
		<!-- sidebar: style can be found in sidebar.less -->
		<section class="sidebar">

			<?php echo $_smarty_tpl->getSubTemplate ("user_panel.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        	
			<?php echo $_smarty_tpl->getSubTemplate ("side_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


		</section>
		<!-- /.sidebar -->
	</aside>
	
	<!-- Right side column. Contains the navbar and content of the page -->
	<aside class="right-side">
		
		<?php echo $_smarty_tpl->getSubTemplate ("breadcumb.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		
		<!-- Main content -->
		<section class="content">
		
			<!-- Main row -->
			<div class="row">
				<!-- Left col -->
				<section class="col-lg-12 connectedSortable">
				
					<!-- TO DO List -->
					<div class="box box-primary">
						
						<?php if ($_smarty_tpl->tpl_vars['module']->value=='so'&&$_smarty_tpl->tpl_vars['act']->value=='add'){?>
							
								<script>
									window.location.hash="no-back-button";
									window.location.hash="Again-No-back-button";//again because google chrome don't insert first hash into history
									window.onhashchange=function(){window.location.hash="no-back-button";}
									
									document.onkeydown = function (e) {
										if (e.keyCode === 116) {
											return false;
										}
									};
								</script>
							
						
							<div class="box-header">
								<i class="ion ion-clipboard"></i>
								<h3 class="box-title">Tambah Sales Order</h3>
								<div class="box-tools pull-right">
									<div class="box-footer clearfix no-border">
										<a href="so.php?module=so&act=cancel" onclick="return confirm('Anda Yakin ingin membatalkan SO ini?');"><button class="btn btn-default pull-right">Batal Trx</button></a>
									</div>
								</div>
							</div><!-- /.box-header -->
							
							<div class="box-body">
								<form method="POST" action="so.php?module=so&act=input">
								<table cellpadding="3" cellspacing="3">
									<tr>
										<td width="130">NO SO / TGL</td>
										<td width="5">:</td>
										<td><input type="hidden" id="soNo" name="soNo" value="<?php echo $_smarty_tpl->tpl_vars['soNo']->value;?>
">
											<input type="text" id="soNo" name="soNo" value="<?php echo $_smarty_tpl->tpl_vars['soNo']->value;?>
" class="form-control" placeholder="NO SO" style="width: 110px; float: left" DISABLED>
											<input type="text" id="orderDate" name="orderDate" value="<?php echo $_smarty_tpl->tpl_vars['orderDateIndo']->value;?>
" class="form-control" placeholder="Tanggal PO" style="width: 160px;" required>
										</td>
									</tr>
									<tr>
										<td>TGL DIBUTUHKAN</td>
										<td>:</td>
										<td><input type="text" id="needDate" name="needDate" value="<?php echo $_smarty_tpl->tpl_vars['needDateIndo']->value;?>
" class="form-control" placeholder="Tanggal Dibutuhkan" style="width: 270px;" required></td>
									</tr>
									<tr>
										<td>CUSTOMER</td>
										<td>:</td>
										<td>
											<select id="customerID" name="customerID" class="form-control" style="width: 270px;" required>
												<option value=""></option>
												<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCustomer'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCustomer']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCustomer']['name'] = 'dataCustomer';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCustomer']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataCustomer']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCustomer']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCustomer']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCustomer']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCustomer']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCustomer']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCustomer']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCustomer']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCustomer']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCustomer']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCustomer']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCustomer']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCustomer']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCustomer']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCustomer']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCustomer']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCustomer']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCustomer']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCustomer']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCustomer']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCustomer']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCustomer']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCustomer']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCustomer']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCustomer']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCustomer']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCustomer']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCustomer']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCustomer']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCustomer']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCustomer']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCustomer']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCustomer']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataCustomer']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataCustomer']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataCustomer']['total']);
?>
													<?php if ($_smarty_tpl->tpl_vars['dataCustomer']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCustomer']['index']]['customerID']==$_smarty_tpl->tpl_vars['customerID']->value){?>
														<option value="<?php echo $_smarty_tpl->tpl_vars['dataCustomer']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCustomer']['index']]['customerID'];?>
" SELECTED><?php echo $_smarty_tpl->tpl_vars['dataCustomer']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCustomer']['index']]['customerName'];?>
 [<?php echo $_smarty_tpl->tpl_vars['dataCustomer']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCustomer']['index']]['customerCode'];?>
]</option>
													<?php }else{ ?>
														<option value="<?php echo $_smarty_tpl->tpl_vars['dataCustomer']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCustomer']['index']]['customerID'];?>
"><?php echo $_smarty_tpl->tpl_vars['dataCustomer']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCustomer']['index']]['customerName'];?>
 [<?php echo $_smarty_tpl->tpl_vars['dataCustomer']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataCustomer']['index']]['customerCode'];?>
]</option>
													<?php }?>
												<?php endfor; endif; ?>
											</select>
										</td>
									</tr>
									<tr>
										<td>NOTE</td>
										<td>:</td>
										<td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['note']->value;?>
" id="note" name="note" class="form-control" placeholder="Note" style="width: 270px;"></td>
									</tr>
									<tr>
										<td colspan="3">
											<br>
											<?php if ($_smarty_tpl->tpl_vars['numsDetilSo']->value<10){?>
											<a href="#inline" class="modalbox"><button class="btn btn-default pull-left"><i class="fa fa-plus"></i> Add</button></a>
											<?php }?>
										</td>
									</tr>
								</table>

								
								<div class="table-responsive">
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>NO</th>
												<th>NAMA PRODUK</th>
												<th>HARGA SATUAN</th>
												<th>QTY</th>
												<th>SUBTOTAL</th>
												<th>NOTE</th>
												<th>AKSI</th>
											</tr>
										</thead>
										<tbody>
											<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetilSo'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetilSo']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetilSo']['name'] = 'dataDetilSo';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetilSo']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataDetilSo']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetilSo']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetilSo']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetilSo']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetilSo']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetilSo']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetilSo']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetilSo']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetilSo']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetilSo']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetilSo']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetilSo']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetilSo']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetilSo']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetilSo']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetilSo']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetilSo']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetilSo']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetilSo']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetilSo']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetilSo']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetilSo']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetilSo']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetilSo']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetilSo']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetilSo']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetilSo']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetilSo']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetilSo']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetilSo']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetilSo']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetilSo']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetilSo']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetilSo']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetilSo']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetilSo']['total']);
?>
												<tr>
													<td><?php echo $_smarty_tpl->tpl_vars['dataDetilSo']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetilSo']['index']]['no'];?>
</td>
													<td><?php echo $_smarty_tpl->tpl_vars['dataDetilSo']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetilSo']['index']]['productName'];?>
</td>
													<td style='text-align: right;'><?php echo $_smarty_tpl->tpl_vars['dataDetilSo']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetilSo']['index']]['price'];?>
</td>
													<td style='text-align: center;'><?php echo $_smarty_tpl->tpl_vars['dataDetilSo']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetilSo']['index']]['qty'];?>
</td>
													<td style='text-align: right;'><?php echo $_smarty_tpl->tpl_vars['dataDetilSo']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetilSo']['index']]['subtotal'];?>
</td>
													<td><?php echo $_smarty_tpl->tpl_vars['dataDetilSo']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetilSo']['index']]['note'];?>
</td>
													<td>
														<a title="Edit" href="edit_so.php?module=so&act=edit&detailID=<?php echo $_smarty_tpl->tpl_vars['dataDetilSo']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetilSo']['index']]['detailID'];?>
" data-width="550" data-height="230" class="various2 fancybox.iframe"><img src="img/icons/edit.png" width="18"></a>
														<a title="Delete" href="so.php?module=so&act=deletedetail&detailID=<?php echo $_smarty_tpl->tpl_vars['dataDetilSo']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetilSo']['index']]['detailID'];?>
" onclick="return confirm('Anda Yakin ingin menghapus item produk <?php echo $_smarty_tpl->tpl_vars['dataDetilSo']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetilSo']['index']]['productName'];?>
?');"><img src="img/icons/delete.png" width="18"></a>
													</td>
												</tr>
											<?php endfor; endif; ?>
										</tbody>
									</table>
								</div>
								<br>
								<br>
								<?php if ($_smarty_tpl->tpl_vars['numsDetilSo']->value>0){?>
									<button type="submit" class="btn btn-primary">Simpan</button>
								<?php }else{ ?>
									<button type="button" class="btn btn-primary">Simpan</button>
								<?php }?>
								</form>
							
							</div><!-- /.box-body -->
							
							<div id="inline">	
								<table width="95%" align="center">
									<tr>
										<td colspan="3"><h3>Tambah Item</h3></td>
									</tr>
									<tr>
										<td>
											<form id="so" name="so" method="POST" action="#">
											<input type="hidden" id="soNo" name="soNo" value="<?php echo $_smarty_tpl->tpl_vars['soNo']->value;?>
">
											<table cellpadding="3" cellspacing="3">
												<tr>
													<td width="140">Kode Produk</td>
													<td width="5">:</td>
													<td><input type="text" id="productBarcode" name="productBarcode" class="form-control" placeholder="Kode atau Nama Produk" style="width: 360px;" required></td>
												</tr>
												<tr>
													<td colspan="2"></td>
													<td><input type="hidden" id="productID" name="productID">
														<input type="hidden" id="productName1" name="productName1">
														<input type="text" id="productName" name="productName" class="form-control" placeholder="Nama Produk" style="width: 360px;" DISABLED>
													</td>
												</tr>
												<tr>
													<td>Harga Satuan</td>
													<td>:</td>
													<td><input id="unitPrice1" name="unitPrice1" class="form-control" placeholder="Harga 1" style="width: 120px; float: left;" DISABLED>
														<input id="unitPrice2" name="unitPrice2" class="form-control" placeholder="Harga 2" style="width: 120px; float: left;" DISABLED>
														<input id="unitPrice3" name="unitPrice3" class="form-control" placeholder="Harga 3" style="width: 120px;;" DISABLED>
													</td>
												</tr>
												<tr>
													<td>Masukan Harga</td>
													<td>:</td>
													<td><input type="number" id="price" name="price" class="form-control" placeholder="Harga Satuan" style="width: 360px;" required></td>
												</tr>
												<tr>
													<td>Qty</td>
													<td>:</td>
													<td><input type="number" id="qty" name="qty" class="form-control" placeholder="Qty Produk" style="width: 360px;" required></td>
												</tr>
												<tr>
													<td>Note</td>
													<td>:</td>
													<td><input type="text" id="desc" name="desc" class="form-control" placeholder="Note" style="width: 360px;"></td>
												</tr>
											</table>
											<button id="send2" class="btn btn-primary">Simpan</button>
											</form>
										</td>
									</tr>
								</table>
							</div>
							
						<?php }elseif($_smarty_tpl->tpl_vars['module']->value=='so'&&$_smarty_tpl->tpl_vars['act']->value=='detailso'){?>
							<div class="box-header">
								<i class="ion ion-clipboard"></i>
								<h3 class="box-title">Detail Sales Order</h3>
								<div class="box-tools pull-right">
									<div class="box-footer clearfix no-border">
										<a href="print_unit_so.php?module=so&act=print&soID=<?php echo $_smarty_tpl->tpl_vars['soID']->value;?>
&soFaktur=<?php echo $_smarty_tpl->tpl_vars['soFaktur']->value;?>
" target="_blank"><button class="btn btn-default pull-right">Print</button></a>
										<?php if ($_smarty_tpl->tpl_vars['q']->value!=''){?>
											<a href="so.php?module=so&act=search&q=<?php echo $_smarty_tpl->tpl_vars['q']->value;?>
&page=<?php echo $_smarty_tpl->tpl_vars['pageNumber']->value;?>
"><button class="btn btn-default pull-right">Back</button></a>
										<?php }else{ ?>
											<a href="so.php?page=<?php echo $_smarty_tpl->tpl_vars['pageNumber']->value;?>
"><button class="btn btn-default pull-right">Back</button></a>
										<?php }?>
									</div>
								</div>
							</div><!-- /.box-header -->
							
							<div class="box-body">
								<table cellpadding="3" cellspacing="3">
									<tr>
										<td width="130">NO SO / TGL</td>
										<td width="5">:</td>
										<td><?php echo $_smarty_tpl->tpl_vars['soNo']->value;?>
 / <?php echo $_smarty_tpl->tpl_vars['orderDate']->value;?>
</td>
									</tr>
									<tr>
										<td>TGL DIBUTUHKAN</td>
										<td>:</td>
										<td><?php echo $_smarty_tpl->tpl_vars['needDate']->value;?>
</td>
									</tr>
									<tr>
										<td>CUSTOMER</td>
										<td>:</td>
										<td><?php echo $_smarty_tpl->tpl_vars['customerName']->value;?>
</td>
									</tr>
									<tr>
										<td>NOTE</td>
										<td>:</td>
										<td><?php echo $_smarty_tpl->tpl_vars['note']->value;?>
</td>
									</tr>
									<tr>
										<td colspan="3"><br></td>
									</tr>
								</table>

								
								<div class="table-responsive">
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>NO</th>
												<th>NAMA PRODUK</th>
												<th>HARGA SATUAN</th>
												<th>QTY</th>
												<th>SUBTOTAL</th>
												<th>NOTE</th>
											</tr>
										</thead>
										<tbody>
											<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['name'] = 'dataDetail';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataDetail']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['total']);
?>
												<tr>
													<td><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['no'];?>
</td>
													<td><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['productName'];?>
</td>
													<td style="text-align: right;"><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['price'];?>
</td>
													<td style="text-align: center;"><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['qty'];?>
</td>
													<td style="text-align: right;"><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['subtotal'];?>
</td>
													<td><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['note'];?>
</td>
												</tr>
											<?php endfor; endif; ?>
												<tr>
													<td colspan="4"></td>
													<td style="text-align: right;"><?php echo $_smarty_tpl->tpl_vars['grandtotal']->value;?>
</td>
													<td></td>
												</tr>
										</tbody>
									</table>
								</div>
							
							</div><!-- /.box-body -->
							
						<?php }elseif($_smarty_tpl->tpl_vars['module']->value=='so'&&$_smarty_tpl->tpl_vars['act']->value=='finish'){?>
							
								<script>
									window.location.hash="no-back-button";
									window.location.hash="Again-No-back-button";//again because google chrome don't insert first hash into history
									window.onhashchange=function(){window.location.hash="no-back-button";}
									
									document.onkeydown = function (e) {
										if (e.keyCode === 116) {
											return false;
										}
									};
								</script>
							
							
							<div class="box-header">
								<i class="ion ion-clipboard"></i>
								<h3 class="box-title">Detail Sales Order</h3>
								<div class="box-tools pull-right">
									<div class="box-footer clearfix no-border">
										<a href="print_unit_so.php?module=so&act=print&soID=<?php echo $_smarty_tpl->tpl_vars['soID']->value;?>
&soFaktur=<?php echo $_smarty_tpl->tpl_vars['soFaktur']->value;?>
" target="_blank"><button class="btn btn-default pull-right">Print</button></a>
										<a href="so.php"><button class="btn btn-default pull-right">Close</button></a>
									</div>
								</div>
							</div><!-- /.box-header -->
							
							<div class="box-body">
								<table cellpadding="3" cellspacing="3">
									<tr>
										<td width="130">NO SO / TGL</td>
										<td width="5">:</td>
										<td><?php echo $_smarty_tpl->tpl_vars['soNo']->value;?>
 / <?php echo $_smarty_tpl->tpl_vars['orderDate']->value;?>
</td>
									</tr>
									<tr>
										<td>TGL DIBUTUHKAN</td>
										<td>:</td>
										<td><?php echo $_smarty_tpl->tpl_vars['needDate']->value;?>
</td>
									</tr>
									<tr>
										<td>CUSTOMER</td>
										<td>:</td>
										<td><?php echo $_smarty_tpl->tpl_vars['customerName']->value;?>
</td>
									</tr>
									<tr>
										<td>NOTE</td>
										<td>:</td>
										<td><?php echo $_smarty_tpl->tpl_vars['note']->value;?>
</td>
									</tr>
									<tr>
										<td colspan="3"><br></td>
									</tr>
								</table>

								
								<div class="table-responsive">
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>NO</th>
												<th>NAMA PRODUK</th>
												<th>HARGA SATUAN</th>
												<th>QTY</th>
												<th>SUBTOTAL</th>
												<th>NOTE</th>
											</tr>
										</thead>
										<tbody>
											<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['name'] = 'dataDetail';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataDetail']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataDetail']['total']);
?>
												<tr>
													<td><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['no'];?>
</td>
													<td><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['productName'];?>
</td>
													<td style="text-align: right;"><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['price'];?>
</td>
													<td style="text-align: center;"><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['qty'];?>
</td>
													<td style="text-align: right;"><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['subtotal'];?>
</td>
													<td><?php echo $_smarty_tpl->tpl_vars['dataDetail']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataDetail']['index']]['note'];?>
</td>
												</tr>
											<?php endfor; endif; ?>
												<tr>
													<td colspan="4"></td>
													<td style="text-align: right;"><?php echo $_smarty_tpl->tpl_vars['grandtotal']->value;?>
</td>
													<td></td>
												</tr>
										</tbody>
									</table>
								</div>
							
							</div><!-- /.box-body -->
							
						<?php }elseif($_smarty_tpl->tpl_vars['module']->value=='so'&&$_smarty_tpl->tpl_vars['act']->value=='search'){?>
							
							<div class="box-header">
								<i class="ion ion-clipboard"></i>
								<div class="box-tools pull-right">
									<div class="box-footer clearfix no-border">
										<form method="GET" action="so.php">
											<input type="hidden" name="module" value="so">
											<input type="hidden" name="act" value="search">
											<button type="submit" class="btn btn-default pull-right"><i class="fa fa-search"></i> Search</button>
											<input type="text" id="endDate" name="endDate" value="<?php echo $_smarty_tpl->tpl_vars['endDate']->value;?>
" class="form-control" placeholder="Periode Akhir" style="float: right; width: 115px;">
											<input type="text" id="startDate" name="startDate" value="<?php echo $_smarty_tpl->tpl_vars['startDate']->value;?>
" class="form-control" placeholder="Periode Awal" style="float: right; width: 115px;">
											<input type="text" id="q" name="q" value="<?php echo $_smarty_tpl->tpl_vars['q']->value;?>
" class="form-control" placeholder="Pencarian : Nomor SO" style="float: right; width: 270px;">
										
											<a href="so.php?module=so&act=add" style="float: left;"><button type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add</button></a>
											<a href="print_so_excel.php?f=so&act=print&q=<?php echo $_smarty_tpl->tpl_vars['q']->value;?>
&startDate=<?php echo $_smarty_tpl->tpl_vars['startDate']->value;?>
&endDate=<?php echo $_smarty_tpl->tpl_vars['endDate']->value;?>
" style="float: left;" target="_blank"><button type="button" class="btn btn-default pull-right"><i class="fa fa-file-o"></i> Excel</button></a>
											<a href="print_so.php?act=print&q=<?php echo $_smarty_tpl->tpl_vars['q']->value;?>
&startDate=<?php echo $_smarty_tpl->tpl_vars['startDate']->value;?>
&endDate=<?php echo $_smarty_tpl->tpl_vars['endDate']->value;?>
" style="float: left;" target="_blank"><button type="button" class="btn btn-default pull-right"><i class="fa fa-print"></i> Print PDF</button></a>
											&nbsp;&nbsp;&nbsp;
										</form>
									</div>
								</div>
							</div><!-- /.box-header -->
							
							<div class="box-body">
								
								<div class="table-responsive">
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>NO <i class="fa fa-sort"></i></th>
												<th>NO SO <i class="fa fa-sort"></i></th>
												<th>TGL SO <i class="fa fa-sort"></i></th>
												<th>TGL DIBUTUHKAN <i class="fa fa-sort"></i></th>
												<th>SUPPLIER <i class="fa fa-sort"></i></th>
												<th>STATUS <i class="fa fa-sort"></i></th>
												<th>DIBUAT OLEH <i class="fa fa-sort"></i></th>
												<th>AKSI</th>
											</tr>
										</thead>
										<tbody>
											<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['name'] = 'dataSo';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataSo']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['total']);
?>
												<tr>
													<td><?php echo $_smarty_tpl->tpl_vars['dataSo']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataSo']['index']]['no'];?>
</td>
													<td><?php echo $_smarty_tpl->tpl_vars['dataSo']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataSo']['index']]['soNo'];?>
</td>
													<td><?php echo $_smarty_tpl->tpl_vars['dataSo']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataSo']['index']]['orderDate'];?>
</td>
													<td><?php echo $_smarty_tpl->tpl_vars['dataSo']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataSo']['index']]['needDate'];?>
</td>
													<td><?php echo $_smarty_tpl->tpl_vars['dataSo']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataSo']['index']]['customerName'];?>
</td>
													<td><?php echo $_smarty_tpl->tpl_vars['dataSo']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataSo']['index']]['status'];?>
</td>
													<td><?php echo $_smarty_tpl->tpl_vars['dataSo']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataSo']['index']]['staffName'];?>
</td>
													<td>
														<a title="Detail" href="so.php?module=so&act=detailso&soID=<?php echo $_smarty_tpl->tpl_vars['dataSo']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataSo']['index']]['soID'];?>
&soFaktur=<?php echo $_smarty_tpl->tpl_vars['dataSo']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataSo']['index']]['soFaktur'];?>
&q=<?php echo $_smarty_tpl->tpl_vars['q']->value;?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
"><img src="img/icons/view.png" width="18"></a>
														<a title="Delete" href="so.php?module=so&act=delete&soID=<?php echo $_smarty_tpl->tpl_vars['dataSo']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataSo']['index']]['soID'];?>
&soFaktur=<?php echo $_smarty_tpl->tpl_vars['dataSo']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataSo']['index']]['soFaktur'];?>
&soNo=<?php echo $_smarty_tpl->tpl_vars['dataSo']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataSo']['index']]['soNo'];?>
" onclick="return confirm('Anda Yakin ingin menghapus transaksi <?php echo $_smarty_tpl->tpl_vars['dataSo']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataSo']['index']]['soNo'];?>
?');"><img src="img/icons/delete.png" width="18"></a>
													</td>
												</tr>
											<?php endfor; endif; ?>
										</tbody>
									</table>
								</div>
							
							</div><!-- /.box-body -->
						
						<?php }else{ ?>
							<div class="box-header">
								<i class="ion ion-clipboard"></i>
								<div class="box-tools pull-right">
									<div class="box-footer clearfix no-border">
										<form method="GET" action="so.php">
											<input type="hidden" name="module" value="so">
											<input type="hidden" name="act" value="search">
											<button type="submit" class="btn btn-default pull-right"><i class="fa fa-search"></i> Search</button>
											<input type="text" id="endDate" name="endDate" value="<?php echo $_smarty_tpl->tpl_vars['endDate']->value;?>
" class="form-control" placeholder="Periode Akhir" style="float: right; width: 115px;">
											<input type="text" id="startDate" name="startDate" value="<?php echo $_smarty_tpl->tpl_vars['startDate']->value;?>
" class="form-control" placeholder="Periode Awal" style="float: right; width: 115px;">
											<input type="text" id="q" name="q" value="<?php echo $_smarty_tpl->tpl_vars['q']->value;?>
" class="form-control" placeholder="Pencarian : Nomor SO" style="float: right; width: 270px;">
										
											<a href="so.php?module=so&act=add" style="float: left;"><button type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add</button></a>
											<a href="print_so_excel.php?f=so&act=print&q=<?php echo $_smarty_tpl->tpl_vars['q']->value;?>
" style="float: left;" target="_blank"><button type="button" class="btn btn-default pull-right"><i class="fa fa-file-o"></i> Excel</button></a>
											<a href="print_so.php?act=print&q=<?php echo $_smarty_tpl->tpl_vars['q']->value;?>
" style="float: left;" target="_blank"><button type="button" class="btn btn-default pull-right"><i class="fa fa-print"></i> Print PDF</button></a>
											&nbsp;&nbsp;&nbsp;
										</form>
									</div>
								</div>
							</div><!-- /.box-header -->
							
							<div class="box-body">
								
								<div class="table-responsive">
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>NO <i class="fa fa-sort"></i></th>
												<th>NO SO <i class="fa fa-sort"></i></th>
												<th>TGL SO <i class="fa fa-sort"></i></th>
												<th>TGL DIBUTUHKAN <i class="fa fa-sort"></i></th>
												<th>CUSTOMER <i class="fa fa-sort"></i></th>
												<th>STATUS <i class="fa fa-sort"></i></th>
												<th>DIBUAT OLEH <i class="fa fa-sort"></i></th>
												<th>AKSI</th>
											</tr>
										</thead>
										<tbody>
											<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['name'] = 'dataSo';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dataSo']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dataSo']['total']);
?>
												<tr>
													<td><?php echo $_smarty_tpl->tpl_vars['dataSo']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataSo']['index']]['no'];?>
</td>
													<td><?php echo $_smarty_tpl->tpl_vars['dataSo']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataSo']['index']]['soNo'];?>
</td>
													<td><?php echo $_smarty_tpl->tpl_vars['dataSo']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataSo']['index']]['orderDate'];?>
</td>
													<td><?php echo $_smarty_tpl->tpl_vars['dataSo']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataSo']['index']]['needDate'];?>
</td>
													<td><?php echo $_smarty_tpl->tpl_vars['dataSo']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataSo']['index']]['customerName'];?>
</td>
													<td><?php echo $_smarty_tpl->tpl_vars['dataSo']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataSo']['index']]['status'];?>
</td>
													<td><?php echo $_smarty_tpl->tpl_vars['dataSo']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataSo']['index']]['staffName'];?>
</td>
													<td>
														<a title="Detail" href="so.php?module=so&act=detailso&soID=<?php echo $_smarty_tpl->tpl_vars['dataSo']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataSo']['index']]['soID'];?>
&soFaktur=<?php echo $_smarty_tpl->tpl_vars['dataSo']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataSo']['index']]['soFaktur'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
"><img src="img/icons/view.png" width="18"></a>
														<a title="Delete" href="so.php?module=so&act=delete&soID=<?php echo $_smarty_tpl->tpl_vars['dataSo']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataSo']['index']]['soID'];?>
&soFaktur=<?php echo $_smarty_tpl->tpl_vars['dataSo']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataSo']['index']]['soFaktur'];?>
&soNo=<?php echo $_smarty_tpl->tpl_vars['dataSo']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataSo']['index']]['soNo'];?>
" onclick="return confirm('Anda Yakin ingin menghapus transaksi <?php echo $_smarty_tpl->tpl_vars['dataSo']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dataSo']['index']]['soNo'];?>
?');"><img src="img/icons/delete.png" width="18"></a>
													</td>
												</tr>
											<?php endfor; endif; ?>
										</tbody>
									</table>
								</div>
							
							</div><!-- /.box-body -->
							
							<div class="box-header">
								<i class="ion ion-clipboard"></i>
								<div class="box-tools pull-left">
									<ul class="pagination pagination-sm inline">
										<?php echo $_smarty_tpl->tpl_vars['pageLink']->value;?>

									</ul>
								</div>
							</div><!-- /.box-header -->
						<?php }?>
						
					</div><!-- /.box -->
					
				</section><!-- /.Left col -->
			</div><!-- /.row (main row) -->
		</section><!-- /.content -->
	</aside><!-- /.right-side -->
</div><!-- ./wrapper -->

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>