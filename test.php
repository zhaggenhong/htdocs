<?php
//$arr = array(3,9,5,8,1,0,4,6,7);
//print_r($arr);
//echo "<br>";
//$arrNew = quickSort($arr,0,8);
//print_r($arrNew);
$arr = array('0'=>array('a'=>'a','b'=>'b','c'=>'c'),'1'=>array('1','2','3'),'2'=>array('zhang','2323','dsd'),'3'=>array(1,2,3));
foreach($arr as $key=>&$v){
	if($key==0){
	$v['4'] = '6';
	}
}
print_r($arr);
//插入排序
/*function inserSort($arr){
	$n = count($arr);
	//var_dump($n);
	$i=1;
	for($i;$i<$n;$i++){
		if($arr[$i]< $arr[$i-1]){
			$x = $arr[$i]; 
			$arr[$i] = $arr[$i-1];
			$j = $i-1;
		
			while($x<$arr[$j]){
				$arr[$j+1] = $arr[$j];
				$j--;
				if($j<0) break;
			}
			$arr[$j+1] = $x;
		}
	}
	//print_R($arr);
	return $arr;
}*/
//选择排序
/*function selectMayKey($arr,$n,$i){
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
		echo "<br/>";
	}
	print_r($arr);
	return $arr;
}*/
//简单的选择排序优化
/*function selectSort($arr){
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
}*/

/*function maxHeap($arr,$n){
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
}*/
//快速排序
/*function weap($arr,$i,$j){
	$temp = $arr[$i];
	$arr[$i] = $arr[$j];
	$arr[$j] = $temp;
	return $arr;
}
function quickSort($arr,$low,$high){
	$left = $low;
	$right = $high;
	$tem = $arr[$low];
	if($low<$high){
		while($left<$right){
			while($left<$right && $tem<$arr[$right]){
				$right--;
			}
			$arr = weap($arr,$left,$right);
			while($left<$right && $tem>$arr[$left]){
				$left++;
			}
			$arr = weap($arr,$left,$right);
		}
		$arr = quickSort($arr,$low,$left-1);
		$arr = quickSort($arr,$left+1,$high);
	}
	return $arr;
}*/
?>