<!--
### form for network-card                      ##
### based on php/html by Max Drescher    ##
### bootstrapped by Matthias Griessmeier ##
###
--> 

<h1>Komponente: Netzwerkkarte</h1><br><br>
<form role="form" type="text">
    <div class="form-group">
        <label for="nk_name">Interne Bezeichnung/Name:</label>
        <input type="text" id="nk_name" class="form-control" name="nk_name" style="width:300px;">
    </div>
    
    <div class="form-group">
        <label for="nk_bandbreite">Bandbreite/Geschwindigkeit:</label>
        <input type="text" id="nk_bandbreite" class="form-control" name="nk_bandbreite" style="width:300px;">
    </div>

    <label for=""> Externe Schnittstelle:</label>
    <div class="checkbox">
        <label><input type="checkbox" name="nk_ext_if" value="nk_ext_if_rj45"> RJ45</label>
    </div>    
    <div class="checkbox">
        <label><input type="checkbox" name="nk_ext_if" value="nk_ext_if_lwl"> LWL</label>
    </div>   

    <label for=""> Interne Schnittstelle:</label>
    <div class="checkbox">
        <label><input type="checkbox" name="nk_int_if" value="nk_int_if_pci"> PCI</label>
    </div>    
    <div class="checkbox">
        <label><input type="checkbox" name="nk_int_if" value="nk_int_if_pcie"> PCI-E</label>
    </div>    

    <div class="form-group">
        <label for="nk_anz_ports">Anzahl externer Ports:</label>
        <input type="number" id="nk_anz_ports" class="form-control" name="nk_anz_ports" style="width:300px;">
    </div>
</form>
