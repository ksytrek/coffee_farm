<?php 

// include('../../config/connectdb.php');
require_once("../../../config/connectdb.php");

if(isset($_POST['key']) && $_POST['key'] == 'edit_account_submit'){
    // $data = $_POST['data'];
    $input = $_POST['data'];

    $name_roasters = $input['input-name_roasters'];
    $num_trade_reg = $input['input-num_trade_reg'];
    $name_entrep = $input['input-name_entrep'];
    $e_mail_roasters = $input['input-e_mail_roasters'];
    $detail_roasters = $input['input-detail_roasters'];


    
}


?>