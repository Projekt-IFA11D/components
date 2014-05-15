<?php
	$time = date("H:i",time());
	$rooms = count(select_statement("rooms"));
	$suppliers = count(select_statement("suppliers"));
	$components = count(select_statement('components'));
?>
<h1 class="page-header">Dashboard</h1>

<p class="lead">
	Wilkommen, aktuell können wir folgende Statistik vorweisen:
</p>

<div class="table table-responsive">
	<table class="table table-striped">
		<th>Art</th>
		<th>Anzahl</th>
			<tr>
				<td>R&auml;ume</td>
				<td><?php echo($rooms) ?></td>
			</tr>
			<tr>
				<td>Lieferanten</td>
				<td><?php echo($suppliers) ?></td>
			</tr>
			<tr>
				<td>Komponenten</td>
				<td><?php echo($components) ?></td>
			</tr>
	<table>
</div>
