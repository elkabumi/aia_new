<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/master_barang_model.php';

$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("master barang");

$_SESSION['menu_active'] = 1;

switch ($page) {
	case 'list':
		get_header();

		
		$query = select();
		$add_button = "master_barang.php?page=form";


		include '../views/master_barang/list.php';
		get_footer();
	break;
	
	case 'form':
		get_header();

		$close_button = "master_barang.php?page=list";

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		if($id){

			$row = read_id($id);
			$action = "master_barang.php?page=edit&id=$id";
		
		} else{
			
			$row = new stdClass();
			$row->product_code = false;
			$row->product_name = false;
			$row->product_stock = false;
			$action = "master_barang.php?page=save";
		}

		include '../views/master_barang/form.php';
		get_footer();
	break;

	case 'save':

		extract($_POST);

		$i_code = get_isset($i_code);
		$i_name = get_isset($i_name);
		$i_jumlah = get_isset($i_jumlah);
		$data = "'','$i_code', '$i_name','$i_jumlah'";

		create($data);

		header('Location: master_barang.php?page=list&did=1');

	break;

	case 'edit':

		extract($_POST);

		$id = get_isset($_GET['id']);
		$i_code = get_isset($i_code);
		$i_name = get_isset($i_name);
		$i_jumlah = get_isset($i_jumlah);
		$data = "product_code = '$i_code', product_name = '$i_name', product_stock = '$i_jumlah'";

		
		update($data, $id);

		header('Location: master_barang.php?page=list&did=2');

	break;

	case 'delete':

		$id = get_isset($_GET['id']);	

		delete($id);

		header('Location: master_barang.php?page=list&did=3');

	break;
}

?>