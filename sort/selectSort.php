<?php
//$arr = array(3,9,5,8,1,0,4,6,7);
print_r($arr);

//选择排序
function selectMayKey($arr,$n,$i){
	$k = $i ;
	for($j=$i+1;$j<$n;++$j){
		if($arr[$k]>$arr[$j]) $k=$j;
	}
	return $k;
}
function selectSort($arr){
	$n = count($arr);
	$key = 0;
	for($i=0;$i<$n;$i++){
		$key = selectMayKey($arr,$n,$i);
		if($key != $i){
			$tem = $arr[$i];
			$arr[$i] = $arr[$key];
			$arr[$key] = $tem ;
		}
		print_r($arr);
	}
	print_r($arr);
	return $arr;
}
//简单的选择排序优化
function selectSort1($arr){
	$n = count($arr);
	for($i=1;$i<$n/2;$i++){
		$min = $max = $i;
		for($j=$i+1;$j<$n-$i;$j++){
			if($arr[$j]>$arr[$max]) $max = $j;
			if($arr[$j]<$arr[$min]) $min = $j;
		}
		$tem = $arr[$i-1];
		$arr[$i-1] =$arr[$min];
		$arr[$min] = $tem;
		$tem = $arr[$n-$i];
		$arr[$n-$i] = $arr[$max];
		$arr[$max] = $tem;
		
	}
	print_r($arr);
}
