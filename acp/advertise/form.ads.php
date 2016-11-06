<section class="panel panel-default">
                <header class="panel-heading font-bold">
                  <?= $lang['list_ads'] ?>
                </header>
                <div class="row wrapper">
                
                  <div class="col-sm-5 m-b-xs">
                    
	   					 <a  data-dismiss="modal" data-toggle="modal" href="#ads" class="btn btn-default bg-light dker" type="button"> <?= $lang['create_new_ads'] ?> </a>
    	   			         
                  </div>
                  
                  <div class="col-sm-4 text-right text-center-xs pull-right">
                  <ul class="pagination pagination-sm m-t-none m-b-none">
                        <li><a href="<?= $_SERVER['PHP_SELF']?>?page=<?= $noPage - 1 ?>"><i class="fa fa-chevron-left"></i></a></li>
                        <li><a href="#"><?= $lang['page'] ?> <?= $noPage ?></a></li>
                        <li><a href="<?= $_SERVER['PHP_SELF']?>?page=<?= $noPage + 1 ?>"><i class="fa fa-chevron-right"></i></a></li>
                      </ul>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table table-striped b-t b-light">
                    <thead>
                      <tr>
                        <th><?= $lang['name_ads'] ?></th>
                        <th><?= $lang['created'] ?></th>
                        <th><?= $lang['expired'] ?></th>
                        <th><?= $lang['price'] ?></th>
                        <th><?= $lang['type'] ?></th>
                        <th><?= $lang['view'] ?></th>
                        <th><?= $lang['status'] ?></th>
                      </tr>
                    </thead>
                    <?php  
                    			while($data = mysql_fetch_array($result))
{
	?>
        							
                    <tbody>
                      <tr> 
                      <td><?php if ($data['name_ads'] == null) echo "No display name"; else echo $data['name_ads']; ?> </td>
                      <td><?= $data['created_at'] ?> </td>
                      <td><?= $data['expired_at'] ?> </td>
                      <td><?= $data['harga_ads'] ?> </td>
                      <td><?= $data['detail'] ?> </td>
                      <td><?= $data['view_ads'] ?> </td>
                      <td><?= $data['status_ads'] ?> </td>
                      <td> <a data-dismiss="modal" data-toggle="modal" href="#editads<?= $data['id_ads']?>" title="<?= $lang['edit_ads'] ?>"><i class="fa fa-cog"></i></a></td>
                      </tr>
                    </tbody>                                      
                      

                      
                  <?php } 
    						echo "</table>";	
		 					?>
               </div>
