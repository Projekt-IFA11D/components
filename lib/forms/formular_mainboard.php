<!--
### form for Mainboards                  ##
### based on php/html by Max Drescher    ##
### bootstrapped by Matthias Griessmeier ##
###
--> 

<h1>Mainboard</h1><br><br>
<form role="form" type="text">
    <div class="form-group">
        <label for="mb_name">Interne Bezeichnung/Name:</label>
        <input type="text" id="mb_name" class="form-control" name="mainboard_attr_interne bezeichnung" style="width:300px;">
    </div>
    <div class="form-group">
        <label for="mb_sockel">Groesse:</label>
        <input type="text" id="mb_sockel" class="form-control" name="mainboard_attr_sockel" style="width:300px;">
    </div>
    <div class="form-group">
        <label for="mb_ram_typ">Ram-Typ</label>
        <input type="text" id="mb_ram_typ" class="form-control" name="mainboard_attr_ram-typ" style="width:300px;">
    </div>
    <div class="form-group">
        <label for="mb_ram_max">Ram maximal moeglich</label>
        <input type="text" id="mb_ram_max" class="form-control" name="mainboard_attr_maximal unterstuetzter ram" style="width:300px;">
    </div>
    <div class="form-group">
        <label for="mb_baenke_anzahl">Anzahl Baenke:</label>
        <input type="text" id="mb_baenke_anzahl" class="form-control" name="mainboard_attr_anzahl baenke" style="width:300px;">
    </div>
    <div class="form-group">
        <label for="mb_stecker_netz">Steckertyp zum Netzteil: </label>
        <input type="text" id="mb_stecker_netz" class="form-control" name="mainboard_attr_formfaktor" style="width:300px;">
    </div>
    <label for="name">Onboard-Funktionalitaet: </label>
    <div class="checkbox">
       <label><input type="checkbox" id="mb_grafik" name="mainboard_attr_onboard-funktionalitaet[]" value=""> Grafik</label>
    </div>
    <div class="checkbox">
       <label><input type="checkbox" id="mb_nic" name="mainboard_attr_onboard-funktionalitaet[]" value="mb_nic"> NIC</label>
    </div>
    <div class="checkbox">
       <label><input type="checkbox" id="mb_wol" name="mainboard_attr_onboard-funktionalitaet[]" value="mb_wol"> WakeOnLAN</label>
    </div>
    <div class="checkbox">
       <label><input type="checkbox" id="mb_raidctrl" name="mainboard_attr_onboard-funktionalitaet[]" value="mb_raidctrl"> Raidcontroller</label>
    </div>
    <label for="name">Interne Schnittstellen: </label>
    <div class="checkbox">
       <label><input type="checkbox" id="mb_int_if" name="mainboard_attr_schnittstellen (intern)[]" value="sata"> SATA</label>
    </div>
    <div class="checkbox">
       <label><input type="checkbox" id="mb_int_if" name="mainboard_attr_schnittstellen (intern)[]" value="sas"> SAS</label>
    </div>

    <label for="name">Externe Schnittstellen: </label>
    <div class="checkbox">
       <label><input type="checkbox" name="mainboard_attr_schnittstellen (extern)[]" id="mb_ext_if" value="mb_ext_if_usb_2"> USB 2.0</label>
    </div>
    <div class="checkbox">
       <label><input type="checkbox" name="mainboard_attr_schnittstellen (extern)[]" id="mb_ext_if" value="mb_ext_if_usb_3"> SAS</label>
    </div>

</form>

