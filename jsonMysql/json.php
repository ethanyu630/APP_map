<?php
//連結資料庫
$hostname_connSQL = "localhost";	//資料庫主機
$database_connSQL = "hotel";		//資料庫名稱
$username_connSQL = "admin";			//帳號
$password_connSQL = "123456";		//密碼
$connSQL = mysql_pconnect($hostname_connSQL, $username_connSQL, $password_connSQL) or trigger_error(mysql_error(),E_USER_ERROR);
mysql_query("SET NAMES UTF8"); 

//讀取指定資料表內容
mysql_select_db($database_connSQL, $connSQL);
$query_Recordset1 = "SELECT * FROM hoteldata";
$Recordset1 = mysql_query($query_Recordset1, $connSQL) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

//將資料表內容化為 json 資料格式
//欄位 name, certification_category, tel, display_addr, poi_addr, traffic_info ,X ,Y
$myArray= array();
do { 
	$myArray[] = $row_Recordset1;
} while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); 
//輸出為 json 資料格式
echo json_encode($myArray);

mysql_free_result($Recordset1);
?>
