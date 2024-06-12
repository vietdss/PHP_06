<?php
session_start();
include("admincp/config/connect.php");
$id_khachhang = $_SESSION['id_khachhang'];
$sql_khachhang = "SELECT * FROM tbl_dangky WHERE id_khachhang='" . $_SESSION['id_khachhang'] . "' LIMIT 1";
$result_khachhang = $conn->query($sql_khachhang);
$khachhang = $result_khachhang->fetch_assoc();
$sql_giohang = "SELECT * FROM tbl_giohang WHERE id_khachhang='" . $_SESSION['id_khachhang'] . "' LIMIT 1";
$result_giohang = $conn->query($sql_giohang);
$sql_sanpham = "SELECT * FROM tbl_sanpham WHERE id_sanpham='" . $id . "' LIMIT 1";
$result_sanpham = $conn->query($sql_sanpham);
$row_giohang = $result_giohang->fetch_assoc();
$sql_chitiet = "SELECT * FROM tbl_cart_items WHERE id_giohang='$row_giohang[id_giohang]'";
$result_chitiet = $conn->query($sql_chitiet);

if (isset($_POST['thanhtoan']) || isset($_POST['thanhtoantructiep'])) {
    $diachi = '';

    if (isset($_POST['city']) && isset($_POST['district'])) {
        $city = $_POST['city'];
        $district = $_POST['district'];
        $diachi = $city . ', ' . $district;

        if (isset($_POST['ward'])) {
            $ward = $_POST['ward'];
            $diachi .= ', ' . $ward;
        }
    }

    $tonggia = 0;

    foreach ($result_chitiet as $row) {
        $tonggia += $row['gia'];
    }

    if (isset($_POST['thanhtoan'])) {
        $cart_payment = 'Chuyển khoản';
    } else {
        $cart_payment = 'Tiền mặt';
    }

    $sql_themdonhang = "INSERT INTO tbl_donhang (id_khachhang,tonggia,cart_payment,hoten,diachi,sdt,thoigian) VALUES ('$_SESSION[id_khachhang]','$tonggia', '$cart_payment','$_POST[hoten]','$diachi','$_POST[sdt]',NOW())";
    $conn->query($sql_themdonhang);
    $order_id = $conn->insert_id;

    foreach ($result_chitiet as $row) {
        $sql_themdonhangchitiet = "INSERT INTO tbl_chitietdonhang (id_order,id_sanpham,soluongmua) VALUES ('$order_id','$row[id_sanpham]','$row[soluongmua]')";
        $conn->query($sql_themdonhangchitiet);
    }
    $sql_xoa = "DELETE FROM tbl_cart_items WHERE id_giohang='$row_giohang[id_giohang]'";
    $conn->query($sql_xoa);

    if ($cart_payment == 'Chuyển khoản') {
        function execPostRequest($url, $data)
        {
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            ));
            curl_setopt($ch, CURLOPT_TIMEOUT, 5);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);

            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

            $result = curl_exec($ch);

            if (curl_errno($ch)) {
                echo 'Error:' . curl_error($ch);
            }

            curl_close($ch);
            return $result;
        }

        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua MoMo";
        $amount = "10000";
        $orderId = time() . "";
        $redirectUrl = "http://localhost/php_06/thanks.php";
        $ipnUrl = "http://localhost/php_06/thanks.php";
        $extraData = "";

        if (!empty($_POST)) {
            $requestId = time() . "";
            $requestType = "payWithATM";
            $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
            $signature = hash_hmac("sha256", $rawHash, $secretKey);

            $data = array(
                'partnerCode' => $partnerCode,
                'partnerName' => "Test",
                "storeId" => "MomoTestStore",
                'requestId' => $requestId,
                'amount' => $amount,
                'orderId' => $orderId,
                'orderInfo' => $orderInfo,
                'redirectUrl' => $redirectUrl,
                'ipnUrl' => $ipnUrl,
                'lang' => 'vi',
                'extraData' => $extraData,
                'requestType' => $requestType,
                'signature' => $signature
            );

            $result = execPostRequest($endpoint, json_encode($data));
            $jsonResult = json_decode($result, true);

            if (isset($jsonResult['payUrl'])) {
                header('Location: ' . $jsonResult['payUrl']);
                exit();
            } else {
                echo "Error: Unable to get the payment URL. " . (isset($jsonResult['message']) ? $jsonResult['message'] : 'Unknown error');
            }
        }
    } else {
        header('location:thanks.php');
        exit();
    }
}
?>
