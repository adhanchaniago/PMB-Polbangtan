<html>
<head>
    <title>Kartu Peserta</title>
    <style>
        table {
            border-collapse: collapse;
        }

        table, th, td {
            border: 2px solid black;
            padding: 8px;
        }
    </style>
</head>
<body>
<table>
    <tr>
        <td style="width: 75px; border-right: 0px"><img src="{{ asset('images/logo.png') }}" style="width: 75px; height: auto;"></td>
        <td style="width: 425px; text-align: center; border-left: 0px">
            <span style="font-size: 16px; font-weight: bold;">KARTU TANDA PESERTA</span><br/>
            <span style="font-size: 16px; font-weight: bold;">POLITEKNIK PEMBANGUNAN PERTANIAN</span> <br/>
        </td>
    </tr>
    <tr>
        <td style="width: 150px; vertical-align: top;">
            <img src="{{ route('viewfile') . '?file=' . $siswa->foto }}" style="width: 150px; height: auto;">
        </td>
        <td style="width: 350px;">
            <p>
                Nomor Pendaftaran:<br/>
                <strong>{{ $pendaftaran->no_pendaftaran }}</strong>
            </p>
            <p>
                Nama Siswa:<br/>
                {{ $siswa->nama }}
            </p>
            <p>
                NISN:<br/>
                {{ $siswa->nisn }}
            </p>
            <p>
                Sekolah:<br/>
                {{ $siswa->nama_sekolah }}
            </p>
            <p>
                Alamat Sekolah:<br/>
                {{ $siswa->alamat_sekolah }}
            </p>
            <p>
                Jurusan:<br/>
                {{ config("pendidikan.jurusan.$siswa->tipe_sekolah.$siswa->jurusan.label") }}
            </p>
        </td>
    </tr>
    <tr>
        <td colspan="2"><strong>Pilihan Institusi & Jurusan</strong></td>
    </tr>
    <tr>
        <td colspan="2">{{ $pendaftaran->minstitusi->nama }}</td>
    </tr>
    <tr>
        <td style="width: 30px;">1.</td>
        <td style="width: 470px;">{{ $pendaftaran->jurusan_1_label }}</td>
    </tr>
    <tr>
        <td>2.</td>
        <td>{{ $pendaftaran->jurusan_2_label }}</td>
    </tr>
</table>
</body>
</html>