<!doctype html>
<html>
    <head>
        <title>Typ hry</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Typ hry</h2>
        <table class="table">
	    <tr><td>Typ hry</td><td><?php echo $Typ_hry; ?></td></tr>
	    <tr><td>Názov hry</td><td><?php echo $Nazov_hry; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('typ_hry') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>
