<?php

function select(){
	$query = mysql_query("select *
						 from products");
	return $query;
}

function read_id($id){
	$query = mysql_query("select * from products where product_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result;
}

function create($data){
	mysql_query("insert into products values(".$data.")");
}

function update($data, $id){
	mysql_query("update products set ".$data." where product_id = '$id'");
}

function delete($id){
	mysql_query("delete from products  where product_id = '$id'");
}


?>