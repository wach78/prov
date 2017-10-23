/**
 * 
 */

function getText(id)
{
	return document.getElementById(id).value;
}

function setTeatarea(id,data)
{
	
	document.getElementById(id).value = data;
}

function appendText(id,data)
{
	document.getElementById(id).value += "\n" +data;
}

function clearText(id)
{
	document.getElementById(id).value ="";
}


function sendToB()
{

	var TA = getText("msgA");
	
	if (TA == "")
	{
		alert("Får inte vara tom");
		return 0;
	}
	

	var params = "&text=" +TA;
	
	var url = "src/ajaxcalls.php?who=TA" +params;
	
	var xmlHttp = new XMLHttpRequest();
	
	xmlHttp.onreadystatechange = function() 
	{
	    if(xmlHttp.readyState == 4 && xmlHttp.status == 200)
	    {
	        var data = xmlHttp.responseText;
	        appendText("taB",data);
	        clearText("msgA")
	    }
	}
	
	xmlHttp.open("GET",url,true);	
	xmlHttp.send();

}


function sendToA()
{
	var TB = getText("msgB");
	
	if (TB == "")
	{
		alert("Får inte vara tom");
		return 0;
	}
	
	
	var params = "&text=" +TB;
	
	var url = "src/ajaxcalls.php?who=TB" +params;
	
	var xmlHttp = new XMLHttpRequest();
	
	xmlHttp.onreadystatechange = function() 
	{
	    if(xmlHttp.readyState == 4 && xmlHttp.status == 200)
	    {
	        var data = xmlHttp.responseText;
	        appendText("taA",data);
	        clearText("msgB")
	    }
	}
	
	xmlHttp.open("GET",url,true);	
	xmlHttp.send();
}


function getFormData()
{
	var inputs = document.getElementsByTagName("input");
	var radioValue ="";
	var name= "";
	var val ="";
	
	var frmdata = new FormData();
	frmdata.append("who","frmtest"); 
	
	for (var i = 0, len = inputs.length; i < len; i++) 
	{
		name = inputs[i].getAttribute('name');
		val = inputs[i].value;
		frmdata.append(name, val);
		  
		  if (inputs[i].getAttribute('type') == 'radio')
		  {
			  
			  var radio = document.getElementsByName(name);
			  
		
			  for (var i = 0, len = radio.length; i < len; i++) 
			  {
				  if(radio[i].checked)
				  {
					 radioValue =  radio[i].value;
					 frmdata.append(name,radioValue);  
				  }
		      }
		  }	 
	}
	
	return frmdata;
}

function sendFormData()
{
	
	var url = "src/ajaxcalls.php";
	
	var table = document.getElementById("tableTest").getElementsByTagName('tbody')[0];
	
	var rowCount = table.rows.length;
	var row = table.insertRow(rowCount);
	
	
	var xmlHttp = new XMLHttpRequest();
	
	xmlHttp.onreadystatechange = function() 
	{
	    if(xmlHttp.readyState == 4 && xmlHttp.status == 200)
	    {
	        var data = xmlHttp.responseText;
	       
	        var d = data.split("::");
	        
	        for (var i = 0, len = d.length; i < len; i++)
	        {
	        	var cell = row.insertCell(i);
	        	cell.innerHTML = d[i];
	        }
	        
	        clearText("firstname");
	        clearText("lastname");
	    }
	}
	
	xmlHttp.open("POST", url, true);
	//xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	
	xmlHttp.send(getFormData());
	
}


function showbook(id)
{
	if (id == "")
	{
		document.getElementById("bookData").innerHTML="";
		return;
	}
	
	var params = "&BID=" +id;
	var url = "src/ajaxcalls.php?who=loadbook" +params;
	
	var xmlHttp = new XMLHttpRequest();
		
		xmlHttp.onreadystatechange = function() 
		{
		    if(xmlHttp.readyState == 4 && xmlHttp.status == 200)
		    {
		        var data = xmlHttp.responseText;
		        document.getElementById("bookData").innerHTML = data;
	       
		    }
		}
		
	
		xmlHttp.open("GET",url,true);
		xmlHttp.send();
}


