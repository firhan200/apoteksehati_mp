<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Sistem Manajemen Pasien - Apotek Sehati</title>
		<link rel="shortcut icon" href="<?php echo base_url('assets/img/icon.png'); ?>">
		<link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">
	</head>
	<body>

        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-sm-12 col-md-5 col-lg-4">
                    <div class="box" style="margin-top:50px;margin-bottom:50px;padding:20px !important">
                        <h4 class="display-6 text-center">Masuk</h4>
                        <?php
                        if($this->session->flashdata('err') != null){
                            echo '<div class="alert alert-danger">'.$this->session->flashdata('err').'</div>';
                        }
                        ?>
                        <form action="<?php echo site_url('/user/login_process'); ?>" method="post">
                            <div class="form-group">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Masukan Email.." required maxlength="100"/>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Kata Sandi</label>
                                <input type="password" name="password" class="form-control" placeholder="Masukan Kata Sandi.." required maxlength="50"/>
                            </div>
                            
                            <button type="submit" class="btn btn-primary full" style="margin-top:10px">Masuk</button>
                        </form>
                        <hr/>
                        <div class="text-center">
                            <div class="help">
                                Sistem Manajemen Pasien - Apotek Sehati 2021 &copy;
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

	</body>
</html>