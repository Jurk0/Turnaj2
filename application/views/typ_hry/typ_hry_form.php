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
        <h2 style="margin-top:0px">Typ_hry <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Typ Hry <?php echo form_error('Typ_hry') ?></label>
            <input type="text" class="form-control" name="Typ_hry" id="Typ_hry" placeholder="Typ Hry" value="<?php echo $Typ_hry; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nazov Hry <?php echo form_error('Nazov_hry') ?></label>
            <input type="text" class="form-control" name="Nazov_hry" id="Nazov_hry" placeholder="Nazov Hry" value="<?php echo $Nazov_hry; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('typ_hry') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>
