<?php

function select(){
	$query = mysql_query("select a.*,b.city_name AS agent_home_city_name
						 from agents a 
						 JOIN cities b ON a.agent_home_city_id =  b.city_id 	");
	return $query;
}

function read_id($id){
	$query = mysql_query("select * from agents where agent_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}

function create($data){
	mysql_query("insert into agents values(".$data.")");
}
function create_tmp($data){
	mysql_query("insert into agent_tmp values(".$data.")");
}

function update($data, $id){
	mysql_query("update agents set ".$data." where agent_id = '$id'");
	
}

function delete($id){
	mysql_query("delete from agents  where agent_id = '$id'");
}


?>