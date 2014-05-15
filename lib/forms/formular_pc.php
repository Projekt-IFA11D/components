<?php

/*+--------------------------------------------------+*/
/*|													 |*/
/*|	Formularname:									 |*/
/*|	=============									 |*/
/*|	formular_pc.php									 |*/
/*|													 |*/
/*| Version:										 |*/
/*|	========										 |*/
/*|	1.0												 |*/
/*|													 |*/
/*|	Autor:											 |*/
/*|	======											 |*/
/*|	Maximilian Drescher								 |*/
/*|													 |*/
/*| Beschreibung:									 |*/
/*|	=============									 |*/
/*|	Formular fuer die Komponente 'PC'	          	 |*/
/*|													 |*/
/*+--------------------------------------------------+*/

echo "<h1>PC</h1><br><br>";
echo "<form role='form' type='text'>";
echo "  <div class=\"form-group\">
		<label for=\"pc_name\">Interne Bezeichnung/Name:</label>
		<input name='komplettsystem_attr_interne bezeichnung' id=\"pc_name\" class=\"form-control\" type='text' size='30'>
		</div>
		
		<div class=\"form-group\">
		<label for=\"pc_ip\">IP des Geraetes:</label> 
		<input name='komplettsystem_attr_ip-adresse[]' id=\"pc_ip\" class=\"form-control\" type='text' size='30'>
		</div>
		
        <div class=\"form-group\">
		<label for=\"pc_ip2\">IP des Geraetes: </label>
		<input name='komplettsystem_attr_ip-adresse[]' id=\"pc_ip\" class=\"form-control\" type='text' size='30'>
		</div>
        
		<div class=\"form-group\">
		<label for=\"pc_subnetmask\">Subnetzmaske: </label>
		<input name='komplettsystem_attr_subnetzmaske' id=\"pc_ip\" class=\"form-control\" type='text' size='30'>
		</div>
		
	    <div class=\"form-group\">
		<label for=\"pc_gateway\">Gateway: </label>
		<input name='komplettsystem_attr_gateway' id=\"pc_ip\" class=\"form-control\" type='text' size='30'>
		</div>
		
	  
      </form>";
?>