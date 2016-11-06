						<li  >
                      <a href="javascript:void(0)" class="auto">
                        <span class="pull-right text-muted">
                          <i class="i i-circle-sm-o text"></i>
                          <i class="i i-circle-sm text-active"></i>
                        </span>
                        <i class="i i-grid2 icon">
                        </i>
                        <span class="font-bold">Apps</span>
                      </a>
							
                      <ul class="nav dk">
                      
                      <!-- Start Multi Menu Apps -->                        
                        <li <?php if ($_SESSION['mode'] =="user") {echo "class=\"hidden\"";}?> >
                          <a href="javascript:void(0)" class="auto">                            
                            <span class="pull-right text-muted">
                              <i class="i i-circle-sm-o text"></i>
                              <i class="i i-circle-sm text-active"></i>
                            </span>                            
                            <i class="i i-dots"></i>

                            <span>Plugins</span>
                          </a>
									<!-- Start Menu Media -->                          
                          <ul class="nav dker">

                          <li >
                          <a href="<?= $host ?>acp/apps/opengraph/index.php" class="auto">                                                        
                            <i class="i i-dot"></i>

                            <span>Open Graph</span>
                          </a>
                        </li>

                          <li >
                          <a href="<?= $host ?>acp/apps/recaptcha/index.php" class="auto">                                                        
                            <i class="i i-dot"></i>

                            <span>reCaptcha</span>
                          </a>
                        </li>
                          
                          <li >
                          <a href="<?= $host ?>acp/apps/forum/forum.php" class="auto">                                                        
                            <i class="i i-dot"></i>

                            <span>Vanilla Forums</span>
                          </a>
                        </li>
                        
                        <li >
                          <a href="<?= $host ?>acp/apps/zopim/" class="auto">                                                        
                            <i class="i i-dot"></i>

                            <span>Zopim Live Chat</span>
                          </a>
                        </li>
  
                          </ul>
                          <!-- End Menu Media -->
                          
                        </li>
                        
                      <!-- End Multi Menu Apps -->
                      
                      <!-- Start Multi Menu Apps 1 -->                        
                        <li >
                          <a href="javascript:void(0)" class="auto">                            
                            <span class="pull-right text-muted">
                              <i class="i i-circle-sm-o text"></i>
                              <i class="i i-circle-sm text-active"></i>
                            </span>                            
                            <i class="i i-dots"></i>

                            <span>Media</span>
                          </a>
									<!-- Start Menu Media -->                          
                          <ul class="nav dker">
                          <li >
                          <a href="<?= $host ?>acp/apps/media/images.php" class="auto">                                                        
                            <i class="i i-dot"></i>

                            <span>Media Image</span>
                          </a>
                        </li>
                        <li >
                          <a href="<?= $host ?>acp/apps/media/file.php" class="auto">                                                        
                            <i class="i i-dot"></i>

                            <span>Media File</span>
                          </a>
                        </li>
                          </ul>
                          <!-- End Menu Media -->
                          
                        </li>
                        
                      <!-- End Multi Menu Apps 1 -->
							                      
                      <!-- Single Menu -->

						<li >
                          <a href="<?= $host ?>acp/apps/gmap/map.php" class="auto">                                                        
                            <i class="i i-dot"></i>

                            <span>Google Maps</span>
                          </a>
                        </li>	

                        <li <?php if ($_SESSION['mode'] =="user") {echo "class=\"hidden\"";}?> >
                          <a href="<?= $host ?>acp/apps/supercache/" class="auto">                                                        
                            <i class="i i-dot"></i>

                            <span>Super Cache</span>
                          </a>
                        </li>	

                        <li <?php if ($_SESSION['mode'] =="user") {echo "class=\"hidden\"";}?> >
                          <a href="<?= $host ?>acp/apps/pinger/" class="auto">                                                        
                            <i class="i i-dot"></i>

                            <span>Pinger</span>
                          </a>
                        </li> 					
                        
                       <!-- End Single Menu --> 
                      
                      
							
                        
                        
                   	
                      </ul>
                   	
                    </li>