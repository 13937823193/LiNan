<?php
/**
 * @Author: LN
 * @Date:   2020-06-03 13:52:37
 * @Last Modified by:   LN
 * @Last Modified time: 2020-06-13 18:20:41
 */
$c=$_GET['id'];
if (empty($c) || $c<0) {
	$c=1;
}
$a=$c*2-2;
$b=2;
var_dump($c);

$conn=mysqli_connect("127.0.0.1","root","123456");
mysqli_select_db($conn,"liuyan");
mysqli_set_charset($conn,"utf8");
$sql="select * from mytable limit $a,$b";
$rows = mysqli_fetch_all(mysqli_query($conn,$sql), MYSQLI_ASSOC);
require'index.html';
$sqld="select count(*) from mytable";
$row=mysqli_query($conn,$sqld);
var_dump($row);

	

for ($i=1; $i<=$cc; $i++) { 
		var_dump($i);
	}	

