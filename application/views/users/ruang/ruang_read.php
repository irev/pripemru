
        <h2 style="margin-top:0px">Informasi Lahan</h2>
        <table class="table">
	    <tr><td>Pemohon</td><td><?php echo $this->Perusahaan_model->get_data_by($peruID, 'nmPeru'); ?></td></tr>
	    <tr><td>Luas Lahan</td><td><?php echo $luasLahan; ?></td></tr>
	    <tr><td>Status Pemilik</td><td><?php echo $statusPemilik; ?></td></tr>
	    <tr><td>Nama Pemilik</td><td><?php echo $nmPemilik; ?></td></tr>
	    <tr><td>Nomor Sertifikat</td><td><?php echo $nmrSertifikat; ?></td></tr>
	    <tr><td>Atas Nama</td><td><?php echo $atasNama; ?></td></tr>
	    <tr><td>Nagari</td><td><?php echo $nagari; ?></td></tr>
	    <tr><td>Kecamatan</td><td><?php echo $kecamatan; ?></td></tr>
	    <tr><td>Letak Lahan</td><td><?php echo $letakLahan; ?></td></tr>
	    <tr><td><a href="<?php echo site_url('users/ruang') ?>" class="btn btn-default">Cancel</a></td><td></td></tr>
	</table>
