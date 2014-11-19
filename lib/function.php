<?php

function get_training_code(){
	$query = mysql_query("select training_code from counters");
	$result = mysql_fetch_array($query);
	$code = ($result['training_code']) ? $result['training_code'] + 1 : 1;
	
	if(strlen($code) == 1){
		$code = "0000".$code;
	}else if(strlen($code) == 2){
		$code = "000".$code;
	}else if(strlen($code) == 3){
		$code = "00".$code;
	}else if(strlen($code) == 4){
		$code = "0".$code;
	}
	
	return "TR".$code;
}

function edit_training_code(){
	mysql_query("update counters set training_code = training_code + 1");
}

function get_product_code(){
	$query = mysql_query("select product_code from counters");
	$result = mysql_fetch_array($query);
	$code = ($result['product_code']) ? $result['product_code'] + 1 : 1;
	
	if(strlen($code) == 1){
		$code = "0000".$code;
	}else if(strlen($code) == 2){
		$code = "000".$code;
	}else if(strlen($code) == 3){
		$code = "00".$code;
	}else if(strlen($code) == 4){
		$code = "0".$code;
	}
	
	return "BR".$code;
}

function edit_product_code(){
	mysql_query("update counters set product_code = product_code + 1");
}

function month_name($data){
	 $month_name = array("", "januari", "februari","maret","april","mei","juni","juli","agustus","september","oktober","november","desember");
	 return $month_name[$data];
}

function new_date(){
	$new_date = date("Y-m-d H:m:s");
	return $new_date;
}

function get_header(){
	include '../views/layout/header.php';
}

function get_footer(){
	include '../views/layout/footer.php';
}

function get_isset($data){
	$result = (isset($data)) ? $data : null;
	return $result;
}

function format_date($date){

	$date = explode("-", $date);
	$new_date = $date[2]."/".$date[1]."/".$date[0];

	return $new_date;

}
function format_back_date($date){

	$date = explode("/", $date);
	$back_date =  $date[2]."-".$date[1]."-".$date[0];

	return $back_date;

}
function format_back_date2($date){

	$date = explode("/", $date);
	if($date[0] < 10){
		$date[0] = '0'.$date[0];
	}

	if($date[1] < 10){
		$date[1] = '0'.$date[1];
	}
	$back_date =  $date[2]."-".$date[0]."-".$date[1];

	return $back_date;

}
function format_back_date3($date){

	$date = explode("-", $date);
	$back_date =  $date[2]."-".$date[1]."-".$date[0];

	return $back_date;

}
function format_back_date_upload($date){

	$date = explode("/", $date);
	$back_date =  $date[2]."-".$date[0]."-".$date[1];

	return $back_date;

}

function cek_type_file($tipe_file){
	   $hasil = 0; //false 
	   $tipe  = $tipe_file;
	   if (($tipe == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet") or ($tipe == "application/vnd.ms-excel") ) {
		  $hasil = 1; //true
	   }
	   
	   return $hasil;
}
function format_date_xl($date_xl){
	$month=array('Jan'=>'01','Feb'=>'02','Mar'=>'03','Apr'=>'04','May'=>'05','Jun'=>'06','Jul'=>'07','Aug'=>'08','Sep'=>'09','Oct'=>'10','Nov'=>'11','Dec'=>'12');
	$date_xl = explode("-", $date_xl);
	$back_date =  $date_xl[2]."-".$month[$date_xl[1]]."-".$date_xl[0];
	
	return $back_date;
}

function get_user_data(){
	$query_user = mysql_query("select * from users where user_id = '".$_SESSION['user_id']."'");
	$row_user = mysql_fetch_object($query_user);

	$name = ucfirst($row_user->user_name);

	switch($row_user->user_type_id){
		case 1: $type = "Admin"; break;
		case 2: $type = "Trainer "; break;
		case 3: $type = "Trainer External"; break;
		case 4: $type = "PBD"; break;
		case 5: $type = "RDH"; break;
	}
	
	$user_img = $row_user->user_img;

	return array($name, $type, $user_img);
}

function create_report($title) {
				$format =			header("Pragma: public");
									header("Expires: 0");
									header("Cache-Control : must-revalidate, post-check=0, pre-check=0");
									header("Content-type: application/force-download");
								    header("Content-type: application/octet-stream");
									header("Content-type: application/download");
								    header("Content-Disposition: attachment; filename=$title.xls");
								    header("Content-transfer-encoding: binary");
return $format;
}



?>