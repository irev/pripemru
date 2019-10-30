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
    </table>
  

        <link rel="stylesheet" href="<?= base_url() ?>asset/theme/assets/css/bootstrap-multiselect.min.css" />
        <link rel="stylesheet" href="<?= base_url() ?>asset/theme/assets/css/select2.min.css" />
        <h2 style="margin-top:0px"><?php echo $button ?> Verifikasi Data Permohonan </h2>
        <div class="alert alert-info">
                                    <button class="close" data-dismiss="alert">
                                        <i class="ace-icon fa fa-times"></i>
                                    </button>
                                   Informasi ini diisi oleh petugas verifikator, Permohonan Izin/Informasi Pemanfaatan Ruang!
                                </div>
        <form action="<?php echo $action; ?>" method="post">
        <div class="col-xs-12 col-sm-12">
            <div class="control-group">
                <label class="control-label bolder blue">Syarat kelengkapan dokumen permohonan <?= $this->uri->segment(4).$type ?></label>
                <?= (count($syarat) == 0)? "<small class='red'>Belum Diinformasikan Oleh Admin (minta admin untuk input syarat dokument pada master syarat).</small>": "" ?>
                <?php $no=1; foreach ($syarat as $key => $value) { ?>
                   <div class="checkbox">
                        <label>
                         <input name="<?= $value->nama ?>" id="<?= $value->kodeizin ?>" class="ace ace-checkbox-2 <?= $this->uri->segment(5) ?> <?= $type ?>" type="checkbox" value="<?= $value->nama ?>" >
                         <span class="lbl"> <?= $value->nama ?></span>
                        </label>
                    </div>

               <?php $no++; } ?>
            </div>
        </div>
                


	    <div class="form-group hidden">
            <label for="int">RuangID <?php echo form_error('RuangID') ?></label>
            <input type="text" class="form-control" name="RuangID" id="RuangID" placeholder="RuangID" value="<?php echo $RuangID; ?>" />
        </div>
	    <div class="form-group hidden">
            <label for="int">PerusID <?php echo form_error('PerusID') ?></label>
            <input type="text" class="form-control" name="PerusID" id="PerusID" placeholder="PerusID" value="<?php echo $PerusID; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Status <?php echo form_error('status') ?></label>
            <!--input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" /-->
            <select class="form-control" name="status" id="status" placeholder="Status">
                 <option value="<?php echo $status; ?>"><?php echo $status; ?></option>
                <option value="Belum Lengkap">Belum Lengkap</option>
                <option value="Lengkap">Lengkap</option>
            </select>
        </div>
        <div class="form-group">
            <label for="varchar">Type Permohonan<?php echo form_error('type') ?></label>
            <input type="text" class="form-control" name="type" id="type" placeholder="Type Permohonan" value="<?php echo $type; ?>" />
        </div>
	    <div class="form-group">
            <label for="longtext">Json Status <?php echo form_error('json_status') ?></label>
            <input type="text" class="form-control" name="json_status" id="json_status" placeholder="Json Status" value="<?php echo $json_status; ?>" readonly/>
        </div>
                                                           
        <div>
            <hr>
            <center>
	           <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	           <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	           <a href="<?php echo site_url('data_permohonan') ?>" class="btn btn-default">Cancel</a>
            </center>
        </div>
	</form>


        <script src="<?= base_url() ?>asset/theme/assets/js/jquery.raty.min.js"></script>
        <script src="<?= base_url() ?>asset/theme/assets/js/bootstrap-multiselect.min.js"></script>
        <script src="<?= base_url() ?>asset/theme/assets/js/select2.min.js"></script>
        <script src="<?= base_url() ?>asset/theme/assets/js/jquery-typeahead.js"></script>
<script type="text/javascript">
    $('.select2').css('width','200px').select2({allowClear:true});


    var quotations = [];
    $('.<?= $type ?>').click(function(event) {
        console.info('.<?= $type ?> click');
        /* Act on the event */
       // debugger;
        var data = {};
        var syarat = $(this).val(); //'\''+$(this).attr('name')+'\':\''+$(this).val()+'\'';
        data = syarat;
        quotations =[];
        $.each($("input:checked"), function(){
                quotations.push('\''+$(this).attr('id')+'\':\''+$(this).val()+'\'');
            });
        $('#json_status').val(quotations);
    });

var json_status = <?= (strlen($json_status) >1 )? htmlspecialchars_decode($json_status, ENT_QUOTES) : "{}"; ?>;
$.each(json_status, function(key, value){
    console.log(key, value);
    $('#'+key).prop('checked', true);
});

<!--?=  " $('#".$value->kodeizin."').prop('checked', true);"   ?-->



/*
$('input:checked').click(function(event) {
    console.info('console.info');
var y = [1, 2, 2, 3, 2]
var removeItem = 2;

y = jQuery.grep(y, function(value) {
  return value != removeItem;
  console.info(value != removeItem);
});
});
*/
</script>