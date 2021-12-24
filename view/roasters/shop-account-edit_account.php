<div id="edit_account">
    <h3>แก้ไขข้อมูลบัญชีของคุณ</h3>
    <p>กรุณาอย่าเปิดเผยข้อมูลแก่คนอื่นๆ เพื่อความปลอดภัยของบัญชีผู้ใช้คุณเอง</p>
    <hr>
    <div class="form-group">
        <label for="firstname"> ชื่อโรงคั่วกาแฟ <span class="require">*</span></label>
        <input name="input-name" type="text" id="firstname455554" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="lastname"> เลขทะเบียนการค้า
            <span class="require">*</span></label>
        <input name="input-last_name" type="text" id="lastname" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="telephone"> ชื่อผู้ประกอบการ
            <span class="require">*</span></label>
        <input name="input-tel_farmers" type="tel" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" id="telephone" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="fax"> นามสกุลผู้ประกอบการ</label>
        <input name="input-line_farmers" type="text" class="form-control">
    </div>
    <div class="form-group">
        <label for="fax"> อีเมลโรงคั่วกาแฟ</label>
        <input name="input-face_farmers" type="text" class="form-control">
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
        <textarea name="input-detail_farm" class=""></textarea>
    </div>
    <button class="btn btn-primary pull-right" type="submit" id="button-payment-address">บันทึก</button>

</div>