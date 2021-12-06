<?php 
include_once('../../../../config/connectdb.php');

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
            }
            echo json_encode($resultArray);
        }else{
            echo json_encode($resultArray);
        }
    } catch (Exception $e) {
        $resultArray = [
            "error" => $e->getMessage()
        ];
        echo json_encode($resultArray);
    }

}
?>