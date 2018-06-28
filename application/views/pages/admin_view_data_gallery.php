<div class="page-content">
	<div class="page-header">
		<h1>
			Gallery
		</h1>
	</div><!-- /.page-header -->
	<div class="row">
		<div class="col-xs-12">
			<div class="clearfix"style="height: 43px;">
				<div id="btn-upload" class="btn btn-primary btn-xs" type="button" name="button" href="">Upload Images</div>
				<div class="pull-right tableTools-container"></div>
			</div>

			<div>
				<ul class="ace-thumbnails clearfix">
					<li>
						<div>
							<img width="150" height="150" alt="150x150" src="<?php echo base_url();?>assets/images/avatars/profile-pic.jpg" />
							
							<div class="text">
								<div class="inner">
									<span>Some Title!</span>

									<br />
									<a href="<?php echo base_url();?>assets/images/avatars/profile-pic.jpg" data-rel="colorbox">
										<i class="ace-icon fa fa-search-plus"></i>
									</a>

									<a href="#">
										<i class="ace-icon fa fa-user"></i>
									</a>

									<a href="#">
										<i class="ace-icon fa fa-share"></i>
									</a>
								</div>
							</div>
						</div>
					</li>
					<!-- <li>
						<a href="assets/images/gallery/image-3.jpg" data-rel="colorbox">
							<img width="150" height="150" alt="150x150" src="<?php echo base_url();?>assets/images/avatars/profile-pic.jpg" />
							<div class="text">
								<div class="inner">Sample Caption on Hover</div>
							</div>
						</a>

						<div class="tools tools-bottom">
							<a href="#">
								<i class="ace-icon fa fa-link"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-paperclip"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-pencil"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-times red"></i>
							</a>
						</div>
					</li> -->
				</ul>
			</div>
			<!-- <table id="dynamic-table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th class="center">
							<label class="pos-rel">
								<input type="checkbox" class="ace" />
								<span class="lbl"> No</span>
							</label>
						</th>
						<th>Nama Lengkap</th>
						<th>NIM/NPM</th>
						<th>Jenis Kelamin</th>
						<th>Umur</th>
						<th>Email</th>
						<th>Perguruan Tinggi</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no=0;
					foreach ($sql1 as $obj1) {
						$no++;
						?>
						<tr>
							<td class="center">
								<label class="pos-rel">
									<input type="checkbox" class="ace" />
									<span class="lbl"> <?php echo $no; ?></span>
								</label>
							</td>
							<td><?php echo $obj1->nama; ?></td>
							<td><?php echo $obj1->npm; ?></td>
							<td><?php echo $obj1->gender; ?></td>
							<td><?php echo $obj1->umur; ?></td>
							<td><?php echo $obj1->email; ?></td>
							<td><?php echo $obj1->pt; ?></td>
							<td>
								<div class="hidden-sm hidden-xs action-buttons">
									<a class="blue" href="<?php echo base_url();?>index.php/institusi/atlet_data_lengkap/<?php echo $obj1->id_atlet;?>">
										<i class="ace-icon fa fa-search-plus bigger-130" title="Detail Profil"></i>
									</a>
									<a class="green" href="<?php echo base_url();?>index.php/institusi/atlet_edit/<?php echo $obj1->id_atlet;?>">
										<i class="ace-icon fa fa-check fa-fw bigger-130" title="Approve"></i>
									</a>
									<a class="red" href="javascript:if(confirm('Apakah Anda yakin ingin menghapus ?')){document.location='<?php echo base_url();?>index.php/institusi/atlet_hapus/<?php echo $obj1->id_atlet;?>';}">
										<i class="ace-icon fa fa-close fa-fw bigger-130" title="Unapprove"></i>
									</a>
								</div>
							</td>
						</tr>
						<?php
					}
					?>
				</tbody>
			</table> -->
		</div>
	</div>
</div>

	<!-- Import jQuery-->
	<script src="<?php echo base_url(); ?>assets/js/jquery-2.1.4.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery.colorbox.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/moment.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/dataTables.buttons.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/buttons.flash.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/buttons.html5.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/buttons.print.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/buttons.colVis.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/dataTables.select.min.js"></script>
	<script src="assets/js/bootstrap-editable.min.js"></script>
	<script src="assets/js/ace-editable.min.js"></script>
	
	<script type="text/javascript">
		if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
	</script>
	<script src="assets/js/bootstrap.min.js"></script>

	
	<script src="assets/js/ace.min.js"></script>
	<!-- page specific plugin scripts -->
	<script src="assets/js/jquery.colorbox.min.js"></script>

	<!-- ace scripts -->
	<script src="assets/js/ace-elements.min.js"></script>

