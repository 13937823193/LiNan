<?php
function news($pageNum = 1, $pageSize = 3)
{
    $array = array();
$conn=mysqli_connect("127.0.0.1","root","123456");
mysqli_select_db($conn,"liuyan");
mysqli_set_charset($conn,"utf8");
    // limit为约束显示多少条信息，后面有两个参数，第一个为从第几个开始，第二个为长度
    $rs = "select * from mytable limit " . (($pageNum - 1) * $pageSize) . "," . $pageSize;
    $r = mysqli_query($conn, $rs);
    while ($obj = mysqli_fetch_object($r)) {
        $array[] = $obj;
    }
    mysqli_close($coon,"jereh");
    return $array;
}

function allNews()
{
$conn=mysqli_connect("127.0.0.1","root","123456");
mysqli_select_db($conn,"liuyan");
mysqli_set_charset($conn,"utf8");
    $rs = "select count(*) num from mytable"; //可以显示出总页数
    $r = mysqli_query($conn, $rs);
    $obj = mysqli_fetch_object($r);
    mysqli_close($coon,"jereh");
    return $obj->num;
}
	    @$allNum = allNews();
    @$pageSize = '3'; //约定没页显示几条信息
    @$pageNum = empty($_GET["pageNum"])?1:$_GET["pageNum"];
    @$endPage = ceil($allNum/$pageSize); //总页数
    @$array = news($pageNum,$pageSize);