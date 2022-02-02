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
                <input name="input-name_farmers" type="text" value="<?php echo $row_farmers['name_farmers'] ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="lastname"> อีเมล์เกษตรกร
                    <span class="require">*</span></label>
                <input name="input-email_farmers" type="text" id="lastname" value="<?php echo $row_farmers['email_farmers'] ?>" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="telephone"> เบอร์โทรเกษตรกร
                    <span class="require">*</span></label>
                <input name="input-tel_farmers" type="text" value="<?php echo $row_farmers['tel_farmers'] ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="telephone"> facebook เกษตรกร
                    <span class="require"></span></label>
                <input name="input-face_farmers" type="text" value="<?php echo $row_farmers['face_farmers'] ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="fax"> line เกษตรกร
                    <span class="require"></span>
                </label>
                <input name="input-line_farmers" value="<?php echo $row_farmers['line_farmers'] ?>" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="fax">อัพโหลดรูปภาพ
                    <span class="require">(.png และ jpeg)</span>
                </label>
                <input name="input-image_farmers" type="file" accept="image/png, image/jpeg" class="form-control">
                <div class="form-group">
                    <img id="image_farmers" src="../../script/pictures/default_image.jpg" width="100%" height="180px">
                </div>
                <script>
                    // get a reference to the file input
                    const acc_imageElement = document.querySelector("img[id=image_farmers]");
                    var base64StringAccount = null;
                    // get a reference to the file input
                    const _fileInput = document.querySelector("input[name=input-image_farmers]");

                    // listen for the change event so we can capture the file
                    _fileInput.addEventListener("change", (e) => {
                        // get a reference to the file
                        const file = e.target.files[0];
                        // console.log(file);
                        // var fi = e.files[0];
                        // set file as image source


                        const reader = new FileReader();
                        reader.onloadend = (e) => {
                            var img = document.createElement("img");
                            img.onload = function(event) {
                                // Dynamically create a canvas element
                                var canvas = document.createElement("canvas");
                                canvas.width = 960;
                                canvas.height = 720;
                                // var canvas = document.getElementById("canvas");
                                var ctx = canvas.getContext("2d");
                                // Actual resizing
                                ctx.drawImage(img, 0, 0, canvas.width, canvas.height);

                                // Show resized image in preview element
                                var dataurl = canvas.toDataURL(file.type);
                                // document.getElementById("preview").src = dataurl;
                                acc_imageElement.src = dataurl;

                                // console.log(dataurl.replace(/^data:image\/(png|jpg);base64,/, ""));
                                const base64String_ = dataurl
                                    .replace("data:", "")
                                    .replace(/^.+,/, "");
                                base64StringAccount = base64String_;

                                // console.log(base64String);
                            }
                            img.src = e.target.result;
                        };
                        reader.readAsDataURL(file);
                    });
                </script>
            </div>
            <div class="form-group">
                <label for="fax"> รายละเอียดต่าง ๆ</label>
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
                <textarea name="input-detail_farm" class=""><?php echo $row_farmers['detail_farm'] ?></textarea>
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

                    values['input-image_farmers'] = base64StringAccount;
                    console.log(values);
                    // $.ajax({
                    //     url: "./controllers/account-edit.php",
                    //     type: "POST",
                    //     data: {
                    //         key: "edit_account_submit",
                    //         data: values,
                    //         id_farmers: ID_FARMERS
                    //     },
                    //     success: function(result, textStatus, jqXHR) {
                    //         // console.log(result);
                    //         if(result == 'success'){
                    //             alert('ระบบได้ทำการแก้ไขข้อมูลสำเร็จ');
                    //             location.reload();
                    //         }else{
                    //             alert('ระบบมีปัญหา โปรดทำการแก้ไขใหม่อีกครั้ง');
                    //             location.reload();
                    //         }
                    //     },
                    //     error: function(jqXHR, textStatus, jqXHR) {
                    //         alert('ระบบตรวจพบข้อผิดพลาดจากเซิฟเวอร์ : ' + textStatus);
                    //     }
                    // });
                });
            </script>
        </form>

    </div>


<?php

endif;
?>