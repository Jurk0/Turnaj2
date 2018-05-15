<!doctype html>
<html>
    <head>
        <title>Tým</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Tým</h2>
        <table class="table">
	    <tr><td>Názov</td><td><?php echo $Nazov; ?></td></tr>
	    <tr><td>Poznámky</td><td><?php echo $Poznamky; ?></td></tr>
	    <tr><td>idTyp Hry</td><td><?php echo $Typ_hry_idTyp_hry; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('tym') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>
