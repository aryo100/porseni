<div class="page-content">
						<div class="page-header">
							<h1>
								Data Kelas
							</h1>
							<div style="margin:15px 0px 0px 0px;">
								<a class="btn btn-primary btn-xs" type="button" name="button" data-toggle="modal" data-target="#myModal">Tambah data</a>
							</div>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<table class="table">
									<thead>
										<td>No</td>
										<td>Nama kelas</td>
										<td>Aksi</td>
									</thead>
									<tbody>
										<?php
						        	$no=0;
						        	foreach ($sql->result() as $kelas) {
						        		$no++;
						        		?>
						        			<tr>
						        				<td><?php echo $no; ?></td>
						        				<td><?php echo $kelas->nama_kelas ?></td>
						        				<td>
						        					<!-- <a href="<?php echo base_url();?>index.php/admin/kelas_edit/<?php echo $kelas->id_kelas;?>" class="fa fa-edit"></a> -->
						        					<a href="javascript:if(confirm('Apakah Anda yakin ingin menghapus ?')){document.location='<?php echo base_url();?>index.php/admin/hapus_kelas/<?php echo $kelas->id_kelas;?>';}" class="fa fa-times"</a>
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
					</div>
				</div><!-- /.page-content -->
			</div>
		</div><!-- /.main-content -->

		<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah data kelas</h4>
      </div>
      <div class="modal-body">
				<form class="" action="<?php echo base_url() ?>index.php/admin/simpan_kelas" method="post">
					<div class="row">
						<div class="col-xs-9">
							<input class="col-xs-12" type="text" name="kelas" placeholder="nama kelas">
						</div>
						<div class="col-xs-3">
							<button class="col-xs-12 btn btn-primary btn-sm" type="submit" name="submit">Simpan</button>
						</div>
					</div>
				</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
