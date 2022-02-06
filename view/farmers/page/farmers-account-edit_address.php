<?php
include('../../../config/connectdb.php');
if (isset($_POST['key']) && $_POST['key'] == 'edit_address') :

    $id_farmers = $_POST['id_farmers'];

    $sql_info = "SELECT * FROM `farmers` WHERE id_farmers = '$id_farmers'";

    $row_farmers = Database::query($sql_info, PDO::FETCH_ASSOC)->fetch(PDO::FETCH_ASSOC);
    $sql_provinces = "SELECT * FROM `provinces` WHERE id_provinces ='{$row_farmers['id_provinces']}'";
    $row_provinces = Database::query($sql_provinces, PDO::FETCH_ASSOC)->fetch(PDO::FETCH_ASSOC);
?>




    <h3>แก้ไขรายการสมุดที่อยู่ของคุณ</h3>
    <p>กรุณาอย่าเปิดเผยข้อมูลแก่คนอื่นๆ เพื่อความปลอดภัยของบัญชีผู้ใช้คุณเอง</p>
    <hr>
    <form id="form_edit_address" action="javascript:void(0)" method="post">
        <div class="form-group">
            <label for="fax"> รายละเอียดที่อยู่</label>
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
            <textarea required name="input-address_farmers" class=""><?php echo $row_farmers['address_farmers'] ?></textarea>
        </div>
        <div class="form-group">
            <label for="post-code">รหัสไปรษณี
                <span class="require">*</span></label>
            <input name="input-code_provinces" min="0" required type="number" value="<?php echo $row_farmers['code_provinces'] ?>" id="post-code" class="form-control">
        </div>
        <div class="form-group">
            <label for="country">จังหวัด<span class="require">*</span></label>
            <select name="input-id_provinces" class="form-control input-sm" id="country" required>
                <option selected value="<?php echo $row_provinces['id_provinces'] ?>"><?php echo $row_provinces['name_provinces'] ?></option>
                <?php
                foreach (Database::query("SELECT * FROM `provinces` Order by `name_provinces` ASC ", PDO::FETCH_ASSOC) as $row) :
                ?>
                    <option value="<?php echo $row['id_provinces'] ?>"><?php echo $row['name_provinces'] ?></option>
                <?php
                endforeach;
                ?>
            </select>
        </div>
        <h3>ข้อมูลพิกัด</h3>
        <div class="form-group">
            <div class="col-md-6 " style="padding-left: 0px; padding-right: 4px;">
                <div class="form-group">
                    <label for="city"> ละติจูดฟาร์ม </label>
                    <input name="input-lat_farm" id='lat' disabled type="text" value="<?php echo $row_farmers['lat_farm'] ?>" class="form-control" required>
                </div>
            </div>

            <div class="col-md-6 " style="padding-right: 0px; padding-left: 4px;">
                <div class="form-group">
                    <label for="city"> ลองจิจูดฟาร์ม </label>
                    <input name="input-lng_farm" id='lng' disabled type="text" value="<?php echo $row_farmers['lng_farm'] ?>" class="form-control" required>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="city"> เลือกที่ตั้งฟามร์ม <span class="require">*</span><a href="javascript:initialize();$('#map-canvas').css('display','block');">คลิ๊กเพื่อเลือกที่ตั้งฟาร์ม</a></label>
            <div id="map-canvas" style="display: none" class="map-canvas"></div>
        </div>

        <button class="btn btn-primary pull-right" type="submit" id="button-payment-address">บันทึก</button>

        <script>
            bangkok = new google.maps.LatLng($('input[name="input-lat_farm"]').val(), $('input[name="input-lng_farm"]').val());
            $("#form_edit_address").submit(function() {
                // alert("Edit Account")
                var $inputs = $("#form_edit_address :input");
                var values = {};
                $inputs.each(function() {
                    values[this.name] = $(this).val();
                });
                console.log(values);
                $.ajax({
                    url: "./controllers/account-edit.php",
                    type: "POST",
                    data: {
                        key: "button-payment-address",
                        data: values,
                        id_farmers: ID_FARMERS
                    },
                    success: function(result, textStatus, jqXHR) {
                        // console.log(result);
                        if (result == 'success') {
                            alert('ระบบได้ทำการแก้ไขข้อมูลสำเร็จ');
                            location.reload();
                        } else {
                            alert('กรุณาตรวจสอบรหัสผ่านใหม่อีกครั้ง');
                            // location.reload();
                        }
                    },
                    error: function(jqXHR, textStatus, jqXHR) {
                        alert('ระบบตรวจพบข้อผิดพลาดจากเซิฟเวอร์ : ' + textStatus);
                    }
                });
            });
        </script>

    </form>

<?php

endif;
?>