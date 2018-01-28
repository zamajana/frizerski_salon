var xmlHttp

var suma = 0;

function novaStatistika(datumOd, datumDo)
{ 
    xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null)
 	{
 		alert ("Browser does not support HTTP Request")
 		return
	}
	var url="statistikaRezultatNovaStat.php"
	url=url+"?datumOd="+datumOd+"&datumDo="+datumDo
	url=url+"&sid="+Math.random()
	xmlHttp.onreadystatechange=stateChangedNovaStatistika
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null);
}

function pregledStatistike(param)
{ 
    xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null)
 	{
 		alert ("Browser does not support HTTP Request")
 		return
	}
	var url="statistikaRezultatPregled.php"
	url=url+"?statId="+param
	url=url+"&sid="+Math.random()
	xmlHttp.onreadystatechange=stateChangedStatistikaPregled
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null);
}

function nadjiStatistiku(param)
{ 
    xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null)
 	{
 		alert ("Browser does not support HTTP Request")
 		return
	}
	var url="statistikaRezultatPretraga.php"
	url=url+"?param="+param
	url=url+"&sid="+Math.random()
	xmlHttp.onreadystatechange=stateChangedStatistikaPretraga
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null);
}

function stateChangedNovaStatistika() 
{ 
	if (xmlHttp.readyState==4)
	{ 
		document.getElementById("statistikaRezultat").innerHTML=xmlHttp.responseText;
	}

}

function stateChangedStatistikaPregled() 
{ 
	if (xmlHttp.readyState==4)
	{ 
		document.getElementById("statistikaPregled").innerHTML=xmlHttp.responseText;
	}

}

function stateChangedStatistikaPretraga() 
{ 
	if (xmlHttp.readyState==4)
	{ 
		document.getElementById("statistikeTabela").innerHTML=xmlHttp.responseText;
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
