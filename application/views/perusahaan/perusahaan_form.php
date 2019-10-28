
        <h2 style="margin-top:0px">Perusahaan <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">NmPeru <?php echo form_error('nmPeru') ?></label>
            <input type="text" class="form-control" name="nmPeru" id="nmPeru" placeholder="NmPeru" value="<?php echo $nmPeru; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">AlamatPeru <?php echo form_error('alamatPeru') ?></label>
            <input type="text" class="form-control" name="alamatPeru" id="alamatPeru" placeholder="AlamatPeru" value="<?php echo $alamatPeru; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">NpwpPeru <?php echo form_error('npwpPeru') ?></label>
            <input type="text" class="form-control" name="npwpPeru" id="npwpPeru" placeholder="NpwpPeru" value="<?php echo $npwpPeru; ?>" />
        </div>
	    <input type="hidden" name="idPru" value="<?php echo $idPru; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('perusahaan') ?>" class="btn btn-default">Cancel</a>
	</form>
