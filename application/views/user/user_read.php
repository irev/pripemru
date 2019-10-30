
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>

        <h2 style="margin-top:0px">User Read</h2>
        <table class="table">
	    <tr><td>Username</td><td><?php echo $username; ?></td></tr>
	    <tr><td>Password</td><td> <button class="btn btn-xs btn-warning">Ubah Password</button><?php //echo $password; ?></td></tr>
	    <tr><td>Level</td><td><?php echo $level; ?></td></tr>
	    <tr><td>Email</td><td><?php echo $email; ?></td></tr>
	    <tr><td>Token</td><td><?php echo $token; ?></td></tr>
	    <tr><td>Token Expire</td><td><?php echo $token_expire; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('user') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
