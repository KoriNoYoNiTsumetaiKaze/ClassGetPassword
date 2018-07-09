function XmlHttp()
	{
		var xmlhttp;
		try 
			{
				xmlhttp	= new ActiveXObject("Msxml2.XMLHTTP");
			}
		catch(e)
			{
				try
					{
						xmlhttp	= new ActiveXObject("Microsoft.XMLHTTP");
					}
				catch (E)
					{
						xmlhttp	= false;
					}
			}
		if (!xmlhttp && typeof XMLHttpRequest!='undefined')
			{
				xmlhttp = new XMLHttpRequest();
			}
		return xmlhttp;
	}

function ajax()
	{
		var LenPas = document.getElementById("LenPas").value;
		var FlagNumber = document.getElementById("FlagNumber").checked;
		var FlagBigLetter = document.getElementById("FlagBigLetter").checked;
		var FlagSmallLetter = document.getElementById("FlagSmallLetter").checked;
		var FlagSpecialSymbol = document.getElementById("FlagSpecialSymbol").checked;
		if (window.XMLHttpRequest)
			{
				var req = XmlHttp();
				req.open("POST","a.php",true);
				req.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
				var send = 'LenPas='+LenPas;
				if (FlagNumber) send=send+'&FlagNumber='+1
				 else send=send+'&FlagNumber='+0;
				if (FlagBigLetter) send=send+'&FlagBigLetter='+1
				 else send=send+'&FlagBigLetter='+0;
				if (FlagSmallLetter) send=send+'&FlagSmallLetter='+1
				 else send=send+'&FlagSmallLetter='+0;
				if (FlagSpecialSymbol) send=send+'&FlagSpecialSymbol='+1
				 else send=send+'&FlagSpecialSymbol='+0;
				req.send(send);
				req.onreadystatechange = function()
											{
												if (req.readyState == 4 && req.status == 200) //если ответ положительный
													{
														document.getElementById("Passwords").innerHTML = document.getElementById("Passwords").innerHTML+"\n"+req.responseText;
													}
											}
			}
	}
