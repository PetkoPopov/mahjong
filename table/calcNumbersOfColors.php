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
function checkForWin(array $arr,$row){
    if($row%2==0){
                        if(count($arr)==$row*$row)
                        {
                        ?>
<h2><a style="background-color: darkorange;width:166px;height: 88px">CONGRATULATION YOU WIN</a></h2>;
                        <?php 
                        return true;
                        }
                    }else{
                        if(count($arr)==$row*$row-1)
                        {
                        ?>
<h2><a style="background-color: darkorange;width:166px;height: 88px">CONGRATULATION YOU WIN</a></h2>;
                        <?php
                        return true;
                        }
                    }
                    return false;
} 


function showTAbleWithColors($arrWithColors,$row){
    echo '<table>';
    for($i=1;$i<=$row;$i++){
        echo '<tr>';
        for($e=1;$e<=$row;$e++){
            $index=$i.$e;
            ?>
<td style="background-color: <?=$arrWithColors[$index];?>;width:77px;height: 44px"><?=$index?></td>
                <?php
        }
        echo '</tr>';
    }
    echo'</table>';
}

function timeForWinTheGame(int $start,int $stop){
    $yimaForWin= $stop-$start;
    ?>
<div><h1 style="background-color: chocolate;width:100px;height: 66px;color: #6600cc;position: relative;bottom: auto"><?=$yimaForWin?></h1></div>
        <?php
}
function showAdvice($tipsArr){
    echo $tipsArr[rand(0,count($tipsArr)-1)];
}