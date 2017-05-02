<p id="js">Hello World</p>

<form class="gallery">
	<div class="image">
		<input type="radio" name="mask" value="barbe1">
		<img src="./img_src/barbe1.png" alt="barbe1"/>
	</div>
	<div class="image">
		<input type="radio" name="mask" value="barbe2"><br>
		<img src="./img_src/barbe2.png" alt="barbe1"/>
	</div>
</form>

<script>
	var i;
	i = 0;

	function my_func()
		{
			i += 1;
			var text;
			text = 'Hello World ' + i;
			document.getElementById('js').innerHTML = text;
		}
</script>

<span onclick="my_func();">test</span>

