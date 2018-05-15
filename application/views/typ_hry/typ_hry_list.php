<!doctype html>
<html>
    <head>
        <title>Typy hier</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Typy hier </h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('typ_hry/create'),'Vytvoriť', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('typ_hry/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('typ_hry'); ?>" class="btn btn-default">Reset</a>
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
		<th>Typ Hry</th>
		<th>Názov hry</th>
		<th>Manipulácia</th>
            </tr><?php
            foreach ($typ_hry_data as $typ_hry)
            {
                ?>
                <tr>
			<td width="80px"><?php echo $typ_hry->id ?></td>
			<td><?php echo $typ_hry->Typ_hry ?></td>
			<td><?php echo $typ_hry->Nazov_hry ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('typ_hry/read/'.$typ_hry->id),'Zobraziť');
				echo ' | '; 
				echo anchor(site_url('typ_hry/update/'.$typ_hry->id),'Upraviť');
				echo ' | '; 
				echo anchor(site_url('typ_hry/delete/'.$typ_hry->id),'Vymazať','onclick="javasciprt: return confirm(\'Ste si istý ?\')"');
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
