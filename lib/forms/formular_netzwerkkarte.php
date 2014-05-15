<!--
### form for network-card                      ##
### based on php/html by Max Drescher    ##
### bootstrapped by Matthias Griessmeier ##
###
--> 

<h1>Netzwerkkarte</h1><br><br>
<form role="form" type="text">
    <div class="form-group">
        <label for="nk_name">Interne Bezeichnung/Name:</label>
        <input type="text" id="nk_name" class="form-control" name="netzwerkkarte_attr_interne bezeichnung" style="width:300px;">
    </div>
    
    <div class="form-group">
        <label for="nk_bandbreite">Bandbreite/Geschwindigkeit:</label>
        <input type="text" id="nk_bandbreite" class="form-control" name="netzwerkkarte_attr_uplink geschwindigkeit" style="width:300px;">
    </div>

    <label for=""> Externe Schnittstelle:</label>
    <div class="radio">
        <label><input type="radio" name="netzwerkkarte_attr_schnittstellen (extern)" value="rj45"> RJ45</label>
    </div>    
    <div class="radio">
        <label><input type="radio" name="netzwerkkarte_attr_schnittstellen (extern)" value="lwl"> LWL</label>
    </div>   

    <label for=""> Interne Schnittstelle:</label>
    <div class="radio">
        <label><input type="radio" name="netzwerkkarte_attr_schnittstellen (intern)" value="pci"> PCI</label>
    </div>    
    <div class="radio">
        <label><input type="radio" name="netzwerkkarte_attr_schnittstellen (intern)" value="pci-e"> PCI-E</label>
    </div>    

    <div class="form-group">
        <label for="nk_anz_ports">Anzahl externer Ports:</label>
        <input type="number" id="nk_anz_ports" class="form-control" name="netzwerkkarte_attr_anzahl ports" style="width:300px;">
    </div>
</form>
