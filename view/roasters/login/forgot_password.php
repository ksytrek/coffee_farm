<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link href="css/style.css" rel="stylesheet"> -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script> -->
    <link href="../../../script/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../../../script/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../../../script/assets/plugins/jquery.min.js" type="text/javascript"></script>


</head>
<style type="text/css">
</style>

<body style="background-color:aquamarine">
    <div class="container " style="margin-top: 150px; background-color: aqua;">
        <!-- <div class="col-md-12 col-md-offset-12"> -->
        <div class="panel panel-default ">
            <div class="panel-body" style="margin: 10px">
                <h3><i class="fa fa-lock fa-4x"></i></h3>
                <h2 class="text-center">Forgot Password?</h2>
                <p>You can reset your password here.</p>
                <div class="row">
                    <div class="col">
                        <form action="javascript:resetPass()" method="post">
                            <div class=" form-group">
                                <input id="url_server" type="hidden" value="<?php echo $_SERVER['HTTP_HOST'] ?>">
                                <input id="e_mail_roasters" type="text" class="form-control" placeholder="Please enter your email">
                                <br>
                                <input id="num_trade_reg" type="text" class="form-control" placeholder="Please enter your phone">

                            </div><!-- /input-group -->
                            <div class="form-group">
                                <a href="./" class="align-center">กลับสู่หน้าล็อกอิน</a>
                                <button class="btn btn-primary " type="submit">ลืมรหัสผ่าน</button>

                            </div>

                        </form>

                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
                <script>
                    function resetPass() {
                        var e_mail_roasters = $('#e_mail_roasters').val();
                        var num_trade_reg = $('#num_trade_reg').val();
                        var url_host = $('#url_server').val();
                        // alert(email)
                        $.ajax({
                            url: "./controller/resetPass.php",
                            type: "POST",
                            data: {
                                key: "resetPass",
                                host: url_host,
                                e_mail_roasters: e_mail_roasters,
                                num_trade_reg: num_trade_reg
                            },
                            success: function(result, textStatus, jqXHR) {
                                // console.log(result);
                                if (result == 'success') {
                                    alert('ระบบได้ส่งข้อความไปยังอีเมลเรียบร้อบ\nกรุณาตรวจสอบอีเมล!!');
                                } else {
                                    alert(result);
                                }
                            },
                            error: function(result, textStatus, jqXHR) {
                                console.log(result);
                            }
                        })
                    }

                    $(document).ready(function() {
                        if (localStorage.checkbox && localStorage.checkbox !== "") {
                            $('#e_mail_roasters').val(localStorage.username)
                        }
                    });
                </script>
            </div>
            <!-- </div> -->
        </div>
    </div>
</body>

</html>