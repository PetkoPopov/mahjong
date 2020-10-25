
<table border="1" style="border-color: black;">

    <?php
    $color2 = [];

    $color2 = calcArrWithColors($colorArr, $row);

//   showColor($color2);
echo '<br/>';
    $arrSession = [];
    for ($i = 1; $i <= $row; $i++) {
        echo "<tr>";
        for ($e = 1; $e <= $row; $e++) {
            $index = $i . $e;


            if (isset($_SESSION['colors']) && count($_SESSION['colors']) == $row * $row) {
                
            
            $color = $_SESSION['colors'][$index];
        } else {
            //разбъркваме цветовете тук 
            $colorIndex = rand(0, (count($color2) - 1));

            $color = $color2[$colorIndex];

                 array_splice($color2, $colorIndex, 1);
                   
            
//             showColor($color2);
//                echo"===========<br/>";
            $arrSession[] = $color;//записва излезналите цветове
            $_SESSION['colors'][$index] = $color;
//            showColor($_SESSION['colors']);
        }
        $valButton = $_SESSION['colors'][$index];
        if ($_SESSION['clicks'] == 0) {

            $color = "#9966ff";
        } else {


            if (array_key_exists($index, $_GET)) {//така е оредставено натискането на бутона 

                if (isset($_SESSION['last']) && $_SESSION['last'] == $color && $index != $_SESSION['lastIndex']) {
                    
                    $_SESSION['colors'][$index] = '#333333';
                    $_SESSION['colors'][$_SESSION['lastIndex']] = '#333333';
                    $_SESSION['out'][] = $index;
                    $_SESSION['out'][] = $_SESSION['lastIndex'];
                    
                }

                $_SESSION['lastIndex'] = $index;
                $_SESSION['last'] = $valButton;
            } else {
                if (in_array($index, $_SESSION['out'])) {
                    $color = $_SESSION['colors'][$index];
                } else {
                    $color = '#9966ff';
                }
            }
        }
        ?>
        <td style="width:77px;height:55px;">

            <button type="submit" style="width:77px;height:55px;background-color:<?= $color; ?>" name="<?= $index; ?>" value="<?= $valButton; ?>">
                <?php echo$index; ?></button>

        </td>
        <?php
        if(array_key_exists($index,$_GET)){$currentColor[0]=$valButton;}
    }
    echo "</tr>";
    }

    echo "</table>";
    $win=checkForWin($_SESSION['out'], $row);
    if($win==true){
         $stop=time();
       
         timeForWinTheGame($_SESSION['start'],$stop);
    }
    if(isset($currentColor)){
    ?>
        <a><h2 style="background-color: darkcyan;width: 122px;height:86px;color: darkred">ЦВЕТА СЕ КАЗВА
            <?=$currentColor[0];?></h2>
    <br/> </a><?php
    
    }