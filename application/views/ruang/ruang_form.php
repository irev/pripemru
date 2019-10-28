
        <h2 style="margin-top:0px"><?php echo $button ?> KETERANGAN LAHAN </h2>
        <form action="<?php echo $action; ?>" method="post" class="form-horizontal">
	    <div class="form-group col-md-12">
            <label class="col-sm-2 control-label no-padding-right" for="int" >PeruID <?php echo form_error('peruID') ?></label>
            <div class="col-md-9">
            <input type="text" class="form-control" name="peruID" id="peruID" placeholder="PeruID" value="<?php echo $peruID; ?>" />
            </div>
        </div>
        <div class="form-group col-md-12">
            <label class="col-sm-2 control-label no-padding-right" for="set">Type Permohonan <?php echo form_error('type') ?></label>
            <div class="col-md-9">
            <select class="form-control" name="type" id="type" placeholder="Type">
                <option value="<?php echo $type; ?>"><?php echo $type; ?></option>
                <option value="Izin">Izin</option>
                <option value="Informasi">Informasi</option>
            </select>
            </div>
        </div>
	    <div class="form-group col-md-12">
            <label class="col-sm-2 control-label no-padding-right" for="int">LuasLahan <?php echo form_error('luasLahan') ?></label>
            <div class="col-md-9">
            <input type="text" class="form-control col-md-6" name="luasLahan" id="luasLahan" placeholder="LuasLahan" value="<?php echo $luasLahan; ?>" />
            </div>
        </div>
	    <div class="form-group col-md-12">
            <label class="col-sm-2 control-label no-padding-right" for="set">StatusPemilik <?php echo form_error('statusPemilik') ?></label>
            <div class="col-md-9">
            <input type="text" class="form-control col-md-6" name="statusPemilik" id="statusPemilik" placeholder="StatusPemilik" value="<?php echo $statusPemilik; ?>" />
            </div>
        </div>
	    <div class="form-group col-md-12">
            <label class="col-sm-2 control-label no-padding-right" for="varchar">NmPemilik <?php echo form_error('nmPemilik') ?></label>
            <div class="col-md-9">
            <input type="text" class="form-control col-md-6" name="nmPemilik" id="nmPemilik" placeholder="NmPemilik" value="<?php echo $nmPemilik; ?>" />
            </div>
        </div>
	    <div class="form-group col-md-12">
            <label class="col-sm-2 control-label no-padding-right" for="varchar">NmrSertifikat <?php echo form_error('nmrSertifikat') ?></label>
            <div class="col-md-9">
            <input type="text" class="form-control col-md-6" name="nmrSertifikat" id="nmrSertifikat" placeholder="NmrSertifikat" value="<?php echo $nmrSertifikat; ?>" />
            </div>
        </div>
	    <div class="form-group col-md-12">
            <label class="col-sm-2 control-label no-padding-right" for="varchar">AtasNama <?php echo form_error('atasNama') ?></label>
            <div class="col-md-9">
            <input type="text" class="form-control col-md-6" name="atasNama" id="atasNama" placeholder="AtasNama" value="<?php echo $atasNama; ?>" />
            </div>
        </div>
	    <div class="form-group col-md-12">
            <label class="col-sm-2 control-label no-padding-right" for="varchar">Nagari <?php echo form_error('nagari') ?></label>
            <div class="col-md-9">
            <input type="text" class="form-control col-md-6" name="nagari" id="nagari" placeholder="Nagari" value="<?php echo $nagari; ?>" />
            </div>
        </div>
	    <div class="form-group col-md-12">
            <label class="col-sm-2 control-label no-padding-right" for="varchar">Kecamatan <?php echo form_error('kecamatan') ?></label>
            <div class="col-md-9">
            <input type="text" class="form-control col-md-6" name="kecamatan" id="kecamatan" placeholder="Kecamatan" value="<?php echo $kecamatan; ?>" />
            </div>
        </div>
	    <div class="form-group col-md-12">
            <label class="col-sm-2 control-label no-padding-right" for="varchar">LetakLahan <?php echo form_error('letakLahan') ?></label>
            <div class="col-md-9">
            <input type="text" class="form-control col-md-6" name="letakLahan" id="letakLahan" placeholder="LetakLahan" value="<?php echo $letakLahan; ?>" />
            </div>
        </div>
	    <div class="col-md-9">
        <input type="hidden_ss" name="idRuang" value="<?php echo $idRuang; ?>" />
        </div> 
         <div class="col-md-12"> 
            <center>
            	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                    <a href="<?php echo site_url('ruang') ?>" class="btn btn-default">Cancel</a>
            </center>
        </div>
	</form>
