<?php

function select(){
	$query = mysql_query("select a.*,b.*
						 from training a
						 JOIN training_category b ON a.training_category_id = b.training_category_id");
	return $query;
}

function read_id($id){
	$query = mysql_query("select * from training where training_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}

function create($data){
	mysql_query("insert into  training values(".$data.")");
}

function update($data, $id){
	mysql_query("update training set ".$data." where training_id = '$id'");
}

function delete($id){
	mysql_query("delete from training  where training_id = '$id'");
}


?>