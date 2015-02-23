<div>

<!-- 	REF http://stackoverflow.com/questions/3302988/how-to-set-zoom-level-using-css answered Dec 30 '11 at 14:10 -->
	<button 
		onclick="body.style.zoom='40%'"
		style="font-size: 10px;"
		>
			40%
	</button>

	<button 
		onclick="body.style.zoom='50%'"
		style="font-size: 10px;"
		>
			50%
	</button>

	<button 
		onclick="body.style.zoom='60%'"
		style="font-size: 10px;"
		>
			60%
	</button>

	<button 
		onclick="body.style.zoom='75%'"
		style="font-size: 10px;"
		>
			75%
	</button>

	<button 
		onclick="body.style.zoom='100%'"
		style="font-size: 10px;"
		>
			100%
	</button>

	<button 
		onclick="body.style.zoom='120%'"
		style="font-size: 10px;"
		>
			120%
	</button>

	<button 
		onclick="body.style.zoom='150%'"
		style="font-size: 10px;"
		>
			150%
	</button>

	<button 
		onclick="body.style.zoom='200%'"
		style="font-size: 10px;"
		>
			200%
	</button>

	<button 
		onclick="body.style.zoom='250%'"
		style="font-size: 10px;"
		>
			250%
	</button>

	<button 
		onclick="body.style.zoom='300%'"
		style="font-size: 10px;"
		>
			300%
	</button>

	<button 
		onclick="body.style.zoom='350%'"
		style="font-size: 10px;"
		>
			350%
	</button>

	<button 
		onclick="body.style.zoom='400%'"
		style="font-size: 10px;"
		>
			400%
	</button>

	<button 
		onclick="body.style.zoom='450%'"
		style="font-size: 10px;"
		>
			450%
	</button>

	<button 
		onclick="var tmp = body.style.zoom; tmp = tmp.substring(0, tmp.length - 1); tmp = parseInt(tmp) - 10 + '%'; body.style.zoom = tmp;"
		class="zoom_button"
		>
			&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;
	</button>
	
	<button 
		onclick="var tmp = body.style.zoom; tmp = tmp.substring(0, tmp.length - 1); tmp = parseInt(tmp) + 10 + '%'; body.style.zoom = tmp;"
		class="zoom_button"
		>
			&nbsp;&nbsp;&nbsp;&nbsp;+&nbsp;&nbsp;&nbsp;&nbsp;
	</button>
<!-- onclick="zoom(1, body.style.zoom);" -->
<!-- onclick="body.style.zoom += 20;" -->
<!-- onclick="var tmp = body.style.zoom; tmp = tmp + 20; body.style.zoom = tmp + '%'; alert(tmp + '%')"	 -->
</div>

<br>
