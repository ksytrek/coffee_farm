<?php
include('../../config/connectdb.php');
if (isset($_POST['key']) && $_POST['key'] == 'edit_account') :

    $id_roasters = $_POST['id_roasters'];

    $sql_info = "SELECT * FROM `roasters` WHERE id_roasters = '$id_roasters'";

    $row_roasters = Database::query($sql_info, PDO::FETCH_ASSOC)->fetch(PDO::FETCH_ASSOC);

?>


    <div id="edit_account">
        <h3>แก้ไขข้อมูลบัญชีของคุณ</h3>
        <p>กรุณาอย่าเปิดเผยข้อมูลแก่คนอื่นๆ เพื่อความปลอดภัยของบัญชีผู้ใช้คุณเอง</p>
        <hr>
        <form id="form_edit_account" method="post" action="javascript:void(0)">
            <div class="form-group">
                <label for="firstname"> ชื่อโรงคั่วกาแฟ <span class="require">*</span></label>
                <input name="input-name_roasters" type="text" id="firstname455554" value="<?php echo $row_roasters['name_roasters'] ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="lastname"> เลขทะเบียนการค้า
                    <span class="require">*</span></label>
                <input name="input-num_trade_reg" type="text" id="lastname" value="<?php echo $row_roasters['num_trade_reg'] ?>" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="telephone"> ชื่อผู้ประกอบการ
                    <span class="require">*</span></label>
                <input name="input-name_entrep" type="text" value="<?php echo $row_roasters['name_entrep'] ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="fax"> อีเมลโรงคั่วกาแฟ
                    <span class="require">*</span>
                </label>

                <input name="input-e_mail_roasters" value="<?php echo $row_roasters['e_mail_roasters'] ?>" type="text" class="form-control">
            </div>

            <div class="form-group">
                <label for="fax"> รายละเอียดต่างๆ ของโรงคั่วกาแฟ</label>
                <style type="text/css">
                    textarea {
                        font-size: 1.4rem;
                        letter-spacing: 1px;
                    }

                    textarea {
                        min-width: 100%;
                        padding: 10px;
                        max-width: 100%;
                        line-height: 1.5;
                        border-radius: 5px;
                        border: 0.02px solid #ccc;
                        box-shadow: 1px 1px 1px #999;
                        height: 80px
                    }
                </style>
                <textarea name="input-detail_roasters" class=""><?php echo $row_roasters['detail_roasters'] ?></textarea>
            </div>
            <button class="btn btn-primary pull-right" type="submit" id="button-payment-address">บันทึก</button>
            <script>
                $("#form_edit_account").submit(function() {
                    // alert("Edit Account")
                    var $inputs = $("#form_edit_account :input");
                    var values = {};
                    $inputs.each(function() {
                        values[this.name] = $(this).val();
                    });
                    console.log(values);
                    $.ajax({
                        url: "./controllers/account-edit.php",
                        type: "POST",
                        data: {
                            key: "edit_account_submit",
                            data: values
                        },
                        success: function(result, textStatus, jqXHR) {
                            console.log(result);
                        },
                        error: function(jqXHR, textStatus, jqXHR) {
                            alert('ระบบตรวจพบข้อผิดพลาดจากเซิฟเวอร์ : ' + textStatus);
                        }
                    });
                });
            </script>
        </form>

    </div>


<?php

endif;
?>