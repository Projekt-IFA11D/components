<!--
## form for switches                    ##
## based on php/html by Max Drescher    ##
## bootstrapped by Matthias Griessmeier ##
-->
<h1>Switches</h1><br><br>
<form role="form" type="text">
    <div class="form-group">
        <label for="sw_name">Interne Bezeichnung/Name:</label>
        <input type="text" id="sw_name" class="form-control" name="switches_attr_interne bezeichnung" style="width:300px;">
    </div>
    <div class="form-group">
        <label for="sw_ip">IP:</label>
        <input type="text" id="sw_ip" class="form-control" name="switches_attr_ip-adresse" style="width:300px;">
    </div>
    <div class="form-group">
        <label for="sw_anz_port">Anzahl Ports:</label>
        <input type="text" id="sw_anz_port" class="form-control" name="switches_attr_anzahl ports" style="width:300px;">
    </div>

    <label for="name">Uplinktyp: </label>
    <div class="checkbox">
       <label><input type="checkbox" id="switches_attr_uplinktyp" value="lwl"> LWL</label>
    </div>
    <div class="checkbox">
       <label><input type="checkbox" id="switches_attr_uplinktyp" value="rj45"> RJ45</label>
    </div>


    <div class="form-group">
        <label for="sw_geschw">Geschwindigkeit (des Uplinks/der Ports im Raum):</label>
        <input type="text" id="switches_attr_uplink geschwindigkeit" class="form-control" name="switches_attr_uplink geschwindigkeit" style="width:300px;">
    </div>

</form>
