<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/chosen.min.css" />
<script src="<?php echo base_url(); ?>assets/js/jquery-2.1.4.min.js"></script>

<div class="page-content">
<div class="page-header">
  <h1>
    Profil Guru
  </h1>
</div><!-- /.page-header -->

                  <div id="user-profile-2" class="user-profile">
										<div class="tabbable">
											<ul class="nav nav-tabs padding-18">
												<li class="active">
													<a data-toggle="tab" href="#home">
														<i class="green ace-icon fa fa-user bigger-120"></i>
														Profile
													</a>
												</li>

												<li>
													<a data-toggle="tab" href="#feed">
														<i class="orange ace-icon fa fa-rss bigger-120"></i>
														Activity Feed
													</a>
												</li>
											</ul>

											<div class="tab-content no-border padding-24">
												<div id="home" class="tab-pane in active">
													<div class="row">
														<div class="col-xs-12 col-sm-3 center">
															<span class="profile-picture">
																<img class="editable img-responsive" alt="Alex's Avatar" id="avatar2" src="<?php echo base_url();?>assets/images/avatars/profile-pic.jpg" />
															</span>
														</div><!-- /.col -->

														<div class="col-xs-12 col-sm-9">
															<h4 class="blue">
																<span class="middle"><?php echo $sql['nama_depan'];?> <?php echo $sql['nama_tengah'];?> <?php echo $sql['nama_belakang'];?></span>

																<span class="label label-purple arrowed-in-right">
																	<i class="ace-icon fa fa-circle smaller-80 align-middle"></i>
																	online
																</span>
															</h4>

															<div class="profile-user-info">
																<div class="profile-info-row">
																	<div class="profile-info-name"> NIS </div>

																	<div class="profile-info-value">
																		<span><?php echo $sql['nis'];?></span>
																	</div>
																</div>

                                <div class="profile-info-row">
																	<div class="profile-info-name"> NISN </div>

																	<div class="profile-info-value">
																		<span><?php echo $sql['nisn'];?></span>
																	</div>
																</div>

																<div class="profile-info-row">
																	<div class="profile-info-name"> Tempat Tanggal Lahir </div>

																	<div class="profile-info-value">
																		<span><?php echo $sql['tempat_lahir'];?></span>
																		<span><?php echo $sql['tanggal_lahir'];?></span>
																	</div>
																</div>

																<div class="profile-info-row">
																	<div class="profile-info-name"> Jenis Kelamin </div>

																	<div class="profile-info-value">
																		<span><?php echo $sql['jenis_kelamin'];?></span>
																	</div>
																</div>

																<div class="profile-info-row">
																	<div class="profile-info-name"> Alamat </div>

																	<div class="profile-info-value">
																		<span><?php echo $sql['alamat'];?></span>
                                    <span><?php echo $sql['kelurahan'];?></span><br />
                                    <span><?php echo $sql['kecamatan'];?></span>
                                    <span><?php echo $sql['kota'];?></span>
                                    <span><?php echo $sql['provinsi'];?></span>
																	</div>
																</div>

																<div class="profile-info-row">
																	<div class="profile-info-name"> Agama </div>

																	<div class="profile-info-value">
																		<span><?php echo $sql['agama'];?></span>
																	</div>
																</div>

                                <div class="profile-info-row">
                                  <div class="profile-info-name">

                                  </div>
                                  <div class="profile-info-value">

                                  </div>
                                </div>

															</div>
														</div><!-- /.col -->
													</div><!-- /.row -->
												</div><!-- /#home -->

												<div id="feed" class="tab-pane">
													<div class="profile-feed row">
														<div class="col-sm-6">
															<div class="profile-activity clearfix">
																<div>
																	<img class="pull-left" alt="Alex Doe's avatar" src="<?php echo base_url();?>assets/images/avatars/avatar5.png" />
																	<a class="user" href="#"> Alex Doe </a>
																	changed his profile photo.
																	<a href="#">Take a look</a>

																	<div class="time">
																		<i class="ace-icon fa fa-clock-o bigger-110"></i>
																		an hour ago
																	</div>
																</div>

																<div class="tools action-buttons">
																	<a href="#" class="blue">
																		<i class="ace-icon fa fa-pencil bigger-125"></i>
																	</a>

																	<a href="#" class="red">
																		<i class="ace-icon fa fa-times bigger-125"></i>
																	</a>
																</div>
															</div>

															<div class="profile-activity clearfix">
																<div>
																	<img class="pull-left" alt="Susan Smith's avatar" src="<?php echo base_url();?>assets/images/avatars/avatar1.png" />
																	<a class="user" href="#"> Susan Smith </a>

																	is now friends with Alex Doe.
																	<div class="time">
																		<i class="ace-icon fa fa-clock-o bigger-110"></i>
																		2 hours ago
																	</div>
																</div>

																<div class="tools action-buttons">
																	<a href="#" class="blue">
																		<i class="ace-icon fa fa-pencil bigger-125"></i>
																	</a>

																	<a href="#" class="red">
																		<i class="ace-icon fa fa-times bigger-125"></i>
																	</a>
																</div>
															</div>

															<div class="profile-activity clearfix">
																<div>
																	<i class="pull-left thumbicon fa fa-check btn-success no-hover"></i>
																	<a class="user" href="#"> Alex Doe </a>
																	joined
																	<a href="#">Country Music</a>

																	group.
																	<div class="time">
																		<i class="ace-icon fa fa-clock-o bigger-110"></i>
																		5 hours ago
																	</div>
																</div>

																<div class="tools action-buttons">
																	<a href="#" class="blue">
																		<i class="ace-icon fa fa-pencil bigger-125"></i>
																	</a>

																	<a href="#" class="red">
																		<i class="ace-icon fa fa-times bigger-125"></i>
																	</a>
																</div>
															</div>

															<div class="profile-activity clearfix">
																<div>
																	<i class="pull-left thumbicon fa fa-picture-o btn-info no-hover"></i>
																	<a class="user" href="#"> Alex Doe </a>
																	uploaded a new photo.
																	<a href="#">Take a look</a>

																	<div class="time">
																		<i class="ace-icon fa fa-clock-o bigger-110"></i>
																		5 hours ago
																	</div>
																</div>

																<div class="tools action-buttons">
																	<a href="#" class="blue">
																		<i class="ace-icon fa fa-pencil bigger-125"></i>
																	</a>

																	<a href="#" class="red">
																		<i class="ace-icon fa fa-times bigger-125"></i>
																	</a>
																</div>
															</div>

															<div class="profile-activity clearfix">
																<div>
																	<img class="pull-left" alt="David Palms's avatar" src="<?php echo base_url();?>assets/images/avatars/avatar4.png" />
																	<a class="user" href="#"> David Palms </a>

																	left a comment on Alex's wall.
																	<div class="time">
																		<i class="ace-icon fa fa-clock-o bigger-110"></i>
																		8 hours ago
																	</div>
																</div>

																<div class="tools action-buttons">
																	<a href="#" class="blue">
																		<i class="ace-icon fa fa-pencil bigger-125"></i>
																	</a>

																	<a href="#" class="red">
																		<i class="ace-icon fa fa-times bigger-125"></i>
																	</a>
																</div>
															</div>
														</div><!-- /.col -->

														<div class="col-sm-6">
															<div class="profile-activity clearfix">
																<div>
																	<i class="pull-left thumbicon fa fa-pencil-square-o btn-pink no-hover"></i>
																	<a class="user" href="#"> Alex Doe </a>
																	published a new blog post.
																	<a href="#">Read now</a>

																	<div class="time">
																		<i class="ace-icon fa fa-clock-o bigger-110"></i>
																		11 hours ago
																	</div>
																</div>

																<div class="tools action-buttons">
																	<a href="#" class="blue">
																		<i class="ace-icon fa fa-pencil bigger-125"></i>
																	</a>

																	<a href="#" class="red">
																		<i class="ace-icon fa fa-times bigger-125"></i>
																	</a>
																</div>
															</div>

															<div class="profile-activity clearfix">
																<div>
																	<img class="pull-left" alt="Alex Doe's avatar" src="<?php echo base_url();?>assets/images/avatars/avatar5.png" />
																	<a class="user" href="#"> Alex Doe </a>

																	upgraded his skills.
																	<div class="time">
																		<i class="ace-icon fa fa-clock-o bigger-110"></i>
																		12 hours ago
																	</div>
																</div>

																<div class="tools action-buttons">
																	<a href="#" class="blue">
																		<i class="ace-icon fa fa-pencil bigger-125"></i>
																	</a>

																	<a href="#" class="red">
																		<i class="ace-icon fa fa-times bigger-125"></i>
																	</a>
																</div>
															</div>

															<div class="profile-activity clearfix">
																<div>
																	<i class="pull-left thumbicon fa fa-key btn-info no-hover"></i>
																	<a class="user" href="#"> Alex Doe </a>

																	logged in.
																	<div class="time">
																		<i class="ace-icon fa fa-clock-o bigger-110"></i>
																		12 hours ago
																	</div>
																</div>

																<div class="tools action-buttons">
																	<a href="#" class="blue">
																		<i class="ace-icon fa fa-pencil bigger-125"></i>
																	</a>

																	<a href="#" class="red">
																		<i class="ace-icon fa fa-times bigger-125"></i>
																	</a>
																</div>
															</div>

															<div class="profile-activity clearfix">
																<div>
																	<i class="pull-left thumbicon fa fa-power-off btn-inverse no-hover"></i>
																	<a class="user" href="#"> Alex Doe </a>

																	logged out.
																	<div class="time">
																		<i class="ace-icon fa fa-clock-o bigger-110"></i>
																		16 hours ago
																	</div>
																</div>

																<div class="tools action-buttons">
																	<a href="#" class="blue">
																		<i class="ace-icon fa fa-pencil bigger-125"></i>
																	</a>

																	<a href="#" class="red">
																		<i class="ace-icon fa fa-times bigger-125"></i>
																	</a>
																</div>
															</div>

															<div class="profile-activity clearfix">
																<div>
																	<i class="pull-left thumbicon fa fa-key btn-info no-hover"></i>
																	<a class="user" href="#"> Alex Doe </a>

																	logged in.
																	<div class="time">
																		<i class="ace-icon fa fa-clock-o bigger-110"></i>
																		16 hours ago
																	</div>
																</div>

																<div class="tools action-buttons">
																	<a href="#" class="blue">
																		<i class="ace-icon fa fa-pencil bigger-125"></i>
																	</a>

																	<a href="#" class="red">
																		<i class="ace-icon fa fa-times bigger-125"></i>
																	</a>
																</div>
															</div>
														</div><!-- /.col -->
													</div><!-- /.row -->

													<div class="space-12"></div>

													<div class="center">
														<button type="button" class="btn btn-sm btn-primary btn-white btn-round">
															<i class="ace-icon fa fa-rss bigger-150 middle orange2"></i>
															<span class="bigger-110">View more activities</span>

															<i class="icon-on-right ace-icon fa fa-arrow-right"></i>
														</button>
													</div>
												</div><!-- /#feed -->
											</div>
										</div>
									</div>
                </div>
  <script  type="text/javascript">
  $('#avatar2').on('click', function(){
        var modal =
        '<div class="modal fade">\
          <div class="modal-dialog">\
           <div class="modal-content">\
          <div class="modal-header">\
            <button type="button" class="close" data-dismiss="modal">&times;</button>\
            <h4 class="blue">Change Photos</h4>\
          </div>\
          \
          <form class="no-margin">\
           <div class="modal-body">\
            <div class="space-4"></div>\
            <div style="width:75%;margin-left:12%;"><input type="file" name="file-input" /></div>\
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
          btn_choose:'Click to choose new photos',
          btn_change:null,
          no_icon:'ace-icon fa fa-picture-o',
          thumbnail:'small',
          before_remove: function() {
            //don't remove/reset files while being uploaded
            return !working;
          },
          allowExt: ['jpg', 'jpeg', 'png', 'gif'],
          allowMime: ['image/jpg', 'image/jpeg', 'image/png', 'image/gif']
        });

        form.on('submit', function(){
          if(!file.data('ace_input_files')) return false;

          file.ace_file_input('disable');
          form.find('button').attr('disabled', 'disabled');
          form.find('.modal-body').append("<div class='center'><i class='ace-icon fa fa-spinner fa-spin bigger-150 orange'></i></div>");

          var deferred = new $.Deferred;
          working = true;
          deferred.done(function() {
            form.find('button').removeAttr('disabled');
            form.find('input[type=file]').ace_file_input('enable');
            form.find('.modal-body > :last-child').remove();

            modal.modal("hide");

            var thumb = file.next().find('img').data('thumb');
            if(thumb) $('#avatar2').get(0).src = thumb;

            working = false;
          });


          setTimeout(function(){
            deferred.resolve();
          } , parseInt(Math.random() * 800 + 800));

          return false;
        });

      });



      //////////////////////////////
      $('#profile-feed-1').ace_scroll({
        height: '250px',
        mouseWheelLock: true,
        alwaysVisible : true
      });

      $('a[ data-original-title]').tooltip();

      $('.easy-pie-chart.percentage').each(function(){
      var barColor = $(this).data('color') || '#555';
      var trackColor = '#E2E2E2';
      var size = parseInt($(this).data('size')) || 72;
      $(this).easyPieChart({
        barColor: barColor,
        trackColor: trackColor,
        scaleColor: false,
        lineCap: 'butt',
        lineWidth: parseInt(size/10),
        animate:false,
        size: size
      }).css('color', barColor);
      });

      ///////////////////////////////////////////

      //right & left position
      //show the user info on right or left depending on its position
      $('#user-profile-2 .memberdiv').on('mouseenter touchstart', function(){
        var $this = $(this);
        var $parent = $this.closest('.tab-pane');

        var off1 = $parent.offset();
        var w1 = $parent.width();

        var off2 = $this.offset();
        var w2 = $this.width();

        var place = 'left';
        if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) place = 'right';

        $this.find('.popover').removeClass('right left').addClass(place);
      }).on('click', function(e) {
        e.preventDefault();
      });


      ///////////////////////////////////////////
      $('#user-profile-3')
      .find('input[type=file]').ace_file_input({
        style:'well',
        btn_choose:'Change avatar',
        btn_change:null,
        no_icon:'ace-icon fa fa-picture-o',
        thumbnail:'large',
        droppable:true,

        allowExt: ['jpg', 'jpeg', 'png', 'gif'],
        allowMime: ['image/jpg', 'image/jpeg', 'image/png', 'image/gif']
      })
      .end().find('button[type=reset]').on(ace.click_event, function(){
        $('#user-profile-3 input[type=file]').ace_file_input('reset_input');
      })
      .end().find('.date-picker').datepicker().next().on(ace.click_event, function(){
        $(this).prev().focus();
      })
      $('.input-mask-phone').mask('(999) 999-9999');

      $('#user-profile-3').find('input[type=file]').ace_file_input('show_file_list', [{type: 'image', name: $('#avatar').attr('src')}]);


      ////////////////////
      //change profile
      $('[data-toggle="buttons"] .btn').on('click', function(e){
        var target = $(this).find('input[type=radio]');
        var which = parseInt(target.val());
        $('.user-profile').parent().addClass('hide');
        $('#user-profile-'+which).parent().removeClass('hide');
      });



      /////////////////////////////////////
      $(document).one('ajaxloadstart.page', function(e) {
        //in ajax mode, remove remaining elements before leaving page
        try {
          $('.editable').editable('destroy');
        } catch(e) {}
        $('[class*=select2]').remove();
      });
  </script>
