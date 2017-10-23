<?php


?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/index.css">
		<script src="js/index.js"></script>
	</head>


	<body>
	
		<div>
			<input type="text" id="msgA" placeholder="Meddelande">
			<button class="topMargin bottomMargin" onclick="sendToB()">Skicka till textarea B</button>
			<label>Textarea A</label>
			<textarea id="taA" rows="5" cols="50" readonly> </textarea>
				
			
		</div>
	
			<br />
			<br />
		

		<div>
			<input type="text" id="msgB" placeholder="Meddelande">
			<button class="topMargin bottomMargin" onclick="sendToA()">Skicka till textarea A</button>
			<label>Textarea B</label>
			<textarea id="taB"rows="5" cols="50" readonly> </textarea>
			
		</div>
	
	
		<br />
		<br />
		<hr />
		<br />
		
		<form id="frmtest">
		
		  <input type="text" id="firstname" name="firstname" placeholder="Namn"> <br />
		  <input type="text" id="lastname" name="lastname" placeholder="Efternamn"> <br />
		  <input type="radio" name="os" value="MacOS" checked> MacOS<br />
  		  <input type="radio" name="os" value="Linux"> Linux<br />
  		  <input type="radio" name="os" value="Windows"> Windows
  		  <input type="button" name="submit" value="Submit" onclick="sendFormData();" />
  		  
		</form>
		
		<hr />
		<br />
		
		
		<table id="tableTest">
			<thead>
				<tr>
					<th>Firstname</th>
					<th>Lastname</th>
					<th>OS</th>
				</tr>
			</thead>
			<tbody>
			
			</tbody>
		</table>
		
		<br />
		<hr />
		
		<form>
	Välj en bok:
	<select name="books" onchange="showbook(this.value)">
	<option value="">Select a book:</option>
	<option value="b1">JavaScript for Programmers</option>
	<option value="b2">Beginning PHP and MySQL</option>
	<option value="b3">Jävla skitsystem</option>
	</select>
	</form>
	<br />
	<br />

	
	<div id="bookData"><b>Book info kommer här</b></div>
		
	
	
	</body>
</html>