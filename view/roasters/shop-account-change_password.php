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
    <form id="form_edit_change_pass" action="javascript:void(0)" method="post">
        <div class="form-group">
            <label for="password"> รหัสผ่านปัจจุบัน <span class="require">*</span></label>
            <input name="input-password" required type="password" class="form-control">
        </div>
        <div class="form-group">
            <label for="password-confirm">รหัสผ่านใหม่ <span class="require">*</span></label>
            <input name="input-pass_new" required type="password" class="form-control">
        </div>
        <div class="form-group">
            <label for="password-confirm">ยืนยันรหัสผ่าน <span class="require">*</span></label>
            <input name="input-con_pass_new" required type="password" class="form-control input-con_pass_new">
        </div>
        <button class="btn btn-primary pull-right" type="submit" id="button-change-password">บันทึก</button>
        <script>
            $("#form_edit_change_pass").submit(function() {
                // alert("Edit Account")
                var $inputs = $("#form_edit_change_pass :input");
                var values = {};
                $inputs.each(function() {
                    values[this.name] = $(this).val();
                });
                console.log(values);
                // if (values['input-pass_new'] == values['input-input-con_pass_new']) {
                    $.ajax({
                        url: "./controllers/account-edit.php",
                        type: "POST",
                        data: {
                            key: "button-change-password",
                            data: values,
                            id_roasters: ID_ROASTERS
                        },
                        success: function(result, textStatus, jqXHR) {
                            console.log(result);
                            if (result == 'success') {
                                alert('ระบบได้ทำการแก้ไขข้อมูลสำเร็จ');
                                location.reload();
                            } else {
                                alert('ระบบมีปัญหา โปรดทำการแก้ไขใหม่อีกครั้ง');
                                location.reload();
                            }
                        },
                        error: function(jqXHR, textStatus, jqXHR) {
                            alert('ระบบตรวจพบข้อผิดพลาดจากเซิฟเวอร์ : ' + textStatus);
                        }
                    });
                // }else{
                //     alert('รหัสผ่านไม่สามารเข้ากันได้')
                // }

            });
        </script>
    </form>


<?php

endif;
?>