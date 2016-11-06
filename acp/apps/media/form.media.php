<div class="row">
                <div class="col-md-3 col-md-push-9">
                  <?php include 'panel.side.php'; ?>
                </div>
                <div class="col-md-9 col-md-pull-3">
                  <div class="row row-sm">
                  <?php  
                    			while($data = mysql_fetch_array($result))
{
	?>
                    <div class="col-xs-6 col-sm-4 col-md-3">
                    
                      
                        <a data-dismiss="modal" data-toggle="modal" href="#img<?= $data['id_img'] ?>"><img src="<?= $host.$data['url_img']?>" width="180" height="180" alt="<?=stripcslashes($data['alt_img'])?>"></a>
								<form action="<?= $host ?>acp/apps/media/controller.php?id_img=<?= $data['id_img']?>" class="form-horizontal" method="post">
								<button type="submit" class="btn caption pull-right" name="delete_img" ><i class="fa fa-times"></i></button>
								</form>
								
								                        
                        <div class="caption">
                          <p class="text-ellipsis m-b-none"><?=stripcslashes($data['t_img'])?></p>
                        </div>
                        
                      </div>
                      
                      
                      
				<!-- <?= $data['file'] ?> -->
			<div id="img<?= $data['id_img'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
      	<div class="modal-dialog">
        	<div class="modal-content">

         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel"><?= $lang['detail_image'] ?></h4>
         </div>
          
         <div class="modal-body form-horizontal">
           
         <div class="form-group">
         <form action="<?= $host ?>acp/apps/media/controller.php?id_img=<?= $data['id_img']?>" class="form-horizontal" method="post">
         <div class="thumbnail col-lg"><img src="<?= $host.$data['url_img']?>" alt="<?= stripcslashes($data['alt_img'])?>" title="<?= stripcslashes($data['t_img'])?>"></a></div> 
                      <label class="col-sm-2 control-label"><?= $lang['title_image'] ?></label>
							<div class="col-lg-10">
							<input type="text" name="imgtitle" class="form-control" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s" value="<?= stripcslashes($data['t_img'])?>">                    
                    </div>
                    </div>

							<div class="form-group">
                      <label class="col-sm-2 control-label"><?= $lang['alt_image'] ?></label>
							<div class="col-lg-10">
							<input type="text" name="imgalt" class="form-control" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s" value="<?= stripcslashes($data['alt_img'])?>">                    
                    </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-2 control-label"><?= $lang['ext_image'] ?></label>
							<div class="col-lg-10">
							<input type="text" name="imgext" class="form-control" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s" value="<?= stripcslashes($data['ex_link'])?>">                    
                    </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label"><?= $lang['category'] ?></label>
							<div class="col-lg-10">
							<select name="catimg"  style='max-height:200px; overflow-y:scroll; overflow-x:hidden;' class="form-control m-b" required>
                <?php $imgquery = "SELECT * FROM cat_img";
                  $imghasil = mysql_query($imgquery);
	                if (!$imghasil) IsQueryError();
                  if (mysql_num_rows($imghasil) > 0) {               
                    while($imgdata = mysql_fetch_row($imghasil)) { ?>                         
                          <option value="<?= $imgdata[0]?>" <?php if($imgdata[0] == $data['cat_img']) {echo 'selected="selected"';}?>><?= $imgdata[1]?></option>
                       <?php } 
                    echo "</select>"; 
              }else echo "<option></option></select>";?>                    
                    </div>
                    </div>

                    
                    
                    <div class="form-group">
                      <label class="col-sm-2 control-label"><?= $lang['direct_url'] ?></label>
							<div class="col-lg-10">
							<input type="text" name="imgurl" class="form-control" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s" value="<?= $host.$data['url_img']?>">                    
                    </div>
                    </div>    
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
					    <button type="submit" class="btn btn-<?= $site['color']?> btn-sm pull-right" name="update_img"><i class="fa fa-edit"></i> <?= $lang['button_update'] ?></button>
						 <button type="submit" class="btn btn-info btn-sm pull-left" name="download_img"><i class="fa fa-download"></i> <?= $lang['button_download'] ?></button> 
						 <button type="submit" class="btn btn-danger btn-sm pull-right" name="delete_img" ><i class="fa fa-trash-o"></i> <?= $lang['button_delete'] ?></button>					
					</form>                  
               
               
					
					
						         
         </div>
          
         <div class="modal-footer">
           <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><?= $lang['button_cancel'] ?></button>
         </div>	 
			
        </div> 
      </div>
      </div>                       
                      
                     <?php } 
    						echo "</div>";
		 					?>
                    </div>
                  </div>
                 
               
       	 
              
                  
                    
                  
                
            