<?php
/**
 * @Author: LN
 * @Date:   2020-05-20 19:46:19
 * @Last Modified by:   LN
 * @Last Modified time: 2020-05-26 11:13:55
 */
// 1. 初始化
$url = 'http://www.yaqi.net/';

function http_get_data($url) {  
    $ch = curl_init ();  
    curl_setopt ( $ch, CURLOPT_CUSTOMREQUEST, 'GET' );  
    curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, false );  
    curl_setopt ( $ch, CURLOPT_URL, $url );  
    ob_start ();  
    curl_exec ( $ch );  
    $return_content = ob_get_contents ();  
    ob_end_clean ();  
      
    $return_code = curl_getinfo ( $ch, CURLINFO_HTTP_CODE );  
    return $return_content;  
}  

$return_content = http_get_data($url);  
$filename = './image/';  
$fp= @fopen($filename,"a"); //将文件绑定到流
fwrite($fp,$return_content); //写入文件

preg_match_all("/\"([^\"\(]+\.(gif|jpg|png))/", $return_content,$matchs); 

preg_match_all("/background:url\((http.*\.jpg)/", $return_content,$matchs1);

preg_match_all("/\.\/([^']+\.jpg)'/", $return_content,$matchs2);

preg_match_all("/background:url\('([^']+\.png)/", $return_content,$matchs3);

preg_match_all("/\"([^\"\(]+\.(js|css))/", $return_content,$matchs4); 

$matchs4=str_replace("min/f=","", $matchs4[1]);
$a=explode(",",$matchs4[6]);
$c=array_merge($matchs4,$a); 
unset($c[0],$c[6]);

$a=array_merge($matchs[1],$matchs1[1],$matchs2[1],$matchs3[1],$c); 
$b="http://www.yaqi.net/";
foreach ($a as $k=>$v)
{
 	$v=str_replace("./","", $v);
 	$c=strpos($v,"http");
 	if ($c === false) {
 		$filename = './'.$v;
 		$dir = preg_replace("/\/[^\/]+\.(gif|jpg|png|js|css)/", '', $v);
 		mkdir($dir,0777,true);
 		$url = $b.$v;

 		$return_content = http_get_data($url);   
		file_put_contents($filename, $return_content);
 	}
}