
    <h2 style="margin-top:0px">User <?php echo $button ?></h2>
    <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Username <?php echo form_error('username') ?></label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>"  autocomplete="username"/>
        </div>
         <div class="form-group">
            <label for="varchar">Password <?php echo form_error('password') ?></label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" autocomplete="new-password"/>
        </div>
         <div class="form-group">
            <label for="varchar">Password Konfirmasi  <?php echo form_error('passconf') ?></label>
            <input type="password" class="form-control" name="passconf" id="passconf" placeholder="passconf" value="<?php echo $password; ?>"  autocomplete="new-password"/>
        </div>
	    <div class="form-group">
            <label for="varchar">Email <?php echo form_error('email') ?></label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" autocomplete="email" />
        </div> 
        <div class="form-group">
            <label for="set">Level <?php echo form_error('level') ?></label>
            <input type="text" class="form-control" name="level" id="level" placeholder="Level" value="<?php echo $level; ?>" />
        </div>
	   
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('user') ?>" class="btn btn-default">Cancel</a>
	</form>

<!-- 
gunakan standar  form
https://html.spec.whatwg.org/multipage/form-control-infrastructure.html#autofilling-form-controls:-the-autocomplete-attribute 
-->