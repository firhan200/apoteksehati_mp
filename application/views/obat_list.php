<div class="breadcrumb">
    <a href="<?php echo site_url('/kategori_obat'); ?>"><?php echo $kategori_obat['nama_kategori']; ?></a> >
</div>

<?php
if(count($obat_list) > 0){
    ?>
    <h6 class="display-6">Data Obat <b><?php echo $kategori_obat['nama_kategori'] ?></b></h6>
    <div class="text-end">
        <a href="<?php echo site_url('/obat/add/'.$kategori_obat['id']); ?>" class="btn btn-primary">Tambah Obat</a>
    </div>
    <br/>
    <table class="my_table" data-order='[[ 0, "asc" ]]'>
        <thead>
            <tr>
                <th>Nama Obat</th>
                <th>Total Dosis</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($obat_list as $obat){
                echo '<tr>';
                echo '<td>'.$obat['nama_obat'].'</td>';
                echo '<td>'.$obat['total_dosis'].'</td>';
                ?>
                <td>
                    <a href="<?php echo site_url('/dosis_obat/index/'.$obat['id']); ?>" class="btn btn-primary btn-sm">Manajemen Dosis</a>
                    <a href="<?php echo site_url('/obat/edit/'.$obat['id']); ?>" class="btn btn-light btn-sm">Ubah</a>
                    <a href="<?php echo site_url('/obat/delete/'.$obat['id']); ?>" onclick="return confirm('Hapus <?php echo htmlspecialchars($obat['nama_obat']); ?> beserta seluruh data dosis?')" class="btn btn-danger btn-sm">Hapus</a>
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
        Tidak ada data Obat
    </div>
    <br/>
    <div class="text-center">
        <a href="<?php echo site_url('/obat/add/'.$kategori_obat['id']); ?>" class="btn btn-light">Buat Obat</a>
    </div>
<?php } ?>