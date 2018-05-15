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
        <h2 style="margin-top:0px">Vyherca_turnaju <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Tym IdTym <?php echo form_error('Tym_idTym') ?></label>
            <input type="text" class="form-control" name="Tym_idTym" id="Tym_idTym" placeholder="Tym IdTym" value="<?php echo $Tym_idTym; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Turnaj IdTurnaj <?php echo form_error('Turnaj_idTurnaj') ?></label>
            <input type="text" class="form-control" name="Turnaj_idTurnaj" id="Turnaj_idTurnaj" placeholder="Turnaj IdTurnaj" value="<?php echo $Turnaj_idTurnaj; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('vyherca_turnaju') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>
