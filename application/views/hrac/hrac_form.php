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
        <h2 style="margin-top:0px">Hráč <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Meno <?php echo form_error('Meno') ?></label>
            <input type="text" class="form-control" name="Meno" id="Meno" placeholder="Meno" value="<?php echo $Meno; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Priezvisko <?php echo form_error('Priezvisko') ?></label>
            <input type="text" class="form-control" name="Priezvisko" id="Priezvisko" placeholder="Priezvisko" value="<?php echo $Priezvisko; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Vek <?php echo form_error('Vek') ?></label>
            <input type="text" class="form-control" name="Vek" id="Vek" placeholder="Vek" value="<?php echo $Vek; ?>" />
        </div>
	    <div class="form-group">
            <label for="Poznamky">Poznamky <?php echo form_error('Poznamky') ?></label>
            <textarea class="form-control" rows="3" name="Poznamky" id="Poznamky" placeholder="Poznamky"><?php echo $Poznamky; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="int">Mesto IdMesto <?php echo form_error('Mesto_idMesto') ?></label>
            <input type="text" class="form-control" name="Mesto_idMesto" id="Mesto_idMesto" placeholder="Mesto IdMesto" value="<?php echo $Mesto_idMesto; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Tym Id <?php echo form_error('Tym_id') ?></label>
            <input type="text" class="form-control" name="Tym_id" id="Tym_id" placeholder="Tym Id" value="<?php echo $Tym_id; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('hrac') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>
