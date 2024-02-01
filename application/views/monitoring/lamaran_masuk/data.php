<table class="table table-hover table-striped nowrap align-middle text-center" border="1" id="datatable" width="100%">
	<thead class="text-center">
		<tr>
			<th></th>
			<th>No</th>
			<th>NIP</th>
			<th>Tanggal</th>
			<th>Nama Lengkap</th>
			<th>No KTP</th>
			<th>Alamat di KTP</th>
			<th>Alamat Tinggal</th>
			<th>No HP</th>
			<th>E-mail</th>
			<th>Tempat Lahir</th>
			<th>Tanggal Lahir</th>
			<th>Jenis Kelamin</th>
			<th>Status Pernikahan</th>
			<th>Jumlah Anak</th>
			<th>Golongan Darah</th>
			<th>Agama</th>
			<th>No Recruitment</th>
			<th>No Rek Test</th>
			<th>Jenis</th>
			<th>Sub</th>
			<th>Type</th>
			<th>Keterangan</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		foreach ($data as $key): ?>
			<tr>
				<td>
					<a href="<?=base_url()?>monitoring/view_lamaran/<?=$key->lamaran_id?>" class="btn btn-icon btn-icon-only btn-outline-primary active-scale-down" target="_blank">
						<i class="bi bi-eye"></i>
					</a>
				</td>
				<td><?=$offset++?></td>
				<td><?=$key->nip?></td>
				<td><?=$key->tgl?></td>
				<td><?=$key->nama?></td>
				<td><?=$key->no_ktp?></td>
				<td><?=$key->alamat_ktp?></td>
				<td><?=$key->alamat_domisili?></td>
				<td><?=$key->no_hp?></td>
				<td><?=$key->email?></td>
				<td><?=$key->tempat_lahir?></td>
				<td><?=$key->tgl_lahir?></td>
				<td><?=$key->jenis_kelamin?></td>
				<td><?=$key->status_pernikahan?></td>
				<td><?=$key->jml_anak?></td>
				<td><?=$key->golongan_darah?></td>
				<td><?=$key->agama?></td>
				<td><?=$key->no_recruitment?></td>
				<td></td>
				<td><?=$key->jenis?></td>
				<td><?=$key->sub?></td>
				<td><?=$key->type?></td>
				<td></td>
				<td><?=$key->status?></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>
<script type="text/javascript">
	var table = $('#datatable').DataTable( {
	        scrollY:        "450px",
	        scrollX:        true,
	        scrollCollapse: true,
	        paging:         false,
	        info: false,
	        'ordering':false,
	        'searching': false,
	    } ); 
</script>