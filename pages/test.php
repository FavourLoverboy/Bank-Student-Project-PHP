<?php

    if(isset($_GET['phone'])){
        echo $_GET['phone'];
        $email = "favourehio2019@gmail.com";
        $password = "Loverboy123,.";
        $sender_name = "Bank";
        $message = "message content";
        $recipients = $_GET['phone'];
        
        $data = array("email" => $email, "password" => $password,"message"=>$message, "sender_name"=>$sender_name,"recipients"=>$recipients);
        $data_string = json_encode($data);
        $ch = curl_init('hhttps://api.80kobosms.com/v2/app/sms');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data_string)));
        $result = curl_exec($ch);
        $res_array = json_decode($result);
        var_dump($res_array);

    }

?>