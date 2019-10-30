
     <h2 style="margin-top:0px"><?php echo $button ?> Perusahaan </h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Perusahaan <?php echo form_error('nmPeru') ?></label>
            <input type="text" class="form-control" name="nmPeru" id="nmPeru" placeholder="Nama Perusahaan" value="<?php echo $nmPeru; ?>" autocomplete="organization"/>
        </div>
	    <div class="form-group">
            <label for="varchar">Alamat Perusahaan <?php echo form_error('alamatPeru') ?></label>
            <input type="text" class="form-control" name="alamatPeru" id="alamatPeru" placeholder="Alamat Perusahaan" value="<?php echo $alamatPeru; ?>" autocomplete="address-line1" />
        </div>
	    <div class="form-group">
            <label for="varchar">NPWP Perusahaan <?php echo form_error('npwpPeru') ?></label>
            <input type="text" class="form-control" name="npwpPeru" id="npwpPeru" placeholder="NPWP Perusahaan" value="<?php echo $npwpPeru; ?>" autocomplate="one-time-code"/>
        </div>
        <input type="hidden" name="idPru" value="<?php echo $idPru; ?>" /> 
	    <input type="hidden" name="iduser" value="<?php echo $this->session->userdata('iduser'); ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('perusahaan') ?>" class="btn btn-default">Cancel</a>
	</form>
