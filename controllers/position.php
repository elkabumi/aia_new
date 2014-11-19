<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/position_model.php';
$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("position");

$_SESSION['menu_active'] = 1;

switch ($page) {
	case 'list':
		get_header();

		
		$query = select();
		$add_button = "position.php?page=form";


		include '../views/position/list.php';
		get_footer();
	break;
	
	case 'form':
		get_header();

		$close_button = "position.php?page=list";

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		if($id){

			$row = read_id($id);
			$action = "position.php?page=edit&id=$id";
			
		} else{
			
			//inisialisasi
			$row = new stdClass();
			$row->position_name = false;
			$row->position_description = false;

			$action = "position.php?page=save";
		}

		include '../views/position/form.php';
		get_footer();
	break;

	case 'save':
	
	

		extract($_POST);

		$i_position_name = get_isset($i_position_name);
		$i_position_description = get_isset($i_position_description);

			$data = "'','$i_position_name','$i_position_description'";

			create($data);

			header('Location: position.php?page=list&did=1');
		
	break;

	case 'edit':

		extract($_POST);

		$id = get_isset($_GET['id']);
		$i_position_name = get_isset($i_position_name);
		$i_position_description = get_isset($i_position_description);
		
					
			$data = " position_name = '$i_position_name',position_description = '$i_position_description'";
			
			update($data, $id);
			
			header('Location: position.php?page=list&did=2');

		
	break;

	case 'delete':

		$id = get_isset($_GET['id']);	

		delete($id);

		header('Location: position.php?page=list&did=3');

	break;
}

?>