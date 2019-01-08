<?php include 'inc/header.php'; ?>

<?php
  $login = Session::get("cuslogin");
     if ($login == false) {
		 header("location:login.php");
	  }
?>
<style>

</style>
 <div class="main">
    <div class="content">

    	<div class="section group">

    		<div class="Order">
    			<h2 style="color: red; text-align: center">Your Order Details</h2>
					<table class="tblone">
							<tr>
								<th>No</th>
								<th>Product Name</th>
								<th>Image</th>
								<th>Quantity</th>
								<th>Price</th>
								<th>Date</th>
								<th>Status</th>
								<th>Action</th>
							</tr>

						<?php
							$cmrId = Session::get("cmrId");
							$getOrder = $ct->getOrderedProduct($cmrId);
							$i = 0;
							if ($getOrder) {
								while ($result = $getOrder->fetch_assoc()) {
									$i++;

						?>
							
							<tr>
							    <td> <?php echo $i; ?> </td>
                                <td> <?php echo $result['productName']; ?> </td>
                                <td><img src="admin/<?php echo $result['image']; ?>" alt=""/></td>
                                <td> <?php echo $result['quantity']; ?> </td>
												
													<td> $<?php $total = $result['price'] +$result['quantity'];
													echo $total;
													?></td>
								<td> <?php echo $fm->formatDate($result['date']); ?> </td>
								<td> <?php
								if ($result['status'] == '0') {
									echo "Pending";
								}else {
									echo "Shifted";
								}
								 ?> </td>
							<?php
							if ($result['status'] == '1') { ?>
				<td><a onclick="return confirm('Are you sure for delete this product')" href=" ">Delete</a></td>				
							<?php }else{ ?>
				<td>N/A</td>
								<?php } ?>
							</tr>

					
								<?php } }?>
						</table>
    		</div>
    		
    	</div>
    	 	
      <div class="clear"></div>
    </div>
 </div>

 
<?php include 'inc/footer.php'; ?>
