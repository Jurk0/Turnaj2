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
        <h2 style="margin-top:0px">Mesto <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nazov Mesta <?php echo form_error('Nazov_mesta') ?></label>
            <input type="text" class="form-control" name="Nazov_mesta" id="Nazov_mesta" placeholder="Nazov Mesta" value="<?php echo $Nazov_mesta; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Krajina IdKrajina <?php echo form_error('Krajina_idKrajina') ?></label>
            <input type="text" class="form-control" name="Krajina_idKrajina" id="Krajina_idKrajina" placeholder="Krajina IdKrajina" value="<?php echo $Krajina_idKrajina; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('mesto') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>
