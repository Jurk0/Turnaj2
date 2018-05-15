<!doctype html>
<html>
    <head>
        <title>Hráč</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Hráč</h2>
        <table class="table">
	    <tr><td>Meno</td><td><?php echo $Meno; ?></td></tr>
	    <tr><td>Priezvisko</td><td><?php echo $Priezvisko; ?></td></tr>
	    <tr><td>Vek</td><td><?php echo $Vek; ?></td></tr>
	    <tr><td>Poznámky</td><td><?php echo $Poznamky; ?></td></tr>
	    <tr><td>idMesto</td><td><?php echo $Mesto_idMesto; ?></td></tr>
	    <tr><td>Tym Id</td><td><?php echo $Tym_id; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('hrac') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>
