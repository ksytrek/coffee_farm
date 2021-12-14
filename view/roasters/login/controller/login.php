<?php 
include_once('../../../../config/connectdb.php');
session_start();

if(isset($_POST['key']) && $_POST['key'] == 'login_roasters'){
    // echo 'login_roasters';

    $e_mail_roasters = $_POST['e_mail_roasters'];
    $pass_roasters = $_POST['pass_roasters'];

    $resultArray = array();
    try {
        $sql = "SELECT id_roasters , e_mail_roasters , pass_roasters FROM `roasters` WHERE e_mail_roasters = '$e_mail_roasters' AND pass_roasters = '$pass_roasters';";
        if ($show_tebelig = Database::query($sql, PDO::FETCH_ASSOC)) {
            foreach ($show_tebelig  as $row) {
                array_push($resultArray, $row);
                $_SESSION['key'] = 'roasters';
                $_SESSION['user_id'] = $row['id_roasters'];
            }
            echo json_encode($resultArray);
        }else{
            
            session_start();
            session_unset();
            echo json_encode($resultArray);

        }
    } catch (Exception $e) {
        $resultArray = [
            "error" => $e->getMessage()
        ];
        session_start();
        session_unset();
        echo json_encode($resultArray);
    }

}
?>