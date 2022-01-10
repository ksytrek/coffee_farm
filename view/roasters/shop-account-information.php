<?php include('../../config/connectdb.php'); 

if(isset($_POST['key']) && $_POST['key'] == 'information'):
    $id_roasters = $_POST['id_roasters'];
    $sql_search = "SELECT * FROM `roasters` AS ro INNER JOIN provinces AS pov ON pov.id_provinces = ro.id_provinces WHERE ro.id_roasters = '$id_roasters'";

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
    <table class="datasheet">
        <tr>
            <td class="datasheet-features-type">ชื่อโรงคั่วกาแฟ</td>
            <td class="text-capitalize "><?php echo $row['name_roasters']?></td>
        </tr>
        <tr>
            <td class="datasheet-features-type">เลขทะเบียนการค้า</td>
            <td class="text-capitalize"><?php echo $row['num_trade_reg']?></td>
        </tr>
        <tr>
            <td class="datasheet-features-type">ชื่อผู้ประกอบการ</td>
            <td class="text-capitalize"><?php echo $row['name_entrep']?></td>
        </tr>
        <tr>
            <td class="datasheet-features-type">อีเมลโรงคั่วกาแฟ</td>
            <td class="text-capitalize"><?php echo $row['e_mail_roasters']?></td>
        </tr>
        <tr>
            <td class="datasheet-features-type">ที่ตั้งสำนักงาน</td>
            <td class="text-capitalize"><?php echo $row['address_office']?></td>
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
            <td class="text-capitalize"><?php echo $row['detail_roasters']?></td>
        </tr>

    </table>
</div>

<?php 
endif;
?>