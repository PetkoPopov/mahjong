
<table border="1" style="border-color: black;border-bottom-color: black">

    <?php
    $color2 = [];
    for ($q = 0; $q < ($row * $row / 2); $q++) {
        $color2[] = $colorArr[$q];
    }

    $arrSession = [];
    for ($i = 1; $i <= $row; $i++) {
        echo "<tr>";
        for ($e = 1; $e <= $row; $e++) {
            $index = $i . $e;
            if (isset($_SESSION['colors']) && count($_SESSION['colors']) == $row * $row) {
                $color = $_SESSION['colors'][$index];
            } else {

                $colorIndex = rand(0, (count($color2) - 1));

                $color = $color2[$colorIndex];

                if (in_array($color, $arrSession)) {
                    array_splice($color2, $index, 1);
                }

                $arrSession[] = $color;
                $_SESSION['colors'][$index] = $color;
                
            }
            $valButton = $_SESSION['colors'][$index];
            if ($_SESSION['clicks'] == 0) {

                $color = "#white";
            } else {


                if (array_key_exists($index, $_GET)) {

                    if (isset($_SESSION['last']) && $_SESSION['last'] == $color&&$index!=$_SESSION['lastIndex']) {
                        
                        $_SESSION['colors'][$index]='#111111';
                        $_SESSION['colors'][$_SESSION['lastIndex']]='#111111';
                        $_SESSION['out'][]=$index;
                        $_SESSION['out'][]=$_SESSION['lastIndex'];
                    }
                    
                    $_SESSION['lastIndex']=$index;
                    $_SESSION['last'] = $valButton;
                } else {
                    if( in_array($index,$_SESSION['out'])){
                        $color=$_SESSION['colors'][$index];
                    }else{
                    $color = "#white";}
                }
            }
            ?>
            <td style="width:77px;height:55px;">

                <button type="submit" style="width:77px;height:55px;background-color:<?= $color; ?>" name="<?= $index; ?>" value="<?= $valButton; ?>">
        <?php echo$index; ?></button>

            </td>
        <?php
    }
    echo "</tr>";
}

echo "</table>";
?>