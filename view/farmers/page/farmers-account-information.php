<?php include('../../../config/connectdb.php'); 

if(isset($_POST['key']) && $_POST['key'] == 'information'):
    $id_farmers = $_POST['id_farmers'];
    $sql_search = "SELECT * FROM `farmers` AS far INNER JOIN provinces AS pov ON pov.id_provinces = far.id_provinces WHERE far.id_farmers = '$id_farmers'";

    $row = Database::query($sql_search, PDO::FETCH_ASSOC)->fetch(PDO::FETCH_ASSOC);
?>
<style>
    .pa10{
        padding-left: 10px;
    }
</style>
<h3>ข้อมูลทั่วไป</h3>
<p>กรุณาอย่าเปิดเผยข้อมูลแก่คนอื่นๆ เพื่อความปลอดภัยของบัญชีผู้ใช้คุณเอง</p>
<hr>
<div class="product-page-content" style="margin : 0 px; padding:0px">
    <div class="row">
        <img src="../../pictures/farmers/<?php echo $row['image_farmers']?>" width="100%" height="300px" alt="">
        
    </div>
    <br>
    <table class="datasheet">
        <tr>
            <td class="datasheet-features-type">ชื่อ</td>
            <td class="text-capitalize "><?php echo $row['name_farmers']?></td>
        </tr>
        <tr>
            <td class="datasheet-features-type">อีเมล์</td>
            <td class="text-capitalize"><?php echo $row['email_farmers']?></td>
        </tr>
        <tr>
            <td class="datasheet-features-type">เบอร์โทร</td>
            <td class="text-capitalize"><?php echo $row['tel_farmers']?></td>
        </tr>
        <tr>
            <td class="datasheet-features-type">line</td>
            <td class="text-capitalize"><?php echo $row['line_farmers'] == ''? " - " : $row['line_farmers']?></td>
        </tr>
        <tr>
            <td class="datasheet-features-type">facebook</td>
            <td class="text-capitalize"><?php echo $row['face_farmers'] == ''? " - " : $row['face_farmers']?></td>
        </tr>
        <tr>
            <td class="datasheet-features-type">ที่อยู่</td>
            <td class="text-capitalize"><?php echo $row['address_farmers']?></td>
        </tr>
        <tr>
            <td class="datasheet-features-type">จังหวัด</td>
            <td class="text-capitalize"><?php echo $row['name_provinces']?></td>
        </tr>
        <tr>
            <td class="datasheet-features-type">ไปรษณีย์</td>
            <td class="text-capitalize"><?php echo $row['code_provinces']?></td>
        </tr>
        <tr>
            <td class="datasheet-features-type">รายละเอียดต่างๆ ของโรงคั่วกาแฟ</td>
            <td class="text-capitalize"><?php echo $row['detail_farm'] == ''? " - " : $row['detail_farm']?></td>
        </tr>

    </table>
</div>

<?php 
endif;
?>