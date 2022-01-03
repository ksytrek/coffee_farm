<?php
include('../../config/connectdb.php');
if (isset($_POST['key']) && $_POST['key'] == 'change_password') :

    $id_roasters = $_POST['id_roasters'];

    $sql_info = "SELECT * FROM `roasters` WHERE id_roasters = '$id_roasters'";

    $row_roasters = Database::query($sql_info, PDO::FETCH_ASSOC)->fetch(PDO::FETCH_ASSOC);

?>

    <h3>เปลี่ยนรหัสผ่าน</h3>
    <p>กรุณาอย่าเปิดเผยรหัสผ่านแก่คนอื่นๆ เพื่อความปลอดภัยของบัญชีผู้ใช้คุณเอง</p>
    <hr>
    <form action="javascript:void(0)" method="post">
        <div class="form-group">
            <label for="password"> รหัสผ่านปัจจุบัน <span class="require">*</span></label>
            <input name="input-email_farmers" required type="password" id="password" class="form-control">
        </div>
        <div class="form-group">
            <label for="password-confirm">รหัสผ่านใหม่ <span class="require">*</span></label>
            <input name="input-pass_farmers" required type="password" id="password-confirm" class="form-control">
        </div>
        <div class="form-group">
            <label for="password-confirm">ยืนยันรหัสผ่าน <span class="require">*</span></label>
            <input name="input-pass_farmers" required type="password" id="password-confirm" class="form-control">
        </div>
        <button class="btn btn-primary pull-right" type="submit" id="button-payment-address">บันทึก</button>

    </form>


<?php

endif;
?>