
     <h2 style="margin-top:0px">Data_permohonan Read</h2>
        <table class="table">
	    <tr><td>RuangID</td><td><?php echo $RuangID; ?></td></tr>
	    <tr><td>PerusID</td><td><?= $this->Perusahaan_model->get_data_by($PerusID, 'nmPeru') ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td>Json Status</td><td><?php echo $json_status; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('data_permohonan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
