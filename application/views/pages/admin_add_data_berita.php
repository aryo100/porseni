<?php
$id_berita = "";
$judul = "";
$foto = "";
$content = "";
if ($op=="edit") {
  foreach ($sql->result() as $obj) {
    $op = "edit";
    $id_berita = $obj->id_berita;
    $judul = $obj->judul;
    $foto = $obj->foto;
    $content = $obj->content;
  }
}
?>

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/chosen.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-datepicker3.min.css" />
<script src="<?php echo base_url(); ?>assets/js/jquery-2.1.4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/ace-elements.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.hotkeys.index.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-wysiwyg.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>

<!-- include summernote css/js -->
<link href="<?php echo base_url(); ?>assets/css/summernote.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>assets/js/summernote.js"></script>

<div class="page-content">
  <div class="page-header">
    <h1>

    </h1>
  </div><!-- /.page-header -->

  <div class="row">
    <div class="col-xs-12">
      <!-- PAGE CONTENT BEGINS -->
      <!-- Judul -->
      <?php echo form_open_multipart('admin/berita_simpan');?>
      <div class="form-horizontal" >  
        <input type="hidden" name="op" value="<?php echo $op;?>" class="form-control">
        <input type="hidden" name="id_berita" value="<?php echo $id_berita;?>" class="form-control">
        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Judul </label>
          <div class="col-sm-3">
            <input type="text" id="form-field-1" placeholder="Judul" name="judul" value="<?php echo $judul;?>" class="col-xs-12" required/>
          </div>
        </div>

        <!-- Foto -->
        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Foto content </label>  
          <div class="col-sm-3">
						<span class="profile-picture image_preview">
							<img id="avatar" style="<?php if($foto == ""){echo 'display:none;';}; ?>" class="editable img-responsive " alt="Alex's Avatar" src="<?php echo base_url();?>assets/upload/berita/<?php if($foto != ""){echo $foto;}; ?>" />
						</span>
            <input name="foto"  class="upload_btn" type="file" accept="image/*" value="<?php echo $foto;?>" style="float: left;" <?php if($op!="edit"){echo "required";} ?> />
          <!-- <label class="label label-danger">Foto max 2MB</label> -->
          </div>
        </div>

        <!-- editor -->
        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Content </label>
          <div class="col-sm-9">
            <textarea name="content" class="ckeditor"><?php echo $content; ?></textarea>
            <!-- <div id="texteditor" name="content" class="wysiwyg-editor"></div> -->
            <!-- <input type="hidden" > -->
          </div>
        </div>

        <!-- Submit -->
        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right"></label>
          <div class="col-sm-3">
            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
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

<script>

  /*$(document).ready(function() {
    $('#texteditor').summernote();
  });*/
  

  jQuery(function($){

    //$('#texteditor').ace_wysiwyg()

    function showErrorAlert (reason, detail) {
      var msg='';
      if (reason==='unsupported-file-type') { 
        msg = "Unsupported format " +detail; 
      }
      
      else {
        //console.log("error uploading file", reason, detail);
      }

      $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>'+ 
      '<strong>File upload error</strong> '+msg+' </div>').prependTo('#alerts');
    }

    $('#texteditor').ace_wysiwyg({
      toolbar:
      [
        'font',
        null,
        'fontSize',
        null,
        {name:'bold', className:'btn-info'},
        {name:'italic', className:'btn-info'},
        {name:'strikethrough', className:'btn-info'},
        {name:'underline', className:'btn-info'},
        null,
        {name:'insertunorderedlist', className:'btn-success'},
        {name:'insertorderedlist', className:'btn-success'},
        {name:'outdent', className:'btn-purple'},
        {name:'indent', className:'btn-purple'},
        null,
        {name:'justifyleft', className:'btn-primary'},
        {name:'justifycenter', className:'btn-primary'},
        {name:'justifyright', className:'btn-primary'},
        {name:'justifyfull', className:'btn-inverse'},
        null,
        {name:'createLink', className:'btn-pink'},
        {name:'unlink', className:'btn-pink'},
        null,
        {name:'insertImage', className:'btn-success'},
        null,
        'foreColor',
        null,
        {name:'undo', className:'btn-grey'},
        {name:'redo', className:'btn-grey'}
      ],
      'wysiwyg': {
        fileUploadError: showErrorAlert
      }
    }).prev().addClass('wysiwyg-style2');
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