<div class="breadcrumb">
    <a href="<?php echo site_url('/kategori_obat'); ?>"><?php echo $kategori_obat['nama_kategori']; ?></a> >
    <a href="<?php echo site_url('/obat/index/'.$kategori_obat['id']); ?>"><?php echo $obat['nama_obat']; ?></a> >
</div>

<form action="<?php echo site_url('/dosis_obat/edit_process/'.$dosis_obat['id']); ?>" method="post">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="form-group">
                <label class="form-label">Dosis Obat</label>
                <input type="text" name="dosis" value="<?php echo $dosis_obat['dosis']; ?>" class="form-control" maxlength="150" placeholder="Masukan Dosis Obat.." required/>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="text-end">
            <a href="<?php echo site_url('/dosis_obat/index/'.$obat['id']); ?>" class="btn btn-warning">Kembali</a>
            <button class="btn btn-primary" type="submit">Submit</button>
        </div>
    </div>
</form>