<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>		
		<div id="navbar" class="navbar  ace-save-state navbar-fixed-top">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="<?= base_url() ?>" class="navbar-brand">
						<small>
							<i class="fa fa-folder-open-o"></i>
							<?= _APLIKASI_ ." TA ".$this->session->userdata("TA") ?>

							<?php
							//print_r($this->session->userdata());
							if (!$this->agent->is_browser('Chrome'))
								{
								        echo  '<small> Sangat disarankan memakai browser Google Chrome.</small> <a target="_blank" href="https://www.google.com/chrome/" class="btn btn-xs">Download disisni</a>';
								}
							?>	
							</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">

						<li class="light-blue dropdown-modal col-xs-12 col-sm-12">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="<?= base_url()?>asset/theme/assets/images/avatars/user.jpg" alt="Jason's Photo" />
								<span class="user-info">
									<small>Hallo,</small>
									<?=  $this->session->userdata("username") ?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="<?= base_url() ?>user/setting">
										<i class="ace-icon fa fa-cog"></i>
										Settings
									</a>
								</li>

								<li>
									<a href="<?= base_url() ?>user/profile">
										<i class="ace-icon fa fa-user"></i>
										Profile
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="<?= base_url() ?>login/logout">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>