<script type="text/javascript">
	jQuery(function($) {
		var $overflow = '';
		var colorbox_params = {
			rel: 'colorbox',
			reposition:true,
			scalePhotos:true,
			scrolling:false,
			previous:'<i class="ace-icon fa fa-arrow-left"></i>',
			next:'<i class="ace-icon fa fa-arrow-right"></i>',
			close:'&times;',
			current:'{current} of {total}',
			maxWidth:'100%',
			maxHeight:'100%',
			onOpen:function(){
				$overflow = document.body.style.overflow;
				document.body.style.overflow = 'hidden';
			},
			onClosed:function(){
				document.body.style.overflow = $overflow;
			},
			onComplete:function(){
				$.colorbox.resize();
			}
		};

		$('.ace-thumbnails [data-rel="colorbox"]').colorbox(colorbox_params);
		$("#cboxLoadingGraphic").html("<i class='ace-icon fa fa-spinner orange fa-spin'></i>");//let's add a custom loading icon
		
		
		// $(document).one('ajaxloadstart.page', function(e) {
		// 	$('#colorbox, #cboxOverlay').remove();
		// });
	})
   
</script>

<script>
	$('#btn-upload').on('click', function(){
		var modal = 
		'<div class="modal fade">\
			<div class="modal-dialog">\
			<div class="modal-content">\
			<div class="modal-header">\
				<button type="button" class="close" data-dismiss="modal">&times;</button>\
				<h4 class="blue">Upload Image</h4>\
			</div>\
			\
			<form enctype="multipart/form-data" method="post" action="gallery_simpan" class="no-margin">\
				<div class="modal-body">\
				<div class="space-4"></div>\
				<div style="width:75%;margin-left:12%;"><input type="file" name="file" /></div>\
				</div>\
			\
				<div class="modal-footer center">\
				<button type="submit" class="btn btn-sm btn-success"><i class="ace-icon fa fa-check"></i> Submit</button>\
				<button type="button" class="btn btn-sm" data-dismiss="modal"><i class="ace-icon fa fa-times"></i> Cancel</button>\
				</div>\
			</form>\
			</div>\
			</div>\
		</div>';
		
		
		var modal = $(modal);
		modal.modal("show").on("hidden", function(){
			modal.remove();
		});

		var working = false;

		var form = modal.find('form:eq(0)');
		var file = form.find('input[type=file]').eq(0);
		file.ace_file_input({
			style:'well',
			btn_choose:'Click to Upload',
			btn_change:null,
			no_icon:'ace-icon fa fa-picture-o',
			thumbnail:'small',
			before_remove: function() {
				//don't remove/reset files while being uploaded
				return !working;
			},
			before_change:function(files, dropped) {
				var file = files[0];
				if(typeof file == "string") {
				//file is just a file name here (in browsers that don't support FileReader API such as IE8)
					if(! (/\.(jpe?g|png|gif)$/i).test(file) ) {
						//not an image extension?
						//alert user
						return false;
					}
				}
				else {
					var type = $.trim(file.type);
					if(
						( type.length > 0 && ! (/^image\/(jpe?g|png|gif)$/i).test(type) )
						|| 
						//for android's default browser!
						( type.length == 0 && ! (/\.(jpe?g|png|gif)$/i).test(file.name) )
						)
						{
							//alert user
							return false;
						}
				
						if( file.size > 1024*200 ) {
							//is the file size larger than 100KB?
							//alert user

							var fileSize = file.size/1024/1024;
							var n = fileSize.toFixed(2);
							alert('Your file size is: ' + n + "MB, and it is too large to upload! Please try to upload smaller file (25MB or less).");
            				return false;
						}
				}
				return true;
			},
			allowExt: ['jpg', 'jpeg', 'png', 'gif'],
			allowMime: ['image/jpg', 'image/jpeg', 'image/png', 'image/gif']
		});

		form.on('submit', function(){
			// if(!file.data('ace_input_files')) return false;
			
			// file.ace_file_input('disable');
			// form.find('button').attr('disabled', 'disabled');
			// form.find('.modal-body').append("<div class='center'><i class='ace-icon fa fa-spinner fa-spin bigger-150 orange'></i></div>");
			
			// var deferred = new $.Deferred;
			// working = true;
			// deferred.done(function() {
			// 	form.find('button').removeAttr('disabled');
			// 	form.find('input[type=file]').ace_file_input('enable');
			// 	form.find('.modal-body > :last-child').remove();
				
			// // 	modal.modal("hide");

			// 	// var thumb = file.find('img').data('thumb');
				
			// 	// if(thumb) $('#btn-upload').get(0).size = thumb;

			// 	// alert(thumb);

			// 	// var fileSize = form.find('input[type=file]').ace_file_input('size');

			// 	working = false;
			// });
			
			
			// setTimeout(function(){
			// 	deferred.resolve();
			// } , parseInt(Math.random() * 800 + 800));

			// return false;
		});
				
	});
</script>