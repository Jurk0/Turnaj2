<!doctype html>
<html>
    <head>
        <title>Mesto</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Mesto</h2>
        <table class="table">
	    <tr><td>Názov mesta</td><td><?php echo $Nazov_mesta; ?></td></tr>
	    <tr><td>idKrajina</td><td><?php echo $Krajina_idKrajina; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('mesto') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>
