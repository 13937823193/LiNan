<?php
/**
 * @Author: LN
 * @Date:   2020-06-11 16:36:18
 * @Last Modified by:   LN
 * @Last Modified time: 2020-06-12 14:55:37
 */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$id=$_GET['id'];
$conn = new mysqli("127.0.0.1", "root", "123456");
mysqli_select_db($conn,"liuyan");
mysqli_set_charset($conn,"utf8");
$sql = "select dianzan from mytable where id=$id";
$row=mysqli_query($conn,$sql);
foreach ($row as $v) {
$sqli="update mytable set dianzan=".$v['dianzan']."+1 where id=$id";
$rows=mysqli_query($conn,$sqli);
}
var_dump($v['dianzan']);
$sqld="select * from aff limit 10,10";
$rowd=mysql_query($conn,$sqld);



