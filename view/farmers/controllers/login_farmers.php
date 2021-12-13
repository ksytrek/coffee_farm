<?php 

include_once(__DIR__.'../../../../config/connectdb.php');
session_start();
if(isset($_POST['key']) && $_POST['key'] == "login_farmers"){
    // echo "login_farmers.php";
    $e_mail_framers = $_POST['email_farmers'];
    $pass_farmers = $_POST['pass_farmers'];

    // echo $e_mail_framers. " ". $pass_farmers;
    try {
    //     # code...
        $sql = "SELECT COUNT(*) as 'count', email_farmers, pass_farmers  FROM `farmers` WHERE email_farmers IN ('$e_mail_framers') AND pass_farmers IN ('$pass_farmers');";
        if( $s =  Database::query($sql,PDO::FETCH_ASSOC)->fetch() ){
            if($s['count'] == '1'){
                // echo $s['count'] .$s['email_farmers'] .$s['pass_farmers'];
                $_SESSION['user_id'] = $s['email_farmers'];
                $_SESSION['key'] = "framers";
                echo $s['count'];
                
            }
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }


    
}
?>