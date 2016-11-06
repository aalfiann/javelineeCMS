<section class="panel panel-default">
                <header class="panel-heading font-bold">
                  <?= $lang['static_page'] ?>
                </header>
                <div class="row wrapper">
                
                  <div class="col-sm-5 m-b-xs">
                    
	   					 <a href="<?= $host ?>acp/content/create.page.php" class="btn btn-default bg-light dker" type="button"> <?= $lang['create_new_page'] ?> </a>
    	   			         
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
                        <th><?= $lang['name_page'] ?></th>
                        <th><?= $lang['status'] ?></th>
                        <th width="60">#</th>
                      </tr>
                    </thead>
                    <?php foreach ($dataTable as $i => $data)
    								{
        							$no = ($i + 1) + (($page - 1) * $dataPerPage); ?>
        							<!-- Edit Page <?= $data['id_page']?> -->
	<div id="editpage<?= $data['id_page']?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel"><?= $lang['edit_page'] ?></h4>
          </div>
          
          <div class="modal-body"> 
          <section class="panel panel-default ">
                <header class="panel-heading font-bold">
                  <?= $lang['edit_category_page'] ?>
                </header>
                <div class="panel-body">
                  <form action="<?= $host ?>acp/content/controller.php?id_page=<?= $data['id_page']?>" class="form-horizontal" method="post">
						  <div class="form-group">
                    <label class="col-sm-2 control-label"><?= $lang['name'] ?></label>
                      <div class="col-sm-10">
                        <input name="namepage" type="text" class="form-control" value="<?= $data['t_page']?>" required>
                      </div>
                    </div>
                    <div class="line line-dashed b-b line-lg pull-in"></div>                  
            
                        
                  </div>
                  
               </section>
          </div>
          
          <div class="modal-footer">
          <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><?= $lang['button_cancel'] ?></button>
			 <input type="submit" class="btn btn-<?= $site['color'] ?> btn-sm pull-right" name="update_page" value="<?= $lang['update_page'] ?>">
			 <input type="submit" class="btn btn-danger btn-sm pull-right" name="delete_page" value="<?= $lang['delete_page'] ?>">
          </form>          
          </div>
			

			 
			
        </div> 
      </div> 
    </div>
                    <tbody>
                      <tr> 
                      <td><?= $no ?></td>
                      <td><?= $data['t_page'] ?> </td>
                      <td><?= $data['status_page'] ?> </td>
                      <td><a data-dismiss="modal" data-toggle="modal" href="<?= $host ?>acp/content/edit.page.php?id=<?= $data['id_page']?>" title="<?= $lang['edit_page'] ?>"><i class="fa fa-cog"></i></a> <?php if ($data['status_page'] == "published") {if ($seo['type_url'] == "query") {echo "<a title=\"".$lang['view_page']."\" target=\"_blank\" href=\"".$host."?p=page&id=".$data['id_page']."&s=".$data['slug']." \"><i class=\"fa fa-external-link\"></i></a\">";} else {echo "<a title=\"".$lang['view_page']."\" target=\"_blank\" href=\"".$host."page/".$data['id_page']."/".$data['slug'].".html \"><i class=\"fa fa-external-link\"></i></a\">";}} ?></td>
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
                      <small class="text-muted inline m-t-sm m-b-sm"><?= $lang['total_page'] ?> <?= $totalrow ?></small>
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
                
					                 
                                
                
             </section>