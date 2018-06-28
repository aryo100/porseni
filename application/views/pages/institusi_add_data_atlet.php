<?php
$id_atlet = "";
$nama = "";
$npm = "";
$gender = "";
$tanggal_lahir = "";
$email = "";
$no_hp = "";
$pt = "";
$foto = "";
$ss = "";
$cabang = "";
if ($op=="edit") {
  foreach ($sql->result() as $obj) {
    $op = "edit";
    $id_atlet = $obj->id_atlet;
    $nama = $obj->nama;
    $gender = $obj->gender;
    $tanggal_lahir = $obj->tanggal_lahir;
    $npm = $obj->npm;
    $email = $obj->email;
    $no_hp = $obj->no_hp;
    $pt = $obj->pt;
    $foto = $obj->foto;
    $ss = $obj->ss;
    $cabang = $obj->cabang;
  }
}
?>	

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/chosen.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-datepicker3.min.css" />
<script src="<?php echo base_url(); ?>assets/js/jquery-2.1.4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.min.js"<?php echo base_url(); ?>></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.custom.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery.gritter.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/bootbox.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery.easypiechart.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery.hotkeys.index.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/bootstrap-wysiwyg.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/select2.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/spinbox.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/bootstrap-editable.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/ace-editable.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery.maskedinput.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery-ui.custom.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery.gritter.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/bootbox.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery.easypiechart.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery.hotkeys.index.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/bootstrap-wysiwyg.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/select2.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/spinbox.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery.maskedinput.min.js"></script>

		<!-- ace scripts -->
		<script src="<?php echo base_url(); ?>assets/js/ace-elements.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/ace.min.js"></script>
