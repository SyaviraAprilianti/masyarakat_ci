<form action="<?php echo base_url(). 'Pir/update'; ?>" method="post">
    <input type="hidden" name="ids" value="<?php echo $u->id ?>">
		<table style="margin:20px auto;">
			<tr>
				<td>Nama</td>
				<td>
					<input type="text" name="namas" value="<?php echo $u->nama ?>">
				</td>
			</tr>
			<tr>
				<td>username</td>
				<td><input type="text" name="usernames" value="<?php echo $u->username ?>">
                </td>
			</tr>
			
            <tr>
				<td>password</td>
				<td><input type="text" name="passwords" value="<?php echo $u->password ?>"></td>
			</tr>
            <tr>
				<td>telp</td>
				<td><input type="text" name="telps" value="<?php echo $u->telp ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Simpan"></td>
			</tr>
		</table>
	</form>	





    bootsrap

    <form action="<?php echo base_url(). 'Pir/update'; ?>" method="post">
    <input type="hidden" name="ids" value="<?php echo $u->id ?>">
  <div class="form-group">
    <label>Nama</label>
    <input type="text" class="form-control"  name="namas" value="<?php echo $u->nama ?>">
  </div>
  <div class="form-group">
    <label>Username</label>
    <input type="text" class="form-control"  name="usernames" value="<?php echo $u->username ?>">
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="text" class="form-control"  name="passwords" value="<?php echo $u->password ?>">
  </div>
  <div class="form-group">
    <label>Telpon</label>
    <input type="text" class="form-control"  name="telps" value="<?php echo $u->telp ?>">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<div class="card" style="width: 18rem;">
<form action="<?php echo base_url(). 'Pir/update'; ?>" method="post">
    <input type="hidden" name="ids" value="<?php echo $u->id ?>">
  <div class="form-group">
    <label>Nama</label>
    <input type="text" class="form-control"  name="namas" value="<?php echo $u->nama ?>">
  </div>
  <div class="form-group">
    <label>Username</label>
    <input type="text" class="form-control"  name="usernames" value="<?php echo $u->username ?>">
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="text" class="form-control"  name="passwords" value="<?php echo $u->password ?>">
  </div>
  <div class="form-group">
    <label>Telpon</label>
    <input type="text" class="form-control"  name="telps" value="<?php echo $u->telp ?>">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>