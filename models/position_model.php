<?php

function select(){
	$query = mysql_query("select * from position
			");
	return $query;
}

function read_id($id){
	$query = mysql_query("select * from position where position_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}


function create($data){
	mysql_query("insert into position values(".$data.")");
}

function update($data, $id){
	mysql_query("update position set ".$data." where position_id = '$id'");
}

function delete($id){
	mysql_query("delete from position where position_id = '$id'");
}


?>