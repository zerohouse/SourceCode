<?php
include "connect_db.php";

if(!isset($_POST['is_ajax'])) exit;
if(!isset($_POST['find_id'])) exit;
$is_ajax=$_POST['is_ajax'];
$find_id = $_POST['find_id'];

$sql = "select *from user_db where userid = '$find_id'";
$find_db = mysql_query($sql, $connect);
$list = mysql_num_rows($find_db);

$sql2 = "select *from g_$find_id where fr_id = '$user_id'";
$his_db = mysql_query($sql2, $connect);
$onlist = mysql_num_rows($his_db);

$sql3 = "select `fr_on`from g_$find_id where fr_id = '$user_id'";
$fr = mysql_query($sql3, $connect);
$fr_on = mysql_fetch_array($fr);



if($list){
	if($onlist){
			if($fr_on[0]) {
					echo "already_fr";}
			else{
					echo "already";}
					}
		else{
		echo "success";
		/* fr_sort = 요청하는 사람이 상대편을 넣을 그룹 fr_on = 1 친구 상태 */
		$request = "insert into g_$find_id (fr_id, fr_sort, fr_on, date)";
		$request.= "values ('$user_id','1','0',now())";
		mysql_query($request,$connect);
			}
		}
else{
exit;}
?>