var xmlHttp

function pronadjiRezervaciju(param)
{ 
    xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null)
 	{
 		alert ("Browser does not support HTTP Request")
 		return
	}
	var url="rezervacijeRezultat.php"
	url=url+"?param="+param
	url=url+"&sid="+Math.random()
	xmlHttp.onreadystatechange=stateChanged 
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null);
}


function stateChanged() 
{ 
	if (xmlHttp.readyState==4)
	{ 
		document.getElementById("rezervacijeRezultat").innerHTML=xmlHttp.responseText;
	}

}

function GetXmlHttpObject()
{
	var xmlHttp=null;
	try
 	{
 	// Firefox, Opera 8.0+, Safari
 	xmlHttp=new XMLHttpRequest();
 	}
	catch (e)
 	{
 	//Internet Explorer
 		try
  		{
  		xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
  		}
 		catch (e)
  		{
  		xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
  		}
 	}
	return xmlHttp;
}
