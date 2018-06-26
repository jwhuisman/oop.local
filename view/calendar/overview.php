<?php 
	$month = "";
	$day = "";

	foreach($birthdays as $bday){
		if($bday["month"] != $month){
			echo "<h1>" . getMonthName($bday["month"]) . "</h1>";
			$month = $bday["month"];
		}

		if($bday["day"] != $day){
			echo "<h2>" . $bday["day"] . "</h2>";
			$day = $bday["day"];
		}?>
			
		<p>
            <a href="<?=URL?>calendar/edit/<?=$bday["id"]?>">
                <?=$bday["person"]?> (<?=$bday["year"]?>)</a>
                
            <a href="<?=URL?>calendar/delete/<?=$bday["id"]?>">x</a>
		</p>

		<?php
	}
	

 ?>
<p><a href="<?=URL?>calendar/add">Toevoegen</a></p>	