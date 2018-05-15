<!doctype html>
<html>
    <head>
        <title>Vyherca</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Výherca turnaja</h2>
        <table class="table">
	    <tr><td>idTym</td><td><?php echo $Tym_idTym; ?></td></tr>
	    <tr><td>idTurnaj</td><td><?php echo $Turnaj_idTurnaj; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('vyherca_turnaju') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>
