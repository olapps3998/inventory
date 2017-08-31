<?php
// include header
include "header.php";
// set the tpl page
$page = "retur_suppliers.tpl";

$module = $_GET['module'];
$act = $_GET['act'];

// if session is null, showing up the text and exit
if ($_SESSION['staffID'] == '' && $_SESSION['email'] == '')
{
	// show up the text and exit
	echo "Anda tidak berhak akses modul ini.";
	exit();
}

else 
{
	$queryAuthorizeStaff = "SELECT * FROM as_modules WHERE modulID = '10'";
	$sqlAuthorizeStaff = mysqli_query($connect, $queryAuthorizeStaff);
	$dataAuthorizeStaff = mysqli_fetch_array($sqlAuthorizeStaff);
	
	if (strpos($dataAuthorizeStaff['authorize'], $_SESSION['level']) === FALSE){
		echo "Anda tidak berhak akses modul ini.";
		exit();
	}
		
	// if module is returbuy and action is delete
	if ($module == 'returbuy' && $act == 'delete')
	{
		// insert method into a variable
		$returID = $_GET['returID'];
		$returNo = $_GET['returNo'];
		
		// show the invoice no, retur type, grandtotal, supplierID
		$queryRetur = "SELECT invoiceNo, returType, grandtotal, supplierID FROM as_retur_suppliers WHERE returID = '$returID' AND returNo = '$returNo'";
		$sqlRetur = mysqli_query($connect, $queryRetur);
		$dataRetur = mysqli_fetch_array($sqlRetur);
		
		// if the retur type is add to the balance, reduction in the balance based on supplier id on the supplier data
		if ($dataRetur['returType'] == '2')
		{
			$grandtotal = $dataRetur['grandtotal'];
			$queryReturCash = "UPDATE as_suppliers SET balance=balance-$grandtotal WHERE supplierID = '$dataRetur[supplierID]'";
			$sqlReturCash = mysqli_query($connect, $queryReturCash);
		}
		// if the retur type is credit, reduction the debts about this transactions
		if ($dataRetur['returType'] == '3')
		{
			$grandtotal = $dataRetur['grandtotal'];
			$queryReturCash = "UPDATE as_debts SET reductionTotal=reductionTotal-$grandtotal WHERE invoiceNo = '$dataRetur[invoiceNo]' AND supplierID = '$dataRetur[supplierID]'";
			$sqlReturCash = mysqli_query($connect, $queryReturCash);
		}
		
		// show the detail of retur, factoryID, productID and qty based on retur id and retur no
		$queryDetail = "SELECT factoryID, productID, qty FROM as_detail_retur_suppliers WHERE returID = '$returID' AND returNo = '$returNo'";
		$sqlDetail = mysqli_query($connect, $queryDetail);
		while ($dataDetail = mysqli_fetch_array($sqlDetail))
		{
			$qty = $dataDetail['qty'];
			
			// addition of the balance based on factory id and product id
			$querySP = "UPDATE as_stock_products SET stock=stock+$qty WHERE factoryID = '$dataDetail[factoryID]' AND productID = '$dataDetail[productID]'";
			mysqli_query($connect, $querySP);
		}
		
		// delete the retur data based on retur id and retur no
		$queryDelete = "DELETE FROM as_retur_suppliers WHERE returID = '$returID' AND returNo = '$returNo'";
		$sqlDelete = mysqli_query($connect, $queryDelete);
		
		if ($sqlDelete)
		{
			// delete the detail retur data based on retur id and retur no
			$queryDeleteDetail = "DELETE FROM as_detail_retur_suppliers WHERE returID = '$returID' AND returNo = '$returNo'";
			$sqlDeleteDetail = mysqli_query($connect, $queryDeleteDetail);
		}

		// redirect to the retur supplier page
		header("Location: retur_suppliers.php?msg=Data retur pembelian berhasil dihapus/dibatalkan");
	} // close bracket
	
	// if the module is returbuy and action is cancel
	elseif ($module == 'returbuy' && $act == 'cancel')
	{
		// redirect to the retur supplier page
		header("Location: retur_suppliers.php?msg=Transaksi retur pembelian dibatalkan.");
	}
	
	// if the module is retur buy and act is input
	elseif ($module == 'returbuy' && $act == 'input')
	{
		$createdDate = date('Y-m-d H:i:s');
		$staffID = $_SESSION['staffID'];
		$sName = $_SESSION['staffCode']." ".$_SESSION['staffName'];
		$returNo = mysqli_real_escape_string($connect, $_POST['returNo']);
		$rDate = mysqli_real_escape_string($connect, $_POST['returDate']);
		$r2Date = explode("-", $rDate);
		$returDate = $r2Date[2]."-".$r2Date[1]."-".$r2Date[0];
		$invoiceNo = mysqli_real_escape_string($connect, $_POST['invoiceNo']);
		$supplierID = mysqli_real_escape_string($connect, $_POST['supplierID']);
		$supplierName = mysqli_real_escape_string($connect, $_POST['supplierName']);
		$supplierAddress = mysqli_real_escape_string($connect, $_POST['supplierAddress']);
		$returType = mysqli_real_escape_string($connect, $_POST['returType']);
		$ppnType = mysqli_real_escape_string($connect, $_POST['ppnType']);
		$ref = mysqli_real_escape_string($connect, $_POST['ref']);
		$note = mysqli_real_escape_string($connect, $_POST['note']);
		
		$factoryID = $_POST['factoryID'];
		$factoryName = $_POST['factoryName'];
		$productID = $_POST['productID'];
		$productName = $_POST['productName'];
		$qty = $_POST['qty'];
		$unitPrice = $_POST['unitPrice'];
		$desc = $_POST['desc'];
		$detailID = $_POST['detailID'];
		$countDetailID = COUNT($detailID);
		
		// save into the retur supplier table
		$queryRetur = "INSERT INTO as_retur_suppliers (	returNo,
														returDate,
														invoiceNo,
														supplierID,
														supplierName,
														supplierAddress,
														returType,
														subtotal,
														ppnType,
														ppn,
														grandtotal,
														staffID,
														staffName,
														ref,
														note,
														createdDate,
														createdUserID,
														modifiedDate,
														modifiedUserID)
												VALUES(	'$returNo',
														'$returDate',
														'$invoiceNo',
														'$supplierID',
														'$supplierName',
														'$supplierAddress',
														'$returType',
														'0',
														'$ppnType',
														'0',
														'0',
														'$staffID',
														'$sName',
														'$ref',
														'$note',
														'$createdDate',
														'$staffID',
														'',
														'')";
														
		$sqlRetur = mysqli_query($connect, $queryRetur);
		
		$returID = mysqli_insert_id($connect);
		
		if ($sqlRetur)
		{
			for ($i = 0; $i < $countDetailID; $i++)
			{
				if ($qty[$i] > 0)
				{
					$subt = $unitPrice[$i] * $qty[$i];
					
					$queryDetail = "INSERT INTO as_detail_retur_suppliers (	returID,
																			returNo,
																			factoryID,
																			factoryName,
																			productID,
																			productName,
																			qty,
																			unitPrice,
																			note,
																			createdDate,
																			createdUserID,
																			modifiedDate,
																			modifiedUserID)
																	VALUES(	'$returID',
																			'$returNo',
																			'$factoryID[$i]',
																			'$factoryName[$i]',
																			'$productID[$i]',
																			'$productName[$i]',
																			'$qty[$i]',
																			'$unitPrice[$i]',
																			'$desc[$i]',
																			'$createdDate',
																			'$staffID',
																			'',
																			'')";
																			
					$save = mysqli_query($connect, $queryDetail);
					
					if ($save)
					{
						// reduction of the stock based on factory id and product id
						$querySP = "UPDATE as_stock_products SET stock=stock-$qty[$i] WHERE factoryID = '$factoryID[$i]' AND productID = '$productID[$i]'";
						mysqli_query($connect, $querySP);
					}
					
					$subtotal = $subtotal + $subt;
				}
			}
			
			if ($ppnType == '1')
			{
				$ppn = $subtotal * 0.1;
			}
			else
			{
				$ppn = 0;
			}
			
			$grandtotal = $subtotal + $ppn;
			
			$queryUpdate = "UPDATE as_retur_suppliers SET subtotal = '$subtotal', ppn = '$ppn', grandtotal = '$grandtotal' WHERE returID = '$returID'";
			mysqli_query($connect, $queryUpdate);
			
			// if the retur type is add to the balance, reduction in the balance based on supplier id on the supplier data
			if ($returType == '2')
			{
				$queryReturSaldo = "UPDATE as_suppliers SET balance=balance+$grandtotal WHERE supplierID = '$supplierID'";
				$sqlReturSaldo = mysqli_query($connect, $queryReturSaldo);
			}
			// if the retur type is credit, reduction the debts about this transactions
			if ($returType == '3')
			{
				$queryReturCash = "UPDATE as_debts SET reductionTotal=reductionTotal+$grandtotal WHERE invoiceNo = '$invoiceNo' AND supplierID = '$supplierID'";
				$sqlReturCash = mysqli_query($connect, $queryReturCash);
			}
		}
		
		header("Location: retur_suppliers.php?module=returbuy&act=finish&invoiceNo=".$invoiceNo."&returNo=".$returNo."&returID=".$returID);
	}
	
	// if the module is returbuy and act is detailretur
	elseif ($module == 'returbuy' && $act == 'detailretur')
	{
		$invoiceNo = $_GET['invoiceNo'];
		$q = mysqli_real_escape_string($connect, $_GET['q']);
		$returID = $_GET['returID'];
		$returNo = $_GET['returNo'];
		
		$queryRetur = "SELECT * FROM as_retur_suppliers WHERE invoiceNo = '$invoiceNo' AND returID = '$returID' AND returNo = '$returNo'";
		$sqlRetur = mysqli_query($connect, $queryRetur);
		$dataRetur = mysqli_fetch_array($sqlRetur);
		
		if ($dataRetur['returType'] == '1')
		{
			$returType = "CASH";
		}
		elseif ($dataRetur['returType'] == '2')
		{
			$returType = "SALDO";
		}
		else
		{
			$returType = "CREDIT";
		}
		
		if ($dataRetur['ppnType'] == '1')
		{
			$ppnType = "PPN";
			$ppn = rupiah($dataRetur['ppn']);
		}
		else
		{
			$ppnType = "NO PPN";
			$ppn = rupiah(0);
		}
		
		// assign to the tpl
		$smarty->assign("returID", $dataRetur['returID']);
		$smarty->assign("returNo", $dataRetur['returNo']);
		$smarty->assign("returDate", tgl_indo2($dataRetur['returDate']));
		$smarty->assign("invoiceNo", $dataRetur['invoiceNo']);
		$smarty->assign("supplierID", $dataRetur['supplierID']);
		$smarty->assign("supplierName", $dataRetur['supplierName']);
		$smarty->assign("supplierAddress", $dataRetur['supplierAddress']);
		$smarty->assign("returType", $returType);
		$smarty->assign("subtotal", rupiah($dataRetur['subtotal']));
		$smarty->assign("ppnType", $dataRetur['ppnType']);
		$smarty->assign("ppn", rupiah($dataRetur['ppnType']));
		$smarty->assign("grandtotal", rupiah($dataRetur['grandtotal']));
		$smarty->assign("ref", $dataRetur['ref']);
		$smarty->assign("note", $dataRetur['note']);
		
		// show the retur detail
		$queryReturDetail = "SELECT * FROM as_detail_retur_suppliers WHERE returID = '$dataRetur[returID]' AND returNo = '$dataRetur[returNo]' ORDER BY detailID ASC";
		$sqlReturDetail = mysqli_query($connect, $queryReturDetail);
		
		$i = 1;
		while ($dtReturDetail = mysqli_fetch_array($sqlReturDetail))
		{
			$subtotal = rupiah($dtReturDetail['qty'] * $dtReturDetail['unitPrice']);
			
			$dataReturDetail[] = array(	'detailID' => $dtReturDetail['detailID'],
										'factoryName' => $dtReturDetail['factoryName'],
										'productName' => $dtReturDetail['productName'],
										'price' => rupiah($dtReturDetail['unitPrice']),
										'note' => $dtReturDetail['note'],
										'qty' => $dtReturDetail['qty'],
										'no' => $i
										);
			$i++;
		}
		
		$smarty->assign("dataReturDetail", $dataReturDetail);
		$smarty->assign("page", $_GET['page']);
		$smarty->assign("q", $q);
		
		$smarty->assign("breadcumbTitle", "Retur Pembelian");
		$smarty->assign("breadcumbTitleSmall", "Halaman untuk melakukan retur pembelian.");
		$smarty->assign("breadcumbMenuName", "Retur");
		$smarty->assign("breadcumbMenuSubName", "Retur Pembelian");
	}
	
	// if module retur buy and act is finish
	elseif ($module == 'returbuy' && $act == 'finish')
	{
		$invoiceNo = $_GET['invoiceNo'];
		$returID = $_GET['returID'];
		$returNo = $_GET['returNo'];
		
		$queryRetur = "SELECT * FROM as_retur_suppliers WHERE invoiceNo = '$invoiceNo' AND returID = '$returID' AND returNo = '$returNo'";
		$sqlRetur = mysqli_query($connect, $queryRetur);
		$dataRetur = mysqli_fetch_array($sqlRetur);
		
		if ($dataRetur['returType'] == '1')
		{
			$returType = "CASH";
		}
		elseif ($dataRetur['returType'] == '2')
		{
			$returType = "SALDO";
		}
		else
		{
			$returType = "CREDIT";
		}
		
		if ($dataRetur['ppnType'] == '1')
		{
			$ppnType = "PPN";
			$ppn = rupiah($dataRetur['ppn']);
		}
		else
		{
			$ppnType = "NO PPN";
			$ppn = rupiah(0);
		}
		
		// assign to the tpl
		$smarty->assign("returID", $dataRetur['returID']);
		$smarty->assign("returNo", $dataRetur['returNo']);
		$smarty->assign("returDate", tgl_indo2($dataRetur['returDate']));
		$smarty->assign("invoiceNo", $dataRetur['invoiceNo']);
		$smarty->assign("supplierID", $dataRetur['supplierID']);
		$smarty->assign("supplierName", $dataRetur['supplierName']);
		$smarty->assign("supplierAddress", $dataRetur['supplierAddress']);
		$smarty->assign("returType", $returType);
		$smarty->assign("subtotal", rupiah($dataRetur['subtotal']));
		$smarty->assign("ppnType", $ppnType);
		$smarty->assign("ppn", rupiah($dataRetur['ppn']));
		$smarty->assign("grandtotal", rupiah($dataRetur['grandtotal']));
		$smarty->assign("ref", $dataRetur['ref']);
		$smarty->assign("note", $dataRetur['note']);
		
		// show the retur detail
		$queryReturDetail = "SELECT * FROM as_detail_retur_suppliers WHERE returID = '$dataRetur[returID]' AND returNo = '$dataRetur[returNo]' ORDER BY detailID ASC";
		$sqlReturDetail = mysqli_query($connect, $queryReturDetail);
		
		$i = 1;
		while ($dtReturDetail = mysqli_fetch_array($sqlReturDetail))
		{
			$subtotal = rupiah($dtReturDetail['qty'] * $dtReturDetail['unitPrice']);
			
			$dataReturDetail[] = array(	'detailID' => $dtReturDetail['detailID'],
										'factoryName' => $dtReturDetail['factoryName'],
										'productName' => $dtReturDetail['productName'],
										'price' => rupiah($dtReturDetail['unitPrice']),
										'note' => $dtReturDetail['note'],
										'subtotal' => $subtotal,
										'qty' => $dtReturDetail['qty'],
										'no' => $i
										);
			$i++;
		}
		
		$smarty->assign("dataReturDetail", $dataReturDetail);
		$smarty->assign("page", $_GET['page']);
		
		$smarty->assign("breadcumbTitle", "Retur Pembelian");
		$smarty->assign("breadcumbTitleSmall", "Halaman untuk melakukan retur pembelian.");
		$smarty->assign("breadcumbMenuName", "Retur");
		$smarty->assign("breadcumbMenuSubName", "Retur Pembelian");
	}
	
	// if the module returbuy and act is add
	elseif ($module == 'returbuy' && $act == 'add')
	{
		// get last sort retur buy number ID
		$queryNoRetur = "SELECT returNo FROM as_retur_suppliers ORDER BY returNo DESC LIMIT 1";
		$sqlNoRetur = mysqli_query($connect, $queryNoRetur);
		$numsNoRetur = mysqli_num_rows($sqlNoRetur);
		$dataNoRetur = mysqli_fetch_array($sqlNoRetur);
		
		$start = substr($dataNoRetur['returNo'],2-7);
		$next = $start + 1;
		$tempNo = strlen($next);
		
		if ($numsNoRetur == '0')
		{
			$retNo = "00000";
		}
		elseif ($tempNo == 1)
		{
			$retNo = "00000";
		}
		elseif ($tempNo == 2)
		{
			$retNo = "0000";
		}
		elseif ($tempNo == 3)
		{
			$retNo = "000";
		}
		elseif ($tempNo == 4)
		{
			$retNo = "00";
		}
		elseif ($tempNo == 5)
		{
			$retNo = "0";
		}
		elseif ($tempNo == 6)
		{
			$retNo = "";
		}
		
		$returNo = "RB".$retNo.$next;
		
		$smarty->assign("returNo", $returNo);
		$smarty->assign("returDate", tgl_indo2(date('Y-m-d')));
		
		$invoiceNo = $_GET['invoiceNo'];
		
		// show the bbm data
		$queryBBuy = "SELECT * FROM as_buy_transactions WHERE invoiceNo = '$invoiceNo'";
		$sqlBBuy = mysqli_query($connect, $queryBBuy);
		$dataBBuy = mysqli_fetch_array($sqlBBuy);
		$numsBBuy = mysqli_num_rows($sqlBBuy);
		
		$smarty->assign("numsBBuy", $numsBBuy);
		
		// assign to the tpl
		$smarty->assign("invoiceNo", $invoiceNo);
		$smarty->assign("supplierID", $dataBBuy['supplierID']);
		$smarty->assign("supplierName", $dataBBuy['supplierName']);
		$smarty->assign("supplierAddress", $dataBBuy['supplierAddress']);
		$smarty->assign("ppnType", $dataBBuy['ppnType']);
		$smarty->assign("ppn", $dataBBuy['ppn']);
		
		// show the bbm detail
		$queryBbmDetail = "SELECT * FROM as_detail_bbm WHERE bbmNo = '$dataBBuy[bbmNo]' ORDER BY detailID ASC";
		$sqlBbmDetail = mysqli_query($connect, $queryBbmDetail);
		
		$i = 1;
		while ($dtBbmDetail = mysqli_fetch_array($sqlBbmDetail))
		{
			// count stock total based on productID
			$queryStock = "SELECT SUM(stock) as stockAmount FROM as_stock_products WHERE productID = '$dtBbmDetail[productID]' AND factoryID = '$dtBbmDetail[factoryID]'";
			$sqlStock = mysqli_query($connect, $queryStock);
			$dataStock = mysqli_fetch_array($sqlStock);
			
			$subtotal = $dtBbmDetail['receiveQty'] * $dtBbmDetail['price'];
			
			$dataBbmDetail[] = array(	'detailID' => $dtBbmDetail['detailID'],
										'bbmNo' => $dtBbmDetail['bbmNo'],
										'bbmFaktur' => $dtBbmDetail['bbmFaktur'],
										'productID' => $dtBbmDetail['productID'],
										'productName' => $dtBbmDetail['productName'],
										'price' => $dtBbmDetail['price'],
										'pricerp' => rupiah($dtBbmDetail['price']),
										'qty' => $dtBbmDetail['qty'],
										'receiveQty' => $dtBbmDetail['receiveQty'],
										'status' => $dtBbmDetail['receiveStatus'],
										'factoryID' => $dtBbmDetail['factoryID'],
										'factoryName' => $dtBbmDetail['factoryName'],
										'subtotal' => rupiah($subtotal),
										'note' => $dtBbmDetail['note'],
										'stockAmount' => $dataStock['stockAmount'],
										'no' => $i
										);
			$i++;
		}
		
		$smarty->assign("dataBbmDetail", $dataBbmDetail);
			
		$smarty->assign("breadcumbTitle", "Retur Pembelian");
		$smarty->assign("breadcumbTitleSmall", "Halaman untuk melakukan retur pembelian.");
		$smarty->assign("breadcumbMenuName", "Retur");
		$smarty->assign("breadcumbMenuSubName", "Retur Pembelian");
	}

	elseif ($module == 'returbuy' && $act == 'search')
	{
		$q = mysqli_real_escape_string($connect, $_GET['q']);
		$sDate = mysqli_real_escape_string($connect, $_GET['startDate']);
		$eDate = mysqli_real_escape_string($connect, $_GET['endDate']);
		
		$smarty->assign("startDate", $sDate);
		$smarty->assign("endDate", $eDate);
		
		$s2Date = explode("-", $sDate);
		$e2Date = explode("-", $eDate);
		
		$startDate = $s2Date[2]."-".$s2Date[1]."-".$s2Date[0];
		$endDate = $e2Date[2]."-".$e2Date[1]."-".$e2Date[0];
		
		// showing up the retur data
		if ($sDate != '' || $eDate != '')
		{
			$queryRetur = "SELECT * FROM as_retur_suppliers WHERE returNo LIKE '%$q%' AND returDate BETWEEN '$startDate' AND '$endDate' ORDER BY returNo DESC";
		}
		else
		{
			$queryRetur = "SELECT * FROM as_retur_suppliers WHERE returNo LIKE '%$q%' ORDER BY returNo DESC";	
		}
		$sqlRetur = mysqli_query($connect, $queryRetur);
		
		// fetch data
		$i = 1 + $position;
		while ($dtRetur = mysqli_fetch_array($sqlRetur))
		{
			if ($dtRetur['returType'] == '1')
			{
				$returType = "CASH";
			}
			elseif ($dtRetur['returType'] == '2')
			{
				$returType = "SALDO";
			}
			else
			{
				$returType = "CREDIT";
			}
			
			if ($dtRetur['ppnType'] == '1')
			{
				$ppnType = "PPN";
				$ppn = rupiah($dtRetur['ppn']);
			}
			else
			{
				$ppnType = "NO PPN";
				$ppn = "";
			}
			
			$dataRetur[] = array(	'returID' => $dtRetur['returID'],
									'returNo' => $dtRetur['returNo'],
									'returDate' => tgl_indo2($dtRetur['returDate']),
									'invoiceNo' => $dtRetur['invoiceNo'],
									'supplierID' => $dtRetur['supplierID'],
									'supplierName' => $dtRetur['supplierName'],
									'supplierAddress' => $dtRetur['supplierAddress'],
									'returType' => $returType,
									'subtotal' => rupiah($dtRetur['subtotal']),
									'ppnType' => $ppnType,
									'ppn' => rupiah($dtRetur['ppn']),
									'grandtotal' => rupiah($dtRetur['grandtotal']),
									'staffID' => $dtRetur['staffName'],
									'staffName' => $dtRetur['staffName'],
									'ref' => $dtRetur['ref'],
									'note' => $dtRetur['note'],
									'no' => $i);
			$i++;
		}
		
		$smarty->assign("dataRetur", $dataRetur);
		$smarty->assign("page", $_GET['page']);
		$smarty->assign("q", $q);
		
		$smarty->assign("msg", $_GET['msg']);
		$smarty->assign("breadcumbTitle", "Retur Pembelian");
		$smarty->assign("breadcumbTitleSmall", "Halaman untuk melakukan retur pembelian.");
		$smarty->assign("breadcumbMenuName", "Retur");
		$smarty->assign("breadcumbMenuSubName", "Retur Pembelian");
	}
	
	else
	{
		// create new object pagination
		$p = new PaginationReturSupplier;
		// limit 20 data for page
		$limit  = 30;
		$position = $p->searchPosition($limit);
		
		// showing up the retur data
		$queryRetur = "SELECT * FROM as_retur_suppliers ORDER BY returID DESC LIMIT $position,$limit";
		$sqlRetur = mysqli_query($connect, $queryRetur);
		
		// fetch data
		$i = 1 + $position;
		while ($dtRetur = mysqli_fetch_array($sqlRetur))
		{
			if ($dtRetur['returType'] == '1')
			{
				$returType = "CASH";
			}
			elseif ($dtRetur['returType'] == '2')
			{
				$returType = "SALDO";
			}
			else
			{
				$returType = "CREDIT";
			}
			
			if ($dtRetur['ppnType'] == '1')
			{
				$ppnType = "PPN";
				$ppn = rupiah($dtRetur['ppn']);
			}
			else
			{
				$ppnType = "NO PPN";
				$ppn = "";
			}
			
			$dataRetur[] = array(	'returID' => $dtRetur['returID'],
									'returNo' => $dtRetur['returNo'],
									'returDate' => tgl_indo2($dtRetur['returDate']),
									'invoiceNo' => $dtRetur['invoiceNo'],
									'supplierID' => $dtRetur['supplierID'],
									'supplierName' => $dtRetur['supplierName'],
									'supplierAddress' => $dtRetur['supplierAddress'],
									'returType' => $returType,
									'subtotal' => rupiah($dtRetur['subtotal']),
									'ppnType' => $ppnType,
									'ppn' => rupiah($dtRetur['ppn']),
									'grandtotal' => rupiah($dtRetur['grandtotal']),
									'staffID' => $dtRetur['staffName'],
									'staffName' => $dtRetur['staffName'],
									'ref' => $dtRetur['ref'],
									'note' => $dtRetur['note'],
									'no' => $i);
			$i++;
		}
		
		$smarty->assign("dataRetur", $dataRetur);
		
		// count data
		$queryCountRetur = "SELECT * FROM as_retur_suppliers";
		$sqlCountRetur = mysqli_query($connect, $queryCountRetur);
		$amountData = mysqli_num_rows($sqlCountRetur);
		
		$amountPage = $p->amountPage($amountData, $limit);
		$pageLink = $p->navPage($_GET['page'], $amountPage);
		
		$smarty->assign("pageLink", $pageLink);
		$smarty->assign("page", $_GET['page']);
		
		$smarty->assign("msg", $_GET['msg']);
		$smarty->assign("breadcumbTitle", "Retur Pembelian");
		$smarty->assign("breadcumbTitleSmall", "Halaman untuk melakukan retur pembelian.");
		$smarty->assign("breadcumbMenuName", "Retur");
		$smarty->assign("breadcumbMenuSubName", "Retur Pembelian");
	}
	
	$smarty->assign("module", $module);
	$smarty->assign("act", $act);
}

// include footer
include "footer.php";
?>