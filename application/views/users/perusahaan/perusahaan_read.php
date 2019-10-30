



    <h2 style="margin-top:0px">Perusahaan <?php echo $nmPeru; ?></h2>
    <table class="table">
	    <tr><td>NmPeru</td><td><?php echo $nmPeru; ?></td></tr>
	    <tr><td>AlamatPeru</td><td><?php echo $alamatPeru; ?></td></tr>
	    <tr><td>NpwpPeru</td><td><?php echo $npwpPeru; ?></td></tr>
	    <tr><td><button onclick="window.history.back(0)" class="btn btn-xs btn-default">KEMBALI</button></td><td></td></tr>
	</table>


        <h2 style="margin-top:0px">Permohonan oleh <?php echo $nmPeru; ?></h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('users/ruang/create/'.$idPru),'+ Ajukan Permohonan Baru ', 'class="btn btn-xs btn-warning"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
 
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
               
                <th>Permohonan</th>
                <th>Luas Lahan</th>
                <th>Status Pemilik</th>
                <th>Pemilik</th>
                <th>Sertifikat</th>
                <th>Atas Nama</th>
                <th>Alamat</th>
                <th>Status Rekomendasi</th>
                <th>Action</th>
            </tr><?php
            foreach ($ruang_data as $ruang)
            {
                ?>
                <tr>
            <td width="12px"><?php echo ++$start ?></td>

            <td><?php echo $ruang->type ?></td>
            <td><?php echo $ruang->luasLahan ?></td>
            <td><?php echo $ruang->statusPemilik ?></td>
            <td><?php echo $ruang->nmPemilik ?></td>
            <td><?php echo $ruang->nmrSertifikat ?></td>
            <td><?php echo $ruang->atasNama ?></td>
            <td><?php echo 'Nagari '.$ruang->nagari.' '.$ruang->kecamatan ?></td>
            <td><span class="btn btn-xs btn-warning"><?php echo $ruang->atasNama ?></span></td>
            <!--td><?php echo $ruang->letakLahan ?></td-->
            <td style="text-align:center" width="200px">
                <?php 
                echo anchor(site_url('users/ruang/read/'.$ruang->idRuang),'Read'); 
                echo ' | '; 
                echo anchor(site_url('users/ruang/update/'.$ruang->idRuang),'Update'); 
                echo ' | ';  
                echo anchor(site_url('users/ruang/delete/'.$ruang->idRuang),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                ?>
            </td>
        </tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
        <?php echo anchor(site_url('users/ruang/excel'), 'Excel', 'class="btn btn-primary"'); ?>
        </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>