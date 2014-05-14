<!--
### form for Printer                      ##
### based on php/html by Max Drescher    ##
### bootstrapped by Matthias Griessmeier ##
###
--> 

<h1>Komponente: Drucker</h1><br><br>
<form role="form" type="text">    
    <div class="form-group">    
        <label for="drucker_ip">Drucker:</label>
        <input type="text" id="drucker_ip" class="form-control" name="drucker_ip" style="width:300px;">
    </div>

    <label for="name">Druckertyp: </label>
    <div class="radio">
       <label><input type="radio" name="drucker_typ" value="drucker_typ_tinte"> Tinte</label>
    </div>
    <div class="radio">
       <label><input type="radio" name="drucker_typ" value="drucker_typ_laser"> Laser</label>
    </div>
    <div class="radio">
       <label><input type="radio" name="drucker_typ" value="drucker_typ_nadel"> Nadel</label>
    </div>

    <label for="name">Druckerart: </label>
    <div class="radio">
       <label><input type="radio" name="drucker_art" value="drucker_art_farbe"> Farbe</label>
    </div>
    <div class="radio">
       <label><input type="radio" name="drucker_art" value="drucker_art_sw"> Schwarz-Weiss</label>
    </div>

    <label for="name"> </label>Anschluss-Art:
    <div class="checkbox">
       <label><input type="checkbox" name="drucker_anschluss" value="drucker_anschluss_lan"> LAN</label>
    </div>
    <div class="checkbox">
       <label><input type="checkbox" name="drucker_anschluss_usb" value="drucker_anschluss_usb"> USB</label>
    </div>
    <div class="form-group">
        <label for="">Sonstiges: <input type="text" name="drucker_sonstiges" style="width:300px;">
    </div>



</form>
