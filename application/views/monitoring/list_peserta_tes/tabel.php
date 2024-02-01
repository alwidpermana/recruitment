<table class="table table-hover table-striped nowrap align-middle text-center w-100" id="datatable">
	<thead>
		<tr>
			<th rowspan="2">No</th>
			<th rowspan="2">View</th>
			<th colspan="7">Identitas</th>
			<th rowspan="2">Hasil Tes</th>
		</tr>
		<tr>
			<th>NIP</th>
			<th>Nama Lengkap</th>
			<th>No KTP</th>
			<th>Alamat KTP</th>
			<th>Tanggal Lahir</th>
			<th>Jenis Kelamin</th>
			<th>Type</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$no = 1;
		foreach ($data as $key): ?>
			<tr>
				<td><?=$no++?></td>
				<td><a href="<?=base_url()?>monitoring/view_lamaran/<?=$key->id?>" class="btn btn-icon btn-icon-only btn-outline-primary active-scale-down" target="_blank">
					<i class="bi bi-eye"></i>
				</a></td>
				<td><?=$key->nip?></td>
				<td><?=$key->nama?></td>
				<td><?=$key->no_ktp?></td>
				<td><?=$key->alamat_ktp?></td>
				<td><?=$key->tgl_lahir?></td>
				<td><?=$key->jenis_kelamin?></td>
				<td><?=$key->type?></td>
				<td><?=$key->hasil_tes?></td>
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
	        'responsive':true
	    } ); 
</script>