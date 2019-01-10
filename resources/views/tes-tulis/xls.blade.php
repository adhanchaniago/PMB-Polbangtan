<table>
    <thead>
        <tr>
            <th>No</th>
            <th>No Pendaftaran</th>
            <th>Siswa</th>
            <th>Nilai Matematika</th>
            <th>Nilai Teknis Pertanian</th>
            <th>Hasil (L/G)</th>
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
        </tr>
    @php $no++; @endphp
    @endforeach
    </tbody>
</table>