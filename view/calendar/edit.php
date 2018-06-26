<form action="<?=URL?>calendar/edit" method="POST">
	<input type="hidden" name="id" value="<?=$birthday["id"]?>">
	<p><label for="day">Day</label><input type="text" name="day" placeholder="Day" value="<?=$birthday["day"]?>"></p>
	<p><label for="month">Month</label><input type="text" name="month" placeholder="Month" value="<?=$birthday["month"]?>"></p>
	<p><label for="year">Year</label><input type="text" name="year" placeholder="Year" value="<?=$birthday["year"]?>"></p>
	<p><label for="person">Person</label><input type="text" name="person" placeholder="Person" value="<?=$birthday["person"]?>"></p>
	<button>Save</button>

</form>