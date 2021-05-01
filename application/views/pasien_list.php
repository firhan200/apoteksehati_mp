<?php
if(count($pasien_list) > 0){
    ?>
    <h6 class="display-6">Data Pasien</h6>
    <div class="text-end">
        <a href="<?php echo site_url('/pasien/add'); ?>" class="btn btn-primary">Tambah Pasien</a>
    </div>
    <br/>
    <table class="my_table" data-order='[[ 0, "desc" ]]'>
        <thead>
            <tr>
                <th>No. RM</th>
                <th>Nama Pasien</th>
                <th>Umur</th>
                <th>Jenis Kelamin</th>
                <th>Faktor Resiko CAD</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($pasien_list as $pasien){
                //get age
                //date in mm/dd/yyyy format; or it can be in other formats as well
                $birthDate = $pasien['tanggal_lahir'];
                //explode the date to get month, day and year
                $birthDate = explode("-", $birthDate);
                //get age from date or birthdate
                $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[1], $birthDate[0], $birthDate[2]))) > date("md")
                    ? ((date("Y") - $birthDate[2]) - 1)
                    : (date("Y") - $birthDate[2]));

                if($pasien['tanggal_meninggal'] != null && $pasien['tanggal_meninggal'] != ""){
                    echo '<tr style="background-color:#FADBD8;">';
                }else{
                    echo '<tr>';

                }
                echo '<td>'.$pasien['no_rm'].'</td>';
                echo '<td><a href="'.site_url('/pasien/riwayat/'.$pasien['id']).'">'.$pasien['nama'].'</a></td>';
                echo '<td>'.$age.' Tahun</td>';
                echo '<td>'.($pasien['jenis_kelamin']==LAKI_LAKI ? 'Laki-laki' : 'Perempuan').'</td>';
                echo '<td>'.$pasien['faktor_resiko_cad'].'</td>';
                ?>
                <td>
                    <a href="<?php echo site_url('/pasien/history/'.$pasien['id']); ?>" class="btn btn-primary btn-sm">Riwayat</a>
                    <a href="<?php echo site_url('/pasien/edit/'.$pasien['id']); ?>" class="btn btn-light btn-sm">Ubah</a>
                    <a href="<?php echo site_url('/pasien/delete/'.$pasien['id']); ?>" onclick="return confirm('Hapus <?php echo htmlspecialchars($pasien['nama']); ?> beserta seluruh riwayat nya?')" class="btn btn-danger btn-sm">Hapus</a>
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
        <img src="<?php echo base_url('/assets/images/empty.png'); ?>" width="300px"/>
    </div>
    <div class="text-center display-6">
        Tidak ada Pasien
    </div>
    <br/>
    <div class="text-center">
        <a href="<?php echo site_url('/pasien/add'); ?>" class="btn btn-light">Buat Data Pasien</a>
    </div>
<?php } ?>