<?php
include '../lib/config.php';
include '../lib/function.php';
include '../lib/excel_reader.php';
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
		$upload_button = "master_agent.php?page=form_upload";

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
			$row->agent_active_status = false;
			$row->agent_file_come = false;
			$row->agent_file_process = false;
			$action = "master_agent.php?page=save";
		}

		include '../views/master_agent/form.php';
		get_footer();
	break;
	case 'form_upload';
		get_header();
			$close_button = "master_agent.php?page=list";
			$action = "master_agent.php?page=save_upload";
			include '../views/master_agent/form_upload.php';
		get_footer();
	break;
	
	
	case 'save_upload':

		extract($_POST);
		$type_file   = $_FILES['file']['type'];
	
					$data = new Spreadsheet_Excel_Reader($_FILES['file']['tmp_name']);
					$hasildata = $data->rowcount($sheet_index=0);
				for($j=2; $j<=$hasildata; $j++){
				
								
									
									$nomer_ktp 			= addslashes(trim($data->val($j,2)));  		
									$kota			 	= addslashes(trim(strtolower($data->val($j,3)))); 		
									$pic_ars 			= addslashes(trim($data->val($j,4)));		 		 
									$month				= (trim($data->val($j,5))); 			
									$kode_agen 			= trim($data->val($j,6)); 			
									$nama_agen			= addslashes(trim(strtolower($data->val($j,7)))); 			
									$home_city			= trim(strtolower($data->val($j,8))); 				
									$no_telp			= trim($data->val($j,9)); 
									$tempat_lahir		= trim($data->val($j,10)); 	
									$tgl_lahir			= trim($data->val($j,11)); 
									$office_city		= trim($data->val($j,12)); 	
									$nama_atasan		= addslashes(trim(strtolower($data->val($j,13)))); 	
									$joint_date			= trim(($data->val($j,14))); 
									$entry_date			= trim(($data->val($j,15)));	
									$jenis_lisensi		= trim(strtolower($data->val($j,16)));
									$tgl_ujian			= trim(($data->val($j,17))); 	
									$kota_ujian			= trim($data->val($j,18));
									$registrasi			= trim($data->val($j,19));
									$exam_status		= trim($data->val($j,20)); 
									$nama_cabang		= trim($data->val($j,21)); 
									$dc_regional		= trim(strtolower($data->val($j,22)));	
									$status				= trim($data->val($j,23)); 									
									$berkas_datang		= trim(($data->val($j,24))); 	
									$berkas_proses 		= trim(($data->val($j,25))); 	
									$ses_id		=session_id();
								if($nomer_ktp != ''){
									$list = "'','$nomer_ktp', '$kota','$pic_ars','$month','$kode_agen','$nama_agen','$home_city'
									,'$no_telp', '$tempat_lahir','$tgl_lahir','$office_city','$nama_atasan','$joint_date','$entry_date'
									,'$jenis_lisensi', '$tgl_ujian','$kota_ujian','$registrasi','$exam_status','$nama_cabang','$dc_regional'
									,'$status','$berkas_datang','$berkas_proses','$ses_id'";
									create_tmp($list);	
								}
				
					
									
										
							
							
						}
											
					
					
	//echo"<script> window.location='agent.php?page=agent_list_cek'";
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