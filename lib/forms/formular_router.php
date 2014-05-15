<!--
### form for Router                      ##
### based on php/html by Max Drescher    ##
### bootstrapped by Matthias Griessmeier ##
##
-->

<h1>Router</h1><br><br>
<form role="form" type="text">
    <div class="form-group">
        <label for="router_name">Interne Bezeichnung/Name:</label>
        <input type="text" id="router_name" class="form-control" name="router_attr_interne bezeichnung" style="width:300px;">
    </div>
    <div class="form-group">
        <label for="router_id">ID des VLANS:</label>
        <input type="text" id="router_id" class="form-control" name="router_attr_id vlans" style="width:300px;">
    </div>
    <div class="form-group">
        <label for="router_ports">Portzahl:</label>
        <input type="text" id="router_ports" class="form-control" name="router_attr_anzahl ports" style="width:300px;">
    </div>
    <div class="form-group">
        <label for="router_ip1">IP 1:</label>
        <input type="text" id="router_ip1" class="form-control" name="router_attr_ip-adresse[]" style="width:300px;">
    </div>
    <div class="form-group">
        <label for="router_ip2">IP 2:</label>
        <input type="text" id="router_ip2" class="form-control" name="router_attr_ip-adresse[]" style="width:300px;">
    </div>
    <div class="form-group">
        <label for="router_ip3">IP 3:</label>
        <input type="text" id="router_ip3" class="form-control" name="router_attr_ip-adresse[]" style="width:300px;">
    </div>
    <div class="form-group">
        <label for="router_ip4">IP 4:</label>
        <input type="text" id="router_ip4" class="form-control" name="router_attr_ip-adresse[]" style="width:300px;">
    </div>
</form>
