<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $company = $_POST['company'];

    //Connecting to the Gganbu Database
    $conn = new mysqli('localhost','root','','gganbu_tech');
    if($conn->connect_error){
        die('onnection Failed : '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into gganbu(name, email, phone, company) values(?, ?, ?, ?)");

        $stmt->bind_param("ssis",$name,$email,$phone,$company);
        $stmt->execute();
        echo "Registration successfull";
        $stmt->close();
        $conn->close();

    }


?>