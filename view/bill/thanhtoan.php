
<div class="boxconten">
<form action="index.php?act=donhang" method="post">
        <div class="all-show">
        
            <div class="formtk fromtaikhoan">
            <?php
                            if (isset($_SESSION['user'])&&(is_array($_SESSION['user']))) {
                                extract($_SESSION['user']);
                            }
                        ?>
                <h1 style="font-size: 17px;margin-bottom: 25px;">Thông tin khách hàng</h1>
                <div class="row mb30">
                    Họ và tên<br><br>
                    <input style="width: 95%;" type="text" name="user" id="" value="<?php echo isset($user) ? $user : ''; ?>"> 
                </div>
                <div class="twoform-all">
                    <div class="twoform mr10">
                        <div class="row mb30">
                            Số điện thoại<br><br>
                            <input type="tel" name="phone" id="" value="<?php echo isset($phone) ? $phone : ''; ?>"><br>
                        </div>
                        <div class="row mb30">
                            Địa chỉ<br><br>
                            <input type="text" name="address" id="" value="<?php echo isset($address) ? $address : ''; ?>">
                        </div>
                    </div>
                    <div class="twoform">
                        <div class="row mb30">
                            Địa chỉ Email<br><br>
                            <input type="email" name="email" id="" value="<?php echo isset($email) ? $email : ''; ?>">
                        </div>
                        <div class="row mb30">
                            Địa chỉ khác<br><br>
                            <input type="text" name="address_other" id="" value="<?php echo isset($address) ? $address : ''; ?>">
                        </div>
                    </div>
                </div>
                <h1 style="font-size: 17px;margin-bottom: 25px;">Thông tin bổ sung</h1>
                <div class="row mb30">
                    Ghi chú<br><br>
                    <input style="padding-bottom: 70px; width: 95%;" type="text" name="" id="">  
                </div>
                <h2 class="thongbao" style= "color: rgb(13, 0, 255);">
                        <?php
                            if (isset($thongbao)&&($thongbao)!="") {
                                echo $thongbao;
                            }
                        ?>
                        </h2>
            <h2 class="baoloi" style= "color: red;">
                        <?php
                            if (isset($baoloi)&&($baoloi)!="") {
                                echo $baoloi;
                            }
                        ?>
                        </h2>
            </div>
            <div class="bill fromcontent ml30">
                <table>
                    <h2 style="font-size: 17px;">ĐƠN HÀNG CỦA TÔI</h2>
                    <tr>
                        <th>Sản phẩm</th>
                        <th></th>
                        <th>Tạm tính</th>
                    </tr>
                    <?php
        $total = 0;
        if (isset($_SESSION['mycart'])) {
            foreach ($_SESSION['mycart'] as $cart) {
                $product_id = $cart[0]; // ID của sản phẩm
                $name = $cart[1]; // Tên sản phẩm
                $hinh = $img_path . $cart[2]; // Hình ảnh sản phẩm
                $price = $cart[3]; // Giá sản phẩm
                $quantity = $cart[4]; // Số lượng sản phẩm
                $subtotal = $price * $quantity; // Tổng tiền cho sản phẩm này
                $total += $subtotal; // Tổng tiền cho tất cả sản phẩm
                echo '
                <tr>
                    <td>
                        <div class="img-cart">
                            <img src="' . $hinh . '" alt="">
                        </div>
                    </td>
                    <td>
                        <p style="font-family: Roboto-Regular;">' . $name . '</p>
                    </td>
                    <td>' . number_format($subtotal,0,".",".") . ' VND</td>
                </tr>';
            }
        }
        ?>
                    <!-- <tr>
                        <td>
                            <div class="img-cart">
                            <img src="image/sp chinh.jpg" alt="">
                            </div>
                        </td>
                        <td>
                            <p style="font-family: Roboto-Regular;">Cà Phê G7 3in1 – Bịch 50 Sachets</p>
                        </td>
                        <td>150.000VND</td>
                    </tr> -->
                    <!-- <tr>
                        <td>
                            <div class="img-cart">
                            <img src="image/sp chinh.jpg" alt="">
                            </div>
                        </td>
                        <td>
                            <p>Cà Phê G7 3in1 – Bịch 50 Sachets</p>
                        </td>
                        <td>150.000VND</td>
                    </tr> -->
                    <tr>
                        <td>Tạm tính</td>
                        <td></td>
                        <td><?php echo number_format($total,0,".","."); ?> VND</td>
                    </tr>
                    <tr>
                        <td>Giao hàng</td>
                        <td></td>
                        <td style="font-family: Roboto-LightItalic;">Miễn phí giao hàng</td>
                    </tr>
                    <tr>
                        <td>Tổng</td>
                        <td></td>
                        <td style="color: red;"><?php echo number_format($total,0,".","."); ?> VND</td>
                    </tr>
                </table>
                <div class="pttt-all">
                    <div class="pttt row mb10">
                        <input type="radio" name="radio" id="">Nhận hàng khi thanh toán
                    </div>
                    <div class="pttt row mb10">
                        <input type="radio" name="radio" id="">Thanh toán qua online
                    </div>
                    <div class="pttt row mb10">
                        <input type="radio" name="radio" id="">Thanh toán qua Zalo
                    </div>
                    <div style="display: flex; align-items: center;" class="row mt30">
                        <input type="checkbox" name="checkbox" id=""> 
                        <p style="font-family: Roboto-Regular;">Tôi đồng ý với điều khoản của website</p>
                    </div>
                </div>
                <div class="row mb10 mt30 click-cart">
                    <input style="width: 95%;" type="submit" name="ttdh" value="Đặt hàng">
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
</body>
</html>