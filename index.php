<?php
error_reporting(E_ALL);
ini_set('display_errors',E_ALL);



$phone_err="";
$nom_err="";
$prenom_err="";

$gen_err="";
$valide="";


if($_SERVER["REQUEST_METHOD"]=='POST'){


$nom = htmlspecialchars($_POST['nom']);
$prenom = htmlspecialchars($_POST['prenom']);
$phone = htmlspecialchars($_POST['phone']);
$accp=true;


if(empty($nom)){
    $nom_err="champ nom est vide ";     
    $gen_err="existe champ vide ";
    $accp=false;
}

if(empty($prenom)){
    $prenom_err="champ prenom est vide ";     
    $gen_err="existe champ vide ";
    $accp=false;

}
if(empty($phone)){
    $phone_err="champ phone est vide ";     
    $gen_err="existe champ vide ";
    $accp=false;

}


if($accp){
    
    $ligne = "$nom;$prenom;$phone";
    

    $myfile = fopen("datafile.txt","a+");


    fputs($myfile,"$ligne\n");


    





    fclose($myfile);
    header("Location: http://localhost/ficho/valide.php");
}




}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>ex6</title>
    <style>
        
        
        .error {
            color: red;
        }
        .valide{
            color: green;
        }
        .container {
            border-style: solid;
            border-color: black;
            border-radius: 10px;
            width: 40%;
            height: 40%;
            font-size : 25px;
            font-weight: bold;
            position: absolute;
            top: 28%;
            left: 28%;
            
        }
        input {
            width: 400px;
            height: 40px;
            font-size: 20px;
        }
        .mybutton {
            width : 100px;
            height: 40px;
            font-size: 25px;
            font-weight: bold;
        }
        form {
            position: absolute;
            left: 15%;
            bottom: 15%;
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
   <a class="active" href="http://localhost/ficho/index.php">ajouter contact</a>
   <a  href="http://localhost/ficho/valide.php">liste des contactes</a>  
</div>

</header>
    <div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            
            <table class="table">
                <tr>
                    <th colspan="2">formulaire</th>
                </tr>
                

                <tr>
                    <td colspan="2">
                         
                         <span class="valide"><?php echo "$valide";?></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                    <span class="error"><?php echo "$nom_err";?></span>
                    </td>
                </tr>
                <tr>

                    <td>
                        <label for="nom">nom:</label>
                    </td>
                    <td>
                        <input type="text" name="nom" id="nom">
                    </td>
                    
                </tr>
                <tr>
                    <td colspan="2">
                    <span class="error"><?php echo "$prenom_err";?></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="prenom">prenom:</label>
                    </td>
                    <td>
                        <input type="text" name="prenom" id="prenom">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                    <span class="error"><?php echo "$phone_err";?></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="n_tele">telephone:</label>
                    </td>
                    <td>
                        <input type="phone" name="phone" id="phone">
                    </td>
                </tr>
                <tr>
                    <td align="center" colspan="2">
                        <button type="submit" class="mybutton">ok</button>
                    </td>
                    
                </tr>
            </table>

        </form>
        
    
    </div>

    
</body>
</html>