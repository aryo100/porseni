<link href='<?php echo base_url();?>assets/css/fullcalendar.min.css' rel='stylesheet' />
<link href="<?php echo base_url();?>assets/css/bootstrapValidator.min.css" rel="stylesheet" />
<link href="<?php echo base_url();?>assets/css/bootstrap-colorpicker.min.css" rel="stylesheet" />
<link href="<?php echo base_url();?>assets/css/bootstrapValidator.min.css" rel="stylesheet" />
<div class="page-content">

						<div class="page-header">
							<h1>
								Calendar Event
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Click to add event
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="row">
									<div class="alert"></div>
									<div class="col-sm-12">
										<div id="calendar"></div>
									</div>
								</div>
				        <div class="modal fade">
				            <div class="modal-dialog">
				                <div class="modal-content">
				                    <div class="modal-header">
				                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				                        <h4 class="modal-title"></h4>
				                    </div>
				                    <div class="modal-body">
				                        <div class="error"></div>
				                        <form class="form-horizontal" id="crud-form">
				                        <input type="hidden" id="start">
				                        <input type="hidden" id="end">
				                            <div class="form-group">
				                                <label class="col-md-4 control-label" for="title">Title</label>
				                                <div class="col-md-4">
				                                    <input id="title" name="title" type="text" class="form-control input-md" />
				                                </div>
				                            </div>
				                            <div class="form-group">
				                                <label class="col-md-4 control-label" for="description">Description</label>
				                                <div class="col-md-4">
				                                    <textarea class="form-control" id="description" name="description"></textarea>
				                                </div>
				                            </div>
																		<div class="form-group">
				                                <label class="col-md-4 control-label" for="link">Link</label>
				                                <div class="col-md-4">
																						<input id="link" name="link" type="text" class="form-control input-md" />
				                                </div>
				                            </div>
				                            <div class="form-group">
																			<label class="col-md-4 control-label" for="color">Color</label>
																			<div class="col-md-4">
																				<input id="color" name="color" type="text" class="form-control input-md" readonly="readonly" />
																				<span class="help-block">Click to pick a color</span>
																			</div>
				                            </div>
				                        </form>
				                    </div>
				                    <div class="modal-footer">
				                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				                    </div>
				                </div>
				            </div>
				        </div>
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div>
