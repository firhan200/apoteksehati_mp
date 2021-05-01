<div class="box">
    <div class="row">
        <div class="col-sm-12">
            <b>Informasi Pasien</b>
            <br/>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-md-2">
            <div class="show_data">
                <div class="key">
                    No. RM
                </div>
                <div class="value">
                    <?php echo $pasien['no_rm']; ?>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-2">
            <div class="show_data">
                <div class="key">
                    Nama Pasien
                </div>
                <div class="value">
                    <?php echo $pasien['nama']; ?>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-2">
            <div class="show_data">
                <div class="key">
                    Jenis Kelamin
                </div>
                <div class="value">
                    <?php echo $pasien['jenis_kelamin']==LAKI_LAKI ? 'Laki-laki' : 'Perempuan'; ?>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-2">
            <div class="show_data">
                <div class="key">
                    Umur
                </div>
                <div class="value">
                    <?php
                    //get age
                    //date in mm/dd/yyyy format; or it can be in other formats as well
                    $birthDate = $pasien['tanggal_lahir'];
                    //explode the date to get month, day and year
                    $birthDate = explode("-", $birthDate);
                    //get age from date or birthdate
                    $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[1], $birthDate[0], $birthDate[2]))) > date("md")
                        ? ((date("Y") - $birthDate[2]) - 1)
                        : (date("Y") - $birthDate[2]));
                    
                    echo $age.' Tahun';
                    ?>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-2">
            <div class="show_data">
                <div class="key">
                    Faktor Resiko CAD
                </div>
                <div class="value">
                    <?php echo $pasien['faktor_resiko_cad']; ?>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-2">
            <div class="show_data">
                <div class="key">
                    Alamat
                </div>
                <div class="value">
                    <?php echo $pasien['alamat']; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<br/>
<div class="row">
    <div class="col-sm-12 col-md-6">
        <div class="box">
            <div class="row">
                <div class="col-sm-12">
                    <b>Riwayat Pasien</b>
                    <br/>
                </div>
            </div>
            <div class="text-center">
                <img src="<?php echo base_url('/assets/images/riwayat.png'); ?>" width="200px"/>
                <div class="help">
                    Tidak ada riwayat
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-6">
        <div class="box">
            <div class="row">
                <div class="col-sm-12">
                    <b>Laboratorium Pasien</b>
                    <br/>
                </div>
            </div>
            <div class="text-center">
                <img src="<?php echo base_url('/assets/images/lab.png'); ?>" width="200px"/>
                <div class="help">
                    Tidak ada riwayat lab
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-6">
        <div class="box">
            <div class="row">
                <div class="col-sm-12">
                    <b>Echo Pasien</b>
                    <br/>
                </div>
            </div>
            <div class="text-center">
                <img src="<?php echo base_url('/assets/images/echo.png'); ?>" width="200px"/>
                <div class="help">
                    Tidak ada riwayat echo
                </div>
            </div>
        </div>
    </div>
</div>