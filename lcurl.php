<?php
/**
 * @Author: LN
 * @Date:   2020-05-21 13:56:55
 * @Last Modified by:   LN
 * @Last Modified time: 2020-05-26 13:57:21
 */
$url="http://www.yaqi.net/";
 //1.初始化，创建一个新cURL资源
 $ch = curl_init();
//2.设置URL和相应的选项
 curl_setopt($ch, CURLOPT_URL, $url);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, false);
//3.抓取URL并把它传递给浏览器
 $a=curl_exec($ch);
file_put_contents("./test1.html",$a);	
//4.关闭cURL资源，并且释放系统资源
 curl_close($ch);

