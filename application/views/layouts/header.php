<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Sistem Manajemen Pasien - Apotek Sehati</title>
		<link rel="shortcut icon" href="<?php echo base_url('assets/img/icon.png'); ?>">
		<link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/datepicker/datepicker.min.css'); ?>" rel="stylesheet">
		<link href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet"/>
	</head>
	<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container-fluid">
			<a class="navbar-brand" href="#">Apotek Sehati</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link <?php if(isset($menu_home)){ echo 'active'; } ?>" aria-current="page" href="<?php echo site_url('/user/dashboard'); ?>">Beranda</a>
					</li>
					<li class="nav-item">
						<a class="nav-link <?php if(isset($menu_obat)){ echo 'active'; } ?>"" aria-current="page" href="<?php echo site_url('/obat'); ?>">Master Obat</a>
					</li>
					<li class="nav-item">
						<a class="nav-link <?php if(isset($menu_pasien)){ echo 'active'; } ?>"" aria-current="page" href="<?php echo site_url('/pasien'); ?>">Pasien</a>
					</li>
				</ul>
				<ul class="navbar-nav">
					<li class="nav-item dropdown dropstart">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<?php echo $this->session->userdata('nama_user_apt'); ?>
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
							<li><a class="dropdown-item" href="#">Profil</a></li>
							<li><hr class="dropdown-divider"></li>
							<li><a class="dropdown-item" href="<?php echo site_url('/user/logout'); ?>">Keluar</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container" style="margin-top:50px;">
		<?php
		if($this->session->flashdata('success_msg') != null){
			echo '<div class="alert alert-success">'.$this->session->flashdata('success_msg').'</div><br/>';
		}
		?>
		<?php
		if($this->session->flashdata('error_msg') != null){
			echo '<div class="alert alert-danger">'.$this->session->flashdata('error_msg').'</div><br/>';
		}
		?>