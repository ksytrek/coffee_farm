<?php
include('../../../config/connectdb.php');
if (isset($_POST['key']) && $_POST['key'] == 'edit_account') :

    $id_farmers = $_POST['id_farmers'];

    $sql_info = "SELECT * FROM `farmers` WHERE id_farmers = '$id_farmers'";

    $row_farmers = Database::query($sql_info, PDO::FETCH_ASSOC)->fetch(PDO::FETCH_ASSOC);

?>


    <div id="edit_account">
        <h3>แก้ไขข้อมูลบัญชีของคุณ</h3>
        <p>กรุณาอย่าเปิดเผยข้อมูลแก่คนอื่นๆ เพื่อความปลอดภัยของบัญชีผู้ใช้คุณเอง</p>
        <hr>
        <form id="form_edit_account" method="post" action="javascript:void(0)">
            <div class="form-group">
                <label for="firstname"> ชื่อเกษตรกร <span class="require">*</span></label>
                <input name="input-name_roasters" type="text" id="firstname455554" value="<?php echo $row_farmers['name_farmers'] ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="lastname"> อีเมล์เกษตรกร
                    <span class="require">*</span></label>
                <input name="input-num_trade_reg" type="text" id="lastname" value="<?php echo $row_farmers['email_farmers'] ?>" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="telephone"> เบอร์โทรเกษตรกร
                    <span class="require">*</span></label>
                <input name="input-name_entrep" type="text" value="<?php echo $row_farmers['tel_farmers'] ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="telephone"> facebook เกษตรกร
                    <span class="require">*</span></label>
                <input name="input-name_entrep" type="text" value="<?php echo $row_farmers['face_farmers'] ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="fax"> 	line เกษตรกร
                    <span class="require">*</span>
                </label>
                <input name="input-e_mail_roasters" value="<?php echo $row_farmers['line_farmers'] ?>" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="fax">อัพโหลดรูปภาพ
                    <span class="require">(.png และ jpeg)</span>
                </label>
                <input name=""  type="file" accept="image/png, image/jpeg" class="form-control">
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
                <textarea name="input-detail_roasters" class=""><?php echo $row_farmers['detail_farm'] ?></textarea>
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
                            data: values,
                            id_farmers: ID_FARMERS
                        },
                        success: function(result, textStatus, jqXHR) {
                            // console.log(result);
                            if(result == 'success'){
                                alert('ระบบได้ทำการแก้ไขข้อมูลสำเร็จ');
                                location.reload();
                            }else{
                                alert('ระบบมีปัญหา โปรดทำการแก้ไขใหม่อีกครั้ง');
                                location.reload();
                            }
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