<div class="page-content">
  <div class="page-header">
    <h1>

    </h1>
  </div><!-- /.page-header -->

  <div class="row">
    <div class="col-xs-12">
      <!-- PAGE CONTENT BEGINS -->
      <?php echo form_open_multipart('institusi/atlet_simpan');?>
      <div class="form-horizontal" >  
        <input type="hidden" name="op" value="<?php echo $op;?>" class="form-control">
        <input type="hidden" name="id_atlet" value="<?php echo $id_atlet;?>" class="form-control">
        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Pas Foto </label>  
          <div class="col-sm-3">
						<span class="profile-picture image_preview">
							<img id="avatar" class="editable img-responsive " alt="Alex's Avatar" src="<?php echo base_url();?>assets/upload/foto/<?php if($foto != ""){echo $foto;} else {echo "profile-pic.jpg";}?>" />
						</span>
            <input  name="foto"  class="upload_btn" type="file" accept="image/*" value="<?php echo $foto;?>" style="float: left;" <?php if($op!="edit"){echo "required";} ?> />
          </div>
        </div>
        <!-- </div> -->
        <!-- Nama -->
        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Lengkap </label>
          <div class="col-sm-3">
            <input type="text" id="form-field-1" placeholder="Nama Lengkap" name="nama" value="<?php echo $nama;?>" class="col-xs-12" required/>
          </div>
        </div>

        <!-- Jenis Kelamin -->
        <div class="form-group control-group">
          <label class=" col-sm-3 control-label no-padding-right">Jenis Kelamin</label>

          <div class="radio">
            <label>
              <input class="form-field-radio ace" type="radio" name="gender" value="Laki - laki" <?php if($gender == 'L'){ echo 'checked'; } ?> required/>
              <span class="lbl"> Laki-laki</span>
            </label>

            <label>
              <input class="form-field-radio ace" type="radio" name="gender" value="Perempuan" <?php if($gender == 'P'){ echo 'checked'; } ?> required/>
              <span class="lbl"> Perempuan</span>
            </label>
          </div>
        </div>

        <!-- TL -->
        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tanggal lahir </label>
    
          <div class="col-sm-3">
            <div class="input-group">
              <input class="form-control date-picker" id="id-date-picker-1" value="1999-08-28" type="text" data-date-format="yyyy-mm-dd" name="tanggal_lahir" value="<?php echo $tanggal_lahir;?>" required/>
              <span class="input-group-addon">
                <i class="fa fa-calendar bigger-110"></i>
              </span>
            </div>
          </div>
        </div>

        <!-- NPM -->
        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> NIM/NPM </label>
          <div class="col-sm-3">
            <input type="text" id="form-field-1" placeholder="NPM" class="col-xs-12" name="npm" value="<?php echo $npm;?>"required/>
          </div>
        </div>

        <!-- Email -->
        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Email </label>
          <div class="col-sm-3">
            <input type="email" id="form-field-1" placeholder="Email" class="col-xs-12" name="email" value="<?php echo $email;?>" required/>
          </div>
        </div>

        <!-- No. Telpon -->
        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> No. Telpon </label>
          <div class="col-sm-3">
            <input type="number" id="form-field-1" placeholder="No. Telpon" class="col-xs-12" name="no_hp" value="<?php echo $no_hp;?>" required/>
          </div>
        </div>

        <!-- prodi -->
        <!-- <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Perguruan Tinggi </label>
          <div class="col-sm-3">
            <input type="text" id="form-field-1" placeholder="" class="col-xs-12" name="pt" value="<?php echo $pt;?>"required/>
          </div>
        </div> -->

        <!-- foto -->
        <!-- <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Foto </label>
          <div class="col-sm-3">
            <input type="text" id="form-field-1" placeholder="" class="col-xs-12" name="foto" value="<?php echo $foto;?>"required/>
          </div>
        </div> -->

        <!-- ss -->
        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Bukti Screenshot Forlap Dikti </label>
          <div class="col-sm-3">
            <div class="image_preview1 profile-picture">
              <img class="pict_url editable img-responsive  editable-empty" src="<?php echo base_url();?>assets/upload/ss/<?php if($ss != ""){echo $ss;} else {echo "ss.jpg";}?>">
            </div>
            <input name="ss" class="upload_btn_ss" type="file" accept="image/*" value="<?php echo $ss;?>" style="float: left;" <?php if($op!="edit"){echo "required";} ?> />
          </div>
        </div>
        <!-- <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> ss </label>
          <div class="col-sm-3">
            <input type="text" id="form-field-1" placeholder="" class="col-xs-12" name="ss" value="<?php echo $ss;?>"required/>
          </div>
        </div> -->

        <!-- cabang -->
        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Cabang Olahraga </label>
          <div class="col-sm-3">
            <input type="text" id="form-field-1" placeholder="Tennis, Basket, dll.." class="col-xs-12" name="cabang" value="<?php echo $cabang;?>"required/>
          </div>
        </div>

        <!-- Submit -->
        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right"></label>
          <div class="col-sm-3">
            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
          </div>
        </div>
      
      
      
      </div>
      </form>
      <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</div>
</div><!-- /.page-content -->
</div>
</div><!-- /.main-content -->

<script type="text/javascript">
    //datepicker plugin
    //link
    $('.date-picker').datepicker({
      autoclose: true,
      todayHighlight: true
    })
    //show datepicker when clicking on the icon
    .next().on(ace.click_event, function(){
      $(this).prev().focus();
    });			
</script>


