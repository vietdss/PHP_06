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
if (isset($_POST['thanhtoan'])) {
	$diachi = ''; // Khởi tạo biến địa chỉ

	// Kiểm tra xem đã chọn tỉnh/thành phố và quận/huyện chưa
	if (isset($_POST['city']) && isset($_POST['district'])) {
		// Lấy giá trị của tỉnh/thành phố và quận/huyện
		$city = $_POST['city'];
		$district = $_POST['district'];

		// Gán giá trị địa chỉ
		$diachi = $city . ', ' . $district;

		// Kiểm tra xem có chọn phường/xã không
		if (isset($_POST['ward'])) {
			$ward = $_POST['ward'];
			// Nếu có, thêm phường/xã vào địa chỉ
			$diachi .= ', ' . $ward;
		}
	}

	$tonggia = 0;

	foreach ($result_chitiet as $row) {
		$tonggia += $row['gia'];
	}


	$sql_themdonhang = "INSERT INTO tbl_donhang (id_khachhang,tonggia,cart_payment,hoten,diachi,sdt,thoigian) VALUES ('$_SESSION[id_khachhang]','$tonggia', 'Chuyển khoản','$_POST[hoten]','$diachi','$_POST[sdt]',NOW())";
	$conn->query($sql_themdonhang);
	$order_id = $conn->insert_id;
	foreach ($result_chitiet as $row) {
		$sql_themdonhangchitiet = "INSERT INTO tbl_chitietdonhang (id_order,id_sanpham,soluongmua) VALUES ('$order_id','$row[id_sanpham]','$row[soluongmua]')";
		$conn->query($sql_themdonhangchitiet);
	}
	$sql_xoa = "DELETE FROM tbl_cart_items WHERE id_giohang='$row_giohang[id_giohang]'";
	$conn->query($sql_xoa);
    function execPostRequest($url, $data)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($data))
    );
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);

    // Disable SSL verification
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
$redirectUrl = "http://localhost/php_06/checkout.php";
$ipnUrl = "http://localhost/php_06/checkout.php";
$extraData = "";

if (!empty($_POST)) {
    $partnerCode = $partnerCode;
    $accessKey = $accessKey;
    $secretKey = $secretKey;
    $orderId = $orderId;
    $orderInfo = $orderInfo;
    $amount = $amount;
    $ipnUrl = $ipnUrl;
    $redirectUrl = $redirectUrl;
    $extraData = $extraData;

    $requestId = time() . "";
    $requestType = "payWithATM";
    $extraData = !empty($_POST["extraData"]) ? $_POST["extraData"] : "";
    
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
}

if (isset($_POST['thanhtoantructiep'])) {
	$diachi = ''; // Khởi tạo biến địa chỉ

	// Kiểm tra xem đã chọn tỉnh/thành phố và quận/huyện chưa
	if (isset($_POST['city']) && isset($_POST['district'])) {
		// Lấy giá trị của tỉnh/thành phố và quận/huyện
		$city = $_POST['city'];
		$district = $_POST['district'];

		// Gán giá trị địa chỉ
		$diachi = $city . ', ' . $district;

		// Kiểm tra xem có chọn phường/xã không
		if (isset($_POST['ward'])) {
			$ward = $_POST['ward'];
			// Nếu có, thêm phường/xã vào địa chỉ
			$diachi .= ', ' . $ward;
		}
	}

	$tonggia = 0;

	foreach ($result_chitiet as $row) {
		$tonggia += $row['gia'];
	}


	$sql_themdonhang = "INSERT INTO tbl_donhang (id_khachhang,tonggia,cart_payment,hoten,diachi,sdt,thoigian) VALUES ('$_SESSION[id_khachhang]','$tonggia', 'Tiền mặt','$_POST[hoten]','$diachi','$_POST[sdt]',NOW())";
	$conn->query($sql_themdonhang);
	$order_id = $conn->insert_id;
	foreach ($result_chitiet as $row) {
		$sql_themdonhangchitiet = "INSERT INTO tbl_chitietdonhang (id_order,id_sanpham,soluongmua) VALUES ('$order_id','$row[id_sanpham]','$row[soluongmua]')";
		$conn->query($sql_themdonhangchitiet);
	}
	$sql_xoa = "DELETE FROM tbl_cart_items WHERE id_giohang='$row_giohang[id_giohang]'";
	$conn->query($sql_xoa);
    header('location:index.php');
}
?>

