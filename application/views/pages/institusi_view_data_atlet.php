<div class="page-content">
	<div class="page-header">
		<?php 
			foreach ($sql2 as $obj2) {
				$ss_bukti_atlet = $obj2->ss_bukti_atlet;
			}
			if($ss_bukti_atlet==''){ 
			?>
		<div id="alertBox" class="alert alert-block alert-danger">
			<button type="button" class="close" data-dismiss="alert">
				<i class="ace-icon fa fa-times"></i>
			</button>

			<i class="ace-icon fa fa-warning red"></i>
			Silahkan Upload Bukti Pembayaran Atlet Anda, Sebelum Anda Mendaftarkan Atlet Anda. Klik <b><a href="">disini</a></b> atau Klik Tombol <b>Upload Pembayaran</b>.
		</div>
		<?php } ?>
		<?php 
			$count=0;
			foreach ($sql1 as $obj1) {
				$count++;

			}
			foreach ($sql2 as $obj2) {
				$n_atlet = $obj2->n_atlet;
			}
			if($count<$n_atlet){
			?>
		<div id="alertBox" class="alert alert-block alert-success">
			<button type="button" class="close" data-dismiss="alert">
				<i class="ace-icon fa fa-times"></i>
			</button>

			<i class="ace-icon fa fa-check green"></i>
			Silahkan Daftarkan Atlet Anda dengan Klik <b><a href="">disini</a></b> atau Klik Tombol <b>Tambah Data</b>.
		</div>
		<?php } ?>
		<h1>
			Daftar Atlet
		</h1>
	</div><!-- /.page-header -->
	<div class="row">
		<div class="col-xs-12">
			<div class="clearfix" style="height: 43px;" >
				<a id="tambahDataMhs" class="btn btn-primary btn-xs" type="button" name="button" href="<?php echo base_url();?>index.php/institusi/add_atlet">Tambah data</a>
				<a id="buktiPembayaran" class="btn btn-primary btn-xs" type="button" name="button" >Upload Pembayaran</a>
				<!-- <a class="btn btn-primary btn-xs" type="button" name="button" href="<?php echo base_url();?>index.php/pdf_atlet_institusi/<?php echo $obj1->pt;?>" target="blank">Download</a> -->
				<div class="pull-right tableTools-container"></div>
			</div>
			<table id="dynamic-table" class="table table-striped table-bordered table-hover" disabled>
				<thead>
					<tr>
						<th class="center">
							<label class="pos-rel">
								<!-- <input type="checkbox" class="ace" /> -->
								<span class="lbl"> No</span>
							</label>
						</th>
						<th>Nama Lengkap</th>
						<th>NIM/NPM</th>
						<th>Jenis Kelamin</th>
						<th>Umur</th>
						<th>Email</th>
						<th>Perguruan Tinggi</th>
						<th>Cabang</th>
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
									<!-- <input type="checkbox" class="ace" /> -->
									<span class="lbl"> <?php echo $no; ?></span>
								</label>
							</td>
							<td><?php echo $obj1->nama; ?></td>
							<td><?php echo $obj1->npm; ?></td>
							<td><?php echo $obj1->gender; ?></td>
							<td>
								<?php 
									$dob= $obj1->tanggal_lahir; ;
									$diff = (date('Y') - date('Y',strtotime($dob)));
									echo $diff;
								?>
							</td>
							<td><?php echo $obj1->email; ?></td>
							<td><?php echo $obj1->pt; ?></td>
							<td><?php echo $obj1->cabang; ?></td>
							<td>
								<div class="hidden-sm hidden-xs action-buttons">
									<a class="blue" href="<?php echo base_url();?>index.php/institusi/atlet_data_lengkap/<?php echo $obj1->id_atlet;?>">
										<i class="ace-icon fa fa-search-plus bigger-130" title="Detail Profil"></i>
									</a>
									<a class="green" href="<?php echo base_url();?>index.php/institusi/atlet_edit/<?php echo $obj1->id_atlet;?>">
										<i class="ace-icon fa fa-pencil bigger-130" title="Edit"></i>
									</a>
									<a class="red" href="javascript:if(confirm('Apakah Anda yakin ingin menghapus ?')){document.location='<?php echo base_url();?>index.php/institusi/atlet_hapus/<?php echo $obj1->id_atlet;?>';}">
										<i class="ace-icon fa fa-trash-o bigger-130" title="Delete"></i>
									</a>
								</div>
							</td>
						</tr>
						<?php
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>

	<!-- Import jQuery-->
	<script src="<?php echo base_url(); ?>assets/js/jquery-2.1.4.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/moment.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/dataTables.buttons.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/buttons.flash.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/buttons.html5.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/buttons.print.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/buttons.colVis.min.js"></script>
	<!-- <script src="<?php echo base_url(); ?>assets/js/dataTables.select.min.js"></script> -->
	<script>
	jQuery(function($) {
		//initiate dataTables plugin
		var myTable =
		$('#dynamic-table')
		// .wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
		.DataTable( {
			bAutoWidth: false,
			"aoColumns": [
				{ "bSortable": false },
				null, null,null, null, null, null,null,
				{ "bSortable": false }
			],
			"aaSorting": [],


			//"bProcessing": true,
			//"bServerSide": true,
			//"sAjaxSource": "http://127.0.0.1/table.php"	,

			//,
			//"sScrollY": "200px",
			//"bPaginate": false,

			// "sScrollX": "100%",
			// "sScrollXInner": "120%",
			// "bScrollCollapse": true,
			//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
			//you may want to wrap the table inside a "div.dataTables_borderWrap" element

			//"iDisplayLength": 50


			select: {
				style: 'multi'
			}
		} );



		$.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';

		new $.fn.dataTable.Buttons( myTable, {
			buttons: [
				{
					
				}
			]
		} );
		myTable.buttons().container().appendTo( $('.tableTools-container') );

		//style the message box
		var defaultCopyAction = myTable.button(1).action();
		myTable.button(1).action(function (e, dt, button, config) {
			defaultCopyAction(e, dt, button, config);
			$('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
		});

		var defaultColvisAction = myTable.button(0).action();
		myTable.button(0).action(function (e, dt, button, config) {

			defaultColvisAction(e, dt, button, config);

			if($('.dt-button-collection > .dropdown-menu').length == 0) {
				$('.dt-button-collection')
				.wrapInner('<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
				.find('a').attr('href', '#').wrap("<li />")
			}
			$('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
		});

		////

		setTimeout(function() {
			$($('.tableTools-container')).find('a.dt-button').each(function() {
				var div = $(this).find(' > div').first();
				if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
				else $(this).tooltip({container: 'body', title: $(this).text()});
			});
		}, 500);

		myTable.on( 'select', function ( e, dt, type, index ) {
			if ( type === 'row' ) {
				$( myTable.row( index ).node() ).find('input:checkbox').prop('checked', true);
			}
		} );
		myTable.on( 'deselect', function ( e, dt, type, index ) {
			if ( type === 'row' ) {
				$( myTable.row( index ).node() ).find('input:checkbox').prop('checked', false);
			}
		} );

		/////////////////////////////////
		//table checkboxes
		$('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);

		//select/deselect all rows according to table header checkbox
		$('#dynamic-table > thead > tr > th input[type=checkbox], #dynamic-table_wrapper input[type=checkbox]').eq(0).on('click', function(){
			var th_checked = this.checked;//checkbox inside "TH" table header

			$('#dynamic-table').find('tbody > tr').each(function(){
				var row = this;
				if(th_checked) myTable.row(row).select();
				else  myTable.row(row).deselect();
			});
		});

		//select/deselect a row when the checkbox is checked/unchecked
		$('#dynamic-table').on('click', 'td input[type=checkbox]' , function(){
			var row = $(this).closest('tr').get(0);
			if(this.checked) myTable.row(row).deselect();
			else myTable.row(row).select();
		});

		$(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
			e.stopImmediatePropagation();
			e.stopPropagation();
			e.preventDefault();
		});

		/********************************/
		//add tooltip for small view action buttons in dropdown menu
		$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});

		//tooltip placement on right or left
		function tooltip_placement(context, source) {
			var $source = $(source);
			var $parent = $source.closest('table')
			var off1 = $parent.offset();
			var w1 = $parent.width();

			var off2 = $source.offset();
			//var w2 = $source.width();

			if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
			return 'left';
		}

		/***************/
		$('.show-details-btn').on('click', function(e) {
			e.preventDefault();
			$(this).closest('tr').next().toggleClass('open');
			$(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
		});
	})
</script>


<script>
	if($('#alertBox').hasClass('alert-danger')) {
		$('#tambahDataMhs').attr('disabled',true)
						   .on('click', function(e) {
							   e.preventDefault();
						   });
		$('#dynamic-table').addClass('hidden');
		$('#dynamic-table').attr('id','table-atlet');
		
		$('#buktiPembayaran').on('click', function(){
			var modal = 
			'<div class="modal fade">\
				<div class="modal-dialog">\
				<div class="modal-content">\
				<div class="modal-header">\
					<button type="button" class="close" data-dismiss="modal">&times;</button>\
					<h4 class="blue">Upload Bukti Pembayaran Atlet</h4>\
				</div>\
				\
				<form enctype="multipart/form-data" method="post" action="bukti_atlet_simpan" class="no-margin">\
					<div class="modal-body">\
					<div class="space-4"></div>\
					<div style="width:75%;margin-left:12%;"><input type="file" name="file" required/></div>\
					</div>\
					<div style="width:75%;margin-left:12%;" class="form-group">\
						<label for="form-field-first">Jumlah Atlet yang Didaftarkan :</label>\
						\
						<div>\
							<input type="number" name="jml_atlet" value="" required/>\
						</div>\
					</div>\
				\
					<div class="modal-footer center">\
					<button id="next-regis" type="submit" class="btn btn-sm btn-success"><i class="ace-icon fa fa-check"></i> Submit</button>\
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
	}

	else {
		$('#tambahDataMhs').attr('disabled', false);
		$('#buktiPembayaran').attr('disabled',true)
						   .on('click', function(e) {
							   e.preventDefault();
						   });
		// $('#table-atlet').addClass('visible');
	}
</script>

<script>
</script>