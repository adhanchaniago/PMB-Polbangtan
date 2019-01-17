<html>
    <head>
        <title>Daftar Peserta Ujian Wawancara</title>
        <style>
            table {
                border-collapse: collapse;
            }

            table, th, td {
                border: 2px solid black;
                padding: 4px;
            }
        </style>
    </head>
    <body>
        <p style="text-align: center">
            <span style="font-size: 18px; font-weight: bold;">DAFTAR PESERTA UJIAN WAWANCARA</span><br/>
        </p>
        <table width="100%">
            <tr bgcolor="#d3d3d3" style="text-align: center;">
                <td>No.</td>
                <td>No Pendaftaran</td>
                <td>Nama Siswa</td>
                <td>Institusi</td>
                <td>Jurusan 1</td>
                <td>Jurusan 2</td>
            </tr>
            @php $no = 1; @endphp
            @foreach($pendaftaran as $key => $value)
            <tr>
                <td>{{ $no }}</td>
                <td>{{ $value->no_pendaftaran }}</td>
                <td>{{ $value->siswa->nama }}</td>
                <td>{{ $value->minstitusi->nama  }}</td>
                <td>{{ $value->jurusan_1_label  }}</td>
                <td>{{ $value->jurusan_2_label  }}</td>
                @php $no++; @endphp
            </tr>
            @endforeach
        </table>
    </body>
</html>