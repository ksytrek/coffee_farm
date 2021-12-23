<?php

function upload_image($image_farmers):string {

    $name_date = date("Y_m_d_H_i_s").".png";
    try {
        file_put_contents('../../../pictures/farmers/'.$name_date, base64_decode($image_farmers));

    } catch (Exception $e) {
        echo "Error: ".$e->getMessage();
    }
    return $name_date;
    }


echo upload_image($_POST['data']);

?>