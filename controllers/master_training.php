<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/master_training_model.php';

$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("master training");

$_SESSION['menu_active'] = 1;

switch ($page) {
	case 'list':
		get_header();

		
		$query = select();
		$add_button = "master_training.php?page=form";


		include '../views/master_training/list.php';
		get_footer();
	break;
	
	case 'form':
		get_header();

		$close_button = "master_training.php?page=list";

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		if($id){

			$row = read_id($id);
			$action = "master_training.php?page=edit&id=$id";
		
		} else{
			
			$row = new stdClass();
			
			$get_code = get_training_code();
			
			$row->training_kode = $get_code;
			$row->training_name = false;
			$row->training_category_id = false;
			$row->training_duration = false;
			$row->training_session = false;
			$row->training_poin_session = false;
			
			$action = "master_training.php?page=save";
		}

		include '../views/master_training/form.php';
		get_footer();
	break;

	case 'save':

		extract($_POST);

		$i_code = get_isset($i_code);
		$i_name = get_isset($i_name);
		$i_category_id = get_isset($i_category_id);
		$i_durasi = get_isset($i_durasi);
		$i_sesi = get_isset($i_sesi);
		$i_poin_sesi = get_isset($i_poin_sesi);

		$data = "'','$i_code', '$i_name', '$i_category_id', '$i_durasi', '$i_sesi', '$i_poin_sesi'";

		create($data);
		edit_training_code();

		header('Location: master_training.php?page=list&did=1');

	break;

	case 'edit':

		extract($_POST);

		$id = get_isset($_GET['id']);
		$i_code = get_isset($i_code);
		$i_name = get_isset($i_name);
		$i_category_id = get_isset($i_category_id);
		$i_durasi = get_isset($i_durasi);
		$i_sesi = get_isset($i_sesi);
		$i_poin_sesi = get_isset($i_poin_sesi);

		$data = " training_kode = '$i_code',
				  training_name = '$i_name',
				  training_category_id = '$i_category_id', 
				  training_duration = '$i_durasi',
				  training_session = '$i_sesi', 
				  training_poin_session = '$i_poin_sesi'";

		
		update($data, $id);

		header('Location: master_training.php?page=list&did=2');

	break;

	case 'delete':

		$id = get_isset($_GET['id']);	

		delete($id);

		header('Location: master_training.php?page=list&did=3');

	break;
}

?>