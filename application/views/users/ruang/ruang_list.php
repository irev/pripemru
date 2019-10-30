
        <h2 style="margin-top:0px">DATA PERMOHONAN</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('users/ruang/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('users/ruang/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('users/ruang'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
        <th>PeruID</th>
		<th>Permohonan</th>
		<th>LuasLahan</th>
		<th>StatusPemilik</th>
		<th>NmPemilik</th>
		<th>NmrSertifikat</th>
		<th>AtasNama</th>
		<th>Nagari</th>
		<th>Kecamatan</th>
		<th>LetakLahan</th>
		<th>Action</th>
            </tr><?php
            foreach ($ruang_data as $ruang)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><a href="<?= base_url('users/perusahaan/read/'.$ruang->peruID) ?>"><?php echo $ruang->peruID.$ruang->nmPeru // $this->Perusahaan_model->get_data_by($ruang->peruID, 'nmPeru') ?></a></td>
            <td><?php echo $ruang->type ?></td>
			<td><?php echo $ruang->luasLahan ?></td>
			<td><?php echo $ruang->statusPemilik ?></td>
			<td><?php echo $ruang->nmPemilik ?></td>
			<td><?php echo $ruang->nmrSertifikat ?></td>
			<td><?php echo $ruang->atasNama ?></td>
			<td><?php echo $ruang->nagari ?></td>
			<td><?php echo $ruang->kecamatan ?></td>
			<td><?php echo $ruang->letakLahan ?></td>
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
  