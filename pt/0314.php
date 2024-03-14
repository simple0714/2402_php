<?php
for($j=1; $j<6; $j++){
    for($i=1; $i<6-$j; $i++){
        echo " ";
    }
    for($k=1; $k<$j+1; $k++){
        echo "*";
    }
    echo "\n";
}








for($i=0; $i<=6; $i++){
    for($z=6; $z>=0; $z--){
        if($z<$i){
        echo "*";
        }
        else{
        echo " ";
        }
    }
    echo "\n";
}
