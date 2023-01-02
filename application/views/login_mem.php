
<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- css -->
	<link rel="stylesheet" type="text/css" href="<?=base_url('frontend');?>/css/style_cus.css"/>

	<link rel="icon" href="img/icon-page.png">

	<title>COFFEE SHOP VIKTOR</title>
</head>
<body style="background-image:url('img/background.jpg')">
	<div class="container">
		<form action="<?= base_url('Login_cus/login_aksi');?>" id="login-form" method="POST" class="login-email">
			
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">
				WELCOME TO
				<img src="img/logo-login.png" alt="Logo Login" width="180">
			</p>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
			<?php
				
            	if ($this->session->flashdata('notification')) {
            ?>
			
				<script>
                    Swal.fire({title: 'Login Gagal',text: 'Masukan Email dan Password dengan benar',icon: 'error',confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.value) {
							
                            window.location = 'login_cus';
                        }
                    })</script>
					
            <?php
            	}
            ?>
			<div class="input-group">
				<input type="email" id="email" title="Silahkan Masukan Email Anda" placeholder="Email" name="email" autocomplete="on">
				<small><span class="text-danger"><?= form_error('Email'); ?></span></small>
			</div>
			
			<div class="input-group">
				<input type="password" id="password" title="Masukan Password Anda" placeholder="Password" name="password">
				<small><span class="text-danger"><?= form_error('Email'); ?></span></small>
			</div>
			
			<div class="input-group">
				<button type="submit" class="btn">Login</button>
			</div>
			
			<p class="login-register-text">Don't have an account? <a href="register_member.php">Register Here</a></p>
			<center> 
				<u>
					<p class="login-register-text"> 
						<a href="login"> Please Login Here For Admin</a>
					</p>
				</u> 
			</center>
		</form>
	</div>
	<!-- sweetalert CDN -->
	<script>
		$(document).ready(function() {
			$('#login_form').on('submmit', function(event) {
				event.preventDefault();
				var email = $('#email').val();
				var password = $('#password').val();
				if (email == '') {
					$('#email').focus();
					swal('Required', 'Email is required', 'warning');
					return falsel;
				}
				if (password == '') {
					$('#password').focus();
					swal('Required', 'Password is required', 'warning');
					return falsel;
				}
				$.ajax({
					url: "<?= base_url()?>Login_cus/aksi_login",
					method: "POST",
					data: {
						email: email,
						password: password
					},
					dataType: "json",
					success: function(data){
						if (data.status == true) {
							swal ({
								title: data.title,
								text: data.message,
								type: "success"
							}, function(){
								$('#login_form').trigger('reset');
								$('#email').focus();
							});
						} else {
							swal({
								title: data.title,
								text: data.message,
								type: "error"
							}, function(){
								$('#login_form').trigger('reset');
							});
						}
					}
				});
			});
		});
	</script>
</body>
</html>