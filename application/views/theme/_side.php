<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<!--a class="btn btn-success" href="<?=  base_url('master/tujuan') ?>" title="Master Tujuan/Kota">
							<i class="ace-icon fa fa-map-marker"></i>
						</a>

						<a class="btn btn-info" href="<?=  base_url('master/jabatan') ?>" title="Master Jabatan">
							<i class="ace-icon fa fa-black-tie"></i>
						</a>

						<a class="btn btn-warning" href="<?=  base_url('master/pegawai') ?>" title="Master Pegawai">
							<i class="ace-icon fa fa-users"></i>
						</a>

						<a class="btn btn-danger" href="<?=  base_url('master/transportasi') ?>" title="Master transportasi">
							<i class="ace-icon fa fa-car"></i>
						</a>

						<button class="btn btn-danger">
							<i class="ace-icon fa fa-cogs"></i>
						</button>
						<button class="btn btn-danger">
							<i class="ace-icon fa fa-cogs"></i>
						</button>
						<button class="btn btn-danger">
							<i class="ace-icon fa fa-cogs"></i>
						</button>
						<button class="btn btn-danger">
							<i class="ace-icon fa fa-cogs"></i>
						</button-->
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">
					<li class="">
						<a href="<?= base_url().'dashboard' ?>">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>
					<?php 
					if ($this->uri->segment(1)=='Perusahaan' || $this->uri->segment(1)=='ruang') {
						echo '<li class="active open">';
					}else{
						echo '<li class="">';
					}
					?>
					
					<!--li class=""-->
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text"> PEMOHON </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<?php 
								if ($this->uri->segment(1)=='Perusahaan') {
									echo '<li class="active">';
								}else{
									echo '<li class="">';
								}
								?>
								<!--li class=""-->
								<a href="<?= base_url('/Perusahaan/') ?>" title="Master Anggaran DPA/DPPA">
									<i class="menu-icon fa fa-caret-right"></i>
									Data Perusahaan 
								</a>

								<b class="arrow"></b>
							</li>
							<?php 
								if ($this->uri->segment(1)=='ruang') {
									echo '<li class="active">';
								}else{
									echo '<li class="">';
								}
								?>
								
								<a href="<?= base_url('/ruang') ?>" title="Master Kegiatan Anggaran">
									<i class="menu-icon fa fa-caret-right"></i>
									Data Permohonan
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>		
					<?php 
					if ($this->uri->segment(1)=='m_syarat') {
						echo '<li class="active open">';
					}else{
						echo '<li class="">';
					}
					?>
					
					<!--li class=""-->
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text"> Master </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							
								<?php 
								if ($this->uri->segment(1)=='m_syarat') {
									echo '<li class="active">';
								}else{
									echo '<li class="">';
								}
								?>
								<!--li class=""-->
								<a href="<?= base_url('/m_syarat/') ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Daftar Syarat
								</a>

								<b class="arrow"></b>
							</li>
						

						</ul>
					</li>
			<?php 
					if ($this->uri->segment(1)=='data_permohonan') {
						echo '<li class="active open">';
					}else{
						echo '<li class="">';
					}
			?>
					
					<!--li class=""-->
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text"> Permohonan </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							
								<?php 
								if ($this->uri->segment(1)=='data_permohonan') {
									echo '<li class="active">';
								}else{
									echo '<li class="">';
								}
								?>
								<!--li class=""-->
								<a href="<?= base_url('/data_permohonan/') ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Daftar Permohonan
								</a>

								<b class="arrow"></b>
							</li>
						

						</ul>
					</li>




					</li>
				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state noprint" id="breadcrumbs">
						<?php 
						//LOAD breadcrumb library
						echo $this->breadcrumbs->show();
						 ?>

						<!--ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="<?= base_url() ?>">Home</a>
							</li>

							<li>
								<a href="#">Other Pages <?= $this->uri->segment(1) ?> ></a>
							</li>
							<li class="active">Blank Page</li>
						</ul><-- /.breadcrumb -->

						<div class="nav-search noprint" id="nav-search">
							<form class="form-search" action="<?= base_url('cari') ?>">
								<span class="input-icon">
									<input type="text" name="q" placeholder="Nomor Permohonan" class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- /.nav-search -->
					</div>

					<div class="page-content">
						<div class="ace-settings-container noprint" id="ace-settings-container">
							<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
								<i class="ace-icon fa fa-cog bigger-130"></i>
							</div>

							<div class="ace-settings-box clearfix" id="ace-settings-box" style="color: black;">
								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<div class="pull-left">
											<select id="skin-colorpicker" class="hide">
												<option data-skin="no-skin" value="#438EB9">#438EB9</option>
												<option data-skin="skin-1" value="#222A2D">#222A2D</option>
												<option data-skin="skin-2" value="#C6487E">#C6487E</option>
												<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
											</select>
										</div>
										<span>&nbsp; Choose Skin</span>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar" autocomplete="off" />
										<label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar" autocomplete="off" />
										<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-breadcrumbs" autocomplete="off" />
										<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" autocomplete="off" />
										<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container" autocomplete="off" />
										<label class="lbl" for="ace-settings-add-container">
											Inside
											<b>.container</b>
										</label>
									</div>
								</div><!-- /.pull-left -->

								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" autocomplete="off" />
										<label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" autocomplete="off" />
										<label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" autocomplete="off" />
										<label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
									</div>
								</div><!-- /.pull-left -->
							</div><!-- /.ace-settings-box -->
						</div><!-- /.ace-settings-container -->

						<!--div class="page-header noprint">
							<h1>
								<?= strtoupper($this->uri->segment(1)) ?>
								<?php $total = count($this->uri->segment_array()); ?>
						         <small>
						         	<i class="ace-icon fa fa-angle-double-right"></i>
										<?=  strtoupper($this->uri->segment(2)) ?>
								</small>
							</h1>
						</div><-- /.page-header -->
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="row">
									<div class="col-xs-12">



								