<?php
//require_once './arry_with_colors_GENERATE.php';

function calcArrWithColors(array $colorArr,int $row){
    if($row%2==0){
       $color2= array_slice($colorArr, 0,($row*$row));
    }else{
        $length=($row*$row)-1;
        $color2= array_slice($colorArr, 0,$length);
    }
    
if($row%2==0){}
             else{
               
               $color2[]='#000000';
             }
    
    return$color2;
}
///////////
function setSessionColor($arr,$row=0){
    $center=($row-3)/2+2;
    $rpls=(($center-1)*$row)+$center-1;//тука е центъра
    $index=array_search('#000000',$arr);
    $rpls2=$arr[$rpls];//стойността на центъра
    array_splice($arr, $index, 1);//взвемаме стойността от центъра и я заместаме където са 6 нули
    
    array_splice($arr,$rpls,0,'#000000');
    return $arr;
}
///////////
/**
 * показва цветовете от масива
 * @param type $color2
 */
function showColor($color2=[]){
    
    foreach($color2 as $cc=>$r){
    echo $cc;
    ?>
<a style="background-color: <?=$r?>">xutter</a><br/>
        
        <?php
        
}

}
//$row=3;
//$r=calcArrWithColors($colorArr, $row);
//showColor($r);
//echo'======================<br/>';
////    $center=($row-3)/2+2;
////    $rpls=(($center-1)*$row)+$center-1;//тука е центъра
////    $index=array_search('#000000',$r);
////    $rpls2=$arr[$rpls];//стойността на центъра
////    array_splice($r, $index, 1);//взвемаме стойността от центъра и я заместаме където са 6 нули
////    
////    array_splice($r,$rpls,0,'#000000');
//$r=setSessionColor($r,$row);
//showColor($r);
//  



