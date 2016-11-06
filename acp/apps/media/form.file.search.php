<section class="panel panel-default">
                <header class="panel-heading font-bold">
                  <?= $lang['data_file'] ?>
                </header>
                <div class="row wrapper">
                
                  <div class="col-sm-4 hidden-xs">
                    <ul class="pagination btn-group dropdown pagination-sm m-t-none m-b-none">
	   					 <button class="btn btn-default" type="button" data-toggle="dropdown"> <?= $lang['go_page'] ?> <span class="caret"></span></button>
    	   				 <ul class="dropdown-menu" style='max-height:200px; overflow-y:scroll; overflow-x:hidden;' role="menu">
      	   			 <li><?php for($page = 1; $page <= $jumPage; $page++){
         								if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage)) {   
         									$showPage = $page;
            									if ($page == $noPage) echo "<a href=''> <b>".$page."</b></a> ";
            										else echo " <a href='".$_SERVER['PHP_SELF']."?q=".$search_file."&page=".$page."'>".$page."</a> ";
											         }
										}?></li>
    	   				 </ul>
                                      
                    </div>
                  
                  <div class="col-sm-6 text-right text-center-xs pull-right">
                  <ul class="pagination pagination-sm m-t-none m-b-none">
                        <li><a href="<?php if ($noPage > 1) echo $_SERVER['PHP_SELF'].'?q='.$search_file.'&page='.($noPage-1) ?>"><i class="fa fa-chevron-left"></i></a></li>
                        <li><?php for($page = 1; $page <= $jumPage; $page++){
         if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage)) 
         {   
         	$showPage = $page;
            //if (($showPage == 1) && ($page != 2)) echo ""; 
            //if (($showPage != ($jumPage - 1)) && ($page == $jumPage)) echo "";
            if ($page == $noPage) echo "<a href=''> <b>".$page."</b></a> ";
            else echo " <a href='".$_SERVER['PHP_SELF']."?q=".$search_file."&page=".$page."'>".$page."</a> ";
            //$showPage = $page;                      
         }
}?></li>
                        <li><a href="<?= $_SERVER['PHP_SELF'].'?q='.$search_file.'&page='.($noPage+1) ?>"><i class="fa fa-chevron-right"></i></a></li>
                      </ul>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table table-striped b-t b-light">
                    <thead>
                      <tr>
                      	
                        <th><?= $lang['file_name'] ?></th>
                        <th><?= $lang['category'] ?></th>
                        <th width="60">#</th>
                      </tr>
                    </thead>
                    <?php while($data = mysql_fetch_array($result))
{?>
        							<!-- Edit File <?= $data['id_file']?> -->
	<div id="editfile<?= $data['id_file']?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel"><?= $lang['edit_data_file'] ?></h4>
          </div>
          
          <div class="modal-body form-horizontal"> 
          <section class="panel panel-default ">
                <header class="panel-heading font-bold">
                  <?= $lang['edit_file'] ?>
                </header>
                <div class="panel-body">
                  <form action="<?= $host ?>acp/apps/media/controller.php?id_file=<?= $data['id_file']?>" class="form-horizontal" method="post">
						  <div class="form-group">
                    <label class="col-sm-2 control-label"><?= $lang['name'] ?></label>
                      <div class="col-lg-10">
                        <input name="namefile" type="text" class="form-control" value="<?= stripcslashes($data['t_file'])?>" required>
                      </div>
                    </div>
                                  
            		  
            		  <div class="form-group">
                      <label class="col-sm-2 control-label"><?= $lang['direct_url'] ?></label>
							<div class="col-lg-10">
							<input type="text" name="urlfile" class="form-control" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s" value="<?=$data['url_file']?>">                    
                    </div>
                    </div>    
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    
               <button type="submit" class="btn btn-info btn-sm pull-left" name="download_file"><i class="fa fa-download"></i> <?= $lang['button_download'] ?></button>     
					 
                      
                        <button type="submit" class="btn btn-<?= $site['color'] ?> btn-sm pull-right" name="update_file" > <?= $lang['button_update'] ?></button>
			 <button type="submit" class="btn btn-danger btn-sm pull-right" name="delete_file" > <?= $lang['button_delete'] ?></button>
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
                    <tbody>
                    <tr>
                      <td><?=stripcslashes($data['t_file'])?> </td>
                      <td ><?=stripcslashes($data['name_file'])?></td>
                      <td width="50"><a data-dismiss="modal" data-toggle="modal" href="#editfile<?= $data['id_file']?>" title="<?= $lang['edit_category'] ?>"><i class="fa fa-cog"></i></a></td>
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
      	   			 <li><?php for($page = 1; $page <= $jumPage; $page++){
         								if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage)) {   
         									$showPage = $page;
            									if ($page == $noPage) echo "<a href=''> <b>".$page."</b></a> ";
            										else echo " <a href='".$_SERVER['PHP_SELF']."?q=".$_GET['q']."&page=".$page."'>".$page."</a> ";
											         }
										}?></li>
    	   				 </ul>
                                      
                    </div>
                    <div class="col-sm-4 text-center">
                      <small class="text-muted inline m-t-sm m-b-sm">Total data: <?= $jumData ?></small>
                    </div>
                    <div class="col-sm-4 text-right text-center-xs">                
                      <ul class="pagination pagination-sm m-t-none m-b-none">
                        <li><a href="<?php if ($noPage > 1) echo $_SERVER['PHP_SELF'].'?q='.$search_file.'&page='.($noPage-1) ?>"><i class="fa fa-chevron-left"></i></a></li>
                        <li><a href="#"><?= $lang['page'] ?> <?= $noPage ?></a></li>
                        <li><a href="<?= $_SERVER['PHP_SELF'].'?q='.$search_file.'&page='.($noPage+1) ?>"><i class="fa fa-chevron-right"></i></a></li>
                      </ul>
                    </div>
                  </div>
                </footer>
                
					                 
                                
                <?php include 'modal.cat.file.php'; ?>
             </section>