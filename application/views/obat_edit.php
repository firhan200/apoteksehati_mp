<div class="breadcrumb">
    <a href="<?php echo site_url('/obat/index/'.$kategori_obat['id']); ?>"><?php echo $kategori_obat['nama_kategori']; ?></a> > Tambah
</div>

<form action="<?php echo site_url('/obat/edit_process/'.$obat['id']); ?>" method="post">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="form-group">
                <label class="form-label">Nama Obat</label>
                <input type="text" name="nama_obat" value="<?php echo $obat['nama_obat'] ?>" class="form-control" maxlength="150" placeholder="Masukan Nama Obat.." required/>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="text-end">
            <a href="<?php echo site_url('/obat/index/'.$kategori_obat['id']); ?>" class="btn btn-warning">Kembali</a>
            <button class="btn btn-primary" type="submit">Submit</button>
        </div>
    </div>
</form>