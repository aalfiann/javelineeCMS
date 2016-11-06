<section class="panel panel-default">
                <header class="panel-heading font-bold">
                  <?= $lang['list_widget'] ?>
                </header>
                <div class="row wrapper">
                
                  <div class="col-sm-5 m-b-xs">
                    
	   					 <a  data-dismiss="modal" data-toggle="modal" href="#widget" class="btn btn-default bg-light dker" type="button"> <?= $lang['create_new_widget'] ?> </a>
    	   			         
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
                        <th><?= $lang['name_widget'] ?></th>
                        <th><?= $lang['status'] ?></th>
                        <th width="50"><?= $lang['order'] ?></th>
                        <th width="80">#</th>
                      </tr>
                    </thead>
                    <?php  
                    			while($data = mysql_fetch_array($result))
{
	?>
                    <tbody>
                      <tr> 
                      <td><?php if ($data['name_widget'] == null) echo "No display name"; else echo $data['name_widget']; ?> </td>
                      <td><?= $data['status_widget'] ?> </td>
                      <td align="center"><?= $data['position'] ?> </td>
                      <td><a href="<?= $host ?>acp/content/controller.php?do=order&id=<?= $data['id_widget']?>&position=<?php if($data['position'] > 1) echo ($data['position'] - 1); else echo $data['position'];?>" title="<?= $lang['up_order'] ?>"><i class="fa fa-chevron-up"></i></a> <a href="<?= $host ?>acp/content/controller.php?do=order&id=<?= $data['id_widget']?>&position=<?= ($data['position'] + 1)?>" title="<?= $lang['down_order'] ?>"><i class="fa fa-chevron-down"></i></a> <a data-dismiss="modal" data-toggle="modal" href="#editwidget<?= $data['id_widget']?>" title="<?= $lang['edit_widget'] ?>"><i class="fa fa-cog"></i></a></td>
                      </tr>
                    </tbody>                                      
                      
                  <?php } 
    						echo "</table>";	
		 					?>
                </div>

                <?php
                mysql_data_seek( $result, 0 );  
                while($data = mysql_fetch_array($result))
                { 
                ?>
<!-- Edit Widget <?= $data['id_widget']?> -->
	<div id="editwidget<?= $data['id_widget']?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel"><?= $lang['edit_widget'] ?></h4>
          </div>
          
          <div class="modal-body"> 
          <section class="panel panel-default ">
                <header class="panel-heading font-bold">
                  <?= $lang['edit_widget'] ?>
                </header>
                <div class="panel-body">
                  <form action="<?= $host ?>acp/content/controller.php?id_widget=<?= $data['id_widget']?>" class="form-horizontal" method="post">			
							
						  <div class="form-group">
                    <label class="col-sm-2 control-label"><?= $lang['name'] ?></label>
                      <div class="col-sm-10">
                        <input name="namewidget" type="text" class="form-control" value="<?=stripcslashes($data['name_widget'])?>">       
                      </div>
                    </div>
                    
                    <div class="form-group">
                    <label class="col-sm-2 control-label"><?= $lang['code'] ?></label>
                      <div class="col-sm-10">
                        <textarea name="codewidget" class="form-control" required><?= stripcslashes($data['code_widget'])?></textarea>
                      </div>
                    </div>
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>                  
            
                        
                  
                  
               </section>
          </div>
          
          <div class="modal-footer">
          <?php if ($data['status_widget'] == "disabled") echo "<input type=\"submit\" class=\"btn btn-info btn-sm pull-left\" name=\"enabled_widget\" value=\"".$lang['button_enable_widget']."\">";
          else echo "<input type=\"submit\" class=\"btn btn-warning btn-sm pull-left\" name=\"disabled_widget\" value=\"".$lang['button_disable_widget']."\">"; ?>
          <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><?= $lang['button_cancel'] ?></button>
			 <input type="submit" class="btn btn-<?= $site['color'] ?> btn-sm pull-right" name="update_widget" value="<?= $lang['button_update_widget'] ?>">
			 <input type="submit" class="btn btn-danger btn-sm pull-right" name="delete_widget" value="<?= $lang['button_delete_widget'] ?>">
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
                      <small class="text-muted inline m-t-sm m-b-sm"><?= $lang['total_widget'] ?> <?= $jumData ?></small>
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
                
					                 
                                
                <?php include 'modal.widget.php'; ?>
             </section>