<!doctype html>
<html>
    <head>
        <title>Krajina</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Krajina <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nazov Krajiny <?php echo form_error('Nazov_krajiny') ?></label>
            <input type="text" class="form-control" name="Nazov_krajiny" id="Nazov_krajiny" placeholder="Nazov Krajiny" value="<?php echo $Nazov_krajiny; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('krajina') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>
