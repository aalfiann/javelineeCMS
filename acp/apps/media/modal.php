<!-- Advertise -->
	<div id="upload" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel"><?= $lang['upload_media'] ?></h4>
          </div>
          
          <div class="modal-body">          
			          
			<section class="panel panel-default">
                    <header class="panel-heading bg-light">
                      <ul class="nav nav-tabs nav-justified">
                        <li class="active"><a href="#image" data-toggle="tab"><?= $lang['upload_image'] ?></a></li>
                        <li><a href="#file" data-toggle="tab"><?= $lang['upload_file'] ?></a></li>
                        
                      </ul>
                    </header>
                    <div class="panel-body">
                      <div class="tab-content">
                        <div class="tab-pane active" id="image">
                      <form action="<?= $host ?>acp/apps/media/controller.php" class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                      <label class="col-sm-2 control-label"><?= $lang['input_image'] ?></label>
                      <div class="col-sm-10">
                        <input type="file" name="datafile" class="filestyle" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s">
								
							 </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-2 control-label"><?= $lang['title_image'] ?></label>
							<div class="col-lg-10">
							<input type="text" name="imgtitle" class="form-control" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s">                    
                    </div>
                    </div>

							<div class="form-group">
                      <label class="col-sm-2 control-label"><?= $lang['alt_image'] ?></label>
							<div class="col-lg-10">
							<input type="text" name="imgalt" class="form-control" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s">                    
                    </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-2 control-label"><?= $lang['ext_image'] ?></label>
							<div class="col-lg-10">
							<input type="text" name="imgext" class="form-control" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s">                    
                    </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-2 control-label"><?= $lang['category'] ?></label>
                      <div class="col-sm-10" >
                      
                        <select name="catimg"  style='max-height:200px; overflow-y:scroll; overflow-x:hidden;' class="form-control m-b" required>
								<?php $imgquery = "SELECT * FROM cat_img";
									$imghasil = mysql_query($imgquery);
									if (mysql_num_rows($imghasil) > 0) {								
										while($imgdata = mysql_fetch_row($imghasil)) { ?>                         
                          <option value="<?= $imgdata[0]?>"><?= $imgdata[1]?></option>
                       <?php } 
    								echo "</select>"; 
		 					}else echo "<option></option></select>";?>
                        
                      </div>
                    </div>                     
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    <label class="pull-left"><?= $lang['max_upload'] ?> = <?= formatBytes($size['upload_img'], 0)?></label>
                    <input type="submit" class="btn btn-primary btn-sm pull-right" name="submit_upload_pic" value="<?= $lang['upload_image'] ?>" >
						  </form>
						                      
                    </div>
                    
                    
                       <div class="tab-pane" id="file">
									<form action="<?= $host ?>/acp/apps/media/controller.php" class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                      <label class="col-sm-2 control-label"><?= $lang['input_file'] ?></label>
                      <div class="col-sm-10">
                        <input type="file" name="datafile" class="filestyle" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s">
								
							 </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-2 control-label"><?= $lang['title_file'] ?></label>
							<div class="col-lg-10">
							<input type="text" name="filetitle" class="form-control" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s">                    
                    </div>
                    </div>

						  <div class="form-group">
                      <label class="col-sm-2 control-label"><?= $lang['category'] ?></label>
                      <div class="col-sm-10" >
                      
                        <select name="catfile"  style='max-height:200px; overflow-y:scroll; overflow-x:hidden;' class="form-control m-b" required>
								<?php $filequery = "SELECT * FROM cat_file";
									$filehasil = mysql_query($filequery);
									if (mysql_num_rows($filehasil) > 0) {								
										while($filedata = mysql_fetch_row($filehasil)) { ?>                         
                          <option value="<?= $filedata[0]?>"><?= $filedata[1]?></option>
                       <?php } 
    								echo "</select>"; 
		 					}else echo "<option></option></select>";?>
                        
                      </div>
                    </div>              
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    <label class="pull-left"><?= $lang['max_upload'] ?> = <?= formatBytes($size['upload_file'], 0)?></label> 
                    <input type="submit" class="btn btn-primary btn-sm pull-right" name="submit_upload_file" value="<?= $lang['upload_file'] ?>" >
						  </form>   
						                       
                        </div>
                        
                      </div>
                    </div>
                  </section>			          
			          
			</div>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><?= $lang['button_cancel'] ?></button>
          </div>
			

			 
			
        </div> 
      </div> 
    </div>