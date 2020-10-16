<div class="container">
	<h4>Syavira Aprilianti</h4>
	<h4>XII RPL 1</h4>
	<h4>No. Absen : 34</h4>
	<table class="table" style="text-align:center;" border="1">

		<thead class="">

			<tr>
				<th scope="col">ID</th>
				<th scope="col">Nama</th>
				<th scope="col">Username</th>
				<th scope="col">level</th>

			</tr>
		</thead>
		<tbody>
		<?php 
            if(!empty($petugas)){
                foreach($petugas as $datas){
        ?>  
                    <tr>
                        <td><?php echo $datas->id;?></td>
                        <td><?php echo $datas->nama; ?></td>
                        <td><?php echo $datas->username; ?></td>
                        <td><?php echo $datas->level; ?></td>
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
