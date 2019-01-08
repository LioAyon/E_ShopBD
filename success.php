<?php include 'inc/header.php'; ?>
<?php
  $login = Session::get("cuslogin");
     if ($login == false) {
		 header("location:login.php");
	  }
?>
<style>
.psuccess{
            width:500px;
            min-height:200px;
            text-align:center;
            border:1px solid #ddd;
            margin:0 auto;
            padding:20px;
        }
.psuccess h2{
            border-bottom: 1px solid #ddd;
            margin-bottom: 20px;
            padding-bottom: 10px;
}
.psuccess p{
            line-height: 25px;
            font-size: 18px;
            text-align: left;
}

</style>
 <div class="main">
    <div class="content">
    	<div class="section group">
            <div class="psuccess">
                <h2>Success</h2>
                <?php
                $cmrId = Session::get("cmrId");
                $amount = $ct->payableAmount($cmrId);
                $sum = 0;
                $price = 0;
                
                if ($amount) {
                    
                   while ($result = $amount->fetch_assoc()) {
                       $price = $result['price'];
                       $sum +=$price;
                   }
                }
                ?>
                <p style="color: red; text-align: center">Total Payable Amount(Including Vat) : $
                <?php
                     $vat = $sum * 0.1;
                     $total = $sum+$vat;
                     echo $total;
                ?>
                </p>
                <p>Thanks for purchas. Receive your ordre successfully.
                 We contuct you as soon as possible with delivery details.
                 Hear is your order details.
                 <a href="orderdetails.php">Visit Hear..</a></p>
                
              </div>
 			</div>
 		</div>
 	</div>
 	
<?php include 'inc/footer.php'; ?>