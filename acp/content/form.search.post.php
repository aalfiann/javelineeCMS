<section class="panel panel-default">
                <header class="panel-heading font-bold">
                  <?= $lang['result_post'] ?>
                  
                </header>
                <div class="row wrapper">
                
                 <div class="col-sm-5 m-b-xs">
                    
	   					 <a href="<?= $host ?>acp/content/create.post.php" class="btn btn-default bg-light dker" type="button"> <?= $lang['create_new_post'] ?> </a>
    	   			         
                  </div>
                  
                  <div class="col-sm-6 text-right text-center-xs pull-right">
                  <ul class="pagination pagination-sm m-t-none m-b-none">
                        <li><a href="<?php if ($noPage > 1) echo $_SERVER['PHP_SELF'].'?q='.$search_post.'&page='.($noPage-1) ?>"><i class="fa fa-chevron-left"></i></a></li>
                        <li><?php for($page = 1; $page <= $jumPage; $page++)
{
         if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage)) 
         {   
         	$showPage = $page;
            //if (($showPage == 1) && ($page != 2)) echo ""; 
            //if (($showPage != ($jumPage - 1)) && ($page == $jumPage)) echo "";
            if ($page == $noPage) echo "<a href=''> <b>".$page."</b></a> ";
            else echo " <a href='".$_SERVER['PHP_SELF']."?q=".$search_post."&page=".$page."'>".$page."</a> ";
            //$showPage = $page;          
            
         }
         
}?></li>
                        <li><a href="<?= $_SERVER['PHP_SELF'].'?q='.$search_post.'&page='.($noPage+1) ?>"><i class="fa fa-chevron-right"></i></a></li>
                      </ul>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table table-striped b-t b-light">
                    <thead>
                      <tr>
                      	
                        <th><?= $lang['title_post'] ?></th>
                        <th width="80"><?= $lang['category'] ?></th>
                        <th width="80"><?= $lang['author'] ?></th>
                        <th width="50"><?= $lang['status'] ?></th>                        
                        <th width="60">#</th>
                      </tr>
                    </thead>
                    <?php  
                    			while($data = mysql_fetch_array($result))
{
	?>
        							
                    <tbody>
                    <tr>
                      <td><?= $data['t_post'] ?> </td>
                      <td ><?= $data['name_cat_post'] ?></td>
                      <td ><?= $data['username'] ?></td>
                      <td ><?= $data['status_post'] ?></td>
                      <td width="50"> <?php if ($_SESSION['mode'] == "user") { if ($data['username'] == $user) {echo "<a href=\"".$host."acp/content/edit.post.php?id=".$data['id_post']."\" title=\"".$lang['edit_post']."\"><i class=\"fa fa-cog\"></i></a>";}} else {echo "<a href=\"".$host."acp/content/edit.post.php?id=".$data['id_post']."\" title=\"".$lang['edit_post']."\"><i class=\"fa fa-cog\"></i></a>";}?> <?php if ($data['status_post'] == "published") { if ($seo['type_url'] == "query") {echo "<a title=\"".$lang['view_page']."\" target=\"_blank\" href=\"".$host."?p=read&id=".$data['id_post']."&s=".$data['slug']." \"><i class=\"fa fa-external-link\"></i></a\">";} else {echo "<a title=\"".$lang['view_page']."\" target=\"_blank\" href=\"".$host."read/".$data['id_post']."/".$data['slug'].".html \"><i class=\"fa fa-external-link\"></i></a\">";}} ?></td>
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
            										else echo " <a href='".$_SERVER['PHP_SELF']."?q=".$search_post."&page=".$page."'>".$page."</a> ";
											         }
										}?></li>
    	   				 </ul>
                                      
                    </div>
                    <div class="col-sm-4 text-center">
                      <small class="text-muted inline m-t-sm m-b-sm"><?= $lang['total_result_search'] ?> <?= $jumData ?></small>
                    </div>
                    <div class="col-sm-4 text-right text-center-xs">                
                      <ul class="pagination pagination-sm m-t-none m-b-none">
                        <li><a href="<?php if ($noPage > 1) echo $_SERVER['PHP_SELF'].'?q='.$search_post.'&page='.($noPage-1) ?>"><i class="fa fa-chevron-left"></i></a></li>
                        <li><a href="#"><?= $lang['page'] ?> <?= $noPage ?></a></li>
                        <li><a href="<?= $_SERVER['PHP_SELF'].'?q='.$search_post.'&page='.($noPage+1) ?>"><i class="fa fa-chevron-right"></i></a></li>
                      </ul>
                    </div>
                  </div>
                </footer>
                
             </section>