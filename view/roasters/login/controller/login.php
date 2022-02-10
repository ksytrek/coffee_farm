<?php 
include_once('../../../../config/connectdb.php');
session_start();

if(isset($_POST['key']) && $_POST['key'] == 'login_roasters'){
    // echo 'login_roasters';

    $e_mail_roasters = htmlspecialchars($_POST['e_mail_roasters']);
    $pass_roasters = htmlspecialchars($_POST['pass_roasters']);

    $resultArray = array();
    try {
        $sql = "SELECT id_roasters , e_mail_roasters , pass_roasters FROM `roasters` WHERE e_mail_roasters = '$e_mail_roasters' AND pass_roasters = '$pass_roasters';";
        if ($show_tebelig = Database::query($sql, PDO::FETCH_ASSOC)->fetch(PDO::FETCH_ASSOC)) {
            // foreach ($show_tebelig  as $row) {
                if($e_mail_roasters == $show_tebelig['e_mail_roasters'] && $pass_roasters == $show_tebelig['pass_roasters']){
                    array_push($resultArray, $show_tebelig);
                    $_SESSION['key'] = 'roasters';
                    $_SESSION['user_id'] = $show_tebelig['id_roasters'];
                }else{
                    $resultArray = [
                        "id_roasters"=>"",
                        "e_mail_roasters"=>"",
                        "pass_roasters"=>""
                    ];
                    array_push($resultArray, $resultArray);
                }
               
            // }
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