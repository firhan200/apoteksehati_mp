<form action="<?php echo site_url('/laboratorium/edit_process/'.$laboratorium['id']); ?>" method="post">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="form-group">
                <label class="form-label">Jenis Lab</label>
                <input type="text" name="jenis_lab" value="<?php echo $laboratorium['jenis_lab']; ?>" class="form-control" maxlength="150" placeholder="Masukan Jenis Lab.." required/>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="text-end">
            <button class="btn btn-primary" type="submit">Submit</button>
        </div>
    </div>
</form>