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
        <h2 style="margin-top:0px">Vyherca_turnaju List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('vyherca_turnaju/create'),'Vytvoriť', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('vyherca_turnaju/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('vyherca_turnaju'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Vyhľadať</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>ID</th>
		<th>idTym</th>
		<th>idTurnaj</th>
		<th>Manipulácia</th>
            </tr><?php
            foreach ($vyherca_turnaju_data as $vyherca_turnaju)
            {
                ?>
                <tr>
			<td width="80px"><?php echo $vyherca_turnaju->id ?></td>
			<td><?php echo $vyherca_turnaju->Tym_idTym ?></td>
			<td><?php echo $vyherca_turnaju->Turnaj_idTurnaj ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('vyherca_turnaju/read/'.$vyherca_turnaju->id),'Zobraziť');
				echo ' | '; 
				echo anchor(site_url('vyherca_turnaju/update/'.$vyherca_turnaju->id),'Upraviť');
				echo ' | '; 
				echo anchor(site_url('vyherca_turnaju/delete/'.$vyherca_turnaju->id),'Vymazať','onclick="javasciprt: return confirm(\'Ste si istý ?\')"');
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Spolu : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>
