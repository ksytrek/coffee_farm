<?php 
include_once('../../../../config/connectdb.php');


if(isset($_POST['key']) && $_POST['key'] == 'num_trade_reg'){
    // echo 'Please';
    $num_trade_reg = $_POST["num_trade_reg"];

    $sql = "SELECT COUNT(*) as 'count' FROM `roasters` WHERE num_trade_reg = '$num_trade_reg';";

    // echo $num_trade_reg;
    try {
        $search = Database::query($sql,PDO::FETCH_ASSOC)->fetch();
        if($search['count'] == 0) {
            echo $search['count'];
        }else{
            echo $search['count'];
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }

}
// e_mail_roasters
if(isset($_POST['key']) && $_POST['key'] == 'e_mail_roasters'){
    // echo 'Please';
    $e_mail_roasters = $_POST["e_mail_roasters"];

    $sql = "SELECT COUNT(*) as 'count' FROM `roasters` WHERE e_mail_roasters = '$e_mail_roasters';";

    // echo $e_mail_roasters;
    try {
        $search = Database::query($sql,PDO::FETCH_ASSOC)->fetch();
        if($search['count'] == 0) {
            echo $search['count'];
        }else{
            echo $search['count'];
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }

}

if(isset($_POST['key']) && $_POST['key'] == 'register'){

    $name_roasters = $_POST["name_roasters"];   //ชื่อโรงคั่วกาแฟ
    $num_trade_reg = $_POST["num_trade_reg"];   // เลขทะเบียนการค้า
    $name_entrep = $_POST["name_entrep"];       //ชื่อผู้ประกอบการ
    $address_office = $_POST["address_office"]; //ที่ตั้งสำนักงาน
    $id_provinces = $_POST["id_provinces"];     //รหัสจังหวัด หรือ จังหวัด
    $code_provinces = $_POST["code_provinces"]; // รหัสไปรษณี
    $lat_roasters = $_POST["lat_roasters"];     //ละติจูดโรงคั่วกาแฟ
    $lng_roasters = $_POST["lng_roasters"];     //ลองจิจูดโรงคั่วกาแฟ
    $detail_roasters = $_POST["detail_roasters"]; //รายละเอียดต่างๆ ของโรงคั่วกาแฟ
    $e_mail_roasters = $_POST["e_mail_roasters"]; //อีเมลโรงคั่วกาแฟ
    $pass_roasters = $_POST["pass_roasters"];   // รหัสผ่านโรงคั่วกาแฟ
    

    // $sql =  "INSERT INTO `roasters` (`id_roasters`, `name_roasters`, `num_trade_reg`, `name_entrep`, `address_office`, `id_provinces`, `code_provinces`, `lat_roasters`, `lng_roasters`, `detail_roasters`, `e_mail_roasters`, `pass_roasters`) ".
    //         " VALUES (NULL, 'ชื่อโรงคั่วกาแฟ' , 'เลขทะเบียนการค้า' , 'jen' , 'ที่ยอุ๋', '33' , '33125' , $lat_roasters, $lng_roasters, $detail_roasters, 'sin@gmail.com', 'pass';)";
    $sql = "INSERT INTO `roasters` (`id_roasters`, `name_roasters`, `num_trade_reg`, `name_entrep`, `address_office`, `id_provinces`, `code_provinces`, `lat_roasters`, `lng_roasters`, `detail_roasters`, `e_mail_roasters`, `pass_roasters`) 
    VALUES (NULL, '$name_roasters', '$num_trade_reg', '$name_entrep', '$address_office', '$id_provinces', '$code_provinces', '$lat_roasters', '$lng_roasters', '$detail_roasters', '$e_mail_roasters', '$pass_roasters');";

    try {
        if(Database::query($sql,PDO::FETCH_ASSOC)){
            echo "success";
        }

        // echo $name_roasters."\n".$num_trade_reg."\n".$name_entrep."\n".$address_office;
        // echo $address_office;
        // echo $id_provinces." ".$code_provinces;

    } catch (Exception $e) {
        echo $e->getMessage();
        exit;
    }

}
?>