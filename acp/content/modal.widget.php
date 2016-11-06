<!-- <?= $lang['create_new_widget'] ?> -->
	<div id="widget" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel"><?= $lang['create_new_widget'] ?></h4>
          </div>
          
          <div class="modal-body"> 
          <section class="panel panel-default ">
                <header class="panel-heading font-bold">
                  <?= $lang['new_widget'] ?>
                </header>
                <div class="panel-body">
                  <form action="<?= $host ?>acp/content/controller.php" class="form-horizontal" method="post">

						  <div class="form-group">
                    <label class="col-sm-2 control-label"><?= $lang['name'] ?></label>
                      <div class="col-sm-10">
                        <input name="namewidget" type="text" class="form-control" value="" >
                      </div>
                    </div>
                   
                    <div class="form-group">
                    <label class="col-sm-2 control-label"><?= $lang['code'] ?></label>
                      <div class="col-sm-10">
                        <textarea name="codewidget" class="form-control" required></textarea>
                      </div>
                    </div>
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>                  
            
                        <input type="submit" class="btn btn-<?= $site['color'] ?> btn-sm pull-right" name="create_widget" value="<?= $lang['create_widget'] ?>">
                      
                    
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