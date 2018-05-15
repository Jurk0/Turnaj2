<!doctype html>
<html>
    <head>
        <title>Turnaje</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Turnaje</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('turnaj/create'),'Vytvoriť', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('turnaj/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('turnaj'); ?>" class="btn btn-default">Reset</a>
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
		<th>Názov turnaja</th>
		<th>Štart turnaja</th>
		<th>idMesto</th>
		<th>Manipulácia</th>
            </tr><?php
            foreach ($turnaj_data as $turnaj)
            {
                ?>
                <tr>
			<td width="80px"><?php echo $turnaj->id ?></td>
			<td><?php echo $turnaj->Názov_turnaju ?></td>
			<td><?php echo $turnaj->Start_turnaja ?></td>
			<td><?php echo $turnaj->Mesto_idMesto ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('turnaj/read/'.$turnaj->id),'Zobraziť');
				echo ' | '; 
				echo anchor(site_url('turnaj/update/'.$turnaj->id),'Upraviť');
				echo ' | '; 
				echo anchor(site_url('turnaj/delete/'.$turnaj->id),'Vymazať','onclick="javasciprt: return confirm(\'Ste si istý ?\')"');
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
