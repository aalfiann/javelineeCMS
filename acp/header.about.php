<header class="header bg-white b-b b-light pull-right hidden-xs">
            <?php if ($site['author'] != "") {
              echo "<p>Author: <a href=\"".$site['url_author']."\" target=\"_blank\">".$site['author']."</a></p>"; } ?>
            </header>

            <header class="header bg-white b-b b-light">
              <p><?= $site['title'] ?> V.<?= $site['version'] ?></p>
            </header>
            
            