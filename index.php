<?php
$connect=mysql_connect("127.0.0.1","root",""); 
if(!$connect){
	echo "Mysql Connect Error!";
}else{
	echo "mysql 连接成功";
}
mysql_close();
//phpinfo();
