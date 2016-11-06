<?php
/* Note: Change Language feature is doesnt work in Clean URL*/

function EN(){
	if ($_SESSION['lang'] == "en") {echo "English";} 
		else {
			if (!empty($_GET['lang'])){echo "English";}
				else {
					if (empty($_GET['p'])) echo "English";
						else {echo "<a href=\"".$host.$_SERVER["REQUEST_URI"]."&lang=en\">English</a>";}
				}
		}
}

function ID(){
	if ($_SESSION['lang'] == "id") {echo "Bahasa";} else {
		if (!empty($_GET['lang'])){echo "Bahasa";}
			else {
				if (empty($_GET['p'])) echo "Bahasa";			 
					else {echo "<a href=\"".$host.$_SERVER["REQUEST_URI"]."&lang=id\">Bahasa</a>";}
		}
	}
}
?>