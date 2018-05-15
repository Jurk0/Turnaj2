<!doctype html>
<html>
    <head>
        <title>Zápasy</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Zápasy</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('zapas/create'),'Vytvoriť', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('zapas/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('zapas'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>ID</th>
		<th>Tým1</th>
		<th>Tým2</th>
		<th>Štart zápasu</th>
		<th>Výsledok</th>
		<th>Poznámky</th>
		<th>idTurnaj</th>
		<th>Manipulácia</th>
            </tr><?php
            foreach ($zapas_data as $zapas)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $zapas->Tym1 ?></td>
			<td><?php echo $zapas->Tym2 ?></td>
			<td><?php echo $zapas->Start_zapasu ?></td>
			<td><?php echo $zapas->Vysledok ?></td>
			<td><?php echo $zapas->Poznamky ?></td>
			<td><?php echo $zapas->Turnaj_idTurnaj ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('zapas/read/'.$zapas->id),'Zobraziť');
				echo ' | '; 
				echo anchor(site_url('zapas/update/'.$zapas->id),'Upraviť');
				echo ' | '; 
				echo anchor(site_url('zapas/delete/'.$zapas->id),'Vymazať','onclick="javasciprt: return confirm(\'Ste si istý ?\')"');
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
