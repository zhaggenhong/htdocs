<?php 
//读取一个数将数字转化为大写的数组比如1342392 = 壹佰叁拾肆万贰仟叁佰玖拾贰
echo exchangNum("212530003210");
function singleNum($num){
	switch($num){
		case 0:
			$cNum =  '零';
			break;
		case 1:
			$cNum =  '壹';
			break;
		case 2:
			$cNum =  '贰';
			break;
		case 3:
			$cNum =  '叁';
			break;
		case 4:
			$cNum =  '肆';
			break;
		case 5:
			$cNum =  '伍';
			break;
		case 6:
			$cNum =  '陆';
			break;
		case 7:
			$cNum =  '柒';
			break;
		case 8:
			$cNum =  '捌';
			break;
		case 9:
			$cNum =  '玖';
			break;
	}
	return $cNum;
}
function threeNum ($num){
	$nums = str_split($num);
	if($nums[1]==0 && $nums[2]==0){
		$cNum = singleNum($nums[0]).'佰';
	}elseif($nums[1]==0 && $nums[2]!=0){
		$cNum = singleNum($nums[0]).'佰零'.singleNum($nums[2]);
	}elseif($nums[1]!=0 && $nums[2]==0){
		$cNum = singleNum($nums[0]).'佰'.singleNum($nums[1]).'拾';
	}else{
		$cNum = singleNum($nums[0]).'佰'.singleNum($nums[1]).'拾'.singleNum($nums[2]);
	}
	return $cNum;
}
function twoNum($num){
	$nums = str_split($num);
	if($nums[1]==0){
		$cNum = singleNum($nums[0])."拾";
	}else{
		$cNum = singleNum($nums[0]).'拾'.singleNum($nums[0]);
	}
	return $cNum;
}
function twoNumTou($num){
	$nums = str_split($num);
	if($nums[1]==0){
			if($nums[0]==1){
				$cNum = "拾";
			}else{
				$cNum = singleNum($nums[0])."拾";
			}
		}else{
			$cNum = singleNum($nums[0]).'拾'.singleNum($nums[1]);
		}
	return $cNum;
}
function fourNum($num){
	$nums = str_split($num);
	$numThree = implode(array_slice($nums,1,count($nums)));
	if($nums[1]==0 && $nums[2]==0 && $nums[3]==0){
		$cNum = singleNum($nums[0]).'仟';
	}elseif($nums[1]==0 && $nums[3]!=0){
		if($nums[2]==0){
			$cNum = singleNum($nums[0]).'仟零'.singleNum($nums[3]);
		}else{
			$cNum = singleNum($nums[0]).'仟零'.threeNum($numThree);
		}
	}else{
		$cNum = singleNum($nums[0]).'仟'.threeNum($numThree);
	}
	return $cNum;
}
function wanji($num){
	if(strlen($num)==5){
		$nums = str_split($num);
		if($nums[1]==0 && $nums[2]==0 && $nums[3]==0 && $nums[4]==0){
			$cNum = singleNum($nums[0]).'万';
		}elseif($nums[1]==0 && $nums[2]==0 && $nums[3]==0 && $nums[4]!=0){
			$cNum = singleNum($nums[0]).'万零'.singleNum($nums[4]);
		}elseif($nums[1]==0 && $nums[2]==0 && $nums[3]!=0){
			$numtwo = implode(array_slice($nums,3,2));
			$cNum = singleNum($nums[0]).'万零'.twoNum($numtwo);
		}elseif($nums[1]==0 && $nums[2]!=0 ){
			$numthree = implode(array_slice($nums,2,3));
			$cNum = singleNum($nums[0]).'万零'.threeNum($numthree);
		}else{
			$numfour = implode(array_slice($nums,1,4));
			$cNum = singleNum($nums[0]).'万'.fourNum($numfour);
		}
	}elseif(strlen($num)>5 && strlen($num)<9){
		$nums = str_split($num);
		if(strlen($num) == 6){
			$numTou = implode(array_slice($nums,0,2));
			$numTous = str_split($numTou);
			$numWei = implode(array_slice($nums,2,4));
			$numWeis = str_split($numWei);
			if($numTous[1]==0 && $numWeis[0]!=0 ){
				$cNum = twoNumTou($numTou)."万零";
			}else{
				$cNum = twoNumTou($numTou)."万";
			}
		}elseif(strlen($num) == 7){
			$numTou = implode(array_slice($nums,0,3));
			$numTous = str_split($numTou);
			$numWei = implode(array_slice($nums,3,4));
			$numWeis = str_split($numWei);
			if($numTous[2]==0 && $numWeis[0]!=0 ){
				$cNum = threeNum($numTou)."万零";
			}else{
				$cNum = threeNum($numTou)."万";
			}
		}else{
			$numTou = implode(array_slice($nums,0,4));
			$numTous = str_split($numTou);
			$numWei = implode(array_slice($nums,4,4));
			$numWeis = str_split($numWei);
			if($numTous[3]==0 && $numWeis[0]!=0 ){
				$cNum = fourNum($numTou)."万零";
			}else{
				$cNum = fourNum($numTou)."万";
			}
		}
		if($numWeis[0]==0 && $numWeis[1]==0 && $numWeis[2]==0 && $numWeis[3]==0){
			$cNum = $cNum;
		}elseif($numWeis[0]==0 && $numWeis[1]==0 && $numWeis[2]==0 && $numWeis[3]!=0){
			$cNum = $cNum.'零'.singleNum($numWeis[3]);
		}elseif($numWeis[0]==0 && $numWeis[1]==0 && $numWeis[2]!=0){
			$numtwo = implode(array_slice($numWeis,2,2));
			$cNum = $cNum.'零'.twoNum($numtwo);
		}elseif($numWeis[0]==0 && $numWeis[1]!=0){
			$numthree = implode(array_slice($numWeis,1,3));
			$cNum = $cNum.'零'.threeNum($numthree);
		}elseif($numWeis[0]!=0){
			$cNum = $cNum.fourNum($numWei);
			if(strlen($num)==9){
				$nums = str_split($num);
				if($nums[1]==0 && $nums[2]==0 && $nums[3]==0 && $nums[4]==0){
					$cNum = singleNum($nums[0]).'万';
				}elseif($nums[1]==0 && $nums[2]==0 && $nums[3]==0 && $nums[4]!=0){
					$cNum = singleNum($nums[0]).'万零'.singleNum($nums[4]);
				}elseif($nums[1]==0 && $nums[2]==0 && $nums[3]!=0){
					$numtwo = implode(array_slice($nums,3,2));
					$cNum = singleNum($nums[0]).'万零'.twoNum($numtwo);
				}elseif($nums[1]==0 && $nums[2]!=0 ){
					$numthree = implode(array_slice($nums,2,3));
					$cNum = singleNum($nums[0]).'万零'.threeNum($numthree);
				}else{
					$numfour = implode(array_slice($nums,1,4));
					$cNum = singleNum($nums[0]).'万'.fourNum($numfour);
				}
			}
		}
	
	}
	return $cNum;
}
function wanjiZone($num){
	$nums = $numsstr_split($num);
	if($nums[0]==0 && $nums[1]!=0){
		$num = implode(array_slice($nums,1,7));
	}elseif($nums[0]==0 &&  $nums[1] ==0 && $nums[2] !=0 ){
		$num = implode(array_slice($nums,2,6));
	}elseif($nums[0]==0 &&  $nums[1] ==0 && $nums[2] ==0 && $nums[3]!=0 ){
		$num = implode(array_slice($nums,3,5));
	}elseif($nums[0]==0 &&  $nums[1] ==0 && $nums[2] ==0 && $nums[3]==0 && $nums[4]!=0){
		$num = implode(array_slice($nums,4,4));
	}elseif($nums[0]==0 &&  $nums[1] ==0 && $nums[2] ==0 && $nums[3]==0 && $nums[4]==0 &&$nums[5]!=0){
		$num = implode(array_slice($nums,5,3));
	}elseif($nums[0]==0 &&  $nums[1] ==0 && $nums[2] ==0 && $nums[3]==0 && $nums[4]==0 && $nums[5]==0 && $nums[6]!=0){
		$num = implode(array_slice($nums,6,2));
	}elseif($nums[0]==0 &&  $nums[1] ==0 && $nums[2] ==0 && $nums[3]==0 && $nums[4]==0 && $nums[5]==0 && $nums[6]==0 && $nums[7]!=0){
		$num = implode(array_slice($nums,7,1));
	}elseif($nums[0]==0 &&  $nums[1] ==0 && $nums[2] ==0 && $nums[3]==0 && $nums[4]==0 && $nums[5]==0 && $nums[6]==0 && $nums[7]==0){
		$num  = '';
	}
	if(strlen($num)==0){
		$cNum = '';
	}elseif(strlen($num)==1){
		$cNum = '零'.single($num);
	}elseif(strlen($num)==2){
		$cNum = '零'.twoNum($num);
	}elseif(strlen($num)==3){
		$cNum = '零'.threeNum($num);
	}elseif(strlen($num)==4){
		$cNum = '零'.fourNum($num);
	}elseif(strlen($num)==5){
		$nums = str_split($num);
		if($nums[1]==0 && $nums[2]==0 && $nums[3]==0 && $nums[4]==0){
			$cNum = '零'.singleNum($nums[0]).'万';
		}elseif($nums[1]==0 && $nums[2]==0 && $nums[3]==0 && $nums[4]!=0){
			$cNum = '零'.singleNum($nums[0]).'万零'.singleNum($nums[4]);
		}elseif($nums[1]==0 && $nums[2]==0 && $nums[3]!=0){
			$numtwo = implode(array_slice($nums,3,2));
			$cNum = '零'.singleNum($nums[0]).'万零'.twoNum($numtwo);
		}elseif($nums[1]==0 && $nums[2]!=0 ){
			$numthree = implode(array_slice($nums,2,3));
			$cNum = '零'.singleNum($nums[0]).'万零'.threeNum($numthree);
		}else{
			$numfour = implode(array_slice($nums,1,4));
			$cNum = '零'.singleNum($nums[0]).'万'.fourNum($numfour);
		}
	}elseif(strlen($num)>5 && strlen($num)<7){
		
		if(strlen($num) == 6){
			$numTou = implode(array_slice($nums,0,2));
			$numTous = str_split($numTou);
			$numWei = implode(array_slice($nums,2,4));
			$numWeis = str_split($numWei);
			if($numTous[1]==0 && $numWeis[0]!=0 ){
				$cNum = '零'.twoNumTou($numTou)."万零";
			}else{
				$cNum = '零'.twoNumTou($numTou)."万";
			}
		}elseif(strlen($num) == 7){
			$numTou = implode(array_slice($nums,0,3));
			$numTous = str_split($numTou);
			$numWei = implode(array_slice($nums,3,4));
			$numWeis = str_split($numWei);
			if($numTous[2]==0 && $numWeis[0]!=0 ){
				$cNum = '零'.threeNum($numTou)."万零";
			}else{
				$cNum = '零'.threeNum($numTou)."万";
			}
		}
		if($numWeis[0]==0 && $numWeis[1]==0 && $numWeis[2]==0 && $numWeis[3]==0){
			$cNum = $cNum;
		}elseif($numWeis[0]==0 && $numWeis[1]==0 && $numWeis[2]==0 && $numWeis[3]!=0){
			$cNum = $cNum.'零'.singleNum($numWeis[3]);
		}elseif($numWeis[0]==0 && $numWeis[1]==0 && $numWeis[2]!=0){
			$numtwo = implode(array_slice($numWeis,2,2));
			$cNum = $cNum.'零'.twoNum($numtwo);
		}elseif($numWeis[0]==0 && $numWeis[1]!=0){
			$numthree = implode(array_slice($numWeis,1,3));
			$cNum = $cNum.'零'.threeNum($numthree);
		}elseif($numWeis[0]!=0){
			$cNum = $cNum.fourNum($numWei);
			if(strlen($num)==9){
				$nums = str_split($num);
				if($nums[1]==0 && $nums[2]==0 && $nums[3]==0 && $nums[4]==0){
					$cNum = singleNum($nums[0]).'万';
				}elseif($nums[1]==0 && $nums[2]==0 && $nums[3]==0 && $nums[4]!=0){
					$cNum = singleNum($nums[0]).'万零'.singleNum($nums[4]);
				}elseif($nums[1]==0 && $nums[2]==0 && $nums[3]!=0){
					$numtwo = implode(array_slice($nums,3,2));
					$cNum = singleNum($nums[0]).'万零'.twoNum($numtwo);
				}elseif($nums[1]==0 && $nums[2]!=0 ){
					$numthree = implode(array_slice($nums,2,3));
					$cNum = singleNum($nums[0]).'万零'.threeNum($numthree);
				}else{
					$numfour = implode(array_slice($nums,1,4));
					$cNum = singleNum($nums[0]).'万'.fourNum($numfour);
				}
			}
		}

	}
	return $cNum;
}
function exchangNum($num){
	$nums = str_split($num);
	if($nums[0]!=0 && preg_match('/^([1-9])?\d{0,11}$/',$num,$result)){
		
		if(strlen($num)==1){
			echo singleNum($num);
		}elseif(strlen($num)==2){
			$cNum = twoNumTou($num);
		}elseif(strlen($num)==3){
			$cNum = threeNum($num);
		}elseif(strlen($num)==4){
			$cNum = fourNum($num);
		}elseif(strlen($num)>=5 && strlen($num)<9){
			$cNum = wanji($num);
		}elseif(strlen($num)>=9 && strlen($num)<13){
			$nums = str_split($num);
			if(strlen($num)==9){
				$numTou = $nums[0];
				$numWei = implode(array_slice($nums,1,8));
				$numWeis = str_split($numWei);
				$cNum = singleNum($numTou).'亿';
			}elseif(strlen($num)==10){
				$numTou = implode(array_slice($nums,0,2));
				$numTous = str_split($numTou);
				$numWei = implode(array_slice($nums,2,8));
				$numWeis = str_split($numWei);
				if($numTous[1]==0 && $numWeis[0]!=0 ){
					$cNum = twoNumTou($numTou).'亿零';
				}else{
					$cNum = twoNumTou($numTou).'亿';
				}
			}elseif(strlen($num)==11){
				$numTou = implode(array_slice($nums,0,3));
				$numTous = str_split($numTou);
				$numWei = implode(array_slice($nums,3,8));
				$numWeis = str_split($numWei);
				if($numTous[2]==0 && $numWeis[0]!=0 ){
					$cNum = threeNum($numTou).'亿零';
				}else{
					$cNum = threeNum($numTou).'亿';
				}
			}elseif(strlen($num)==12){
				$numTou = implode(array_slice($nums,0,4));
				$numTous = str_split($numTou);
				$numWei = implode(array_slice($nums,4,8));
				$numWeis = str_split($numWei);
				if($numTous[3]==0 && $numWeis[0]!=0 ){
					$cNum = fourNum($numTou).'亿零';
				}else{
					$cNum = fourNum($numTou).'亿';
				}
			}
			if($numWeis[0]!=0){
				$cNum = $cNum.wanji($numWei);
			}else{
				$cNum = $cNum.wanjiZone($numWei);
			}
			
		}
		return $cNum;
	}else{
		echo "请输入正确的数12位以内的数字";
	}
	
}
