<!-- <?= $lang['create_new_ads'] ?> -->
	<div id="ads" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel"><?= $lang['create_new_ads'] ?></h4>
          </div>
          
          <div class="modal-body"> 
          <section class="panel panel-default ">
                <header class="panel-heading font-bold">
                  <?= $lang['new_ads'] ?>
                </header>
                <div class="panel-body">
                  <form action="<?= $host ?>acp/advertise/controller.php" class="form-horizontal" method="post">

						  <div class="form-group">
                    <label class="col-sm-2 control-label"><?= $lang['name_ads'] ?></label>
                      <div class="col-sm-10">
                        <input name="nameads" type="text" class="form-control" required>
                      </div>
                    </div>
                   
                    <div class="form-group">
                    <label class="col-sm-2 control-label"><?= $lang['owner_ads'] ?></label>
                      <div class="col-lg-10">
                        <input name="ownerads" type="text" class="form-control">       
                      </div>
                    </div>

                    <div class="form-group">
                    <label class="col-sm-2 control-label"><?= $lang['email_ads'] ?></label>
                      <div class="col-lg-10">
                        <input name="emailads" type="text" class="form-control" >       
                      </div>
                    </div>

                    <div class="form-group">
                    <label class="col-sm-2 control-label"><?= $lang['phone_ads'] ?></label>
                      <div class="col-lg-10">
                        <input name="phoneads" type="text" class="form-control">       
                      </div>
                    </div>

                    <div class="form-group">
                    <label class="col-sm-2 control-label"><?= $lang['web_ads'] ?></label>
                      <div class="col-lg-10">
                        <input name="webads" type="text" class="form-control" >       
                      </div>
                    </div>

                    <div class="form-group">
                    <label class="col-sm-2 control-label"><?= $lang['price'] ?></label>
                      <div class="col-lg-10">
                        <input name="priceads" type="text" class="form-control" required>       
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label"><?= $lang['type'] ?></label>
                      <div class="col-sm-10" >
                      
                        <select name="typeads"  style='max-height:200px; overflow-y:scroll; overflow-x:hidden;' class="form-control m-b" required>
								<?php 
                mysql_data_seek( $adshasil, 0 ); 
									if (mysql_num_rows($adshasil) > 0) {								
										while($adsdata = mysql_fetch_row($adshasil)) { ?>                         
                          <option value="<?= $adsdata[0]?>"><?= $adsdata[1]?></option>
                       <?php } 
    								echo "</select>"; 
		 					}else echo "<option></option></select>";?>
                        
                      </div>
                    </div> 

                    <div class="form-group">
                    <label class="col-sm-2 control-label"><?= $lang['expired'] ?></label>
                      <div class="col-lg-10">
                        <input name="expiredads" type="text" class="form-control" placeholder="Format yyyy-MM-dd, <?= $lang['example'] ?> <?=date('Y-m-d')?>" required>       
                      </div>
                    </div>
                    
                    <div class="form-group">
                    <label class="col-sm-2 control-label"><?= $lang['code'] ?></label>
                      <div class="col-lg-10">
                        <textarea name="codeads" class="form-control" placeholder="<?= $lang['example'] ?> <?= $lang['example_code_ads'] ?>" required><?= stripcslashes($datas['code_ads'])?></textarea>
                      </div>
                    </div>
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>                  
            
                        <input type="submit" class="btn btn-<?= $site['color'] ?> btn-sm pull-right" name="create_ads" value="<?= $lang['create_ads'] ?>">
                      
                    
                    </form>
                  </div>
                  
               </section>
          </div>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><?= $lang['button_cancel'] ?></button>
          </div>
			

			 
			
        </div> 
      </div> 
    </div>