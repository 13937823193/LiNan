<?php
/**
 * @Author: LN
 * @Date:   2020-06-04 16:01:31
 * @Last Modified by:   LN
 * @Last Modified time: 2020-06-04 20:05:53
 */
$id=$_GET['id'];
$name = $_POST['text']; 
$conn = mysqli_connect("127.0.0.1","root","123456");
mysqli_select_db($conn,"liuyan");
mysqli_query($conn,"set names utf8");
if(isset($_POST["submit"]))
{ 
$query = "insert into huifu(userid,name) values('" . $id. "','" . $name . "')";
$querya = mysqli_query($conn,$query);
header("location:huifucunchu.php?id=$id");
}

