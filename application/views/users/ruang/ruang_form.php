
        <h2 style="margin-top:0px">TAMBAH KETERANGAN LAHAN </h2>

        <form action="<?php echo $action; ?>" method="post" class="form-horizontal">
	    
        <?php echo form_error('peruID') ?>
        <div class="form-group col-md-12">
            <label class="col-sm-2 control-label no-padding-right" for="set">Permohonan <?php echo form_error('type') ?></label>
            <div class="col-md-9">
            <select class="form-control" name="type" id="type" placeholder="Type">
                <option value="<?php echo $type; ?>"><?php echo $type; ?></option>
                <option value="Izin">Izin</option>
                <option value="Informasi">Informasi</option>
            </select>
            </div>
        </div>
	    <div class="form-group col-md-12">
            <label class="col-sm-2 control-label no-padding-right" for="int">Luas Lahan <?php echo form_error('luasLahan') ?></label>
            <div class="col-md-9">
            <input type="text" class="form-control col-md-6" name="luasLahan" id="luasLahan" placeholder="Luas Lahan" value="<?php echo $luasLahan; ?>" />
            </div>
        </div>
	    <div class="form-group col-md-12">
            <label class="col-sm-2 control-label no-padding-right" for="set">Status Kepemilikan <?php echo form_error('statusPemilik') ?></label>
            <div class="col-md-9">
            <input type="text" class="form-control col-md-6" name="statusPemilik" id="statusPemilik" placeholder="Status Kepemilikan" value="<?php echo $statusPemilik; ?>" />
            </div>
        </div>
	    <div class="form-group col-md-12">
            <label class="col-sm-2 control-label no-padding-right" for="varchar">Nama Pemilik <?php echo form_error('nmPemilik') ?></label>
            <div class="col-md-9">
            <input type="text" class="form-control col-md-6" name="nmPemilik" id="nmPemilik" placeholder="Nama Pemilik" value="<?php echo $nmPemilik; ?>" />
            </div>
        </div>
	    <div class="form-group col-md-12">
            <label class="col-sm-2 control-label no-padding-right" for="varchar">Nomor Sertifikat <?php echo form_error('nmrSertifikat') ?></label>
            <div class="col-md-9">
            <input type="text" class="form-control col-md-6" name="nmrSertifikat" id="nmrSertifikat" placeholder="Nomor Sertifikat" value="<?php echo $nmrSertifikat; ?>" />
            </div>
        </div>
	    <div class="form-group col-md-12">
            <label class="col-sm-2 control-label no-padding-right" for="varchar">Atas Nama<?php echo form_error('atasNama') ?></label>
            <div class="col-md-9">
            <input type="text" class="form-control col-md-6" name="atasNama" id="atasNama" placeholder="Atas Nama" value="<?php echo $atasNama; ?>" />
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
            <label class="col-sm-2 control-label no-padding-right" for="varchar">Letak Lahan <?php echo form_error('letakLahan') ?></label>
            <div class="col-md-9">
            <input type="text" class="form-control col-md-6" name="letakLahan" id="letakLahan" placeholder="Letak Lahan" value="<?php echo $letakLahan; ?>" />
            </div>
        </div>
	    <div class="col-md-9">
        <input type="hidden" class="form-control" name="peruID" id="peruID" placeholder="PeruID" value="<?php echo $peruID; ?>" />
        <input type="hidden" name="idRuang" value="<?php echo $idRuang; ?>" />
        </div> 
         <div class="col-md-12"> 
            <center>
            	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                    <a onclick="window.history.back(0)" class="btn btn-default">BATAL</a>
            </center>
        </div>
	</form>
