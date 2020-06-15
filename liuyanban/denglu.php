<?php 
echo strtotime("10 September 2000"), "\n";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

    if(isset($_POST["submit"]) && $_POST["submit"] == "登陆") 
    { 
        $user = $_POST["username"]; 
        $psw = $_POST["password"]; 
        if($user == "" || $psw == "") 
        { 
            echo "<script>alert('请输入用户名或密码！'); history.go(-1);</script>"; 
        } 
        else 
        { 
            $coon=mysqli_connect("127.0.0.1","root","123456"); 
            mysqli_select_db($coon,"test"); 
            mysqli_query($coon,"set names utf8"); 
            $sql = "select name,sex from mytable where name = '". $user ."' and sex = '". $psw ."'"; 
            $result = mysqli_query($coon,$sql); 
            $num = mysqli_num_rows($result); 
            if($num) 
            { 
                $row = mysqli_fetch_array($result);  //将数据以索引方式储存在数组中 
                echo $row[0]; 
                    header("location:../liuyan/cha.php");
            } 
            else 
            { 
                echo "<script>alert('用户名或密码不正确！');history.go(-1);</script>"; 
            } 
        } 
    } 
    else 
    { 
        echo "<script>alert('提交未成功！'); history.go(-1);</script>"; 
    } 
?>