<section class="panel panel-default">
                <header class="panel-heading font-bold">
                  <?= $lang['category_images'] ?>
                </header>
                <div class="row wrapper">
                
                  <div class="col-sm-5 m-b-xs">
                    
	   					 <a  data-dismiss="modal" data-toggle="modal" href="#catimg" class="btn btn-default bg-light dker" type="button"> <?= $lang['create_new_category'] ?> </a>
    	   			         
                  </div>
                  
                  <div class="col-sm-4 text-right text-center-xs pull-right">
                  <ul class="pagination pagination-sm m-t-none m-b-none">
                        <li><a href="<?= $_SERVER['PHP_SELF']?>?page=<?= $page - 1 ?>"><i class="fa fa-chevron-left"></i></a></li>
                        <li><a href="#"><?= $lang['page'] ?> <?= $page ?></a></li>
                        <li><a href="<?= $_SERVER['PHP_SELF']?>?page=<?= $page + 1 ?>"><i class="fa fa-chevron-right"></i></a></li>
                      </ul>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table table-striped b-t b-light">
                    <thead>
                      <tr>
                        <th width="50">No</th>
                        <th><?= $lang['category_name'] ?></th>
                        <th width="60">#</th>
                      </tr>
                    </thead>
                    <?php foreach ($dataTable as $i => $data)
    								{
        							$no = ($i + 1) + (($page - 1) * $dataPerPage); ?>
        							<!-- Edit Category Image <?= $data['id_cat_img']?> -->
	<div id="editcatimg<?= $data['id_cat_img']?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel"><?= $lang['edit_category'] ?></h4>
          </div>
          
          <div class="modal-body"> 
          <section class="panel panel-default ">
                <header class="panel-heading font-bold">
                  <?= $lang['edit_category'] ?> <?= $lang['images'] ?>
                </header>
                <div class="panel-body">
                  <form action="<?= $host ?>acp/apps/media/controller.php?id_cat_img=<?= $data['id_cat_img']?>" class="form-horizontal" method="post">
						  <div class="form-group">
                    <label class="col-sm-2 control-label"><?= $lang['name'] ?></label>
                      <div class="col-sm-10">
                        <input name="namecat" type="text" class="form-control" value="<?=stripcslashes($data['name_img'])?>" required>
                      </div>
                    </div>
                    <div class="line line-dashed b-b line-lg pull-in"></div>                  
            			<div class="form-group">
                    <label class="col-sm-2 control-label"><?= $lang['url_thumbnail'] ?></label>
                      <div class="col-sm-10">
                        <input name="thumbnail" type="text" class="form-control" value="<?=stripcslashes($data['thumbnail_img'])?>" placeholder="<?= $lang['thumb_placeholder'] ?>">
                      </div>
                    </div>
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                  </div>
                  
               </section>
          </div>
          
          <div class="modal-footer">
          <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><?= $lang['button_cancel'] ?></button>
			 <input type="submit" class="btn btn-<?= $site['color'] ?> btn-sm pull-right" name="update_cat_img" value="<?= $lang['update_category'] ?>">
			 <input type="submit" class="btn btn-danger btn-sm pull-right" name="delete_cat_img" value="<?= $lang['delete_category'] ?>">
			<?php if($data['view'] == "private") echo "<input type=\"submit\" class=\"btn btn-info btn-sm pull-left\" name=\"public_cat_img\" value=\"".$lang['button_make_public']."\">";
				else	echo "<input type=\"submit\" class=\"btn btn-warning btn-sm pull-left\" name=\"private_cat_img\" value=\"".$lang['button_make_private']."\">"; ?>		 
			 
          </form>          
          </div>
			

			 
			
        </div> 
      </div> 
    </div>
                    <tbody>
                      <tr> 
                      <td><?= $no ?></td>
                      <td><?=stripcslashes($data['name_img'])?> </td>
                      <td><a data-dismiss="modal" data-toggle="modal" href="#editcatimg<?= $data['id_cat_img']?>" title="Edit Category"><i class="fa fa-cog"></i></a>
                      	<? if($data['view'] == "private") echo "<i class=\"fa fa-eye-slash\"></i>"; else echo "<i class=\"fa fa-eye\"></i>"; ?> </td>
                      </tr>
                    </tbody>                                      
                      
                  <?php } 
    						echo "</table>";	
		 					?>
                </div>
                
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
                      <small class="text-muted inline m-t-sm m-b-sm">Total data: <?= $totalrow ?></small>
                    </div>
                    <div class="col-sm-4 text-right text-center-xs">                
                      <ul class="pagination pagination-sm m-t-none m-b-none">
                        <li><a href="<?= $_SERVER['PHP_SELF']?>?page=<?= $page - 1 ?>"><i class="fa fa-chevron-left"></i></a></li>
                        <li><a href="#"><?= $lang['page'] ?> <?= $page ?></a></li>
                        <li><a href="<?= $_SERVER['PHP_SELF']?>?page=<?= $page + 1 ?>"><i class="fa fa-chevron-right"></i></a></li>
                      </ul>
                    </div>
                  </div>
                </footer>
                
					                 
                                
                <?php include 'modal.cat.img.php'; ?>
             </section>