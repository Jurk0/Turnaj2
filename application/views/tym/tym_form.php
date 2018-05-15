<!doctype html>
<html>
    <head>
        <title>Tym</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Tym <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nazov <?php echo form_error('Nazov') ?></label>
            <input type="text" class="form-control" name="Nazov" id="Nazov" placeholder="Nazov" value="<?php echo $Nazov; ?>" />
        </div>
	    <div class="form-group">
            <label for="Poznamky">Poznamky <?php echo form_error('Poznamky') ?></label>
            <textarea class="form-control" rows="3" name="Poznamky" id="Poznamky" placeholder="Poznamky"><?php echo $Poznamky; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="int">Typ Hry IdTyp Hry <?php echo form_error('Typ_hry_idTyp_hry') ?></label>
            <input type="text" class="form-control" name="Typ_hry_idTyp_hry" id="Typ_hry_idTyp_hry" placeholder="Typ Hry IdTyp Hry" value="<?php echo $Typ_hry_idTyp_hry; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('tym') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>
