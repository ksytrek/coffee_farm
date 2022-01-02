<?php include('../../config/connectdb.php');?>

<h3>ประวัติการสั่งซื้อของคุณ</h3>
<p>กรุณาอย่าเปิดเผยข้อมูลแก่คนอื่นๆ เพื่อความปลอดภัยของบัญชีผู้ใช้คุณเอง</p>
<hr>
<ul id="myTab" class="nav nav-tabs">
    <!-- <li class=""><a href="#trade_complete" data-toggle="tab">การซื้อขายเสร็จสิ้น</a></li>
    <li class=""><a href="#cancel_trade" data-toggle="tab">ยกเลิกการซื้อขาย</a></li> -->
    
    <li class="active"><a href="#trade_complete" onclick="update_click_tab(3)" data-toggle="tab">การซื้อขายเสร็จสิ้น </a></li>
    <li class=""><a href="#cancel_trade" onclick="update_click_tab(4)" data-toggle="tab">ยกเลิกการซื้อขาย </a></li>
    <script>
        $(document).ready(function() {
            update_click_tab(3)
        });
        function update_click_tab(numClick) {
            if (numClick == 3) {
                $.ajax({
                    url: "./shop-shopping-cart-trade_complete.php",
                    type: "POST",
                    data: {
                        key: "trade_complete",
                        id_roasters: ID_ROASTERS,
                        status: numClick
                    },
                    success: function(result, textStatus, jqXHR) {
                        $("#trade_complete").html(result);
                    },
                    error: function(result, textStatus, jqXHR) {
                        $("#trade_complete").html("ระบบตรวจพบข้อผิดพลาดจากเซิฟเวอร์");
                    }
                });
                // $("#trade_complete").html();

            } else if (numClick == 4) {
                $.ajax({
                    url: "./shop-shopping-cart-cancel_trade.php",
                    type: "POST",
                    data: {
                        key: "cancel_trade",
                        id_roasters: ID_ROASTERS,
                        status: numClick
                    },
                    success: function(result, textStatus, jqXHR) {
                        $("#cancel_trade").html(result);
                    },
                    error: function(result, textStatus, jqXHR) {
                        $("#cancel_trade").html("ระบบตรวจพบข้อผิดพลาดจากเซิฟเวอร์");
                    }
                });
                // $("#cancel_trade").html();
            }
        }
    </script>
</ul>
<div id="myTabContent" class="tab-content">

    <div class="tab-pane fade in active " id="trade_complete">

    </div>
    
    <div class="tab-pane fade " id="cancel_trade">

    </div>


</div>