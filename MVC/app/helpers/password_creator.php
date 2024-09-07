<?php

function create_pass($chars){
    
    $str = "0123456789!#$%&/()=?abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $pass='';
    
    for($i=0; $i<$chars; $i++){

        $pass=$pass. $str[rand(0,strlen($str)-1)];

    }

    return $pass;

}

 

?>