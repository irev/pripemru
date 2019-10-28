<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Perusahaan Read</h2>
        <table class="table">
	    <tr><td>NmPeru</td><td><?php echo $nmPeru; ?></td></tr>
	    <tr><td>AlamatPeru</td><td><?php echo $alamatPeru; ?></td></tr>
	    <tr><td>NpwpPeru</td><td><?php echo $npwpPeru; ?></td></tr>
	    <tr><td><button onclick="window.history.back(0)" class="btn btn-default">BACK</button></td><td><a href="<?php echo site_url('perusahaan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>