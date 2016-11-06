<!-- Navigation -->
    <nav class="navbar navbar-<?=$otheme['other']?> navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="<?=$host?>"><?=$site['title']?></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a class="page-scroll" href="#page-top"></a>
                    </li>
                </ul>
                <?=NavSearch('left','45')?>
                <ul class="nav navbar-nav navbar-right">
                    
                    <li>
                        <a class="page-scroll" href="<?=$_SERVER['PHP_SELF']?>?p=post">Post</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?=$_SERVER['PHP_SELF']?>?p=forum">Forum</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>