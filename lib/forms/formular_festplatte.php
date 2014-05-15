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
        <input type="text" id="fp_name" class="form-control" name="festplatte_attr_interne bezeichnung" style="width:300px;">
    </div>

    <label for="name">Schnittstellenart: </label>
    <div class="radio">
       <label><input type="radio" name="festplatte_attr_schnittstellen (intern)" id="ssa_IDE" value="ide"> IDE</label>
    </div>
    <div class="radio">
       <label><input type="radio" name="festplatte_attr_schnittstellen (intern)" id="ssa_SATA" value="sata"> SATA</label>
    </div>
    <div class="radio">
       <label><input type="radio" name="festplatte_attr_schnittstellen (intern)" id="ssa_SAS" value="sas"> SAS</label>
    </div>

    <label for="name"> Einsatzzweck:</label>
    <div class="radio">
       <label><input type="radio" name="festplatte_attr_einsatzzweck" id="fp_zweck" value="client"> Client</label>
    </div>
    <div class="radio">
       <label><input type="radio" name="festplatte_attr_einsatzzweck" id="fp_zweck" value="server"> Server</label>
    </div>


    <div class="form-group">
        <label for="fp_groesse">Speicherkapazität:</label>
        <input type="text" id="fp_groesse" class="form-control" name="festplatte_attr_speicherkapazität style="width:300px;">
    </div>

    <label for="name">Speicherart: </label>
    <div class="radio">
       <label><input type="radio" name="festplatte_attr_festplattentyp" id="fp_spa" value="ssd"> SSD</label>
    </div>
    <div class="radio">
       <label><input type="radio" name="festplatte_attr_festplattentyp" id="fp_spa" value="magnetisch"> Magnetisch</label>
    </div>

</form>

