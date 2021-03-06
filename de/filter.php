<!doctype html>
<html class="no-js" lang="de-de">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cartostroph | Willkommen</title>
    <link rel="stylesheet" href="../css/foundation/foundation.css" />
    <link rel="stylesheet" href="../css/default.css" />
    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
    <script src="../js/vendor/modernizr.js"></script>
    <script src="../js/leaflet-Interaktion/Karteninteraktion.js"></script>
</head>
<body id="index">
	<script>
		window.onload=HilfeAnzeigen;
		//window.onload=addMarkers;
	</script>
	
	
    <div class="fixed">
        <nav class="top-bar" data-topbar role="navigation">
            <ul class="title-area">
                <li class="name">
                    <h1><a href="index.php">Carto<span style="color: red;">stroph!</span></a></h1>
                </li>
                <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
                <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
            </ul>
            <section class="top-bar-section">
                <!-- Right Nav Section -->
                <ul class="right">
                    
                    <!-- FAQ aufrufen -->
                    <li>
                        <a href="FAQ.php">Hilfe</a>
                    </li>

                    <!-- Loginfunktion -->
                    <li class="has-dropdown">
                        <a href="#" id="login-drop">Login</a>
						<script type="text/javascript">
                    			document.getElementById("login-drop").innerHTML = loggedIn();
								if (loggedIn() == "Login"){
									document.getElementById("login-drop").setAttribute("data-dropdown", "login-dropdown");
								}else{
									document.getElementById("login-drop").setAttribute("data-dropdown", "loggedin-dropdown");
								}
                    	</script>
						
                    </li>

                    <!-- Neues Topic erstellen -->
                    <li><a href="#" data-reveal-id="myModal">Neues Topic anlegen</a>
                    	<div id="myModal" class="reveal-modal" data-reveal>
                    		<h3>Wählen Sie eine Position durch Klick in die Karte</h3>
                    		<a id="setCoordinate" style="text-align: right ;position: relative ; font-size: 120%" class="close-reveal-modal">OK</a>
                    		<script type="text/javascript">
                    			document.getElementById("setCoordinate").onclick = newMarker;
                    		</script>
						</div>

                  		<!-- Formular zur Erstellung eines Topics  -->
						<div id="newTopicModal" class="reveal-modal" data-reveal>
  							<h3>Fügen Sie einen Geodatensatz hinzu</h3>
  							<form action="topic.php" method="post">
  								<p>Breitengrad: <input id="Breitengrad" readonly="readonly" type="number" name="Breitengrad"/> </p>
  								<p>Längengrad: <input id="Längengrad" readonly="readonly" type="number" name="Längengrad"/> </p>
  								<p><abbr title="Hier geben Sie an unter welcher Internetadresse der Geodatensatz auffindbar ist"><img src="../img/info.png" width="15px" height="15px" /></abbr> URL: <input type="text" id="URL" name="URL" required/> </p>
  								<p><abbr title="Hier geben Sie einen geeigneten Titel des Datensatzens an, z.B. 'Überflutungsdaten Münster 2014'"><img src="../img/info.png" width="15px" height="15px"/></abbr> Titel: <input type="text" id="Titel" name="Titel" required /></p>
  								<p><abbr title="Hier geben Sie an was Sie über den Geodatensatz denken. Ist er hilfreich? Ist er gut? Fehlt etwas? etc."><img src="../img/info.png" width="15px" height="15px"/></abbr> Kommentar: <textarea type="text"  id="Kommentar" name="Kommentar" required></textarea></p>
  								<p><abbr title="Hier geben Sie an wie groß das Gebiet ist, welches vom Geodatensatz abgedeckt wird. Zur Auswahl stehen:
					                Welt
					                Kontinent
					                Land
					                Region
					                Stadt
				                    ">
						            <img src="../img/info.png" width="15px" height="15px"/></abbr> Kategorie:
									<select id="Kategorie" name="Kategorie">
  								        <option value="Welt">Welt</option>
  										<option value="Kontinent">Kontinent</option>
  										<option value="Land">Land</option>
  										<option value="Region">Region</option>
  										<option value="Stadt">Stadt</option>
								    </select>
								</p>
  								<p><abbr title="Hier geben Sie an ab wann der Geodatensatz gültig ist"><img src="../img/info.png" width="15px" height="15px"/></abbr>
  								Zeitliche Ausdehnung - Start (optional) <input type="date" id="start" name="start" />	
  								</p>
  								<p><abbr title="Hier geben Sie an bis wann der Datensatz gültig war bzw. voraussichtlich sein wird."><img src="../img/info.png" width="15px" height="15px"/></abbr> 
  								Zeitliche Ausdehnung - Ende (optional) <input type="date" id="end" name="end" />	
  								</p>
  								<p><abbr title="Hier geben Sie an wie gut Sie den Datensatzfinden.Skala von 1(sehr schlecht/unbrauchbar) bis 5(perfekt)"><img src="../img/info.png" width="15px" height="15px"/></abbr> 
								Bewertung (optional): <br /><input id="checkbox1" name="checkbox1" type="checkbox" onclick="activateAssessment()"><label for="checkbox1" >Bewertung ausschalten</label>
  									<div class="row">
  									    <div class="small-10 medium-11 columns">
  										    <div id="Bewertung" name="Bewertung" onclick="activateSlider()" class="range-slider" data-slider disabled data-options="display_selector: #sliderOutput3; start: 1; end: 5;" >
  											    <span class="range-slider-handle" role="slider" tabindex="0"></span>
  												<span class="range-slider-active-segment"></span> 
												<input type="hidden" name = "Bewertung">
  											</div> 
  										</div>
  										<div class="small-2 medium-1 columns">
  											<span id="sliderOutput3"></span>
  										</div>
  									</div>
  								</p>
  								<p><abbr title="Hier geben Sie Tags an, damit der Datensatz später leichter zu finden ist."><img src="../img/info.png" width="15px" height="15px"/></abbr> Tags (optional): <input type="text" id="tags" name="tags"/>
								</p>
								<p><abbr title="Hier geben Sie andere Internetquellen an, welche den Geodatensatz ergänzen - z.B. neuer oder besserer Datensatz, Zusatzinformationen zum betroffenen Gebiet, etc."><img src="../img/info.png" width="15px" height="15px"/></abbr> Hyperlink (optional): <input type="text" id="hyperlink" name="hyperlink"/>
								</p>
								<p>Autor <input id="Autor" type="text" readonly="readonly" name="Autor"/>
								<input type="submit" class="button expand" value="Topic erstellen"/>
        					</form>
  							<a id="cancelTopic" style="position: relative ; font-size: 120%" class="close-reveal-modal">Abbrechen</a><br />
                            <br />
					    </div>
					</li>

					<!-- Pop-Up für Registrierung  -->
                    <li>
                        <a href="#" data-reveal-id="RegisterModal">Registrierung</a>
                    </li>
                    
                    <!-- Suchfeld -->
                    <li class="has-form">
                        <div>
                            <form action="search.php" method="get">
                            <input type="text" placeholder="Suche" name="search">
                        </form>
                        </div>
                    </li>
                </ul>
            </section>
        </nav>
    </div>

    <!-- PopUp-Registrierungs-Formular -->
    <div id="RegisterModal" class="reveal-modal" data-reveal>
        <h2> Registrierung </h2>
        <form action="register.php" method="post">
            Benutzername: <input type="text" id="Benutzername" name="Benutzername" required />
            Passwort: <input type="password" id="passwort" name="Passwort" required />
            Passwort wiederholen:<input type="password" id="passwortWieder" name="Passwort" required />
            Ort (optional): <input type="text" name="Ort" id="Ort" />
            PLZ (optional): <input type="text" name="PLZ" id="PLZ" />
            Land (optional): <input type="text" name="Land" id="Land" />
            <input id="regist" type="submit" class="button expand" value="Registrieren" />
            <a style="text-align: right ;position: relative ; font-size: 120%" class="close-reveal-modal">Abbrechen</a><br />
            <br />
        </form>
    </div>
	
    <!-- Dropdown-Login-Feld -->
    <div id="login-dropdown" class="f-dropdown small content" data-dropdown-content="true" width="10%">
        <h5>Log In:</h5>
		
        <form id="top-nav-login" action="login.php" method="post">
            <div class="row">
                <label>Nutzer</label>
                <input type="text" name="user" placeholder="email@example.com" tabindex="1" />
            </div>
            <div class="row">
                <label>Passwort</label>
                <input type="password" name="password" placeholder="********" tabindex="2" />
            </div>
            <div class="row">
                <input type="submit" class="button tiny success" value="Login" tabindex="3" />
            </div>
            <p>Sie haben noch kein Konto? Zur Registrierung geht es <a onclick="test" data-reveal-id="RegisterModal">hier</a></p>
        </form>
    </div>
	
	<!-- Dropdown-Eingeloggt-Feld -->
	<div id="loggedin-dropdown" class="f-dropdown small content" data-dropdown-content="true" width="10%">
		<h5 id="eingeloggtAls"><h5>
			<script>
				document.getElementById("eingeloggtAls").innerHTML = "Eingeloggt als: " + autor();
			</script>
			<ul id="drop" class="[tiny small medium large content]f-dropdown" data-dropdown-content>
			  <a href="#" data-reveal-id="Profile">Profil</a>

					<div id="Profile" class="reveal-modal" data-reveal>
					  <h3 id="benutzername">Mein Profil: </h3>
					  
					  <script>
						document.getElementById("benutzername").innerHTML = "Mein Profil: " + autor();
					  </script>
					  <form action="alteruser.php" method="post">
					  <button style="float: right;"> Daten ändern</button>
						<?php
						// attempt a connection
						ini_set('display_errors', '1');
						error_reporting(E_ALL | E_STRICT);
						include("config.php");
						global $config;

						$connection = pg_connect($config["connection"]);
						if (!$connection) {
							die("Error in connection: " . pg_last_error());
						}
						
						$user = $_COOKIE['Autor'];

						// execute query
						$sql = "SELECT ort, plz, land FROM nutzer WHERE name='$user';";
	
						$result = pg_query($connection, $sql);
						if (!$result) {
							die("Error in SQL query: " . pg_last_error());
						}

						// iterate over result set
						// print each row
						while ($row = pg_fetch_array($result)) {
							$ort = (string)$row[0];
							$plz = (string)$row[1];
							$land = (string)$row[2];
						
							echo '<p>Ort: ' . $ort . ' </p>';
							echo '<p>PLZ: ' . $plz . '</p>';
							echo '<p>Land: ' . $land . '</p>';
							//echo '<p>Ort: <input value=' . $ort . ' type=\"text\" id=\"ort\" name=\"ort\" style=\"width: 90%;\"/></p>';
							//echo '<p>PLZ: <input value=' . $plz . ' type=\"text\" id=\"plz\" name=\"plz\" style=\"width: 90%;\"/></p>';
							//echo '<p>Land: <input value=' . $land . ' type=\"text\" id=\"land\" name=\"land\" style=\"width: 90%;\"/></p>';
						}

						// free memory
						pg_free_result($result);
						?>
						<input value="ort" type="text" id="ort" name="ort" style="width: 90%;"/>
						<input value="plz" type="text" id="plz" name="plz" style="width: 90%;"/>
						<input value="land" type="text" id="land" name="land" style="width: 90%;"/>
						<a class="close-reveal-modal">&#215;</a>
						</form>
					</div>
			
			  
			  <br /><a href="#">Meine Topics und Kommentare</a>
			  <br /><a href="logout.php">Logout</a>
			</ul>
	</div>

    <!-- Pop-Up mit Hilfestellung beim ersten Aufruf  -->
    <div id="HilfeModal" class="reveal-modal" data-reveal>
        <h1>Willkommen auf der Hilfeseite von Cartostroph!</h1>
        <p>Auf dieser Seite bekommen Sie Hilfestellung zur Nutzung von Cartostroph!</p>
        <p>
            Cartostroph! ist eine Webapplikation, welche als Ziel hat Geodatensätze an einem Ort zu versammeln (oder eher gesagt Verweise darauf). Wenn Sie einen
            tollen Geodatensatz im Internet gefunden haben und ihn mit anderen teilen möchten, sind Sie hier genau richtig!
        </p>
        <p>
            <b> Welche Formate können visualisiert werden?</b><br />
            <ul>
                <li>OGC WMS</li>
                <li>OGC WFS</li>
                <li>GML</li>
                <li>KML</li>
                <li>OGC WMTS</li>
                <li>h-geo(microfromat)</li>
                <li>JPEG</li>
                <li>PNG</li>
            </ul>
        </p>

        <p>
            <b> Wie füge ich einen neuen Geodatensatz hinzu? </b><br />
            <ul>
                <li>In der oberen Leiste auf "Neues Topic anlegen" klicken.</li>
                <li>Fenster bestätigen und einen Punkt auf der Karte per Klick auswählen, wo der Datensatz hinzugefügt werden soll.</li>
                <li>Informationen zum Geodatensatz angeben.
                <li>Wenn Sie sich sicher sind alles richtig ausgefüllt zu haben, klicken Sie auf "Abschicken"</li>
                <li>Nun gibt es einen Marker mit dem von Ihnen gefundenen Datensatz, welcher von anderen Nutzern kommentiert und bewertet werden kann.</li>
            </ul>
        </p>

        <p>
            <b> Wie fülle ich das Formular zum Geodatensatz richtig aus?</b><br />
            <ul>
                <li><strong>URL</strong>: Hier geben Sie an, unter welcher Internetadresse der Geodatensatz auffindbar ist.</li>
                <li><strong>Titel</strong>: Hier geben Sie einen geeigneten Titel des Datensatzens an, z.B. "Überflutungsdaten Münster 2014"</li>
                <li><strong>Kommentar</strong>: Hier geben Sie an, was Sie über den Geodatensatz denken. Ist er hilfreich? Ist er gut? Fehlt etwas? etc.</li>
                <li>
                    <strong>Kategorie</strong>: Hier geben Sie an wie groß das Gebiet ist, welches vom Geodatensatz abgedeckt wird. Zur Auswahl stehen:
                    <ul>
                        <li>Welt</li>
                        <li>Kontinent</li>
                        <li>Land</li>
                        <li>Region</li>
                        <li>Stadt</li>
                    </ul>
                </li>
                <li><strong>Zeitliche Ausdehnung - Start (optional)</strong>: Hier geben Sie an, ab wann der Geodatensatz gültig ist.</li>
                <li><strong>Zeitliche Ausdehnung - Ende (optional)</strong>: Hier geben Sie an, bis wann der Datensatz gültig war bzw. voraussichtlich sein wird.</li>
                <li><strong>Bewertung (optional)</strong>: Hier geben Sie an, wie gut Sie den Datensatzfinden. Skala von 1 (sehr schlecht/unbrauchbar) bis 5 (perfekt).</li>
                <li><strong>Tags (optional)</strong>: Hier geben Sie Tags an, damit der Datensatz später leichter zu finden ist. </li>
                <li><strong>Hyperlink (optional)</strong>: Hier geben Sie andere Internetquellen an, welche den Geodatensatz ergänzen - z.B. neuer oder besserer Datensatz, Zusatzinformationen zum betroffenen Gebiet, etc.</li>
            </ul>
        </p>
        <input id="HilfeAusschalten" type="checkbox"><label for="HilfeAusschalten">Hilfe nicht mehr anzeigen</label><br />
        <a onclick="hilfeCookie()" style="text-align: right ;position: relative ; font-size: 120%" class="close-reveal-modal">Weiter</a><br />
        <br />
    </div>
	
	
	
    <div class="large-8 columns" id="map" style="height: 92.5%;">

