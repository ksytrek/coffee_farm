<?php include('../../config/connectdb.php'); ?>




<h3>แก้ไขรายการสมุดที่อยู่ของคุณ</h3>
<p>กรุณาอย่าเปิดเผยข้อมูลแก่คนอื่นๆ เพื่อความปลอดภัยของบัญชีผู้ใช้คุณเอง</p>
<hr>

<div class="form-group">
    <label for="company">เลทที่/หมูที่ <span class="require">*</span></label>
    <input name="input-add_number" required type="text" id="company" class="form-control">
</div>
<div class="form-group">
    <label for="address1">ซอย/ถนน</label>
    <input name="input-road" type="text" id="address1" class="form-control">
</div>
<div class="form-group">
    <label for="address2">แขวง/ตำบล <span class="require">*</span></label>
    <input name="input-sub_district" required type="text" id="address2" class="form-control">
</div>
<div class="form-group">
    <label for="city"> เขต/อำเภอ <span class="require">*</span></label>
    <input name="input-district" required type="text" id="city" class="form-control">
</div>
<div class="form-group">
    <label for="post-code">รหัสไปรษณี
        <span class="require">*</span></label>
    <input name="input-post_office" min="0" required type="number" id="post-code" class="form-control">
</div>
<div class="form-group">
    <label for="country">จังหวัด<span class="require">*</span></label>
    <select name="input-province" class="form-control input-sm" id="country" required>
        <option disabled selected value=""> --- PleaseSelect --- </option>
        <!--   -->
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
            <input name="input-lat_farm" id='lat' disabled type="number" id="city" class="form-control" required>
        </div>
    </div>

    <div class="col-md-6 " style="padding-right: 0px; padding-left: 4px;">
        <div class="form-group">
            <label for="city"> ลองจิจูดฟาร์ม </label>
            <input name="input-lng_farm" id='lng' disabled type="number" id="city" class="form-control" required>
        </div>
    </div>
</div>


<div class="form-group">
    <label for="city"> เลือกที่ตั้งฟามร์ม <span class="require">*</span><a href="javascript:initialize();$('#map-canvas').css('display','block');">คลิ๊กเพื่อเลือกที่ตั้งฟาร์ม</a></label>
    <div id="map-canvas" style="display: none" class="map-canvas"></div>
</div>

<button class="btn btn-primary pull-right" type="submit" id="button-payment-address">บันทึก</button>
