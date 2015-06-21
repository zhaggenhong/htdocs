<?php
//$arr = array(3,9,5,8,1,0,4,6,7);

print_r($arr);

//冒泡排序
function bubbleSort($arr){
	$n = count($arr);
	for($i=0;$i<$n;$i++){
		for($j=0;$j<$n-$i-1;$j++){
			if($arr[$j]>$arr[$j+1]){
				$tem = $arr[$j];
				$arr[$j] = $arr[$j+1];
				$arr[$j+1] = $tem;
			}
		}
	}
	print_r($arr);
}

