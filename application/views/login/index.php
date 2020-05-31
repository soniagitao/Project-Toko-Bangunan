<body>

<?=
form_open('Login/proses_login');
?>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
				<form class="login100-form validate-form flex-sb flex-w" method="POST"> 
					<span class="login100-form-title p-b-32">
						Account Login
					</span>

                    <?php echo $script_captcha;  ?>
					<span class="txt1 p-b-11">
						Username
					</span>
					<form action="<?php echo site_url() ?>login/log_process" class="needs-validation" method="POST">
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Username is required">
						<input class="input100" type="text" name="uname1" placeholder="username">
						<span class="focus-input100"></span>
					</div>
					
					<span class="txt1 p-b-11">
						Password
					</span>
					<div class="wrap-input100 validate-input m-b-12" data-validate = "Password is required">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
						<input class="input100" type="password" name="pwd1" placeholder="password">
						<span class="focus-input100"></span>
					</div>
					<div class="form-group">
                            <?php echo $captcha ?>
                        </div>
                    </form>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

                </form>
		</div>
    </div>
    
    <?=
    form_close();
    ?>