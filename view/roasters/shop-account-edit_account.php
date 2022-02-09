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
                <label for="num_trade_reg"> เลขทะเบียนการค้า
                    <span class="require">* <span id="span_num_trade_regl"></span></span></label>
                <input name="input-num_trade_reg" type="text" id="num_trade_reg" value="<?php echo $row_roasters['num_trade_reg'] ?>" class="form-control" required>
            </div>
            <script>
                var check_num_trade_reg = true;
                $('#num_trade_reg').change(function() {
                    var str = $(this).val();
                    // alert(str)
                    $.ajax({
                        url: "./controllers/account-edit.php",
                        type: "POST",
                        data: {
                            key: 'check_num_trade_reg',
                            num_trade_reg: str,
                            id_roasters: ID_ROASTERS
                        },
                        success(result, textStatus, jqXHR) {
                            // return alert(result);
                            // return swal("", "ไม่สามารถใช้เลขทะเบียนการค้านี้ได้!", "error");
                            if (result == 0) {
                                check_num_trade_reg = true;
                                $("#span_num_trade_regl").html('');
                            } else {
                                check_num_trade_reg = false;
                                $("#span_num_trade_regl").html('ไม่สามารถใช้เลขทะเบียนการค้านี้ได้');
                                return alert("ไม่สามารถใช้เลขทะเบียนการค้านี้ได้!");
                                // return swal("", "ไม่สามารถใช้เลขทะเบียนการค้านี้ได้!", "error");

                                // break;
                            }
                            // 
                        },
                        error(result, textStatus, jqXHR) {
                            check_num_trade_reg = false;
                            return alert("เกิดข้อผิดพลาด!");
                            // return swal("", "เกินข้อผิดพลาด!", "error");
                        }
                    });
                });
            </script>
            <div class="form-group">
                <label for="telephone"> ชื่อผู้ประกอบการ
                    <span class="require">*  (ต้องเป็นภาษาไทย หรือ ภาษาอังกฤษ เท่านั้น)</span></label>
                <input name="input-name_entrep"  type="text" value="<?php echo $row_roasters['name_entrep'] ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="fax"> เบอร์ติดต่อ
                    <span class="require">* (เบอร์ติดต่อ 10 หลัก)<span id="span_tel"></span></span>
                </label>
                <input id="tel_roasters" pattern="^0[0-9]{8,9}$"  name="input-tel_roasters" value="<?php echo $row_roasters['tel_roasters'] ?>" type="tel" class="form-control">

            </div>
            <div class="form-group">
                <label for="fax"> อีเมลโรงคั่วกาแฟ
                    <span class="require">* <span id="span_email"></span></span>
                </label>
                <input id="e_mail_roasters" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"  name="input-e_mail_roasters" value="<?php echo $row_roasters['e_mail_roasters'] ?>" type="text" class="form-control">

            </div>
            <script>
                var check_e_mail_roasters = true;
                $('#e_mail_roasters').change(function() {
                    var str = $(this).val();
                    // alert(str)
                    $.ajax({
                        url: "./controllers/account-edit.php",
                        type: "POST",
                        data: {
                            key: 'check_e_mail_roasters',
                            e_mail_roasters: str,
                            id_roasters: ID_ROASTERS
                        },
                        success(result, textStatus, jqXHR) {
                            if (result == 0) {
                                check_e_mail_roasters = true;
                                $("#span_email").html('');
                            } else {
                                check_e_mail_roasters = false;
                                $("#span_email").html('ไม่สามารถใช้อีเมลนี้ได้');
                                return alert("ไม่สามารถใช้อีเมลนี้ได้!");
                            }
                        },
                        error(result, textStatus, jqXHR) {
                            check_e_mail_roasters = false;
                            return alert("เกิดข้อผิดพลาด!");
                            // return swal("", "เกินข้อผิดพลาด!", "error");
                        }
                    });
                });
            </script>
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

                    if (check_e_mail_roasters == true && check_num_trade_reg == true) {
                        $.ajax({
                            url: "./controllers/account-edit.php",
                            type: "POST",
                            data: {
                                key: "edit_account_submit",
                                data: values,
                                id_roasters: ID_ROASTERS
                            },
                            success: function(result, textStatus, jqXHR) {
                                // console.log(result);
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
                    }else{
                        alert('กรุณาตรวจสอบข้อมูลใหม่อีกครั้ง')
                    }

                });
            </script>
        </form>

    </div>


<?php

endif;
?>