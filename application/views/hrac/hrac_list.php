<!doctype html>
<html>
    <head>
        <title>Hráči</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Hráči</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('hrac/create'),'Vytvoriť', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('hrac/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('hrac'); ?>" class="btn btn-default">Reset</a>
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
		<th>Meno</th>
		<th>Priezvisko</th>
		<th>Vek</th>
		<th>Poznámky</th>
		<th>idMesto</th>
		<th>idTým</th>
		<th>Manipulácia</th>
            </tr><?php
            foreach ($hrac_data as $hrac)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $hrac->Meno ?></td>
			<td><?php echo $hrac->Priezvisko ?></td>
			<td><?php echo $hrac->Vek ?></td>
			<td><?php echo $hrac->Poznamky ?></td>
			<td><?php echo $hrac->Mesto_idMesto ?></td>
			<td><?php echo $hrac->Tym_id ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('hrac/read/'.$hrac->id),'Zobraziť');
				echo ' | '; 
				echo anchor(site_url('hrac/update/'.$hrac->id),'Upraviť');
				echo ' | '; 
				echo anchor(site_url('hrac/delete/'.$hrac->id),'Vymazať','onclick="javasciprt: return confirm(\'Ste si istý ?\')"');
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
