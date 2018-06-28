		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar                  responsive                    ace-save-state compact">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<?php
					if ($this->session->userdata('role') == 'institusi') { ?>
						<ul class="nav nav-list">

							<li class="<?php if($this->uri->segment(2) == 'view_atlet'){ echo 'active';} ?>">
								<a href="<?php echo base_url(); ?>index.php/institusi">
									<i class="menu-icon fa fa-users"></i>
									<span class="menu-text"> Daftar Atlet </span>
								</a>
								<b class="arrow"></b>
							</li>


						</ul><!-- /.nav-list -->
					<?php }
				 ?>

				 <?php
 					if ($this->session->userdata('role') == 'admin') { ?>
 						<ul class="nav nav-list">
						 	<li class="<?php if($this->uri->segment(2) == ''){ echo 'active';} ?>">
 								<a href="<?php echo base_url(); ?>index.php/admin">
 									<i class="menu-icon fa fa-tachometer"></i>
 									<span class="menu-text"> Dashboard </span>
 								</a>
 								<b class="arrow"></b>
							 </li>
							 

 							<li class="<?php if($this->uri->segment(2) == 'view_pt'){ echo 'active';} ?>">
 								<a href="<?php echo base_url(); ?>index.php/admin/view_pt">
 									<i class="menu-icon fa fa-users"></i>
 									<span class="menu-text"> Daftar Instisusi </span>
 								</a>
 								<b class="arrow"></b>
 							</li>


 							<li class="<?php if($this->uri->segment(2) == 'view_atlet'){ echo 'active';} ?>">
 								<a href="<?php echo base_url(); ?>index.php/admin/view_atlet">
 									<i class="menu-icon fa fa-users"></i>
 									<span class="menu-text"> Daftar Atlet </span>
 								</a>
 								<b class="arrow"></b>
 							</li>

 							<li class="<?php if($this->uri->segment(2) == 'view_berita'){ echo 'active';} ?>">
 								<a href="<?php echo base_url(); ?>index.php/admin/view_berita">
 									<i class="menu-icon fa fa-book"></i>
 									<span class="menu-text"> Berita Terkini </span>
 								</a>
 								<b class="arrow"></b>
 							</li>


 							<li class="<?php if($this->uri->segment(2) == 'view_gallery'){ echo 'active';} ?>">
 								<a href="<?php echo base_url(); ?>index.php/admin/view_gallery">
 									<i class="menu-icon fa fa-picture-o"></i>
 									<span class="menu-text"> Gallery </span>
 								</a>
 								<b class="arrow"></b>
 							</li>

							<li class="<?php if($this->uri->segment(2) == 'view_akun'){ echo 'active';} ?>">
								<a href="<?php echo base_url(); ?>index.php/admin/view_akun">
									<i class="menu-icon fa fa-tag"></i>
									<span class="menu-text"> Akun </span>
								</a>
							<b class="arrow"></b>
 							</li>
 						</ul><!-- /.nav-list -->
 					<?php }
 				 ?>

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="<?php echo base_url(); ?>index.php/<?php echo $this->session->userdata('role'); ?>">Home</a>
							</li>
							<li class="active"><?php echo $title; ?></li>
						</ul><!-- /.breadcrumb -->

						<!-- <div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- /.nav-search -->
					</div>



						<!-- CONTENT HERE -->
