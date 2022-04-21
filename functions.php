<?php


function save_ch($base){

    $myfile = fopen("datafile.txt","w");
    for ($j=0; $j < count($base); $j++) { 
        
    
    
    $ligne = $base[$j][0].";".$base[$j][1].";".$base[$j][2];
    
    fputs($myfile,$ligne);
  

    }
fclose($myfile);
}



function modify($base,$i,$nom,$prenom,$num){
    $base[$i][0]=$nom;
    $base[$i][1]=$prenom;
    $base[$i][2]=$num;
}



function display_table(){
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
}

?>