</div>
<div class="large-4 columns"> <h1><h3>Filter</h3>
                            <form action="filter.php" method="get">
                            <p><input type="text" placeholder="Suche" name="search"></p>
                            <p><select id="KategorieSuche" name="KategorieSuche">
                                <option value="Keine">Keine Kategorie</option>
                                <option value="Welt">Welt</option>
                                <option value="Kontinent">Kontinent</option>
                                <option value="Land">Land</option>
                                <option value="Region">Region</option>
                                <option value="Stadt">Stadt</option>
                            </select>
                            </p>
                            <p><abbr title="Hier geben Sie an ab wann der Geodatensatz gültig ist"><img src="../img/info.png" width="15px" height="15px"/></abbr>
                  Start <input type="date" id="startSuche" name="startSuche" /> 
                  </p>
                  <p><abbr title="Hier geben Sie an bis wann der Datensatz gültig war bzw. voraussichtlich sein wird."><img src="../img/info.png" width="15px" height="15px"/></abbr> 
                  Ende <input type="date" id="endSuche" name="endSuche" />  
                  </p>
                    <p><select id="BewertungSuche" name="BewertungSuche">
                                <option value="Keine">Keine Einschränkung</option>
                                <option value="1">1 oder höher</option>
                                <option value="2">2 oder höher</option>
                                <option value="3">3 oder höher</option>
                                <option value="4">4 oder höher</option>
                                <option value="5">5</option>
                            </select>
                            </p>
                            <p><input id="filter" type="submit" class="button expand" value="Filtern" />
                            </p>    
                  </form></h1>

