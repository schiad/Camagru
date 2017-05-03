<p id="js">Hello World</p>

<form action="./index.php">
	<div class="gallery">
		<div class="image">
			<input type="radio" name="mask" onclick="enable();" value="barbe1">
			<img src="./img_src/barbe1.png" alt="barbe1"/>
		</div>
		<div class="image">
			<input type="radio" name="mask" onclick="enable();" value="barbe2"><br>
			<img src="./img_src/barbe2.png" alt="barbe1"/>
		</div>
	</div>
	<div class="class_div">
		<input id="shot" type="submit" onclick="check_validate();" value="shot">
	</div>
</form>

<script>
	var i;
	i = 0;
	document.getElementById('shot').disabled = true;

	function check_validate()
	{
		if (document.getElementById('shot').getAttribute('disabled') == true)
		{
			alert("Please choose a mask !!!!");
		}
		alert ("Hello");
	}

	function enable()
	{
		document.getElementById('shot').disabled = false;
	}

	function my_func()
	{
		i += 1;
		var text;
		text = 'Hello World ' + i;
		document.getElementById('js').innerHTML = text;
	}

</script>

<span onclick="my_func();">test</span>

