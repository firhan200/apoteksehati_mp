<?php
if(count($kategori_obat_list) > 0){
    ?>
    <h6 class="display-6">Data Kategori Obat</h6>
    <div class="text-end">
        <a href="<?php echo site_url('/kategori_obat/add'); ?>" class="btn btn-primary">Tambah Kategori Obat</a>
    </div>
    <br/>
    <table class="my_table" data-order='[[ 0, "asc" ]]'>
        <thead>
            <tr>
                <th>Nama Kategori Obat</th>
                <th>Total Obat</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($kategori_obat_list as $kategori_obat){
                echo '<tr>';
                echo '<td>'.$kategori_obat['nama_kategori'].'</td>';
                echo '<td>'.$kategori_obat['total_obat'].'</td>';
                ?>
                <td>
                    <a href="<?php echo site_url('/obat/index/'.$kategori_obat['id']); ?>" class="btn btn-primary btn-sm">Manajemen Obat</a>
                    <a href="<?php echo site_url('/kategori_obat/edit/'.$kategori_obat['id']); ?>" class="btn btn-light btn-sm">Ubah</a>
                    <a href="<?php echo site_url('/kategori_obat/delete/'.$kategori_obat['id']); ?>" onclick="return confirm('Hapus <?php echo htmlspecialchars($kategori_obat['nama_kategori']); ?> beserta seluruh data obat?')" class="btn btn-danger btn-sm">Hapus</a>
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
        <a href="<?php echo site_url('/kategori_obat/add'); ?>" class="btn btn-light">Buat Kategori Obat</a>
    </div>
<?php } ?>