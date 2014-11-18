<?php
include '../lib/config.php';
include '../lib/function.php';
include '../models/master_agent_model.php';

$page = null;
$page = (isset($_GET['page'])) ? $_GET['page'] : "list";
$title = ucfirst("master agent");

$_SESSION['menu_active'] = 1;

switch ($page) {
	case 'list':
		get_header();

		
		$query = select();
		$add_button = "master_agent.php?page=form";


		include '../views/master_agent/list.php';
		get_footer();
	break;
	
	case 'form':
		get_header();

		$close_button = "master_agent.php?page=list";

		$id = (isset($_GET['id'])) ? $_GET['id'] : null;
		if($id){

			$row = read_id($id);
			
			$row->agent_birth_date =format_date($row->agent_birth_date);
			$row->agent_join_date = format_date($row->agent_join_date);
			$row->agent_entry_date = format_date($row->agent_entry_date);
			$row->agent_exam_date =format_date($row->agent_exam_date);
			$row->agent_file_come = format_date($row->agent_file_come);
			$row->agent_file_process = format_date($row->agent_file_process);
			
			$action = "master_agent.php?page=edit&id=$id";
		
		} else{
			
			$row = new stdClass();
			$row->agent_code = false;
			$row->agent_name = false;
			$row->agent_ktp_number = false;
			$row->agent_pic_ars = false;
			$row->agent_month = false;
			$row->city_id = false;
			$row->agent_home_city_id = false;
			$row->agent_phone = false;
			$row->agent_birth_place = false;
			$row->agent_birth_date = false;
			$row->agent_ofice_city_id = false;
			$row->agent_leader = false;
			$row->agent_join_date = false;
			$row->agent_entry_date = false;
			$row->agent_license_type = false;
			$row->agent_exam_date = false;
			$row->agent_exam_city_id = false;
			$row->agent_registration = false;
			$row->agent_exam_status = false;
			$row->agent_branch_name = false;
			$row->agent_dc_regional = false;
			$row->agent_file_come = false;
			$row->agent_file_process = false;
			$action = "master_agent.php?page=save";
		}

		include '../views/master_agent/form.php';
		get_footer();
	break;

	case 'save':

		extract($_POST);

		$i_code = get_isset($i_code);
		$i_name = get_isset($i_name);
		$i_ktp = get_isset($i_ktp);
		
		$i_pic_ars = get_isset($i_pic_ars);
		$i_month = get_isset($i_month);
		$i_city = get_isset($i_city);
		
		$i_home_city = get_isset($i_home_city);
		$i_phone = get_isset($i_phone);
		$i_birth_place = get_isset($i_birth_place);
		
		$i_birth_date = get_isset($i_birth_date); $i_birth_date = format_back_date($i_birth_date);
		$i_office_city = get_isset($i_office_city);
		$i_leader = get_isset($i_leader);
		
		$i_joint_date = get_isset($i_joint_date); $i_joint_date = format_back_date($i_joint_date);
		$i_entry_date = get_isset($i_entry_date); $i_entry_date = format_back_date($i_entry_date);
		$i_type = get_isset($i_type);
		
		$i_exam_date = get_isset($i_exam_date);  $i_exam_date = format_back_date($i_exam_date);
		$i_exam_city = get_isset($i_exam_city);
		$i_registrasi = get_isset($i_registrasi);
		
		$i_exam = get_isset($i_exam);
		$i_branch = get_isset($i_branch);
		$i_dc = get_isset($i_dc);
		
		$i_status = get_isset($i_status); 
		$i_file_come_date = get_isset($i_file_come_date); $i_file_come_date = format_back_date($i_file_come_date);
		$i_file_process_date = get_isset($i_file_process_date); $i_file_process_date = format_back_date($i_file_process_date);
		
		$data = "'','$i_ktp', '$i_city','$i_pic_ars','$i_month','$i_code','$i_name','$i_home_city'
					,'$i_phone', '$i_birth_place','$i_birth_date','$i_office_city','$i_leader','$i_joint_date','$i_entry_date'
		,'$i_type', '$i_exam_date','$i_exam_city','$i_registrasi','$i_exam','$i_branch','$i_dc'
		,'$i_status','$i_file_come_date','$i_file_process_date'
		";

		create($data);

		header('Location: master_agent.php?page=list&did=1');

	break;

	case 'edit':

		extract($_POST);
		$id = get_isset($_GET['id']);
		$i_code = get_isset($i_code);
		$i_name = get_isset($i_name);
		$i_ktp = get_isset($i_ktp);
		
		$i_pic_ars = get_isset($i_pic_ars);
		$i_month = get_isset($i_month);
		$i_city = get_isset($i_city);
		
		$i_home_city = get_isset($i_home_city);
		$i_phone = get_isset($i_phone);
		$i_birth_place = get_isset($i_birth_place);
		
		$i_birth_date = get_isset($i_birth_date); $i_birth_date = format_back_date($i_birth_date);
		$i_office_city = get_isset($i_office_city);
		$i_leader = get_isset($i_leader);
		
		$i_joint_date = get_isset($i_joint_date); $i_joint_date = format_back_date($i_joint_date);
		$i_entry_date = get_isset($i_entry_date); $i_entry_date = format_back_date($i_entry_date);
		$i_type = get_isset($i_type);
		
		$i_exam_date = get_isset($i_exam_date);  $i_exam_date = format_back_date($i_exam_date);
		$i_exam_city = get_isset($i_exam_city);
		$i_registrasi = get_isset($i_registrasi);
		
		$i_exam = get_isset($i_exam);
		$i_branch = get_isset($i_branch);
		$i_dc = get_isset($i_dc);
		
		$i_status = get_isset($i_status); 
		$i_file_come_date = get_isset($i_file_come_date); $i_file_come_date = format_back_date($i_file_come_date);
		$i_file_process_date = get_isset($i_file_process_date); $i_file_process_date = format_back_date($i_file_process_date);
		
		
		$data = "agent_ktp_number='$i_ktp',city_id='$i_city',agent_pic_ars='$i_pic_ars',agent_month='$i_month',agent_code='$i_code'
,agent_name='$i_name',agent_home_city_id='$i_home_city'
	,agent_phone='$i_phone',agent_birth_place = '$i_birth_place',agent_birth_date='$i_birth_date',agent_ofice_city_id='$i_office_city'
	,agent_leader='$i_leader',agent_join_date='$i_joint_date',agent_entry_date='$i_entry_date',agent_license_type ='$i_type'
	,agent_exam_date='$i_exam_date',agent_exam_city_id='$i_exam_city', 	agent_registration='$i_registrasi',agent_exam_status='$i_exam',agent_branch_name='$i_branch',agent_dc_regional='$i_dc'
		,agent_active_status='$i_status', 	agent_file_come='$i_file_come_date',agent_file_process='$i_file_process_date'
		";

		
	update($data, $id);

		header('Location: master_agent.php?page=list&did=2');

	break;

	case 'delete':

		$id = get_isset($_GET['id']);	

		delete($id);

		header('Location: master_agent.php?page=list&did=3');

	break;
}

?>