</div>

    <!-- Subnav -->
    <div style="height: 7.5%">
        <dl class="sub-nav">
            <dt>Filter:</dt>
            <dd class="active"><a href="#">All</a></dd>
            <dd><a href="#">Active</a></dd>
            <dd><a href="#">Pending</a></dd>
            <dd><a href="#">Suspended</a></dd>
        </dl>
    </div>

    <!-- Skriptabschnitt -->
    <script src="../js/vendor/jquery.js"></script>
    <script src="../js/foundation/foundation.min.js"></script>
    <script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
    <script type="text/javascript">
        $(document).foundation();

        // create a map in the "map" div, set the view to a given place and zoom
        var addMarker = false;
       
        var osmLink = '<a href="http://openstreetmap.org">OpenStreetMap</a>',
    		thunLink = '<a href="http://thunderforest.com/">Thunderforest</a>';

	    var osmUrl = 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
    		osmAttrib = '&copy; ' + osmLink + ' Contributors',
    		landUrl = 'http://{s}.tile.thunderforest.com/landscape/{z}/{x}/{y}.png',
    		thunAttrib = '&copy; '+osmLink+' Contributors & '+thunLink;
            mapUrl = 'https://{s}.tiles.mapbox.com/v3/examples.map-i875mjb7/{z}/{x}/{y}.png',
            mapAttrib = '<a href="http://www.mapbox.com/about/maps/" target="_blank">Terms &amp; Feedback</a>';
            aerialUrl = 'http://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}.png';

	    var osmMap = L.tileLayer(osmUrl, {attribution: osmAttrib}),
    		landMap = L.tileLayer(landUrl, {attribution: thunAttrib});
            mapBox = L.tileLayer(mapUrl, {attribution: mapAttrib});
            aerial = L.tileLayer(aerialUrl, {attribution: mapAttrib});

	    var map = L.map('map', {
      		layers: [mapBox] // only add one!
    	})
    		.setView([30.505, 0], 2);

	    var baseLayers = {
  		    "OSM Mapnik": osmMap,
  		    "Landscape": landMap,
            "MapBox": mapBox,
            "Aerial": aerial
	    };

	    L.control.layers(baseLayers).addTo(map);

        //zoom to location of user 
	    map.locate({ setView: true, maxZoom: 12 });

        /*function onLocationFound(e) {
            var radius = e.accuracy / 2;
            L.marker(e.latlng).addTo(map)
                .bindPopup("You are within " + radius + " meters from this point").openPopup(); 
            L.circle(e.latlng, radius).addTo(map);
        }
        map.on('locationfound', onLocationFound);
        function onLocationError(e) {
            alert(e.message);
        }
        map.on('locationerror', onLocationError);*/
		
		map.on('click', onMapClick);
		// map.on('mouseout',resetView);
    </script>
	<?php 
	
		// attempt a connection
		ini_set('display_errors', '1');
		error_reporting(E_ALL | E_STRICT);

		include("config.php");
		global $config;
		$connection = pg_connect($config["connection"]);
		if (!$connection) {
			die("Error in connection: " . pg_last_error());
		}

		// execute query
		$suchbegriff = htmlspecialchars($_GET['search']);
