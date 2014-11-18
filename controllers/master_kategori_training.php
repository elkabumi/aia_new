<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/master_kategori_training_model.php';

$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("master kategori training");

$_SESSION['menu_active'] = 1;

switch ($page) {
	case 'list':
		get_header();

		
		$query = select();
		$add_button = "master_kategori_training.php?page=form";


		include '../views/master_kategori_training/list.php';
		get_footer();
	break;
	
	case 'form':
		get_header();

		$close_button = "master_kategori_training.php?page=list";

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		if($id){

			$row = read_id($id);
			$action = "master_kategori_training.php?page=edit&id=$id";
		
		} else{
			
			$row = new stdClass();
			$row->training_category_code = false;
			$row->training_category_name = false;
			$action = "master_kategori_training.php?page=save";
		}

		include '../views/master_kategori_training/form.php';
		get_footer();
	break;

	case 'save':

		extract($_POST);

		$i_code = get_isset($i_code);
		$i_name = get_isset($i_name);

		$data = "'','$i_code', '$i_name'";

		create($data);

		header('Location: master_kategori_training.php?page=list&did=1');

	break;

	case 'edit':

		extract($_POST);

		$id = get_isset($_GET['id']);
		$i_code = get_isset($i_code);
		$i_name = get_isset($i_name);

		$data = " training_category_code = '$i_code', training_category_name = '$i_name'";

		
		update($data, $id);

		header('Location: master_kategori_training.php?page=list&did=2');

	break;

	case 'delete':

		$id = get_isset($_GET['id']);	

		delete($id);

		header('Location: master_kategori_training.php?page=list&did=3');

	break;
}

?>