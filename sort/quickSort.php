<?php
//$arr = array(3,9,5,8,1,0,4,6,7);
print_r($arr);

//快速排序
function weap($arr,$i,$j){
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
}

?>