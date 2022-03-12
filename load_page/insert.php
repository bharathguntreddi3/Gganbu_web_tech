<?php 
$name = $_POST['name'];
$email = $_POST['email'];
$phoen = $_POST['phone'];
$company = $_POST['company'];

if (!empty($name) || !empty($email) || !empty($phone) || !empty($company)){

    //connection
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "gganbu_tech";

    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
    if (mysqli_connect_error()){
        die('connect Error('. mysqli_connect_error().')'. mysqli_connect_error());
    } else{
        $SELECT = "SELECT emial FROM gbtech WHERE email = ? Limit 1";
        $INSERT = "INSERT INTO gbtech (name, email, phone, company) VALUES(?, ?, ?, ?)";

        //prepare statement
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->store_result();
        $rnum = $stmt->num_rows;

        if ($rnum==0){
            $stmt->close();

            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("ssss", $name, $phone, $email, $company);
            $stmt->execute();
            echo "registered";
        } else{
            echo "already registered";
        }
        $stmt->close();
        $conn->close();
    }

} else{
    echo "All fields are Required";
    die();
} 
?>