$kategorie = $_GET['KategorieSuche'];
    $katwert = NULL;
    switch ($kategorie) { 
        case 'Keine':
            $katwert = NULL;
            break;
        case 'Welt': 
            $katwert = 'Welt';
            break; 
        case 'Kontinent': 
            $katwert = 'Kontinent';
            break; 
        case 'Land': 
            $katwert = 'Land';
            break; 
        case 'Region': 
            $katwert = 'Region';
            break; 
        case 'Stadt': 
            $katwert = 'Stadt';
            break;  
        default:
            $katwert = NULL;
    }

$start = '0001-01-01';
    if ($_GET['startSuche'] != ''){
        $start = $_GET['startSuche'];
        }
    $end = '9999-12-31';
    if ($_GET['endSuche'] != ''){
        $end = $_GET['endSuche'];
        }

$bewertung = $_GET['BewertungSuche'];
    $bewert = NULL;
    switch ($bewertung) { 
        case 'Keine':
            $bewert = NULL;
            break;
        case '1': 
            $bewert = 'Welt';
            break; 
        case '2': 
            $bewert = 'Kontinent';
            break; 
        case '3': 
            $bewert = 'Land';
            break; 
        case '4': 
            $bewert = 'Region';
            break; 
        case '5': 
            $bewert = 'Stadt';
            break;  
        default:
            $bewert = NULL;
    } 

