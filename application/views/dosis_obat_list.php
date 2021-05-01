<div class="breadcrumb">
    <a href="<?php echo site_url('/kategori_obat'); ?>"><?php echo $kategori_obat['nama_kategori']; ?></a> >
    <a href="<?php echo site_url('/obat/index/'.$kategori_obat['id']); ?>"><?php echo $obat['nama_obat']; ?></a> >
</div>

<?php
if(count($dosis_obat_list) > 0){
    ?>
    <h6 class="display-6">Data Dosis Obat <b><?php echo $obat['nama_obat']; ?></b></h6>
    <div class="text-end">
        <a href="<?php echo site_url('/dosis_obat/add/'.$obat['id']); ?>" class="btn btn-primary">Tambah Dosis</a>
    </div>
    <br/>
    <table class="my_table" data-order='[[ 0, "asc" ]]'>
        <thead>
            <tr>
                <th>Dosis</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($dosis_obat_list as $dosis_obat){
                echo '<tr>';
                echo '<td>'.$dosis_obat['dosis'].'</td>';
                ?>
                <td>
                    <a href="<?php echo site_url('/dosis_obat/edit/'.$dosis_obat['id']); ?>" class="btn btn-light btn-sm">Ubah</a>
                    <a href="<?php echo site_url('/dosis_obat/delete/'.$dosis_obat['id']); ?>" onclick="return confirm('Hapus <?php echo htmlspecialchars($dosis_obat['dosis']); ?>?')" class="btn btn-danger btn-sm">Hapus</a>
                </td>
                <?php
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
    <?php
?>
<?php
}else{
?>
    <div class="text-center">
        <img src="<?php echo base_url('/assets/images/medical.png'); ?>" width="300px"/>
    </div>
    <div class="text-center display-6">
        Tidak ada data Dosis Obat <b><?php echo $obat['nama_obat']; ?></b>
    </div>
    <br/>
    <div class="text-center">
        <a href="<?php echo site_url('/dosis_obat/add/'.$obat['id']); ?>" class="btn btn-light">Buat Dosis</a>
    </div>
<?php } ?>