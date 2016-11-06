<?php 
include 'config.php'; 
include 'model/crud.php';
include 'model/check.php';
include 'model/admin.only.php';
include_once 'model/set.lang.php'; echo ShowUser(); ?>

<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
  <title><?= $lang['data_user'] ?> | <?= $site['title'] ?> Admin Control Panel</title>
  <meta name="description" content="<?= $lang['data_user'] ?> | <?= $site['title'] ?> Admin Control Panel" />
  <?php include 'header.acp.php'; ?>
  
</head>
<body class="">
  <section class="vbox">
    <header class="bg-<?= $site['color'] ?> header header-md navbar navbar-fixed-top-xs box-shadow">
      <?php include 'header.aside.php'; ?>    
    </header>
    <section>
      <section class="hbox stretch">
        <!-- .aside -->
        <aside class="bg-light lt b-r b-light aside-md hidden-print" id="nav">          
          <section class="vbox">
            <section class="w-f scrollable">
              <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">
               <?php include 'header.side.php'; ?>					
					           


                <!-- nav -->                 
                <nav class="nav-primary hidden-xs">
                 <?php include 'nav.side.php'; ?>
                </nav>
                <!-- / nav -->
              </div>
            </section>
            
            <footer class="footer hidden-xs no-padder text-center-nav-xs">
             <?php include 'footer.side.php'; ?>
            </footer>
          </section>
        </aside>
        <!-- /.aside -->
        <section id="content">
          <section class="vbox">
           <?php include 'header.about.php'; ?>
            
				<section class="scrollable wrapper w-f">
              
              <section class="scrollable padder">          
              
              <section class="panel panel-default">
                <header class="panel-heading font-bold">
                  <?= $lang['data_user'] ?> | <?= $site['title']; ?>
                </header>
                <div class="row wrapper">
                	<div class="col-sm-4 hidden-xs">
                    <ul class="pagination btn-group dropdown pagination-sm m-t-none m-b-none">
	   					 <button class="btn btn-default" type="button" data-toggle="dropdown"> <?= $lang['go_page'] ?> <span class="caret"></span></button>
    	   				 <ul class="dropdown-menu" style='max-height:200px; overflow-y:scroll; overflow-x:hidden;' role="menu">
      	   			 <li><?= showPagination($table, $dataPerPage); ?></li>
    	   				 </ul>        
                  </div>
                  <div class="col-sm-4 m-b-xs">
                  </div>
                  <div class="col-sm-4 text-right text-center-xs pull-right">
                  <ul class="pagination pagination-sm m-t-none m-b-none">
                        <li><a href="<?= $_SERVER['PHP_SELF'] ?>?page=<?= $page - 1 ?>"><i class="fa fa-chevron-left"></i></a></li>
                        <li><a href="#"><?= $lang['page'] ?> <?= $page ?></a></li>
                        <li><a href="<?= $_SERVER['PHP_SELF'] ?>?page=<?= $page + 1 ?>"><i class="fa fa-chevron-right"></i></a></li>
                      </ul>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table table-striped b-t b-light">
                    <thead>
                      <tr>
                        <th width="50">No</th>
                        <th><?= $lang['name'] ?></th>
                        <th width="60">Status</th>
                        <th width="60">#</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr> <?php foreach ($dataTable as $i => $data)
    								{
        							$no = ($i + 1) + (($page - 1) * $dataPerPage); ?>
                      <td><?= $no ?></td>
                      <td><?= $data['username'] ?> </td>
                      <td><?= $data['status'] ?> </td>
                      <td><a name="DataUser" href="<?= $host ?>acp/edit.user.php?username=<?= $data['username'] ?>" title="<?= $lang['edit_password'] ?>"><i class="fa fa-pencil"></i></a> <a href="<?= $host ?>acp/model/crud.php?delete=<?= $data['username'] ?>" title="<?= $lang['delete'] ?>"><i class="i i-cross2"></i></a></td>
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
                      <small class="text-muted inline m-t-sm m-b-sm"><?= $lang['total_user'] ?> <?= $totalrow ?></small>
                    </div>
                    <div class="col-sm-4 text-right text-center-xs">                
                      <ul class="pagination pagination-sm m-t-none m-b-none">
                        <li><a href="<?= $_SERVER['PHP_SELF'] ?>?page=<?= $page - 1 ?>"><i class="fa fa-chevron-left"></i></a></li>
                        <li><a href="#"><?= $lang['page'] ?> <?= $page ?></a></li>
                        <li><a href="<?= $_SERVER['PHP_SELF'] ?>?page=<?= $page + 1 ?>"><i class="fa fa-chevron-right"></i></a></li>
                      </ul>
                    </div>
                  </div>
                </footer>                
                
             </section>
            </section>
          </section>            
            
            <footer class="footer bg-white b-t b-light">
              <?php include 'footer.aside.php'; ?>
            </footer>
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
        </section>
      </section>
    </section>
  </section>
  <?php include 'body.js.php'; ?>
 
</body>
</html>