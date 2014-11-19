<?php

function select($where,$limit){
	$query = mysql_query("select * from cities $where order by city_name ASC  $limit");
	return $query;
}

function read_id($id){
	$query = mysql_query("select * from cities where city_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}

function create($data){
	mysql_query("insert into cities values(".$data.")");
}

function update($data, $id){
	mysql_query("update cities set ".$data." where city_id = '$id'");
}

function delete($id){
	mysql_query("delete from cities  where city_id = '$id'");
}
function count_data($where){
	
	$query = mysql_query("SELECT COUNT(city_id)
						 FROM  cities $where order by city_name DESC");
	$query_data = mysql_fetch_row($query);
	$numrows = $query_data[0];
	
	return $numrows;
}

?>