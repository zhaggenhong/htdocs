<?php
//$arr = array(3,9,5,8,1,0,4,6,7);
print_r($arr);

//堆排序
function maxHeap($arr,$n){
	$i = intval(($n-2)/2);
	$child = 2*$i+1;
	while($i>=0){
		
		if($n>$child && $arr[$child]<$arr[$child+1]){
			$child++;
		}
		if($child<$n && $arr[$i]<$arr[$child]){
			$temp = $arr[$i];
			$arr[$i] = $arr[$child];
			$arr[$child] = $temp;	
		}
		$i = $i-1;
		$child = $i*2+1;
		
	}
	return $arr;
}

function heapSort($arr){
	$brr  = $arr;
	$n = count($arr);
	for($i = $n-1;$i>1;$i--){
		$arr = MaxHeap($arr,$i+1);
		$temp = $arr[0];
		$arr[0] = $arr[$i];
		$arr[$i] = $temp;
	}
	print_r($arr);
}
