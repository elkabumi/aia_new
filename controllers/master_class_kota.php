<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/master_class_kota_model.php';

$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("master class kota");

$_SESSION['menu_active'] = 1;

switch ($page) {
	case 'list':
		get_header();

		
		$query = select();
		$add_button = "master_class_kota.php?page=form";


		include '../views/master_class_kota/list.php';
		get_footer();
	break;
	
	case 'form':
		get_header();

		$close_button = "master_class_kota.php?page=list";

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		if($id){

			$row = read_id($id);
			$action = "master_class_kota.php?page=edit&id=$id";
		
		} else{
			$get_code = get_city_code();
			
			$row = new stdClass();
			$row->city_kode = $get_code;
			$row->city_name = false;
			$row->city_kuota = false;
			$action = "master_class_kota.php?page=save";
		}

		include '../views/master_class_kota/form.php';
		get_footer();
	break;

	case 'save':

		extract($_POST);
		
		$i_code = get_isset($i_code);
		$i_name = get_isset($i_name);
		$i_kouta = get_isset($i_kouta);
		$data = "'','$i_code', '$i_name','$i_kouta',''";

		create($data);

		header('Location: master_class_kota.php?page=list&did=1');

	break;

	case 'edit':

		extract($_POST);
		$id = get_isset($_GET['id']);	
		$i_code = get_isset($i_code);
		$i_name = get_isset($i_name);
		$i_kouta = get_isset($i_kouta);

		$data = " city_kode = '$i_code', city_name = '$i_name', 	city_kuota='$i_kouta'";

		
		update($data, $id);

		header('Location: master_class_kota.php?page=list&did=2');

	break;

	case 'delete':

		$id = get_isset($_GET['id']);	

		delete($id);

		header('Location: master_class_kota.php?page=list&did=3');

	break;
}

?>