<?php
mysql_data_seek( $result, 0 ); 
while($datas = mysql_fetch_array($result))
{ 
?>
<!-- Edit Ads <?= $data['id_ads']?> -->
	<div id="editads<?= $datas['id_ads']?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel"><?= $lang['edit_ads'] ?></h4>
          </div>
          
          <div class="modal-body"> 
          <section class="panel panel-default ">
                <header class="panel-heading font-bold">
                  <?= $lang['edit_ads'] ?>
                </header>
                <div class="panel-body">
                  <form action="<?= $host ?>acp/advertise/controller.php?id_ads=<?= $datas['id_ads']?>" class="form-horizontal" method="post">			
							
						  <div class="form-group">
                    <label class="col-sm-2 control-label"><?= $lang['name_ads'] ?></label>
                      <div class="col-lg-10">
                        <input name="nameads" type="text" class="form-control" value="<?=stripcslashes($datas['name_ads'])?>" required>       
                      </div>
                    </div>

                    <div class="form-group">
                    <label class="col-sm-2 control-label"><?= $lang['name'] ?></label>
                      <div class="col-lg-10">
                        <input name="ownerads" type="text" class="form-control" value="<?=stripcslashes($datas['name'])?>">       
                      </div>
                    </div>

                    <div class="form-group">
                    <label class="col-sm-2 control-label"><?= $lang['email_ads'] ?></label>
                      <div class="col-lg-10">
                        <input name="emailads" type="text" class="form-control" value="<?=stripcslashes($datas['email'])?>">       
                      </div>
                    </div>

                    <div class="form-group">
                    <label class="col-sm-2 control-label"><?= $lang['phone_ads'] ?></label>
                      <div class="col-lg-10">
                        <input name="phoneads" type="text" class="form-control" value="<?=stripcslashes($datas['phone'])?>">       
                      </div>
                    </div>

                    <div class="form-group">
                    <label class="col-sm-2 control-label"><?= $lang['web_ads'] ?></label>
                      <div class="col-lg-10">
                        <input name="webads" type="text" class="form-control" value="<?=stripcslashes($datas['website'])?>">       
                      </div>
                    </div>

                    <div class="form-group">
                    <label class="col-sm-2 control-label"><?= $lang['price'] ?></label>
                      <div class="col-lg-10">
                        <input name="priceads" type="text" class="form-control" value="<?=stripcslashes($datas['harga_ads'])?>" required>       
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
                          <option value="<?= $adsdata[0]?>" <?php if($adsdata[0] == $datas['type_ads']) {echo 'selected="selected"';}?>><?= $adsdata[1]?></option>
                       <?php } 
    								echo "</select>"; 
		 					}else echo "<option></option></select>";?>
                        
                      </div>
                    </div> 

                    <div class="form-group">
                    <label class="col-sm-2 control-label"><?= $lang['expired'] ?></label>
                      <div class="col-lg-10">
                        <input name="expiredads" type="text" class="form-control" value="<?=date('Y-m-d',strtotime(stripcslashes($datas['expired_at'])))?>" required>       
                      </div>
                    </div>
                    
                    <div class="form-group">
                    <label class="col-sm-2 control-label"><?= $lang['code'] ?></label>
                      <div class="col-lg-10">
                        <textarea name="codeads" class="form-control" required><?= stripcslashes($datas['code_ads'])?></textarea>
                      </div>
                    </div>
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>                  
            
                        
                  
                  
               </section>
          </div>
          
          <div class="modal-footer">
          <?php if ($datas['status_ads'] == "disabled") echo "<input type=\"submit\" class=\"btn btn-info btn-sm pull-left\" name=\"enabled_ads\" value=\"".$lang['button_enable_ads']."\">";
          else echo "<input type=\"submit\" class=\"btn btn-warning btn-sm pull-left\" name=\"disabled_ads\" value=\"".$lang['button_disable_ads']."\">"; ?>
          <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><?= $lang['button_cancel'] ?></button>
			 <input type="submit" class="btn btn-<?= $site['color'] ?> btn-sm pull-right" name="update_ads" value="<?= $lang['button_update_ads'] ?>">
			 <input type="submit" class="btn btn-danger btn-sm pull-right" name="delete_ads" value="<?= $lang['button_delete_ads'] ?>">
          </form>          
          </div>
			

			 
			
        </div> 
      </div> 
    </div>
<?php }
?>

                
                
                
					<footer class="panel-footer">
                  <div class="row">
                    <div class="col-sm-4 hidden-xs">
                    <ul class="pagination btn-group dropup pagination-sm m-t-none m-b-none">
	   					 <button class="btn btn-default" type="button" data-toggle="dropdown"> <?= $lang['go_page'] ?> <span class="caret"></span></button>
    	   				 <ul class="dropdown-menu" style='max-height:200px; overflow-y:scroll; overflow-x:hidden;' role="menu">
                  <li><?= showPagination($table, $dataPerPage); ?></li>
    	   				 </ul>
                                      
                    </div>
                    <div class="col-sm-4 text-center">
                      <small class="text-muted inline m-t-sm m-b-sm"><?= $lang['total_ads'] ?> <?= $jumData ?></small>
                    </div>
                    <div class="col-sm-4 text-right text-center-xs">                
                      <ul class="pagination pagination-sm m-t-none m-b-none">
                        <li><a href="<?= $_SERVER['PHP_SELF']?>?page=<?= $noPage - 1 ?>"><i class="fa fa-chevron-left"></i></a></li>
                        <li><a href="#"><?= $lang['page'] ?> <?= $noPage ?></a></li>
                        <li><a href="<?= $_SERVER['PHP_SELF']?>?page=<?= $noPage + 1 ?>"><i class="fa fa-chevron-right"></i></a></li>
                      </ul>
                    </div>
                  </div>
                </footer>
                
					                 
                                
                <?php include 'modal.ads.php'; ?>
             </section>