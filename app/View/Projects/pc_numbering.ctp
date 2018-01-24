numbering
<hr>

<table id="tbl_PC_Numbering">

	<tr>
	
		<td>
		
			Dir
			
		</td>
		<td>
		
			<input type="text" name="dpath" id="pc_numbering_Dpath"
				
				value="<?php 
				
					echo $dflt_Dpath;
				
				?>"
				>
			
		</td>
	
	</tr>

	<tr>
	
		<td>
		
			File
			
		</td>
		<td>
		
			<input type="text" name="fname" id="pc_numbering_Fname"
				
				value="<?php 
				
					echo $dflt_Fname;
				
				?>"
				>
			
		</td>
	
	</tr>

</table>

<button onclick="project_Numbering()" class="btn_Links">Go</button>

<br>
<br>
Message

<br>
<br>

<div id="PC_Numbering_Area_Memo">


</div>