<table class="table table-bordered table-hover table-striped nowrap align-middle text-center" id="datatable" width="100%">
	<thead>
		<tr>
			<th rowspan="4">No</th>
			<th colspan="5">Identitas</th>
			<th colspan="3">Klasifikasi</th>
			<th colspan="16">Tahap 1 - Tes Basic</th>
			<th colspan="17">Tahap 2 - Penilaian Lapangan & Evaluasi</th>
			<th rowspan="4">Overall Status</th>
		</tr>
		<tr>
			<th rowspan="3">NIP</th>
			<th rowspan="3">Nama Lengkap</th>
			<th rowspan="3">Tanggal Lahir</th>
			<th rowspan="3">Jenis Kelamin</th>
			<th rowspan="3">Alamat di KTP</th>
			<th rowspan="3">Jenis</th>
			<th rowspan="3">Sub</th>
			<th rowspan="3">Type</th>
			<th colspan="3">Jadwal Tes</th>
			<th colspan="11">Tes</th>
			<th rowspan="2">Komitment</th>
			<th rowspan="3">Hasil Tes T1</th>
			<th rowspan="3">No Rek Tes</th>
			<th colspan="6">Jadwal Tes</th>
			<th colspan="9">Tes</th>
			<th rowspan="3">Hasil Tes T2</th>
		</tr>
		<tr>
			<th colspan="3">H1</th>
			<th colspan="3">Tertulis</th>
			<th colspan="5">Fisik</th>
			<th>Keterampilan</th>
			<th colspan="2">Interview</th>
			<th colspan="2">H1</th>
			<th colspan="2">H2</th>
			<th colspan="2">H3</th>
			<th>Lapangan</th>
			<th colspan="8">Materi Kelas</th>
		</tr>
		<tr>
			<th>Tanggal</th>
			<th>No Rek Tes</th>
			<th>Kehadiran</th>
			<th>Kemampuan Dasar</th>
			<th>logika</th>
			<th>Ketelitian</th>
			<th>Tinggi Badan</th>
			<th>Mata</th>
			<th>Tensi</th>
			<th>Tato</th>
			<th>Berat Badan</th>
			<th>Motorik</th>
			<th>HRD</th>
			<th>User</th>
			<th>Ttd Pernyataan</th>
			<th>Tanggal</th>
			<th>Kehadiran</th>
			<th>Tanggal</th>
			<th>Kehadiran</th>
			<th>Tanggal</th>
			<th>Kehadiran</th>
			<th>Training</th>
			<th>Co Profile</th>
			<th>PKB</th>
			<th>ISO 9001</th>
			<th>ISO 14001</th>
			<th>5S</th>
			<th>K3</th>
			<th>IK</th>
			<th>IPK</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		foreach ($data as $key): ?>
			<tr>
				<td><?=$offset++?></td>
				<td><?=$key->nip?></td>
				<td><?=$key->nama?></td>
				<td><?=$key->tgl_lahir?></td>
				<td><?=$key->jenis_kelamin?></td>
				<td><?=$key->alamat_ktp?></td>
				<td><?=$key->jenis?></td>
				<td><?=$key->sub?></td>
				<td><?=$key->type?></td>
				<td><?=$key->tgl_tes_1?></td>
				<td><?=$key->no_rek_tahap_1?></td>
				<td><?=$key->kehadiran_tes_1?></td>
				<td><?=$key->tes_tertulis_kemampuan_dasar?></td>
				<td><?=$key->tes_tertulis_logika?></td>
				<td><?=$key->tes_tertulis_ketilitian?></td>
				<td><?=$key->tes_fisik_tinggi_badan?></td>
				<td><?=$key->tes_fisik_mata?></td>
				<td><?=$key->tes_fisik_tensi?></td>
				<td><?=$key->tes_fisik_tato?></td>
				<td><?=$key->tes_fisik_berat_badan?></td>
				<td><?=$key->tes_keterampilan_motorik?></td>
				<td><?=$key->tes_interview_hrd?></td>
				<td><?=$key->tes_interview_user?></td>
				<td><?=$key->komitmen_ttd_pernyataan?></td>
				<td><?=$key->hasil_tes_1?></td>
				<td><?=$key->no_rek_tahap_2?></td>
				<td><?=$key->tgl_h1_tahap_2?></td>
				<td><?=$key->jadwal_h1_kehadiran?></td>
				<td><?=$key->tgl_h2_tahap_2?></td>
				<td><?=$key->jadwal_h2_kehadiran?></td>
				<td><?=$key->tgl_h3_tahap_2?></td>
				<td><?=$key->jadwal_h3_kehadiran?></td>
				<td><?=$key->tes_lapangan_training?></td>
				<td><?=$key->tes_materi_co_profile?></td>
				<td><?=$key->tes_materi_pkb?></td>
				<td><?=$key->tes_materi_iso_9001?></td>
				<td><?=$key->tes_materi_iso_14001?></td>
				<td><?=$key->tes_materi_5s?></td>
				<td><?=$key->tes_materi_k3?></td>
				<td><?=$key->tes_materi_ik?></td>
				<td><?=$key->tes_materi_ipk?></td>	
				<td><?=$key->hasil_tes_2?></td>
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
	    } ); 
</script>