//Hilfsvariable für den SQL Befehl
//$sqlContent = "";
$suchbegriffHilf = "";

if ($suchbegriff != "") {
    $suchbegriffHilf = "(text LIKE '%$suchbegriff%' OR titel LIKE '%$suchbegriff%' OR tag LIKE '%$suchbegriff%' OR body LIKE '%$suchbegriff%')";
}


$sqlContent = $suchbegriffHilf;


if ($katwert == NULL) {
    $kategorieHilf = "";
} elseif ($suchbegriff == "" and $katwert != NULL) {
    $kategorieHilf = "kategorie  = '$katwert'";
} else {
    $kategorieHilf = "AND kategorie = '$katwert'";
}


$sqlContent = $sqlContent.$kategorieHilf;


if ($bewert == NULL) {
    $bewertungHilf = "";
} elseif ($suchbegriff == "" and $katwert == NULL) {
    $bewertungHilf = "bewertung = '$bewert'";
} else {
    $bewertungHilf = " AND bewertung = '$bewert'";
}


$sqlContent = $sqlContent.$bewertungHilf;


if ($suchbegriff == "" and $katwert == NULL and $bewert == NULL) {
    $zeitlichesAusmaß = "(anfangsdatum <= '$start' AND enddatum >= '$start') OR (anfangsdatum <= '$end' AND enddatum >= '$end') OR (anfangsdatum >= '$start' AND anfangsdatum <= '$end') OR (enddatum >= '$start' AND enddatum <= '$end');";
} else {
    $zeitlichesAusmaß = " AND ((anfangsdatum <= '$start' AND enddatum >= '$start') OR (anfangsdatum <= '$end' AND enddatum >= '$end') OR (anfangsdatum >= '$start' AND anfangsdatum <= '$end') OR (enddatum >= '$start' AND enddatum <= '$end'));";
}

$sqlContent = $sqlContent.$zeitlichesAusmaß;

//echo ("$sqlContent");

$sqlBegin = "SELECT url_top, titel, position, bewertung, autor FROM topic LEFT OUTER JOIN comments on topic.url_top = comments.page_id WHERE ";

$sql = $sqlBegin.$sqlContent ;
//echo "$sql";

$result = pg_query($connection, $sql);
		
	
		// iterate over result set
		// print each row
		
		while ($row = pg_fetch_array($result)) {
			$URL = (string)$row[0];
			$Titel = (string)$row[1];
			$Pos = (string)$row[2];
			$Position = substr($Pos, 1, -1);
			$Bewertung = (string)$row[3];
			$Autor = (string)$row[4];
					
			echo '<script type="text/javascript"> ';
			echo 'L.marker([' . $Position . ']).addTo(map).bindPopup("Titel: " + "' . $Titel . '" + "<br />Bewertung: "
								       		 + "' . $Bewertung . '" + "<br/> URL: " + "' . $URL . '" + "<br/> Autor: " + "' . $Autor . '"  + "<br /><br /><a href=\"DynamicMap.html\">Mehr Infos...</a>");';
			echo '</script>';

		}

		pg_free_result($result);
		
	?>
</body>
</html>
