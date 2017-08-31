<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu">
	<li class="active">
		<a href="home.php">
			<i class="fa fa-dashboard"></i> <span>Home</span>
		</a>
	</li>
	<li class="treeview">
		<a href="#">
			<i class="fa fa-th"></i>
			<span>Master Data</span>
			<i class="fa fa-angle-left pull-right"></i>
		</a>
		<ul class="treeview-menu">
			{section name=dataAuthorize loop=$dataAuthorize}
				{if $dataAuthorize[dataAuthorize].modulID == 1 AND strpos("{$dataAuthorize[dataAuthorize].authorize}", "{$loginStaffLevel}") !== false}
					<li><a href="staffs.php"><i class="fa fa-angle-double-right"></i> Staff</a></li>
				{/if}
				{if $dataAuthorize[dataAuthorize].modulID == 4 AND strpos("{$dataAuthorize[dataAuthorize].authorize}", "{$loginStaffLevel}") !== false}
					<li><a href="categories.php"><i class="fa fa-angle-double-right"></i> Kategori</a></li>
				{/if}
				{if $dataAuthorize[dataAuthorize].modulID == 5 AND strpos("{$dataAuthorize[dataAuthorize].authorize}", "{$loginStaffLevel}") !== false}
					<li><a href="products.php"><i class="fa fa-angle-double-right"></i> Produk</a></li>
				{/if}
				{if $dataAuthorize[dataAuthorize].modulID == 12 AND strpos("{$dataAuthorize[dataAuthorize].authorize}", "{$loginStaffLevel}") !== false}
					<li><a href="factories.php"><i class="fa fa-angle-double-right"></i> Gudang</a></li>
				{/if}
				{if $dataAuthorize[dataAuthorize].modulID == 6 AND strpos("{$dataAuthorize[dataAuthorize].authorize}", "{$loginStaffLevel}") !== false}
					<li><a href="suppliers.php"><i class="fa fa-angle-double-right"></i> Supplier</a></li>
				{/if}
				{if $dataAuthorize[dataAuthorize].modulID == 2 AND strpos("{$dataAuthorize[dataAuthorize].authorize}", "{$loginStaffLevel}") !== false}
					<li><a href="customers.php"><i class="fa fa-angle-double-right"></i> Customer</a></li>
				{/if}
				{if $dataAuthorize[dataAuthorize].modulID == 25 AND strpos("{$dataAuthorize[dataAuthorize].authorize}", "{$loginStaffLevel}") !== false}
					<li><a href="authorize.php"><i class="fa fa-angle-double-right"></i> Level Authorize</a></li>
				{/if}
			{/section}
		</ul>
	</li>
	<li class="treeview">
		<a href="#">
			<i class="fa fa-laptop"></i>
			<span>Transaksi Pembelian</span>
			<i class="fa fa-angle-left pull-right"></i>
		</a>
		<ul class="treeview-menu">
			{section name=dataAuthorize loop=$dataAuthorize}
				{if $dataAuthorize[dataAuthorize].modulID == 8 AND strpos("{$dataAuthorize[dataAuthorize].authorize}", "{$loginStaffLevel}") !== false}
					<li><a href="in.php"><i class="fa fa-angle-double-right"></i> Transaksi Pembelian</a></li>
				{/if}
				{if $dataAuthorize[dataAuthorize].modulID == 13 AND strpos("{$dataAuthorize[dataAuthorize].authorize}", "{$loginStaffLevel}") !== false}
					<li><a href="bbm.php"><i class="fa fa-angle-double-right"></i> Bukti Barang Masuk</a></li>
				{/if}
				{if $dataAuthorize[dataAuthorize].modulID == 14 AND strpos("{$dataAuthorize[dataAuthorize].authorize}", "{$loginStaffLevel}") !== false}
					<li><a href="spb.php"><i class="fa fa-angle-double-right"></i> Purchase Order</a></li>
				{/if}
				{if $dataAuthorize[dataAuthorize].modulID == 26 AND strpos("{$dataAuthorize[dataAuthorize].authorize}", "{$loginStaffLevel}") !== false}
					<li><a href="pay_in.php"><i class="fa fa-angle-double-right"></i> Pembayaran Transaksi</a></li>
				{/if}
			{/section}
		</ul>
	</li>
	<li class="treeview">
		<a href="#">
			<i class="fa fa-laptop"></i>
			<span>Transaksi Penjualan</span>
			<i class="fa fa-angle-left pull-right"></i>
		</a>
		<ul class="treeview-menu">
			{section name=dataAuthorize loop=$dataAuthorize}
				{if $dataAuthorize[dataAuthorize].modulID == 9 AND strpos("{$dataAuthorize[dataAuthorize].authorize}", "{$loginStaffLevel}") !== false}
					<li><a href="out.php"><i class="fa fa-angle-double-right"></i> Transaksi Penjualan</a></li>
				{/if}
				{if $dataAuthorize[dataAuthorize].modulID == 13 AND strpos("{$dataAuthorize[dataAuthorize].authorize}", "{$loginStaffLevel}") !== false}
					<li><a href="do.php"><i class="fa fa-angle-double-right"></i> Delivery Order</a></li>
				{/if}
				{if $dataAuthorize[dataAuthorize].modulID == 14 AND strpos("{$dataAuthorize[dataAuthorize].authorize}", "{$loginStaffLevel}") !== false}
					<li><a href="so.php"><i class="fa fa-angle-double-right"></i> Sales Order</a></li>
				{/if}
				{if $dataAuthorize[dataAuthorize].modulID == 27 AND strpos("{$dataAuthorize[dataAuthorize].authorize}", "{$loginStaffLevel}") !== false}
					<li><a href="pay_out.php"><i class="fa fa-angle-double-right"></i> Pembayaran Transaksi</a></li>
				{/if}
			{/section}
		</ul>
	</li>
	{section name=dataAuthorize loop=$dataAuthorize}
		{if $dataAuthorize[dataAuthorize].modulID == 7 AND strpos("{$dataAuthorize[dataAuthorize].authorize}", "{$loginStaffLevel}") !== false}
			<li><a href="transfers.php"><i class="fa fa-edit"></i> <span>Transfer Gudang</span></a></li>
		{/if}
	{/section}
	<li class="treeview">
		<a href="#">
			<i class="fa fa-edit"></i> <span>Retur</span>
			<i class="fa fa-angle-left pull-right"></i>
		</a>
		<ul class="treeview-menu">
			{section name=dataAuthorize loop=$dataAuthorize}
				{if $dataAuthorize[dataAuthorize].modulID == 11 AND strpos("{$dataAuthorize[dataAuthorize].authorize}", "{$loginStaffLevel}") !== false}
					<li><a href="retur_staffs.php"><i class="fa fa-angle-double-right"></i> Retur Penjualan</a></li>
				{/if}
				{if $dataAuthorize[dataAuthorize].modulID == 10 AND strpos("{$dataAuthorize[dataAuthorize].authorize}", "{$loginStaffLevel}") !== false}
					<li><a href="retur_suppliers.php"><i class="fa fa-angle-double-right"></i> Retur Pembelian</a></li>
				{/if}
			{/section}
		</ul>
	</li>
	{section name=dataAuthorize loop=$dataAuthorize}
		{if $dataAuthorize[dataAuthorize].modulID == 16 AND strpos("{$dataAuthorize[dataAuthorize].authorize}", "{$loginStaffLevel}") !== false}
			<li><a href="stock_opname.php"><i class="fa fa-edit"></i> <span>Stock Opname</span></a></li>
		{/if}
	{/section}
	<li class="treeview">
		<a href="#">
			<i class="fa fa-bar-chart-o"></i> <span>Laporan</span>
			<i class="fa fa-angle-left pull-right"></i>
		</a>
		<ul class="treeview-menu">
			{section name=dataAuthorize loop=$dataAuthorize}
				{if $dataAuthorize[dataAuthorize].modulID == 17 AND strpos("{$dataAuthorize[dataAuthorize].authorize}", "{$loginStaffLevel}") !== false}
					<li><a href="report_stock_products.php"><i class="fa fa-angle-double-right"></i> Laporan Stok Produk</a></li>
				{/if}
				{if $dataAuthorize[dataAuthorize].modulID == 19 AND strpos("{$dataAuthorize[dataAuthorize].authorize}", "{$loginStaffLevel}") !== false}
					<li><a href="report_in.php"><i class="fa fa-angle-double-right"></i> Laporan Pembelian</a></li>
				{/if}
				{if $dataAuthorize[dataAuthorize].modulID == 20 AND strpos("{$dataAuthorize[dataAuthorize].authorize}", "{$loginStaffLevel}") !== false}
					<li><a href="report_out.php"><i class="fa fa-angle-double-right"></i> Laporan Penjualan</a></li>
				{/if}
				{if $dataAuthorize[dataAuthorize].modulID == 21 AND strpos("{$dataAuthorize[dataAuthorize].authorize}", "{$loginStaffLevel}") !== false}
					<li><a href="report_debts.php"><i class="fa fa-angle-double-right"></i> Laporan Hutang Dagang</a></li>
				{/if}
				{if $dataAuthorize[dataAuthorize].modulID == 22 AND strpos("{$dataAuthorize[dataAuthorize].authorize}", "{$loginStaffLevel}") !== false}
					<li><a href="report_receives.php"><i class="fa fa-angle-double-right"></i> Laporan Piutang Dagang</a></li>
				{/if}
			{/section}
		</ul>
	</li>
	<li class="treeview">
		<a href="#">
			<i class="fa fa-folder"></i> <span>Hutang dan Piutang</span>
			<i class="fa fa-angle-left pull-right"></i>
		</a>
		<ul class="treeview-menu">
			{section name=dataAuthorize loop=$dataAuthorize}
				{if $dataAuthorize[dataAuthorize].modulID == 23 AND strpos("{$dataAuthorize[dataAuthorize].authorize}", "{$loginStaffLevel}") !== false}
					<li><a href="debts.php"><i class="fa fa-angle-double-right"></i> Hutang Dagang</a></li>
				{/if}
				{if $dataAuthorize[dataAuthorize].modulID == 24 AND strpos("{$dataAuthorize[dataAuthorize].authorize}", "{$loginStaffLevel}") !== false}
					<li><a href="receivables.php"><i class="fa fa-angle-double-right"></i> Piutang Dagang</a></li>
				{/if}
			{/section}
		</ul>
	</li>
</ul>