<script>
  function pictUpload () {
    $('.upload_btn').on('change', function() {
      if (typeof (FileReader) != "undefined") {
        var image_holder = $('.image_preview');
        image_holder.empty();

        var reader = new FileReader();
        reader.onload = function(e) {
          $('<img >', {
            'src': e.target.result,
            'id' : 'avatar',
            'class': 'pict_url editable img-responsive'
          }).appendTo(image_holder);

          // var image = new Image();

          // image.src = reader.result;

          // image.onload = function() {
          //     alert(image.width);
        };
        // alert(image_holder);
        image_holder.show();
        reader.readAsDataURL($(this)[0].files[0]);
      }

      else {
        alert("cant show up the picture. please change your browser to use it properly");
      };
        //verifikasi
        var fileSize = this.files[0].size/1024/1024;
        if(fileSize>2)
        {
         var n = fileSize.toFixed(2);
            alert('Your file size is: ' + n + "MB, and it is too large to upload! Please try to upload smaller file (25MB or less).");
            $('.image_preview').css('display', 'none');
            // $('.image_preview').src('');
            $('.upload_btn').val("");

        }
        else
        {
            //alert('File size is OK');
            $(this).show();
        }
    });
    
    $('.upload_btn_ss').on('change', function() {
      if (typeof (FileReader) != "undefined") {
        var image_holder = $('.image_preview1');
        image_holder.empty();

        var reader = new FileReader();
        reader.onload = function(e) {
          $('<img >', {
            'src': e.target.result,
            'id' : 'avatar',
            'class': 'pict_url editable img-responsive'
          }).appendTo(image_holder);

          // var image = new Image();

          // image.src = reader.result;

          // image.onload = function() {
          //     alert(image.width);
        };
        image_holder.show();
        reader.readAsDataURL($(this)[0].files[0]);
      }

      else {
        alert("cant show up the picture. please change your browser to use it properly");
      };
    });
      
  }

  $(document).ready(pictUpload);
  // $(document).ready(function() {
  //   $('.upload_btn').bind('change', function() {
  //     alert('This file size is: ' + this.files[0].size/1024/1024 + "MB");
  //     alert('This file width is: ' + this.files[0].clientWidth);

  //   // var img = document.getElementById('avatar'); 
  //     // alert(img.clientWidth);
  //     alert('width');
    
  //     //or however you get a handle to the IMG
  //     var width = img.clientWidth;
  //     var height = img.clientHeight;
  //   });
  // });
</script>



<!-- <script>
  function aca () {
    try {//ie8 throws some harmless exceptions, so let's catch'em
			
			//first let's add a fake appendChild method for Image element for browsers that have a problem with this
			//because editable plugin calls appendChild, and it causes errors on IE at unpredicted points
			try {
				document.createElement('IMG').appendChild(document.createElement('B'));
			} catch(e) {
				Image.prototype.appendChild = function(el){}
			}
	
			var last_gritter
			$('#avatar').editable({
				type: 'image',
				name: 'avatar',
				value: null,
				//onblur: 'ignore',  //don't reset or hide editable onblur?!
				image: {
					//specify ace file input plugin's options here
					btn_choose: 'Change Avatar',
					droppable: true,
					maxSize: 110000,//~100Kb
	
					//and a few extra ones here
					name: 'avatar',//put the field name here as well, will be used inside the custom plugin
					on_error : function(error_type) {//on_error function will be called when the selected file has a problem
						if(last_gritter) $.gritter.remove(last_gritter);
						if(error_type == 1) {//file format error
							last_gritter = $.gritter.add({
								title: 'File is not an image!',
								text: 'Please choose a jpg|gif|png image!',
								class_name: 'gritter-error gritter-center'
							});
						} else if(error_type == 2) {//file size rror
							last_gritter = $.gritter.add({
								title: 'File too big!',
								text: 'Image size should not exceed 100Kb!',
								class_name: 'gritter-error gritter-center'
							});
						}
						else {//other error
						}
					},
					on_success : function() {
						$.gritter.removeAll();
					}
				},
					url: function(params) {
					// ***UPDATE AVATAR HERE*** //
					//for a working upload example you can replace the contents of this function with 
					//examples/profile-avatar-update.js
	
					var deferred = new $.Deferred
	
					var value = $('#avatar').next().find('input[type=hidden]:eq(0)').val();
					if(!value || value.length == 0) {
						deferred.resolve();
						return deferred.promise();
					}
	
	
					//dummy upload
					setTimeout(function(){
						if("FileReader" in window) {
							//for browsers that have a thumbnail of selected image
							var thumb = $('#avatar').next().find('img').data('thumb');
							if(thumb) $('#avatar').get(0).src = thumb;
						}
						
						deferred.resolve({'status':'OK'});
	
						if(last_gritter) $.gritter.remove(last_gritter);
						last_gritter = $.gritter.add({
							title: 'Avatar Updated!',
							text: 'Uploading to server can be easily implemented. A working example is included with the template.',
							class_name: 'gritter-info gritter-center'
						});
						
					 } , parseInt(Math.random() * 800 + 800))
	
					return deferred.promise();
					
					// ***END OF UPDATE AVATAR HERE*** //
				},
				
				success: function(response, newValue) {
				}
			})
		}catch(e) {}
  }

  $(document).ready(aca);
</script> -->