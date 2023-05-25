<?php
require_once "../model/Symposia.php";
function EnableMenuItem($menuitem){
	$obj = new DB();
	$query = 'select * from menuitems where item="'.$menuitem.'"';
	$result = $obj->GetQueryResult($query);
	$row=$result->fetch_assoc();
	return $row["value"];
}
?>
