<h1 class="page-header">Bestellung</h1>

<div id="step_1">
	<h2 class="sub-header">Auswahl der Komponente</h2>
	<select id="c_type" class="form-control">
		<option id="bundle" value="pc">Komplett PC</option>
		<option id="single" value="ram">Arbeitsspeicher</option>
		<option id="single" value="cpu">Prozessor</option>
		<option id="single" value="mainboard">Mainboard</option>
		<option id="single" value="festplatte">Festplatte</option>
		<option id="single" value="grafikkarte">Grafikkarte</option>
		<option id="single" value="netzwerkkarte">Netzwerkkarte</option>
		<option id="single" value="raidcontroller">Raidcontroller</option>
		<option id="single" value="cd_rom">CD-Laufwerk</option>
		<option id="single" value="cd_brenner">CD-Brenner</option>
		<option id="single" value="dvd_rom">DVD-Laufwerke</option>
		<option id="single" value="dvd_brenner">DVD-Brenner</option>
		<option id="single" value="netzteil">Netzteil</option>
		<option id="single" value="drucker">Drucker</option>
		<option id="single" value="switches">Switch</option>
		<option id="single" value="vlan">VLAN</option>
		<option id="single" value="router">Router</option>
		<option id="single" value="hub">Hub</option>
		<option id="single" value="accesspoint">Accesspoint</option>
	</select>
</div>
<div id="step_2">
	<h2 class="sub-header">Auswahl der Teilkomponenten</h2>
	<div id="bundle">
	</div>
</div>
<div id="step_3">
	<h2 class="sub-header">Eingabe der Eigenschaften</h2>
	<div id="single">
	</div>
</div>

<script src="lib/page/orders/script.js"></script>

<?php 

/*+--------------------------------------------------+*/
/*|													 |*/
/*|	Modulname:									 |*/
/*|	=============									 |*/
/*|	orders.php								 |*/
/*|													 |*/
/*| Version:										 |*/
/*|	========										 |*/
/*|	0.1 Alpha										 |*/
/*|													 |*/
/*|	Autor:											 |*/
/*|	======											 |*/
/*|	Marco Stecher 									 |*/
/*|													 |*/
/*| Beschreibung:									 |*/
/*|	=============									 |*/
/*|	Assistent zum Anlegen von neuen Komponenten.	 |*/
/*| Es können Sets und Einzelkomponenten angelegt	 |*/
/*| werden.											 |*/
/*| 	 											 |*/
/*|													 |*/
/*+--------------------------------------------------+*/


function wizzard_step_one()
{
	//Schritt 1: Auswahl der Komponente, die angelegt werden soll.	
	
	$output = "
			
				<center>
					<h1>Was soll angelegt werden?</h1>
					<br>
					<h3>Komponenten Set</h3>
					<form method='POST' name='Bundles' action='#'>
						<input type='submit' name='bundle_pc' id='Computer'>
					</form>
					<br>
					<br>
					<h3>Einzelkomponenten</h3>
					<form method='POST' name='SingleComps' action='#'>
						<button>Arbeitsspeicher</button>
						<br><br>
						<button>Prozessor</button>
						<br><br>
						<button>Mainboard</button>
						<br><br>
						<button>Festplatte</button>
						<br><br>
						<button>Grafikkarte</button>
						<br><br>
						<button>Netzwerkkarte</button>
						<br><br>
						<button>Raidcontroller</button>
						<br><br>
						<button>Laufwerk</button>
						<br><br>
						<button>Netzteil</button>
						<br><br>
						<button>Switch</button>
						<br><br>
						<button>VLAN</button>
						<br><br>
						<button>Router</button>
						<br><br>
						<button>Hub</button>
					</form>
				</center>
			";
	
	return $output;
}




function wizzard_step_two()
{
	
	//Schritt 2: Erkennt, ob es sich bei der Komponenten um ein Set oder eine Einzelne handelt.
	//			 Bei einem Set wird eine weitere Vorauswahl und bei einer 
	//           Einzelnen wird direkt Schritt 3 geladen
	
	
	
	//Prüfen ob ein POST-Event vorliegt
	if(isset($_POST))
	{
		//Array Key auslesen
		$key = array_keys($_POST);
		
		//Key in Typ (Bundle/Single) und Komponente Splitten
		$key = explode("_",$key[0]);
		$type = $key[0];
		$comp = $key[1];
		
		//$key Variable wird nicht mehr benötigt
		unset($key);		
		
		//Handelt es sich um ein Komponenten Set oder Einzelkomponente?
		if($type == "bundle")
		{
			//Komponenten Set laden (Formular layout). Baukasten für das Formular im Schritt 3.
			include("lib/form/form_bundle_".$comp.".php");
		}
		else
		{
			//Einzelkomponente geht direkt in Schritt 3 über
			wizzard_step_three($comp);
		}
	}
}




function wizzard_step_three($comps)
{
	
	//Schritt 3: Lädt das entsprechende Formular. Das Formular kann
	//           sich bei Sets aus mehreren Teilformularen zusammensetzen.
	
	//Wird was via POST geschickt?
	if(isset($_POST))
	{
		//POST wird nach Komponenten durchsucht und das/die entsprechende(n) Formular(e) werden eingbunden	
		foreach($_POST AS $type=>$component)
		{
			if($type == "comp")
			{
				include("lib/form/formular_".$component.".php");
			}
		}
	}
}






function wizzard_check_input()
{
	//Ausgabe der eingegebenen Daten zur visuellen kontrolle.
	if(isset($_POST))
	{
		echo "<table border='1'>
				<tr>
					<td>Feld</td>
					<td>Eingabe</td>
				</tr>";
		
		foreach($_POST AS $type=>$val)
		{
			echo "<tr>
					  <td>".$type."</td>
					  <td>".$val."</td>
				  </tr>";
		}
		
		echo "</table>";
	}
}






function wizzard_save_components()
{
	
}









?>
