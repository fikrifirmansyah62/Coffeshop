<?php
$meta = $this->menu_m->select_meta()->row();
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url('frontend');?>/css/style_cus.css"/>

	<link rel="icon" href="img/icon-page.png">

	<title>LOGIN ADMIN</title>
</head>
<body style="background-image:url('img/background.jpg')">
<center>
	<div class="container">
       <form action="<?= base_url('login/validasi');?>" method="POST" class="login-email">
			<p class="login-register-text" style="font-size: 3rem; font-weight: 800;">
				HELLO ADMIN
				<img src="img/logo-login.png" alt="Logo Login" width="180">
			</p>
            <?php
                if ($this->session->flashdata('notification')) {
            ?>
            <div class="alert alert-danger d-flex align-items-center" role="alert" align="center">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
					<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
				</svg>
				<div>
				    <?=$this->session->flashdata('notification');?>
				</div>
			</div>
            <?php
            }
            ?>
            <form action="<?=site_url('login/validasi');?>" class="login-email" method="post">
            <div class="input-group">
                    <input type="text" class="form-control" name="username" placeholder="Username" pattern="^[a-zA-Z0-9-_\.]{1,30}$" title="Jangan Pakai SPASI" minlength="5" autocomplete="off" required autofocus>
            </div>
            <div class="input-group">
                    <input type="password" class="form-control" name="password" placeholder="Password" autocomplete="off" required/>
            </div>
            <div class="input-group">
                    <button class="btn btn-danger btn-block"></i> LOGIN</button>
                </div>
            <center> 
            <u><p class="login-register-text"><a href="login_cus" style="font-size: 20px;"> Back Member</a></p></u>
            </center>    
            </form>
        </div>
        <div class="login-footer">
            <div class="pull-left">
                &copy; <?=date('Y');?> <?=$meta->meta_name;?>
            </div>
        </div>
</center>
</body>
</html>


<!-- <i class="fa fa-sign-in"> -->