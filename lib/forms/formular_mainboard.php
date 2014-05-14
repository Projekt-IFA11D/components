<h1>Komponente: Mainboard</h1><br><br>
<form role="form" type="text">
    <div class="form-group">
        <label for="mb_name">Interne Bezeichnung/Name:</label>
        <input type="text" id="mb_name" class="form-control" name="mb_name" style="width:300px;">
    </div>
    <div class="form-group">
        <label for="mb_sockel">Groesse:</label>
        <input type="text" id="mb_sockel" class="form-control" name="mb_sockel" style="width:300px;">
    </div>
    <div class="form-group">
        <label for="mb_ram_typ">Ram-Typ</label>
        <input type="text" id="mb_ram_typ" class="form-control" name="mb_ram_typ" style="width:300px;">
    </div>
    <div class="form-group">
        <label for="mb_ram_max">Ram maximal moeglich</label>
        <input type="text" id="mb_ram_max" class="form-control" name="mb_ram_max" style="width:300px;">
    </div>
    <div class="form-group">
        <label for="mb_baenke_anzahl">Anzahl Baenke:</label>
        <input type="text" id="mb_baenke_anzahl" class="form-control" name="mb_baenke_anzahl" style="width:300px;">
    </div>
    <div class="form-group">
        <label for="mb_stecker_netz">Steckertyp zum Netzteil: </label>
        <input type="text" id="mb_stecker_netz" class="form-control" name="mb_stecker_netz" style="width:300px;">
    </div>
    <div class="form-group">
        <label for="mb_stecker_cpu">Steckertyp zum CPU: </label>
        <input type="text" id="mb_stecker_cpu" class="form-control" name="mb_stecker_cpu" style="width:300px;">
    </div>
    <label for="name">Onboard-Funktionalitaet: </label>
    <div class="checkbox">
       <label><input type="checkbox" id="mb_grafik" name="mb_grafik" value=""> Grafik</label>
    </div>
    <div class="checkbox">
       <label><input type="checkbox" id="mb_nic" name="mb_nic" value="mb_nic"> NIC</label>
    </div>
    <div class="checkbox">
       <label><input type="checkbox" id="mb_wol" name="mb_wol" value="mb_wol"> WakeOnLAN</label>
    </div>
    <div class="checkbox">
       <label><input type="checkbox" id="mb_raidctrl" name="mb_raidctrl" value="mb_raidctrl"> Raidcontroller</label>
    </div>
    <label for="name">Interne Schnittstellen: </label>
    <div class="checkbox">
       <label><input type="checkbox" id="mb_int_if" value="mb_int_if_sata"> SATA</label>
    </div>
    <div class="checkbox">
       <label><input type="checkbox" id="mb_int_if" value="mb_int_if_sas"> SAS</label>
    </div>
    <div class="form-group">
        <label for="">Sonstiges: <input type="text" class="form-control" name="mb_int_if_sonstig" style="width:300px;">
    </div>
    <label for="name">Externe Schnittstellen: </label>
    <div class="checkbox">
       <label><input type="checkbox" id="mb_ext_if" value="mb_ext_if_usb_2"> USB 2.0</label>
    </div>
    <div class="checkbox">
       <label><input type="checkbox" id="mb_ext_if" value="mb_ext_if_usb_3"> SAS</label>
    </div>
    <div class="form-group">
        <label for="">Sonstiges: <input type="text" name="mb_extern_if_sonstig" style="width:300px;">
    </div>
</form>

