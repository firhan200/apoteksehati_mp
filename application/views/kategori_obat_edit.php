<form action="<?php echo site_url('/kategori_obat/edit_process/'.$kategori_obat['id']); ?>" method="post">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="form-group">
                <label class="form-label">Nama Kategori</label>
                <input type="text" name="nama_kategori" value="<?php echo $kategori_obat['nama_kategori'] ?>" class="form-control" maxlength="150" placeholder="Masukan Nama Kategori Obat.." required/>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="text-end">
            <button class="btn btn-primary" type="submit">Submit</button>
        </div>
    </div>
</form>