<?php
session_start();
if(!empty($_GET['newGame'])&&$_GET['newGame']=="NEW_GAME"){
    session_destroy();
 session_start();
  
}
?>
        <meta charset="UTF-8">
        <title>mahjong</title>
    </head>
    <form >
        <input type="number" name="rows" style="width:155px;height: 66px;" value="<?php if(isset($_GET['rows'])){
     echo $_GET['rows'];
        }else{
            echo 4;
        }
?>" />
        <input type="submit" style="background-color: cadetblue;width:155px;height: 66px;" value="NEW_GAME" name="newGame"/>
<!--        <input type="submit" name="newGame" value="NEW_GAME" style="position: absolute; left: 685px; background-color: 
               red; width: 155px;height:66px;bottom: 233px"/>-->
   
       <body style="background-color: darkseagreen">
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
        require_once './table/create_table.php';
        }
        var_dump($_GET);
        ?>
        
    </body>
    </form>