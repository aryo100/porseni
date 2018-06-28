<div class="page-content">
						<div class="row">
							<div class="col-xs-12">
								<div class="page-header">
									<h1>
										Nilai & Rapot
									</h1>
								</div><!-- /.page-header -->
								<div class="row">
									<div class="col-xs-12" style="margin: 10px 0px;">
										<a href="add_nilai.html" class="btn btn-primary">Isi nilai</a>
										<!-- <a style="margin:10px 0px;" href="#" class="btn btn-primary">Lihat Rapot</a> -->
									</div>
								<!-- PAGE CONTENT BEGINS -->
								</div>
								<div class="row">
									<div class="col-xs-12">
										<div style="background-color: #EFF3F8; padding: 5px;">
											<select>
												<option>Kelas 1</option>
												<option>Kelas 2</option>
												<option>Kelas 3</option>
												<option>Kelas 4</option>
											</select>
											<select>
												<option>Matematika</option>
												<option>IPA</option>
												<option>Sosial</option>
												<option>Other</option>
											</select>
										</div>
									</div>
								</div>
								<!-- <table id="grid-table"></table>

								<div id="grid-pager"></div> -->
								<table id="dynamic-table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th class="center">
							<label class="pos-rel">
								<input type="checkbox" class="ace" />
								<span class="lbl">No</span>
							</label>
						</th>
						<th>Nama Lengkap</th>
						<th>Jenis Kelamin</th>
						<th>TTL</th>
						<th>NIS</th>
						<th>NISN</th>
						<th>Agama</th>
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
							<td><?php echo $obj1->nama_depan . " " . $obj1->nama_tengah . " " . $obj1->nama_belakang; ?></td>
							<td><?php echo $obj1->alamat."<br>".$obj1->kelurahan." ".$obj1->kecamatan." ".$obj1->kota." ".$obj1->provinsi; ?></td>
							<td><?php echo $obj1->jenis_kelamin; ?></td>
							<td><?php echo $obj1->tempat_lahir . ", " .$obj1->tanggal_lahir; ?></td>
							<td><?php echo $obj1->nis; ?></td>
							<td><?php echo $obj1->nisn; ?></td>
							<td><?php echo $obj1->agama; ?></td>
							<td>
								<div class="hidden-sm hidden-xs action-buttons">
									<a class="blue" href="<?php echo base_url();?>index.php/admin/siswa_data_lengkap/<?php echo $obj1->id_siswa;?>">
										<i class="ace-icon fa fa-search-plus bigger-130" title="Detail Profil"></i>
									</a>
									<a class="green" href="<?php echo base_url();?>index.php/admin/siswa_edit/<?php echo $obj1->id_siswa;?>">
										<i class="ace-icon fa fa-pencil bigger-130" title="Edit"></i>
									</a>
									<a class="red" href="javascript:if(confirm('Apakah Anda yakin ingin menghapus ?')){document.location='<?php echo base_url();?>index.php/admin/siswa_hapus/<?php echo $obj1->id_siswa;?>';}">
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
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<!-- Import jQuery-->
			<script src="<?php echo base_url(); ?>assets/js/jquery-2.1.4.min.js"></script>
			<script src="<?php echo base_url(); ?>assets/js/grid.locale-en.js"></script>
			<script src="<?php echo base_url(); ?>assets/js/moment.js"></script>
			<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
			<script src="<?php echo base_url(); ?>assets/js/jquery.jqGrid.min.js"></script>
			<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.bootstrap.min.js"></script>
			<script src="<?php echo base_url(); ?>assets/js/dataTables.buttons.min.js"></script>
			<script src="<?php echo base_url(); ?>assets/js/buttons.flash.min.js"></script>
			<script src="<?php echo base_url(); ?>assets/js/buttons.html5.min.js"></script>
			<script src="<?php echo base_url(); ?>assets/js/buttons.print.min.js"></script>
			<script src="<?php echo base_url(); ?>assets/js/buttons.colVis.min.js"></script>
			<script src="<?php echo base_url(); ?>assets/js/dataTables.select.min.js"></script>
			

			<!-- <script type="text/javascript">
				jQuery(function($) {
					var grid_selector = "#grid-table";
					var pager_selector = "#grid-pager";
					
					
					var parent_column = $(grid_selector).closest('[class*="col-"]');
					//resize to fit page size
					$(window).on('resize.jqGrid', function () {
						$(grid_selector).jqGrid( 'setGridWidth', parent_column.width() );
					})
					
					//resize on sidebar collapse/expand
					$(document).on('settings.ace.jqGrid' , function(ev, event_name, collapsed) {
						if( event_name === 'sidebar_collapsed' || event_name === 'main_container_fixed' ) {
							//setTimeout is for webkit only to give time for DOM changes and then redraw!!!
							setTimeout(function() {
								$(grid_selector).jqGrid( 'setGridWidth', parent_column.width() );
							}, 20);
						}
					})
					
					//if your grid is inside another element, for example a tab pane, you should use its parent's width:
					/**
					$(window).on('resize.jqGrid', function () {
						var parent_width = $(grid_selector).closest('.tab-pane').width();
						$(grid_selector).jqGrid( 'setGridWidth', parent_width );
					})
					//and also set width when tab pane becomes visible
					$('#myTab a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
					if($(e.target).attr('href') == '#mygrid') {
						var parent_width = $(grid_selector).closest('.tab-pane').width();
						$(grid_selector).jqGrid( 'setGridWidth', parent_width );
					}
					})
					*/
					
					jQuery(grid_selector).jqGrid({
						// alert("<?php echo base_url(); ?>index.php/admin/viewTable");
						url: "<?php echo base_url(); ?>index.php/admin/viewTable",
						datatype: "json",
						height: 250,
						// mtype: 'POST',
						colNames:[' ', 'ID', 'Nama', 'Mata Pelajaran', 'Uas'],
						colModel:[
							{name:'myac', index:'', width:80, fixed:true, sortable:false, resize:false,
								formatter:'actions', 
								formatoptions:{ 
									keys:true,
									delbutton: true,
									editbutton:true,
									delOptions:{recreateForm: true, beforeShowForm:beforeDeleteCallback}
									//editformbutton:true, editOptions:{recreateForm: true, beforeShowForm:beforeEditCallback}
								}
							},

							{name:'id_nilai', index:'id_nilai', width:30, editable: false},

							{name:'id_siswa', index:'id_siswa', width:150, editable:true, editoptions:{size:"20",maxlength:"30"}},

							{name:'id_mapel', index:'id_mapel', width:90, editable:true, editoptions:{size:"20",maxlength:"30"}},

							{name:'nilai', index:'nilai', width:70, editable:true,edittype:"select", editoptions:{value:"Erlangga:Erlangga;Gramedia:Gramedia;Lokomotif:Lokomotif"}}						
						], 
				
						viewrecords : true,
						//loadonce: true,
						rowNum:10,
						rowList:[10,20,30],
						pager : pager_selector,
						altRows: true,
						//toppager: true,
						sortname: 'id',
						sortorder: "asc",
						multiselect: true,
						//multikey: "ctrlKey",
						multiboxonly: true,
						jsonReader: {
							root: "rows",
							page: "page",
							total: "total",
							records: "records",
							repeatitems: false
						},
				
						loadComplete : function() {
							var table = this;
							setTimeout(function(){
								styleCheckbox(table);
								
								updateActionIcons(table);
								updatePagerIcons(table);
								enableTooltips(table);
							}, 0);
						},
				
						// editurl: "assets/db/crud.php",//nothing is saved
						caption: "jqGrid with inline editing (Ft. PHP)"
				
						//,autowidth: true,
				
				
						/**
						,
						grouping:true, 
						groupingView : { 
							groupField : ['name'],
							groupDataSorted : true,
							plusicon : 'fa fa-chevron-down bigger-110',
							minusicon : 'fa fa-chevron-up bigger-110'
						},
						caption: "Grouping"
						*/
				
					});
					$(window).triggerHandler('resize.jqGrid');//trigger window resize to make the grid get the correct size
					
					
				
					//enable search/filter toolbar
					//jQuery(grid_selector).jqGrid('filterToolbar',{defaultSearch:true,stringResult:true})
					//jQuery(grid_selector).filterToolbar({});
				
				
					//switch element when editing inline
					function aceSwitch( cellvalue, options, cell ) {
						setTimeout(function(){
							$(cell) .find('input[type=checkbox]')
								.addClass('ace ace-switch ace-switch-5')
								.after('<span class="lbl"></span>');
						}, 0);
					}
					//enable datepicker
					function pickDate( cellvalue, options, cell ) {
						setTimeout(function(){
							$(cell) .find('input[type=text]')
								.datepicker({format:'yyyy-mm-dd' , autoclose:true}); 
						}, 0);
					}
				
				
					//navButtons
					jQuery(grid_selector).jqGrid('navGrid',pager_selector,
						{ 	//navbar options
							edit: true,
							editicon : 'ace-icon fa fa-pencil blue',
							add: true,
							addicon : 'ace-icon fa fa-plus-circle purple',
							del: true,
							delicon : 'ace-icon fa fa-trash-o red',
							search: true,
							searchicon : 'ace-icon fa fa-search orange',
							refresh: true,
							refreshicon : 'ace-icon fa fa-refresh green',
							view: true,
							viewicon : 'ace-icon fa fa-search-plus grey',
						},
						{
							//edit record form
							//closeAfterEdit: true,
							//width: 700,
							recreateForm: true,
							beforeShowForm : function(e) {
								var form = $(e[0]);
								form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
								style_edit_form(form);
							}
						},
						{
							//new record form
							//width: 700,
							closeAfterAdd: true,
							recreateForm: true,
							viewPagerButtons: true,
							/*processData: "Processing...",
							reloadAfterSubmit: true,
							url: 'assets/db/add.php', */
							beforeShowForm : function(e) {
								var form = $(e[0]);
								form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar')
								.wrapInner('<div class="widget-header" />')
								style_edit_form(form);
								$('tr:first-child').show();
							}
						},
						{
							//delete record form
							recreateForm: true,
							beforeShowForm : function(e) {
								var form = $(e[0]);
								if(form.data('styled')) return false;
								
								form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
								style_delete_form(form);
								
								form.data('styled', true);
							},
							onClick : function(e) {
								//alert(1);
							}
						},
						{
							//search form
							recreateForm: true,
							afterShowSearch: function(e){
								var form = $(e[0]);
								form.closest('.ui-jqdialog').find('.ui-jqdialog-title').wrap('<div class="widget-header" />')
								style_search_form(form);
							},
							afterRedraw: function(){
								style_search_filters($(this));
							}
							,
							multipleSearch: true,
							/**
							multipleGroup:true,
							showQuery: true
							*/
						},
						{
							//view record form
							recreateForm: true,
							beforeShowForm: function(e){
								var form = $(e[0]);
								form.closest('.ui-jqdialog').find('.ui-jqdialog-title').wrap('<div class="widget-header" />')
							}
						}
					)
				
				
					
					function style_edit_form(form) {
						//enable datepicker on "sdate" field and switches for "stock" field
						form.find('input[name=sdate]').datepicker({format:'yyyy-mm-dd' , autoclose:true})
						
						form.find('input[name=stock]').addClass('ace ace-switch ace-switch-5').after('<span class="lbl"></span>');
								//don't wrap inside a label element, the checkbox value won't be submitted (POST'ed)
								//.addClass('ace ace-switch ace-switch-5').wrap('<label class="inline" />').after('<span class="lbl"></span>');
				
								
						//update buttons classes
						var buttons = form.next().find('.EditButton .fm-button');
						buttons.addClass('btn btn-sm').find('[class*="-icon"]').hide();//ui-icon, s-icon
						buttons.eq(0).addClass('btn-primary').prepend('<i class="ace-icon fa fa-check"></i>');
						buttons.eq(1).prepend('<i class="ace-icon fa fa-times"></i>')
						
						buttons = form.next().find('.navButton a');
						buttons.find('.ui-icon').hide();
						buttons.eq(0).append('<i class="ace-icon fa fa-chevron-left"></i>');
						buttons.eq(1).append('<i class="ace-icon fa fa-chevron-right"></i>');		
					}
				
					function style_delete_form(form) {
						var buttons = form.next().find('.EditButton .fm-button');
						buttons.addClass('btn btn-sm btn-white btn-round').find('[class*="-icon"]').hide();//ui-icon, s-icon
						buttons.eq(0).addClass('btn-danger').prepend('<i class="ace-icon fa fa-trash-o"></i>');
						buttons.eq(1).addClass('btn-default').prepend('<i class="ace-icon fa fa-times"></i>')
					}
					
					function style_search_filters(form) {
						form.find('.delete-rule').val('X');
						form.find('.add-rule').addClass('btn btn-xs btn-primary');
						form.find('.add-group').addClass('btn btn-xs btn-success');
						form.find('.delete-group').addClass('btn btn-xs btn-danger');
					}
					function style_search_form(form) {
						var dialog = form.closest('.ui-jqdialog');
						var buttons = dialog.find('.EditTable')
						buttons.find('.EditButton a[id*="_reset"]').addClass('btn btn-sm btn-info').find('.ui-icon').attr('class', 'ace-icon fa fa-retweet');
						buttons.find('.EditButton a[id*="_query"]').addClass('btn btn-sm btn-inverse').find('.ui-icon').attr('class', 'ace-icon fa fa-comment-o');
						buttons.find('.EditButton a[id*="_search"]').addClass('btn btn-sm btn-purple').find('.ui-icon').attr('class', 'ace-icon fa fa-search');
					}
					
					function beforeDeleteCallback(e) {
						var form = $(e[0]);
						if(form.data('styled')) return false;
						
						form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
						style_delete_form(form);
						
						form.data('styled', true);
					}
					
					function beforeEditCallback(e) {
						var form = $(e[0]);
						form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
						style_edit_form(form);
					}
				
				
				
					//it causes some flicker when reloading or navigating grid
					//it may be possible to have some custom formatter to do this as the grid is being created to prevent this
					//or go back to default browser checkbox styles for the grid
					function styleCheckbox(table) {
					/**
						$(table).find('input:checkbox').addClass('ace')
						.wrap('<label />')
						.after('<span class="lbl align-top" />')
				
				
						$('.ui-jqgrid-labels th[id*="_cb"]:first-child')
						.find('input.cbox[type=checkbox]').addClass('ace')
						.wrap('<label />').after('<span class="lbl align-top" />');
					*/
					}
					
				
					//unlike navButtons icons, action icons in rows seem to be hard-coded
					//you can change them like this in here if you want
					function updateActionIcons(table) {
						/**
						var replacement = 
						{
							'ui-ace-icon fa fa-pencil' : 'ace-icon fa fa-pencil blue',
							'ui-ace-icon fa fa-trash-o' : 'ace-icon fa fa-trash-o red',
							'ui-icon-disk' : 'ace-icon fa fa-check green',
							'ui-icon-cancel' : 'ace-icon fa fa-times red'
						};
						$(table).find('.ui-pg-div span.ui-icon').each(function(){
							var icon = $(this);
							var $class = $.trim(icon.attr('class').replace('ui-icon', ''));
							if($class in replacement) icon.attr('class', 'ui-icon '+replacement[$class]);
						})
						*/
					}
					
					//replace icons with FontAwesome icons like above
					function updatePagerIcons(table) {
						var replacement = 
						{
							'ui-icon-seek-first' : 'ace-icon fa fa-angle-double-left bigger-140',
							'ui-icon-seek-prev' : 'ace-icon fa fa-angle-left bigger-140',
							'ui-icon-seek-next' : 'ace-icon fa fa-angle-right bigger-140',
							'ui-icon-seek-end' : 'ace-icon fa fa-angle-double-right bigger-140'
						};
						$('.ui-pg-table:not(.navtable) > tbody > tr > .ui-pg-button > .ui-icon').each(function(){
							var icon = $(this);
							var $class = $.trim(icon.attr('class').replace('ui-icon', ''));
							
							if($class in replacement) icon.attr('class', 'ui-icon '+replacement[$class]);
						})
					}
				
					function enableTooltips(table) {
						$('.navtable .ui-pg-button').tooltip({container:'body'});
						$(table).find('.ui-pg-div').tooltip({container:'body'});
					}
				
					//var selr = jQuery(grid_selector).jqGrid('getGridParam','selrow');
				
					$(document).one('ajaxloadstart.page', function(e) {
						$.jgrid.gridDestroy(grid_selector);
						$('.ui-jqdialog').remove();
					});
				});
			</script> -->