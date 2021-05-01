<form action="<?php echo site_url('/pasien/add_process'); ?>" method="post">
    <div class="row">
        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                <label class="form-label">Nama Pasien</label>
                <input type="text" name="nama" class="form-control" maxlength="150" placeholder="Masukan Nama Pasien.." required/>
            </div>
            <div class="form-group">
                <label class="form-label">Jenis Kelamin</label>
                <br/>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="0" id="flexRadioDefault1" checked>
                    <label class="form-check-label" for="flexRadioDefault1">
                        Laki-laki
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="1" id="flexRadioDefault2">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Perempuan
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label class="form-label">Tanggal Lahir</label>
                <input type="text" name="tanggal_lahir" class="form-control" autocomplete="off" maxlength="150" placeholder="Tanggal Lahir Pasien.." data-toggle="datepicker" required/>
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                <label class="form-label">Alamat Pasien</label>
                <select class="form-control" name="alamat">
                    <option value="<?php echo ALAMAT_CIREBON_KOTA ?>"><?php echo ALAMAT_CIREBON_KOTA; ?></option>
                    <option value="<?php echo ALAMAT_CIREBON_KAB ?>"><?php echo ALAMAT_CIREBON_KAB; ?></option>
                    <option value="<?php echo ALAMAT_INDRAMAYU ?>"><?php echo ALAMAT_INDRAMAYU; ?></option>
                    <option value="<?php echo ALAMAT_KUNINGAN ?>"><?php echo ALAMAT_KUNINGAN; ?></option>
                    <option value="<?php echo ALAMAT_MAJALENGKA ?>"><?php echo ALAMAT_MAJALENGKA; ?></option>
                    <option value="<?php echo ALAMAT_LUAR_WILAYAH ?>"><?php echo ALAMAT_LUAR_WILAYAH; ?></option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-label">Faktor Resiko CAD</label>
                <select class="form-control" name="faktor_resiko_cad">
                    <option value="<?php echo CAD_HIPERTENSI ?>">Hipertensi</option>
                    <option value="<?php echo CAD_DM ?>">DM</option>
                    <option value="<?php echo CAD_MEROKOK ?>">Merokok</option>
                    <option value="<?php echo CAD_DISLIPIDEMIA ?>">Dislipidemia</option>
                    <option value="<?php echo CAD_FAMILY_HISTORY ?>">Family History</option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-label">EKG</label>
                <select class="form-control" name="ekg">
                    <option value="<?php echo EKG_SINUS ?>"><?php echo EKG_SINUS; ?></option>
                    <option value="<?php echo EKG_AF_FLUTTER ?>"><?php echo EKG_AF_FLUTTER; ?></option>
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