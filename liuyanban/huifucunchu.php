<?php
/**
 * @Author: LN
 * @Date:   2020-06-03 17:00:32
 * @Last Modified by:   LN
 * @Last Modified time: 2020-06-11 16:01:35
 */
$id=$_GET['id'];
$name = $_POST['text']; 
$conn = mysqli_connect("127.0.0.1","root","123456");
mysqli_select_db($conn,"liuyan");
mysqli_query($conn,"set names utf8");
$sql = "select userid from huifu where userid = $id"; //SQL语句 
$result = mysqli_fetch_all(mysqli_query($conn,$sql), MYSQLI_ASSOC);
if($result)    //如果已经存在该用户 
{ 
$sqli = "select * from huifu where userid = $id"; //SQL语句 
$rows= mysqli_fetch_all(mysqli_query($conn,$sqli), MYSQLI_ASSOC);
require 'huifu.html';
} else{ 
require 'huifu.html';
}
 


      