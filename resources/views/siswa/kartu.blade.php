<!DOCTYPE html>
<html>
<head>
    <title>Kartu Peserta</title>
</head>
<body>
<table>
    <tr>
        <td width="100px"><img src="{{ asset('images/logo.png') }}" style="width: 75px; height: auto;"></td>
        <td style="text-align: center;">
            <span style="font-size: 16px; font-weight: bold;">KARTU TANDA PESERTA</span><br />
            <span style="font-size: 16px; font-weight: bold;">POLITEKNIK PEMBANGUNAN PERTANIAN</span> <br />
        </td>
    </tr>
    <tr>
        <td colspan="2"><hr size="3"/></td>
    </tr>
</table>
<table>
    <tr>
        <td>
            <img src="{{ route('viewfile') . '?file=' . $siswa->foto }}" style="width: 200px; height: auto">
        </td>
        <td>
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
</table>
<h2>Pilihan Institusi & Jurusan</h2>
<table>
    <tr>
        <td>{{ $pendaftaran->minstitusi->nama }}</td>
    </tr>
    <tr>
        <td>1. {{ $pendaftaran->jurusan_1_label }}</td>
    </tr>
    <tr>
        <td>2. {{ $pendaftaran->jurusan_2_label }}</td>
    </tr>
</table>
</body>
</html>