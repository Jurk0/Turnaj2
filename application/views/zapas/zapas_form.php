<!doctype html>
<html>
    <head>
        <title>Zápas</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Zapas <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Tym1 <?php echo form_error('Tym1') ?></label>
            <input type="text" class="form-control" name="Tym1" id="Tym1" placeholder="Tym1" value="<?php echo $Tym1; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Tym2 <?php echo form_error('Tym2') ?></label>
            <input type="text" class="form-control" name="Tym2" id="Tym2" placeholder="Tym2" value="<?php echo $Tym2; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Start Zapasu <?php echo form_error('Start_zapasu') ?></label>
            <input type="text" class="form-control" name="Start_zapasu" id="Start_zapasu" placeholder="Start Zapasu" value="<?php echo $Start_zapasu; ?>" />
        </div>
	    <div class="form-group">
            <label for="Vysledok">Vysledok <?php echo form_error('Vysledok') ?></label>
            <textarea class="form-control" rows="3" name="Vysledok" id="Vysledok" placeholder="Vysledok"><?php echo $Vysledok; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="Poznamky">Poznamky <?php echo form_error('Poznamky') ?></label>
            <textarea class="form-control" rows="3" name="Poznamky" id="Poznamky" placeholder="Poznamky"><?php echo $Poznamky; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="int">Turnaj IdTurnaj <?php echo form_error('Turnaj_idTurnaj') ?></label>
            <input type="text" class="form-control" name="Turnaj_idTurnaj" id="Turnaj_idTurnaj" placeholder="Turnaj IdTurnaj" value="<?php echo $Turnaj_idTurnaj; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('zapas') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>
