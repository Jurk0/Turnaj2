<!doctype html>
<html>
    <head>
        <title>Zápas</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Zápas</h2>
        <table class="table">
	    <tr><td>Tým1</td><td><?php echo $Tym1; ?></td></tr>
	    <tr><td>Tým2</td><td><?php echo $Tym2; ?></td></tr>
	    <tr><td>Štart zápasu</td><td><?php echo $Start_zapasu; ?></td></tr>
	    <tr><td>Výsledok</td><td><?php echo $Vysledok; ?></td></tr>
	    <tr><td>Poznámky</td><td><?php echo $Poznamky; ?></td></tr>
	    <tr><td>idTurnaj</td><td><?php echo $Turnaj_idTurnaj; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('zapas') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>
