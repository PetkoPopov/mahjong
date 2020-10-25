<?php
session_start();

if(!isset($_SESSION['start']))
$_SESSION['start']= time();

if(!empty($_GET['newGame'])&&$_GET['newGame']=="NEW_GAME"){
    session_destroy();
 session_start();
if(!isset($_SESSION['start']))  $_SESSION['start']= time();
}
?>
        <meta charset="UTF-8">
        <title>mahjong</title>
        <center></head>
    <form >
        <input type="number" name="rows" style="width:155px;height: 66px;background-color: bisque" value="<?php if(isset($_GET['rows'])){
     echo $_GET['rows'];
        }else{
            echo 4;
        }
        ?>" min="3" max="9" required>
        <input type="submit" style="background-color: cadetblue;width:155px;height: 66px;" value="NEW_GAME" name="newGame"/>
<!--        <input type="submit" name="newGame" value="NEW_GAME" style="position: absolute; left: 685px; background-color: 
               red; width: 155px;height:66px;bottom: 233px"/>-->
        <input type="submit" name="showAnswer" style="width:155px;height: 66px;background-color: brown " value="show answer"/>
        <input type="submit" name="showTip" style="width:155px;height: 66px;background-color: darkgreen" value="showTip"/>
       <body style="background-color: darkseagreen">
           <h1>ПОСОЧЕТЕ КУТИЙКИТЕ С ЕДНАКВИ ЦВЕТОВЕ</h1>
        <?php
        require_once './table/arry_with_colors_GENERATE.php';
        if(!empty($_GET['rows'])){
          
            if(!isset($_SESSION['rows'])){
            $_SESSION['rows']=$_GET['rows'];
            $row=$_SESSION['rows'];
            }else{
                $row=$_SESSION['rows'];
            }
            
            if(!isset($_SESSION['clicks'])){
            $_SESSION['clicks']=0;
            $_SESSION['out']=[];
            }else{
                $_SESSION['clicks']++;
            }
            
            
        }
        
        if(isset($row)){
            require_once './table/calcNumbersOfColors.php';
        require_once './table/create_table.php';
        if(isset($_GET['showAnswer'])){
            showTAbleWithColors($_SESSION['colors'], $row);
//            showColor($_SESSION['colors']);
            die('START NEW GAME');
        }
        if(isset($_GET['showTips'])){
            echo "<h1>remember the box's color and number </h1>";
        }
        }
//        var_dump($_GET);
//showColor($_SESSION['colors']);
        ?>
        
       </body></center>
    </form>