<?php
/**
 * @Author: LN
 * @Date:   2020-06-02 15:47:17
 * @Last Modified by:   LN
 * @Last Modified time: 2020-06-11 17:22:22
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$name=$_POST['text'];
$conn = new mysqli("127.0.0.1", "root", "123456");
mysqli_select_db($conn,"liuyan");
mysqli_set_charset($conn,"utf8");

if(isset($_POST["submit"]))
{
    $sql = "insert into mytable(name) values('" . $name . "')";
	$result = mysqli_query($conn, $sql);
	var_dump($result);	

}



header("location:liuyan.php");


