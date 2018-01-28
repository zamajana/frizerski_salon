var xmlHttp
var suma = 0;
var usluge = [];

function pronadjiKlijenta(param)
{ 
    xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null)
 	{
 		alert ("Browser does not support HTTP Request")
 		return
	}
	var url="klijentiRezultatRezervacija.php"
	url=url+"?param="+param
	url=url+"&sid="+Math.random()
	xmlHttp.onreadystatechange=stateChangedKlijent
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null);
}

function racunajUkupno(iznos, id)
{ 	
	var containsId = false;
	var index = -1;
	for(var i=0; i<usluge.length; i++) {
		if (usluge[i] == id) {
			containsId = true;
			index = i;
			break;
		}
	}

	if (containsId==false) {
		suma += iznos;
		usluge[usluge.length] = id;
	} else {
		suma -= iznos;
		usluge[index] = 0;
	}

	document.getElementById("ukupnoInput").value=suma;
}

function prikaziRezervacije(param)
{ 
    xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null)
 	{
 		alert ("Browser does not support HTTP Request")
 		return
	}
	var url="rezervacijeRezultatNovaRez.php"
	url=url+"?param="+param
	url=url+"&sid="+Math.random()
	xmlHttp.onreadystatechange=stateChangedPrikaziRezervacije
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null);
}

function stateChangedKlijent() 
{ 
	if (xmlHttp.readyState==4)
	{ 
		document.getElementById("klijentiRezultat").innerHTML=xmlHttp.responseText;
	}

}

function stateChangedUsluga() 
{ 
	if (xmlHttp.readyState==4)
	{ 
		document.getElementById("uslugeRezultat").innerHTML=xmlHttp.responseText;
	}

}

function stateChangedIzbor() 
{ 
	if (xmlHttp.readyState==4)
	{ 
		document.getElementById("uslugeRezultatIzabrane").innerHTML=xmlHttp.responseText;
	}

}

function stateChangedPrikaziRezervacije() 
{ 
	if (xmlHttp.readyState==4)
	{ 
		document.getElementById("prikazRezervacija").innerHTML=xmlHttp.responseText;
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
