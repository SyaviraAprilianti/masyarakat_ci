<div class="container">
	<h4>Syavira Aprilianti</h4>
	<h4>XII RPL 1</h4>
	<h4>No. Absen : 34</h4>
	<table class="table" style="text-align:center;" border="1">

		<thead class="">

			<tr>
				<th scope="col">ID</th>
				<th scope="col">Tanggal Pengaduan</th>
				<th scope="col">Nama</th>
				<th scope="col">Aduan</th>

			</tr>
		</thead>
		<tbody>
		<?php 
            if(!empty($pengaduan)){
                foreach($pengaduan as $datas){
        ?>  
                    <tr>
                        <td><?php echo $datas->id_pengaduan;?></td>
                        <td><?php echo $datas->tgl_pengaduan; ?></td>
                        <td><?php echo $datas->nama; ?></td>
                        <td><?php echo $datas->aduan; ?></td>
                    </tr> 
        <?php   }       
        }   else   {
            ?>
            <tr>
                <td colspan="8"><center> Data Kosong </center></td>
            </tr>
            <?php
        }
            ?>

		</tbody>
	</table>
</div>
