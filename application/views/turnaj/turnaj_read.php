<!doctype html>
<html>
    <head>
        <title>Turnaj</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Turnaj</h2>
        <table class="table">
	    <tr><td>Názov turnaju</td><td><?php echo $Názov_turnaju; ?></td></tr>
	    <tr><td>Štart turnaja</td><td><?php echo $Start_turnaja; ?></td></tr>
	    <tr><td>idMesto</td><td><?php echo $Mesto_idMesto; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('turnaj') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>
