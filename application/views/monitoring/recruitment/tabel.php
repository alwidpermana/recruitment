<table id="recruitmentTabel" class="table table-hover nowrap align-middle" style="width:100%;">
    <thead class="">
        <tr>
            <th rowspan="2">No</th>
            <th rowspan="2">View</th>
            <th rowspan="2">No Recruitment</th>
            <th rowspan="2">Tanggal</th>
            <th rowspan="2">Jenis</th>
            <th colspan="3">Kebutuhan</th>
            <th colspan="3">Lulus</th>
            <th colspan="3">Outstanding</th>
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
        <?php if (count($data) == 0): ?>
            <tr>
                <th colspan="15">Data Tidak Tersedia</th>
            </tr>
        <?php else: ?>
            <?php foreach ($data as $key): ?>
                <tr>
                    <td><?=$startNo++?></td>
                    <td></td>
                    <td><?=$key->no_recruitment?></td>
                    <td><?=date("d-m-Y", strtotime($key->tgl))?></td>
                    <td><?=$key->jenis?></td>
                    <td><?=$key->kebutuhan_pria?></td>
                    <td><?=$key->kebutuhan_wanita?></td>
                    <td><?=$key->kebutuhan_total?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>            
            <?php endforeach ?>    
        <?php endif ?>
                
    </tbody>
</table>