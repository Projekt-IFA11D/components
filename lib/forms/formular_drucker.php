<!--
### form for Printer                      ##
### based on php/html by Max Drescher    ##
### bootstrapped by Matthias Griessmeier ##
###
--> 

<h1>Drucker</h1><br><br>
<form role="form" type="text">    
    <div class="form-group">    
        <label for="drucker_ip">Drucker:</label>
        <input type="text" id="drucker_attr_ip-adresse" class="form-control" name="drucker_ip" style="width:300px;">
    </div>

    <label for="name">Druckertyp: </label>
    <div class="radio">
       <label><input type="radio" name="drucker_attr_druckertyp" value="Tinte"> Tinte</label>
    </div>
    <div class="radio">
       <label><input type="radio" name="drucker_attr_druckertyp" value="Laser"> Laser</label>
    </div>
    <div class="radio">
       <label><input type="radio" name="drucker_attr_druckertyp" value="Nadel"> Nadel</label>
    </div>

    <label for="name">Druckerart: </label>
    <div class="radio">
       <label><input type="radio" name="drucker_attr_druckerart" value="Farbe"> Farbe</label>
    </div>
    <div class="radio">
       <label><input type="radio" name="drucker_attr_druckerart" value="Schwarz-Weiss"> Schwarz-Weiss</label>
    </div>

    <label for="name"> </label>Anschluss-Art:
    <div class="checkbox">
       <label><input type="checkbox" name="drucker_attr_schnittstellen (extern)[]" value="LPT"> LPT</label>
    </div>
    <div class="checkbox">
       <label><input type="checkbox" name="drucker_attr_schnittstellen (extern)[]" value="USB 2.0"> USB 2.0</label>
    </div>
    <div class="checkbox">
       <label><input type="checkbox" name="drucker_attr_schnittstellen (extern)[]" value="USB 3.0"> USB 3.0</label>
    </div>




</form>
