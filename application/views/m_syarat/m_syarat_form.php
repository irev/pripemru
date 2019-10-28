
        <h2 style="margin-top:0px">Syarat Kelengkapan Dokumen <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Nomor Urut Persyaratan <?php echo form_error('urut') ?></label>
            <input type="text" class="form-control" name="urut" id="urut" placeholder="Urut" value="<?php echo $urut; ?>" />
        </div>
	    <div class="form-group hidden">
            <label for="varchar">Kodeizin <?php echo form_error('kodeizin') ?></label>
            <input type="text" class="form-control" name="kodeizin" id="kodeizin" placeholder="Kodeizin" value="<?php echo $kodeizin; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama <?php echo form_error('nama') ?></label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Type <?php echo form_error('type') ?></label>
            <!--input type="text" class="form-control" name="type" id="type" placeholder="Type" value="<?php echo $type; ?>" /-->
            <select class="form-control" name="type" id="type" placeholder="Type">
                <option value="<?php echo $type; ?>"><?php echo $type; ?></option>
                <option value="Izin">Izin</option>
                <option value="Informasi">Informasi</option>
            </select>
        </div>
	    <input type="hidden" name="ids" value="<?php echo $ids; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('m_syarat') ?>" class="btn btn-default">Cancel</a>
	</form>
