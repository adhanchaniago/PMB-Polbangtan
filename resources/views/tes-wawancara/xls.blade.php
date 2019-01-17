<table>
    <thead>
        <tr>
            <th>No</th>
            <th>No Pendaftaran</th>
            <th>Siswa</th>
            <th>Penampilan<br/>Fisik</th>
            <th>Sopan<br/>Santun</th>
            <th>Prestasi<br/>Akademik</th>
            <th>Kemampuan<br/>Finansial</th>
            <th>Kemampuan<br/>Menyampaikan Pendapat</th>
            <th>Daya<br/>Tangkap</th>
            <th>Kepercayaan<br/>Diri</th>
            <th>Motivasi</th>
            <th>Dorongan<br/>Prestasi</th>
            <th>Stabilitas<br/>Emosi</th>
            <th>Keterangan</th>
            <th>Lulus (Y/T)</th>
        </tr>
    </thead>
    <tbody>
    @php $no=1; @endphp
    @foreach($pendaftaran as $key => $value)
        <tr>
            <td>{{ $no }}</td>
            <td>{{ $value->no_pendaftaran }}</td>
            <td>{{ $value->siswa->nama }}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    @php $no++; @endphp
    @endforeach
    </tbody>
</table>