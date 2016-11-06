<?php
 class rss {
     var $feed;

  function rss($feed) 
    {   $this->feed = $feed;  }
 
  function parse() 
    {
    $rss = simplexml_load_file($this->feed);
    

    $rss_split = array();
    foreach ($rss->channel->item as $item) {

    $title = (string) $item->title; // Title
    $link   = (string) $item->link; // Url Link
    $description = (string) $item->description; //Description
    $rss_split[] = '<article class="media">
    							<div class="pull-left">
                      		<span class="fa-stack fa-lg">
                        		<i class="fa fa-circle fa-stack-2x text-info"></i>
                        		<i class="fa fa-file-o fa-stack-1x text-white"></i>
                      		</span>
                    		</div>
                    	<div class="media-body">
                   <a href="'.$link.'" class="h4" target="_blank" title="'.$title.'">'.$title.'</a>
   <small class="block m-t-xs">'.$description.'</small>
          </div>
                  </article>
                  <div class="line pull-in"></div> 
';
    }
    return $rss_split;
  }
  function display($numrows, $head) 
  {
    $rss_split = $this->parse();

    $i = 0;
    $rss_data = '<div class="vas">
           <div class="title-head">
         '.$head.'
           </div>
         <div class="feeds-links">';
    while ( $i < $numrows ) 
   {
      $rss_data .= $rss_split[$i];
      $i++;
    }
    $trim = str_replace('', '',$this->feed);
    $user = str_replace('&lang=en-us&format=rss_200','',$trim);
    $rss_data.='</div></div>';
    return $rss_data;
  }
}
?>


                    
                      
                      
                    