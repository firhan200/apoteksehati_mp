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
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addRiwayatModal">
                        + Riwayat
                    </button>
                    <br/>
                </div>
            </div>
            <?php if(count($riwayat_list) > 0){ ?>
                <br/>
                <table class="my_table">
                    <thead>
                        <th>Tanggal Masuk</th>
                        <th>Alasan Dirawat</th>
                        <th></th>
                    </thead>
                    <tbody>
                    <?php foreach($riwayat_list as $riwayat){ ?>
                    <tr>
                        <td><?php echo $riwayat['tanggal_masuk'] ?></td>
                        <td><?php echo $riwayat['alasan_dirawat'] ?></td>
                        <td>
                            <a href="#" class="btn btn-sm btn-light ubah-riwayat" 
                                data-tanggal-masuk="<?php echo $riwayat['tanggal_masuk'] ?>" 
                                data-alasan-dirawat="<?php echo $riwayat['alasan_dirawat'] ?>" 
                                data-bs-toggle="modal" 
                                data-bs-target="#ubahRiwayatModal" 
                                data-id="<?php echo $riwayat['id'] ?>">Ubah</a>
                            <a href="<?php echo site_url('/riwayat/delete/'.$riwayat['id']); ?>" onclick="return confirm('Hapus riwayat <?php echo htmlspecialchars($riwayat['alasan_dirawat']); ?>?')" class="btn btn-sm btn-danger">Hapus</a>
                        </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
            <?php }else{ ?>
                <div class="text-center">
                    <img src="<?php echo base_url('/assets/images/riwayat.png'); ?>" width="200px"/>
                    <div class="help">
                        Tidak ada riwayat
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="col-sm-12 col-md-6">
        <div class="box">
            <div class="row">
                <div class="col-sm-12">
                    <b>Laboratorium Pasien</b>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addLabModal">
                        + Lab
                    </button>
                    <br/>
                </div>
            </div>
            <?php if(count($lab_list) > 0){ ?>
                <br/>
                <table class="my_table">
                    <thead>
                        <th>Jenis Lab</th>
                        <th>Tanggal Lab</th>
                        <th>Hasil Lab</th>
                        <th></th>
                    </thead>
                    <tbody>
                    <?php foreach($lab_list as $lab){ ?>
                    <tr>
                        <td><?php echo $lab['jenis_lab'] ?></td>
                        <td><?php echo $lab['tanggal_lab'] ?></td>
                        <td><?php echo $lab['hasil_lab'] ?></td>
                        <td>
                            <a href="#" class="btn btn-sm btn-light ubah-riwayat" 
                                data-bs-toggle="modal" 
                                data-bs-target="#ubahLabModal" 
                                data-id="<?php echo $riwayat['id'] ?>">Ubah</a>
                            <a href="<?php echo site_url('/riwayat/delete_lab/'.$lab['id']); ?>" onclick="return confirm('Hapus lab <?php echo htmlspecialchars($lab['tanggal_lab']); ?>?')" class="btn btn-sm btn-danger">Hapus</a>
                        </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
            <?php }else{ ?>
            <div class="text-center">
                <img src="<?php echo base_url('/assets/images/lab.png'); ?>" width="200px"/>
                <div class="help">
                    Tidak ada riwayat lab
                </div>
            </div>
            <?php } ?>
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

<!-- riwayat modal -->
<div class="modal fade" id="addRiwayatModal" tabindex="-1" role="dialog" aria-labelledby="addRiwayatModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Riwayat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="riwayat-form" method="post" action="<?php echo site_url('/riwayat/add_process/'.$pasien['id']); ?>">
                <div class="modal-body">
                        <div class="form-group">
                            <label>Tanggal Masuk</label>
                            <input type="text" name="tanggal_masuk" class="form-control" autocomplete="off" maxlength="150" placeholder="Tanggal Masuk Pasien.." data-toggle="datepicker" required/>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Alasan Dirawat</label>
                            <textarea name="alasan_dirawat" class="form-control" maxlength="250" placeholder="Alasan Pasien Dirawat" required></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="ubahRiwayatModal" tabindex="-1" role="dialog" aria-labelledby="ubahRiwayatModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Riwayat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="edit_riwayat_form" method="post" action="<?php echo site_url('/riwayat/edit_process/{id}'); ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Tanggal Masuk</label>
                        <input type="text" name="tanggal_masuk" class="form-control tanggal_masuk" autocomplete="off" maxlength="150" placeholder="Tanggal Masuk Pasien.." data-toggle="datepicker" required/>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Alasan Dirawat</label>
                        <textarea name="alasan_dirawat" class="form-control alasan_dirawat" maxlength="250" placeholder="Alasan Pasien Dirawat" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- riwayat modal -->

<!-- lab modal -->
<div class="modal fade" id="addLabModal" tabindex="-1" role="dialog" aria-labelledby="addLabModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Lab</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="<?php echo site_url('/riwayat/add_lab_process/'.$pasien['id']); ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Jenis Lab</label>
                        <select name="laboratorium_id" class="form-control">
                            <?php foreach($master_lab as $lab){
                                echo '<option value='.$lab['id'].'>'.$lab['jenis_lab'].'</option>';
                            } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lab</label>
                        <input type="text" name="tanggal_lab" class="form-control" autocomplete="off" maxlength="150" placeholder="Tanggal Lab Pasien.." data-toggle="datepicker" required/>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Hasil Lab</label>
                        <textarea name="hasil_lab" class="form-control" maxlength="250" placeholder="Hasil Lab Pasien"></textarea>
                        <div class="help">kosongkan apabila belum ada hasil lab</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="ubahRiwayatModal" tabindex="-1" role="dialog" aria-labelledby="ubahRiwayatModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Riwayat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="edit_riwayat_form" method="post" action="<?php echo site_url('/riwayat/edit_process/{id}'); ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Tanggal Masuk</label>
                        <input type="text" name="tanggal_masuk" class="form-control tanggal_masuk" autocomplete="off" maxlength="150" placeholder="Tanggal Masuk Pasien.." data-toggle="datepicker" required/>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Alasan Dirawat</label>
                        <textarea name="alasan_dirawat" class="form-control alasan_dirawat" maxlength="250" placeholder="Alasan Pasien Dirawat" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- lab modal -->