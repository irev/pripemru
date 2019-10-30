   <script type="text/javascript">
    function syarat($data={},$no){
        var myObj, x;
        myObj = $data;
        for (x in myObj) {
          console.log($data + myObj[x]);
          document.getElementById($no).innerHTML += '  ✅ '+ myObj[x] + "<br>";
        }
    }
</script>
        <h2 style="margin-top:0px">Data Permohonan</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('data_permohonan/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('data_permohonan/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('data_permohonan'); ?>" class="btn btn-default">Reset</a>
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
        		<th>RuangID</th>
        		<th>PerusID</th>
        		<th>Status</th>
        		<th>Dokumen</th>
        		<th>Action</th>
            </tr><?php
            $no=1;
            foreach ($data_permohonan_data as $data_permohonan)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $data_permohonan->RuangID ?></td>
			<td>
                <?= $this->Perusahaan_model->get_data_by($data_permohonan->PerusID, 'nmPeru') ?>
                <?php echo $data_permohonan->PerusID ?></td>
			<td><?php echo $data_permohonan->status ?></td>
			<td><?php 
                    //$data = $data_permohonan->json_status; 
                    //$manage = print_r(array($data));
                     //print_r(array($data));
                ?>
                <div id="demo<?= $no ?>"></div>
                <script type="text/javascript">
                    var data<?= $no ?> = <?= $data_permohonan->json_status ?>;
                    syarat(data<?= $no ?>,"demo<?= $no ?>");
                </script>
            </td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('data_permohonan/read/'.$data_permohonan->id),'Read'); 
				echo ' | '; 
				echo anchor(site_url('data_permohonan/update_validasi/'.$data_permohonan->id.'/'. $data_permohonan->RuangID.'/'.$data_permohonan->type),'Update'); 
				echo ' | '; 
				echo anchor(site_url('data_permohonan/delete/'.$data_permohonan->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
            <?php
            $no++; 
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('data_permohonan/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>

