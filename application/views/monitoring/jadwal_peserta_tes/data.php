<table class="table table-bordered table-hover table-striped nowrap align-middle text-center" id="datatable" width="100%">
	<thead class="text-center">
		<tr>
			<th rowspan="2">No</th>
			<th rowspan="2">View</th>
			<th rowspan="2">Tanggal</th>
			<th rowspan="2">No Rekaman Tes</th>
			<th rowspan="2">Tahap</th>
			<th rowspan="2">Tanggal Tes</th>
			<th rowspan="2">Jenis</th>
			<th rowspan="2">Tempat</th>
			<th colspan="3">Eksternal</th>
			<th colspan="3">Lulus Tes</th>
			<th colspan="3">Tidak Lulus Tes</th>
			<th rowspan="2">Status</th>
		</tr>
		<tr>
			<th>Pria</th>
			<th>Wanita</th>
			<th>Jumlah</th>
			<th>Pria</th>
			<th>Wanita</th>
			<th>Jumlah</th>
			<th>Pria</th>
			<th>Wanita</th>
			<th>Jumlah</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($data as $key): ?>
			<tr>
				<td><?=$offset++?></td>
				<td></td>
				<td><?=date("Y-m-d", strtotime($key->created_at))?></td>
				<td><?=$key->no_rek?></td>
				<td><?=$key->tahap?></td>
				<td><?=$key->tahap=='1' ? $key->tgl_tes:$key->tgl_tes.'<br>'.$key->tgl_tes2.'<br>'.$key->tgl_tes3?></td>
				<td><?=$key->jenis?></td>
				<td><?=$key->tempat?></td>
				<td><?=$key->jml_laki_eksternal?></td>
				<td><?=$key->jml_perempuan_eksternal?></td>
				<td><?=$key->jml_total_eksternal == '0' ? '' : $key->jml_total_eksternal?></td>
				<td><?=$key->jml_laki_lulus?></td>
				<td><?=$key->jml_perempuan_lulus?></td>
				<td><?=$key->jml_total_lulus?></td>
				<td><?=$key->jml_laki_tidak?></td>
				<td><?=$key->jml_perempuan_tidak?></td>
				<td><?=$key->jml_total_tidak?></td>
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