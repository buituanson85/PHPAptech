<?php
    include 'inc/header.php';
?>
<?php
    $login_check = Session::get ('customer_login');
    if ($login_check){
        header ('Location: order.php');
    }
?>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){

        $insertCustomer = $cs-> insert_customer($_POST); // có hình ảnh phải có $_FILES  $_POST lấy tất cả dữ liệu
    }
?>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){

        $login_Customer = $cs-> login_customer($_POST); // có hình ảnh phải có $_FILES  $_POST lấy tất cả dữ liệu
    }
?>
 <div class="main">
    <div class="content">
    	 <div class="login_panel">
        	<h3>Existing Customers</h3>
        	<p>Sign in with the form below.</p>
             <?php
                if (isset($login_Customer)){
                    echo $login_Customer;
                }
             ?>
        	<form action="" method="post" id="member">
                	<input name="email" type="email" placeholder="Enter email"  class="field">
                    <input name="password" type="password" placeholder="Enter password" class="field">

                 <p class="note">If you forgot your passoword just enter your email and click <a href="#">here</a></p>
                    <div class="buttons"><div><input class="grey" name="login" type="submit" value="Đăng ký"></div></div>
                    </div>
        </form>
        <?php

        ?>
    	<div class="register_account">
    		<h3>Register New Account</h3>
            <?php
                if (isset($insertCustomer)){
                    echo $insertCustomer;
                }
            ?>
    		<form action="" method="post">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" name="name" placeholder="Enter name" >
							</div>
							
							<div>
							   <input type="text" name="city" placeholder="Enter city">
							</div>
							
							<div>
								<input type="text" name="zipcode" placeholder="Enter Zip code">
							</div>
							<div>
								<input type="email" name="email" placeholder="Enter email">
							</div>
		    			 </td>
		    			<td>
						<div>
							<input type="text" name="address" placeholder="Enter address">
						</div>
		    		<div>
						<select id="country" name="country" class="frm-field required">
							<option value="null">Select a Country</option>         
							<option value="hcm">Hồ Chí Minh</option>
                            <option value="hn">Hà Nội</option>
                            <option value="na">Nghệ An</option>
                            <option value="hb">Hoà Bình</option>
                            <option value="hp">Hải Phòng</option>
		                </select>
				 </div>		        
	
		           <div>
		          <input type="text" name="phone" placeholder="Enter phone">
		          </div>
				  
				  <div>
					<input type="password" name="password" placeholder="Enter password">
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><div><input value="Đăng ký" type="submit" name="submit" class="btn btn-success"></div></div>
		    <p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php include 'inc/footer.php'; ?>

