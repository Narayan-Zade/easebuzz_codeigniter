<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Easebuzz Integration in CodeIgniter</title>
</head>
<body>

<div id="container">

					<div class="mandatory-data">
						<form method="POST" action="<?php echo base_url().'Payment_gateway/pay';?>">	
							

                            <div class="form-field">
                                <label for="firstname">First Name<sup>*</sup></label>
                                <input id="firstname" class="firstname" name="firstname" value="" placeholder="">
                            </div>
                    
                            <div class="form-field">
                                <label for="email">Email ID<sup>*</sup></label>
                                <input id="email" class="email" name="email" value="" placeholder="">
                            </div>
                    
                            <div class="form-field">
                                <label for="phone">Phone<sup>*</sup></label>
                                <input id="phone" class="phone" name="phone" value="" placeholder="">
                            </div>
                            
                            <div class="form-field">
                                <label for="productinfo">Product Information<sup>*</sup></label>
                                <input id="productinfo" class="productinfo" name="productinfo" value="" placeholder="">
                            </div>
                            <div class="form-field">
                                <label for="amount">Amount</label>
                                <input id="amount" class="amount" name="amount" value="" placeholder="">
                            </div>  
                    		<div class="form-field">
                            	<input type="submit" name="btn_pay" value="Pay Now">
                            </div>
                        </form> 
                    </div>
</div>

</body>
</html>