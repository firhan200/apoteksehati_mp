<form action="<?php echo site_url('/pasien/edit_process/'.$pasien['id']); ?>" method="post">
    <div class="row">
        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                <label class="form-label">Nama Pasien</label>
                <input type="text" name="nama" value="<?php echo $pasien['nama']; ?>" class="form-control" maxlength="150" placeholder="Masukan Nama Pasien.." required/>
            </div>
            <div class="form-group">
                <label class="form-label">Jenis Kelamin</label>
                <br/>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="0" id="flexRadioDefault1" <?php echo $pasien['jenis_kelamin']==LAKI_LAKI ? 'checked' : '' ?>>
                    <label class="form-check-label" for="flexRadioDefault1">
                        Laki-laki
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="1" id="flexRadioDefault2" <?php echo $pasien['jenis_kelamin']==PEREMPUAN ? 'checked' : '' ?>>
                    <label class="form-check-label" for="flexRadioDefault2">
                        Perempuan
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label class="form-label">Tanggal Lahir</label>
                <input type="text" name="tanggal_lahir" class="form-control" value="<?php echo $pasien['tanggal_lahir']; ?>" autocomplete="off" maxlength="150" placeholder="Tanggal Lahir Pasien.." data-toggle="datepicker" required/>
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                <label class="form-label">Alamat Pasien</label>
                <textarea name="alamat" class="form-control" maxlength="250" placeholder="Alamat Pasien.." required><?php echo $pasien['alamat']; ?></textarea>
            </div>
            <div class="form-group">
                <label class="form-label">Faktor Resiko CAD</label>
                <select class="form-control" name="faktor_resiko_cad">
                    <option value="<?php echo CAD_HIPERTENSI ?>" <?php echo $pasien['faktor_resiko_cad']==CAD_HIPERTENSI ? 'selected' : '' ?>>Hipertensi</option>
                    <option value="<?php echo CAD_DM ?>" <?php echo $pasien['faktor_resiko_cad']==CAD_DM ? 'selected' : '' ?>>DM</option>
                    <option value="<?php echo CAD_MEROKOK ?>" <?php echo $pasien['faktor_resiko_cad']==CAD_MEROKOK ? 'selected' : '' ?>>Merokok</option>
                    <option value="<?php echo CAD_DISLIPIDEMIA ?>" <?php echo $pasien['faktor_resiko_cad']==CAD_DISLIPIDEMIA ? 'selected' : '' ?>>Dislipidemia</option>
                    <option value="<?php echo CAD_FAMILY_HISTORY ?>" <?php echo $pasien['faktor_resiko_cad']==CAD_FAMILY_HISTORY ? 'selected' : '' ?>>Family History</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="text-end">
            <button class="btn btn-primary" type="submit">Submit</button>
        </div>
    </div>
</form>