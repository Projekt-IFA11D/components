<!--
### form for dvd-burner                  ##
### based on php/html by Max Drescher    ##
### bootstrapped by Matthias Griessmeier ##
###
--> 

<h1>Optische Laufwerke</h1><br>

<h2>W&auml;hle eine Komponente: </h2><br>

<form role="form" type="text">    
	
    <select name="Brenner" size="1">
	<option>DVD-Brenner</option>
	<option>CD-Brenner</option>
    </select>

    <div class="form-group">    
        <label for="dvdb_lese_geschw">Lesegeschwindigkeit:</label>
        <input type="text" id="dvdb_lese_geschw" class="form-control" name="dvdb_lese_geschw" style="width:300px;">
    </div>    
    <div class="form-group">    
        <label for="dvdb_schreib_geschw">Schreibgeschwindigkeit:</label>
        <input type="text" id="dvdb_schreib_geschw" class="form-control" name="dvdb_schreib_geschw" style="width:300px;">
    </div>    
    <div class="form-group">    
        <label for="dvdb_if">Schnittstelle:</label>
        <input type="text" id="dvdb_if" class="form-control" name="dvdb_if" style="width:300px;">
    </div>    
</form><br> 

<h2>W&auml;hle ein Medium: </h2>

<form role="form" type="text">
    
    <select name="Medium" size="1">
	<option>CD-ROM</option>
	<option>DVD-ROM</option>
    </select>

    <div class="form-group">
        <label for="cd_lese_geschw">Lesegeschwindigkeit</label>
        <input type="text" id="cd_lese_geschw" class="form-control" name="cd_lese_geschw" style="width:300px;">
    </div>
    <div class="form-group">
        <label for="cd_if">Schnittstelle:</label>
        <input type="text" id="cd_if" class="form-control" name="cd_if" style="width:300px;">
    </div>
</form>
