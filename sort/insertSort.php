<?php
//$arr = array(3,9,5,8,1,0,4,6,7);

print_r($arr);
//插入排序
function inserSort($arr){
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
}
?>