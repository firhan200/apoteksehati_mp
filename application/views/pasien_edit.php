<form action="<?php echo site_url('/pasien/edit_process/'.$pasien['id']); ?>" method="post">
    <div class="row">
        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                <label class="form-label">No. RM</label>
                <input type="text" name="no_rm" value="<?php echo $pasien['no_rm']; ?>" class="form-control" maxlength="150" placeholder="Nomor RM" required/>
            </div>
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
                <select class="form-control" name="alamat">
                    <option value="<?php echo ALAMAT_CIREBON_KOTA ?>" <?php echo $pasien['alamat']==ALAMAT_CIREBON_KOTA ? 'selected' : '' ?>><?php echo ALAMAT_CIREBON_KOTA; ?></option>
                    <option value="<?php echo ALAMAT_CIREBON_KAB ?>" <?php echo $pasien['alamat']==ALAMAT_CIREBON_KAB ? 'selected' : '' ?>><?php echo ALAMAT_CIREBON_KAB; ?></option>
                    <option value="<?php echo ALAMAT_INDRAMAYU ?>" <?php echo $pasien['alamat']==ALAMAT_INDRAMAYU ? 'selected' : '' ?>><?php echo ALAMAT_INDRAMAYU; ?></option>
                    <option value="<?php echo ALAMAT_KUNINGAN ?>" <?php echo $pasien['alamat']==ALAMAT_KUNINGAN ? 'selected' : '' ?>><?php echo ALAMAT_KUNINGAN; ?></option>
                    <option value="<?php echo ALAMAT_MAJALENGKA ?>" <?php echo $pasien['alamat']==ALAMAT_MAJALENGKA ? 'selected' : '' ?>><?php echo ALAMAT_MAJALENGKA; ?></option>
                    <option value="<?php echo ALAMAT_LUAR_WILAYAH ?>" <?php echo $pasien['alamat']==ALAMAT_LUAR_WILAYAH ? 'selected' : '' ?>><?php echo ALAMAT_LUAR_WILAYAH; ?></option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-label">Faktor Resiko CAD</label>
                <div class="form-check">
                    <input class="form-check-input" name="cad[]" <?php echo $hipertensi ? 'checked' : '' ?> type="checkbox" value="<?php echo CAD_HIPERTENSI ?>" id="check_<?php echo CAD_HIPERTENSI ?>">
                    <label class="form-check-label" for="check_<?php echo CAD_HIPERTENSI ?>">
                        <?php echo CAD_HIPERTENSI ?>
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="cad[]" <?php echo $dm ? 'checked' : '' ?> type="checkbox" value="<?php echo CAD_DM ?>" id="check_<?php echo CAD_DM ?>">
                    <label class="form-check-label" for="check_<?php echo CAD_DM ?>">
                        <?php echo CAD_DM ?>
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="cad[]" <?php echo $merokok ? 'checked' : '' ?> type="checkbox" value="<?php echo CAD_MEROKOK ?>" id="check_<?php echo CAD_MEROKOK ?>">
                    <label class="form-check-label" for="check_<?php echo CAD_MEROKOK ?>">
                        <?php echo CAD_MEROKOK ?>
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="cad[]" <?php echo $dislipidemia ? 'checked' : '' ?> type="checkbox" value="<?php echo CAD_DISLIPIDEMIA ?>" id="check_<?php echo CAD_DISLIPIDEMIA ?>">
                    <label class="form-check-label" for="check_<?php echo CAD_DISLIPIDEMIA ?>">
                        <?php echo CAD_DISLIPIDEMIA ?>
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="cad[]" <?php echo $family_history ? 'checked' : '' ?> type="checkbox" value="<?php echo CAD_FAMILY_HISTORY ?>" id="check_<?php echo CAD_FAMILY_HISTORY ?>">
                    <label class="form-check-label" for="check_<?php echo CAD_FAMILY_HISTORY ?>">
                        <?php echo CAD_FAMILY_HISTORY ?>
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label class="form-label">EKG</label>
                <select class="form-control" name="ekg">
                    <option value="<?php echo EKG_SINUS ?>" <?php echo $pasien['ekg']==EKG_SINUS ? 'selected' : '' ?>><?php echo EKG_SINUS; ?></option>
                    <option value="<?php echo EKG_AF_FLUTTER ?>" <?php echo $pasien['ekg']==EKG_AF_FLUTTER ? 'selected' : '' ?>><?php echo EKG_AF_FLUTTER; ?></option>
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