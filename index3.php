		<?php 
			if (isset($_POST['startopname']))
			{
				$opnameduurint = (int)substr($_POST["opnameduur"], 0, 2) * 3600 + (int)substr($_POST["opnameduur"], 2) * 60;
				$filmduurint = (int)substr($_POST["filmduur"], 0, 2) * 60 + (int)substr($_POST["filmduur"], 2);
				$fpsint = (int)$_POST["fps"];
				$aantalfotos = $filmduurint * $fpsint;
				$richtingstring = (string)strtolower($_POST["richting"]);
				$richtingchar = $richtingstring[0];
				$aantalsecperfoto = (double)$opnameduurint / (double)$aantalfotos;
				//exec('sudo python /var/www/html/Scripts/Motor.py');
			}
			if (isset($_POST['stopopname']))
			{
				//exec('sudo python /var/www/red_off.py');
			}
			if (isset($_POST['sluitpiaf']))
			{
				//exec('sudo shutdown now')
			}
		?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-within, initial-scale=1">
        <title>TimeLapse rail</title>
        <style>
			h1 {color: blue;}
			p{font-family: Arial;}
			footer{background-color: yellow;}
        </style>
    </head>
    <body>
        <h1>Instellingen</h1>
        <h2>Actief op: 172.24.1.1</h2>
        <form action="<?php echo $PHP_SELF ?>" method="post">
            <fieldset>
		<ol>
		<li>
                <label>Opnameduur in uren:minuten</label>
                <input type="time" name="opnameduur" value="02:00"/>
		</li>
		<li>
                <label>Duur filmpje in minuten:seconden</label>
                <input type="time" name="filmduur" value="01:00"/>
        </li>
        <li>
				<label>Richting:</label>
				<input type="radio" name="richting" value="Links">Links</input>
				<input type="radio" name="richting" value="Rechts">Rechts</input>
		</li>
		<li>
				<label>Aantal beelden per seconde:</label>
				<input type="number" name="fps" value="24"/>
		</li>
        <li>
                <input type="submit" name="startopname" value="Start Opname"/>
                <input type="submit" name="stopopname" value="Stop Opname"/>
                <input type="submit" name="sluitpiaf" value="Sluit Raspberry Pi af"/>
		</li>
		</ol>
            </fieldset>
        </form>
        <h1>Debug</h1>
        <p>Alleen interesant voor de ontwikkelaars</p>
        	<p>Invoer opnameduur: </p><?php echo $_POST["opnameduur"]; ?><br>
			<p>Opnameduur in seconden: </p><?php echo $opnameduurint; ?><br>
			<p>Invoer duur filmpje: </p><?php echo $_POST["filmduur"]; ?><br>
			<p>Duur filmpje in seconden: </p><?php echo $filmduurint; ?><br>
			<p>Invoer richting:</p> </p><?php echo $_POST["richting"]; ?><br>
			<p>Invoer richting voor script:</p> </p><?php echo $richtingchar; ?><br>
			<p>Berekend aantal fotos:</p> </p><?php echo $aantalfotos; ?><br>
			<p>Berekend aantal seconden per foto:</p> </p><?php echo $aantalsecperfoto; ?><br>
			<p>Ip client:</p> </p><?php echo $_SERVER['REMOTE_ADDR']; ?><br>
			<footer><br>&copy; <?php echo date("Y"); ?> - Anco Postma - Marten Wildschut - Klaas Skelte van der Werf</footer>
    </body>
</html>
