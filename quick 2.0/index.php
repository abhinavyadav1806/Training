<?php
    $var = array
    (
        array(
            "Name"=>"Abhinav",
            "phone"=>"xxxxx xxxxx",
            "email"=>"abhinav1806@gmail.com",
            "location"=>"India"
        ),

        array(
            "Name"=>"yadav",
            "phone"=>"xxxx",
            "email"=>"yadav@gmail.com",
            "location"=>"India"
        )
    );
   // echo ($var);
//    echo json_encode($var);
foreach($var as $key=>$value){
    foreach($value as $key2=>$value2){
        print_r($value2);
        echo(',');
    }
}
?>