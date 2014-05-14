<!--
### form for HDD                         ##
### based on php/html by Max Drescher    ##
### bootstrapped by Matthias Griessmeier ##
###
--> 

<h1>Festplatte</h1><br><br>
<form role="form" type="text">
    <div class="form-group">
        <label for="fp_name">Interne Bezeichnung/Name:</label>
        <input type="text" id="fp_name" class="form-control" name="fp_name" style="width:300px;">
    </div>

    <label for="name">Schnittstellenart: </label>
    <div class="checkbox">
       <label><input type="checkbox" id="fp_ssa" value="ssa_ide"> IDE</label>
    </div>
    <div class="checkbox">
       <label><input type="checkbox" id="fp_ssa" value="ssa_sata"> SATA</label>
    </div>
    <div class="checkbox">
       <label><input type="checkbox" id="fp_ssa" value="ssa_SAS"> SAS</label>
    </div>
        <div class="form-group">
        <label for="">Sonstiges: <input type="text" name="fp_ssa_sonstig" style="width:300px;">
    </div>

    <label for="name"> Einsatzzweck:</label>
    <div class="checkbox">
       <label><input type="checkbox" id="fp_zweck" value="z_client"> Client</label>
    </div>
    <div class="checkbox">
       <label><input type="checkbox" id="fp_zweck" value="z_server"> Server</label>
    </div>
        <div class="form-group">
        <label for="">Sonstiges: <input type="text" name="fp_zweck_sonstig" style="width:300px;">
    </div>

    <div class="form-group">
        <label for="fp_groesse">Groesse:</label>
        <input type="text" id="fp_groesse" class="form-control" name="fp_groesse" style="width:300px;">
    </div>

    <label for="name">Speicherart: </label>
    <div class="checkbox">
       <label><input type="checkbox" id="fp_spa" value="spa_ssd"> SSD</label>
    </div>
    <div class="checkbox">
       <label><input type="checkbox" id="fp_spa" value="spa_magnetisch"> Magnetisch</label>
    </div>

</form>

