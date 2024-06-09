<?php
// GET id là lấy id từ bên MENU.php 
$sql_danhmuc = "SELECT * FROM tbl_danhmuc";
$query_danhmuc = $conn->query($sql_danhmuc);
$sql_show_new = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tbl_sanpham.trangthai=1 ORDER BY tbl_sanpham.id_sanpham DESC LIMIT 10";
$query_show_new = $conn->query($sql_show_new);

?>
<!-- New Arrivals -->
<style>
	.plus1,
	.minus1 {
		padding-left: 14px;
		padding-right: 14px;
		cursor: pointer;
	}

	.plus1:hover,
	.minus1:hover {
		color: #b5aec4;
	}

	.red_button {
		color: white;
	}

	.red_button:hover {
		cursor: pointer;
	}
</style>
<script>
	function confirmAddToCart(event) {
		event.preventDefault();
		<?php
		if(isset($_SESSION['username'])){ ?>
		var userConfirmed = alert("Sản phẩm đã được thêm vào giỏ hàng");
		event.target.closest('form').submit();
		<?php
		}		
		else{
			?>
			if(confirm("Bạn cần đăng nhập để thêm vào giỏ hàng")){
				window.location.href="./login.php";

			}	
		<?php
		}?>
			
	
	}
</script>
<div class="new_arrivals">
	<div class="container">
		<div class="row">
			<div class="col text-center">
				<div class="section_title new_arrivals_title">
					<h2>New Arrivals</h2>
				</div>
			</div>
		</div>
		<div class="row align-items-center">
			<div class="col text-center">
				<div class="new_arrivals_sorting">
					<ul class="arrivals_grid_sorting clearfix button-group filters-button-group">
						<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center active is-checked" data-filter="*">all</li>
						<?php
						foreach ($query_danhmuc as $row) {
						?>
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".<?php echo "$row[tendanhmuc]" ?>"><?php echo "$row[tendanhmuc]" ?></li>

						<?php
						}
						?>
					</ul>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>
					<?php
					foreach ($query_show_new as $row) {
					?><form action="cart/add.php?id_sanpham=<?php echo $row['id_sanpham'] ?>" method="post">
							<div class="product-item <?php echo "$row[tendanhmuc]" ?>">
								<div class="product discount product_filter">
									<div class="product_image">
										<img src="images/<?php echo "$row[hinhanh]" ?>" alt="">
									</div>
									<div class="favorite favorite_left"></div>
									<div class="product_info">
										<h6 class="product_name"><a href="single.php?id_sanpham=<?php echo "$row[id_sanpham]" ?>"><?php echo "$row[tensanpham]" ?></a></h6>
										<div class="product_price"><?php echo "$row[giasanpham]" ?>$</div>
									</div>
								</div>
								<?php if ($row['soluong'] > 0) { ?>
									<button name="themgiohang" type="submit" style="border: none;" class="red_button add_to_cart_button" onclick="confirmAddToCart(event)"><a>add to cart</a></button>
								<?php } else { ?>
									<div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>Hết</span></div>
								<?php } ?>
							</div>
						</form>
					<?php
					}
					?>



				</div>
			</div>
		</div>
	</div>
</div>