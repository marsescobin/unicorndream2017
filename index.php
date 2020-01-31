<?php 

$_SESSION['cart'] = array();
require 'assets/connect.php';

function getTitle() {
	echo 'Welcome to Unicorn Dream Ink!';
}

include 'partials/head.php';

?> 

</head>
<body> 

<?php 
	include 'partials/main_header.php';
?>

<main class= "wrapper1">
	<div class="container">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="assets/images/rainbow.jpg" alt="lipstick" style="width:100%%; height: 75vh; float: left">
        <div class="re">	
        <h1  style="font-size: 2em; padding-top: 20%; color: #4BC0C8;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
       </h1>
        </div>
      </div>

       <div class="item">
        <img src="assets/images/tint3.jpg" style="width:33%; height: 75vh; float: left;">
         <img src="assets/images/tint4.jpg"  style="width:33%; height: 75vh; float: left; ">
         <img src="assets/images/tint7.jpg" style="width:33%; height: 75vh; float: left;">
      </div>

      <div class="item">
        <img src="assets\images\group\lipsticks\stick_3.jpg" style="width:33%; height: 75vh; float: right;">
         <img src="assets\images\group\lipsticks\matte.jpg" style="width:33%; height: 75vh; float: right;">
          <img src="assets\images\group\lipsticks\matte_2.jpg" style="width:33%; height: 75vh; float: right;">

   	</div>
     
    </div>

   
  </div>
</div>

<div class="front-product">

	<?php 
		$sql = "SELECT * FROM products where products_id IN  (1, 2, 5, 7)";
		$result = mysqli_query($conn, $sql); 
		$products= $result;

		while ($product = mysqli_fetch_assoc($products)) {
				extract($product);

				echo '
					<div class="item-parent-container form-group shop">
						<a href="product.php?id='.$products_id.'">
						<div class="item-container">
							<h3>'.$description.'</h3>
							<img class= "product_image"src="'.$product_image.'" alt="Mock data">
							<p id="price'.$products_id.'">PHP '.$price.'</p>

						</div>  <!-- /.item-containerq-->
						</a>
						<input id="itemQuantity'.$products_id.'" class="iq" type="number" value="0" min="0">

						<button class="btn btn-primary form-control shop-button" onclick="addToCart('.$products_id.')">Add to Cart</button>
					</div>
				';
			}

	?> 
	

</div>

<div class="resellers-experts">
	<img src="assets/images/shipping.jpg" style="width: 100%;">	
	<img src="assets/images/resell.jpg" style="width: 100%;">
	<div class="re1">	
	<h2>Serves buyers and resellers</h2>
	</div>
	<img src="assets/images/resell1.jpg" style="width: 100%;">
	<img src="assets/images/experts.jpg" style="width: 100%;" class="mua">	
	<div class="re2">	
	<h2>Trusted by Make up review experts and customers</h2>
	</div>
	<img src="assets/images/escobar.jpg">
	<img src="assets/images/lipstick.jpg">
	
		
</div>

<div class="feedback">
	<img src="assets\images\feedback\1.jpg">
	<img src="assets\images\feedback\2.jpg">
	<img src="assets\images\feedback\3.jpg">
	<img src="assets\images\feedback\4.jpg">
	
</div>

	

</div>





</main>
	  <!--  <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->

<?php include 'partials/main_footer.php'; ?>
<?php include 'partials/foot.php'; ?>

	<script type="text/javascript">
		
		function addToCart(itemId) {
			var id = itemId;
			// console.log(itemId);

			var item_price = $('#price'+id).text();
			var split = item_price.split(' ');
			var price = split[1];

			// // retrieve value of item quantity
			var quantity = $('#itemQuantity' + id).val();
			// console.log(quantity);

			// // create a post request to update session cart variable
			$.post('assets/add_to_cart.php',
				{
					item_id: id,
					item_quantity: quantity,
					item_price: Number(price)
				},
				function(data, status) {
					// console.log(data);
					$('a[href="cart.php"]').html(data);
				});

		}
	</script>

</body>
</html>
