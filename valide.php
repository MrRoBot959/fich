<?php
error_reporting(E_ALL);
ini_set('display_errors',E_ALL);

include "functions.php";







?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>

    <style>
        .tab{
            width: 100% ;
            border-collapse : collapse;
            position: absolute;
            top: 15%;
                
        }

        td, th {
            border : 1px solid #dddddd;
            text-align: center;
            padding: 8px ;
        }

        tr:nth-child(even) {
            background-color : #dddddd ;
        }

        .cont-header{
                width: 100% ;
                height: 48px;
                background-color:black;
                overflow: hidden;
        }
        .cont-header a {
            float: right;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;

        }
        .cont-header a:hover {
            background-color : #ddd ;
            color: black;
        }
        .cont-header a.active {
            background-color : #ddd ;
            color: black;
        }
    </style>
    
</head>
<body>
    
    <header>

        <div class="cont-header">
           <a href="http://localhost/ficho/index.php">ajouter contact</a>
           <a class="active" href="http://localhost/ficho/valide.php">liste des contactes</a>  
        </div>
        
    </header>
<form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
<table class="tab">
    <tr>
        <th>
            <span>nom</span>
        </th>
        <th>
            <span>prenom</span>
        </th>
        <th>
            <span>numero tele</span>
        </th>
        <th colspan="2">
            <span>options</span>
        </th>
    </tr>
    <?php



if(!$myfile=fopen("datafile.txt","r")){
    die("opening field");
}
$i=0;

while($line=fgets($myfile)){
 
$col=explode(";",$line);

$base[]=array($col[0],$col[1],$col[2]);


echo "
    <tr>
        <td>
              $col[0]
        </td>
        <td>
              $col[1]
        </td>
        <td>
              $col[2]   
        </td>
        <td>
            <button type=\"submit\" class=\"button1\" name=\"button1\" value=\"$i\" >modifier</button>
        </td>
        <td>
            <button type=\"submit\" class=\"button2\" name=\"button2\" value=\"$i\">supprimer</button>
        </td>
    </tr>
";




$i++;
}


fclose($myfile);



if (isset($_POST['button1'])) {
    $i=$_POST['button1'];
    
    


    $i=0;
}

if (isset($_POST['button2'])) {
    $i=$_POST['button2'];
    
    unset($base[$i]);
    
    
    save_ch($base);

    $i=0;
    header("Location: http://localhost/ficho/valide.php");
}



?>



</table>
</form>




</body>
</html>