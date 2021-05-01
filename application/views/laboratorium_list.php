<?php
if(count($lab_list) > 0){
    ?>
    <h6 class="display-6">Data Laboratorium</h6>
    <div class="text-end">
        <a href="<?php echo site_url('/laboratorium/add'); ?>" class="btn btn-primary">Tambah Laboratorium</a>
    </div>
    <br/>
    <table class="my_table" data-order='[[ 0, "asc" ]]'>
        <thead>
            <tr>
                <th>Jenis Lab</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($lab_list as $lab){
                echo '<tr>';
                echo '<td>'.$lab['jenis_lab'].'</td>';
                ?>
                <td>
                    <a href="<?php echo site_url('/laboratorium/edit/'.$lab['id']); ?>" class="btn btn-light btn-sm">Ubah</a>
                    <a href="<?php echo site_url('/laboratorium/delete/'.$lab['id']); ?>" onclick="return confirm('Hapus <?php echo htmlspecialchars($lab['jenis_lab']); ?>?')" class="btn btn-danger btn-sm">Hapus</a>
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
        Tidak ada data Laboratorium
    </div>
    <br/>
    <div class="text-center">
        <a href="<?php echo site_url('/laboratorium/add'); ?>" class="btn btn-light">Buat Laboratorium</a>
    </div>
<?php } ?>