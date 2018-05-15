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
        <h2 style="margin-top:0px">Turnaj <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Názov Turnaju <?php echo form_error('Názov_turnaju') ?></label>
            <input type="text" class="form-control" name="Názov_turnaju" id="Názov_turnaju" placeholder="Názov Turnaju" value="<?php echo $Názov_turnaju; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Start Turnaja <?php echo form_error('Start_turnaja') ?></label>
            <input type="text" class="form-control" name="Start_turnaja" id="Start_turnaja" placeholder="Start Turnaja" value="<?php echo $Start_turnaja; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Mesto IdMesto <?php echo form_error('Mesto_idMesto') ?></label>
            <input type="text" class="form-control" name="Mesto_idMesto" id="Mesto_idMesto" placeholder="Mesto IdMesto" value="<?php echo $Mesto_idMesto; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('turnaj') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>
