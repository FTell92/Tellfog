<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Wifog - Automatiserad reklam visare</title>
<style>
html, body{
	background-color:#2ae5dd;
}
</style>

</head>

<body>
<script type="text/javascript">
	var newWin;
	var wifogLoop;
	var reloadMillis = 30000;
	
	function startLoop(){
		openWifog();
		wifogLoop = setInterval(openWifog, reloadMillis+3000);
	}
	
	function closeLoop(){
		clearInterval(wifogLoop);
	}
	
	
	function openWifog(){
		newWin = window.open("http://wifog.com/mina-sidor/fyll-pa/?type=adverts","");
		if(!newWin || newWin.closed || typeof newWin.closed=='undefined'){ 
			alert("Du behöver tillåta pop up för den här webbsidan :)");
		}else{
			setTimeout(savePoints, reloadMillis);
			setTimeout(closeWindow, reloadMillis+500);
		}
	}
	
	function savePoints(){
		console.log("Saving 3 points");	
		newWin.document.querySelector('.enough_for_now btn. btn-blue enough_block').click();
		newWin.document.fillUp();	
	}
	function closeWindow(){
		console.log("Closing the Window");	
		newWin.close();
	}
	
	function setReloadSec(){
		var newReloadMillis = prompt("Ange sekunder (normalt 30sek)");
		if(newReloadMillis != null){
			newReloadMillis = newReloadMillis * 1000;
			if(newReloadMillis < 20000){
				alert("Reloadsekunderna måste vara större än 30");
			}else if(newReloadMillis > 100000){
				alert("Reloadsekunderna måste vara mindre än 100000, använder du uppringningsmodem eller (1970)?");
			}else{
				reloadMillis = newReloadMillis;
			}
		}
	}

	
	//<a href="javascript:void(0)" class="enough_for_now btn btn-blue enough_block" style="" onclick="fillUp();">FÄRDIG!</a>
	//newWin.document.getElementById('adverts-pop').click()
</script>
<center>
<h1>Wifog - Automatiserad reklam visare</h1>
<p><b>Vi är medvetna om att du (cirka 3 gånger per dag) ska klicka i att du inte är en robot.</b></p>
<table>
  <tr>
  <td>1. </td>
    <td>Logga in på wifog</td>
    <td><input id="login" type="button" value="Logga in på Wifog" onclick="window.open('http://wifog.com/mina-sidor/', '_blank');" /></td>
  </tr>
  <tr>
  <td>2. </td>
    <td>Starta reklam loopen</td>
    <td><input id="start" type="button" value="Starta loopen" onclick="startLoop();" /></td>
  </tr>
  <tr>
  	<td>3. </td>
    <td>Avsluta loopen</td>
    <td><input id="start" type="button" value="Avsluta loopen" onclick="closeLoop();" /></td>
  </tr>
  <tr>
  <td>4. </td>
    <td>FTell92@gmail.com</td>
    <td><input id="login" type="button" value="Bidra för att förbättra tjänsten" onclick="window.open('https://www.wifog.com/mina-sidor/dela-poang/', '_blank');" /></td>
</table>
<br />

<h3>Inställningar</h3>
<table>
  <tr>
    <td>Uppdateringsfrekvens</td>
    <td><input id="login" type="button" value="Ange reload sekunder" onclick="setReloadSec();" /></td>
  </tr>
</table>
30sek = normalt bredband/fiber; 50sek = mobilt bredband/modem
</center>
</body>
</html>