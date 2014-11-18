<?php

function select(){
	$query = mysql_query("select *
						 from training_category");
	return $query;
}

function read_id($id){
	$query = mysql_query("select * from training_category where training_category_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}

function create($data){
	mysql_query("insert into training_category values(".$data.")");
}

function update($data, $id){
	mysql_query("update training_category set ".$data." where training_category_id = '$id'");
}

function delete($id){
	mysql_query("delete from training_category  where training_category_id = '$id'");
}


?>