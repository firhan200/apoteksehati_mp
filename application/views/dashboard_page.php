<div class="row">
    <div class="col-sm-12 col-md-6 col-lg-4">
        <div class="box">
            <div class="chart-title">
                Total Pasien
            </div>
            <div class="display-6 text-center">
                <?php echo $total_pasien; ?>
            </div>
            <br/>
        </div>
        <br/>
        <div class="box">
            <div class="chart-title">
                Jenis Kelamin Pasien
            </div>
            <div id="chart_gender"></div>
            <script>
            var options = {
                chart: {
                    type: 'donut'
                },
                series: [<?php echo $pasien_laki_laki; ?>, <?php echo $pasien_perempuan; ?>],
                labels: ['Laki-laki', 'Perempuan']
            }

            var chart = new ApexCharts(document.querySelector("#chart_gender"), options);

            chart.render();
            </script>
        </div>
        <br/>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-8">
        <div class="box">
            <div class="chart-title">
                Umur Pasien
            </div>
            <div id="chart_age"></div>
            <script>
            var ageList = [];
            var totalList = [];
            <?php
            foreach($umur_list as $umur => $total){
            ?>
            totalList.push(<?php echo $total; ?>);
            ageList.push('<?php echo $umur; ?> Tahun');
            <?php
            }
            ?>
            var options = {
                chart: {
                    height: 320,
                    type: 'bar',
                },
                series: [{
                    name: 'Umur',
                    data: totalList
                }],
                xaxis:{
                    categories: ageList
                }
            }

            var chart = new ApexCharts(document.querySelector("#chart_age"), options);

            chart.render();
            </script>
        </div>
    </div>
</div>
<br/>
<div class="row">
    <div class="col-sm-12">
        <div class="box">
            <div class="chart-title">
                Riwayat Pasien Terakhir
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No. RM</th>
                        <th>Nama Pasien</th>
                        <th>Tanggal Masuk</th>
                        <th>Alasan Dirawat</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                foreach($riwayat_pasien_list as $riwayat){ 
                    echo '<tr>';
                    echo '<td>'.$riwayat['no_rm'].'</td>';
                    echo '<td>'.$riwayat['nama'].'</td>';
                    echo '<td>'.$riwayat['tanggal_masuk'].'</td>';
                    echo '<td>'.$riwayat['alasan_dirawat'].'</td>';
                    echo '<td><a href="'.site_url('/pasien/history/'.$riwayat['pasien_id']).'">Lihat Pasien</a></td>';
                    echo '</tr>';
                }?>
                </tbody>
            </table>
        </div>
    </div>
</div>