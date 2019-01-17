@if($data->state == 'verifikasi_dokumen')
    <div class="alert alert-info" role="alert">
        <strong>Selamat!</strong> Anda berhasil melakukan pendaftaran. Silahkan melakukan
        verifikasi dokumen dengan mendatangai polbangtan pusat sebelum tanggal 01-01-2019
        dan membawa dokumen berikut:
        <ul>
            <li>Kartu Peserta</li>
            <li>Dokumen - dokumen asli yang telah diupload sebelumnya</li>
        </ul>
    </div>
@endif

@if($data->state == 'tes_tulis')
    <div class="alert alert-success" role="alert">
        <strong>Selamat!</strong> Anda telah berhasil melalui tahap verifiasi dokumen.
        Selanjutnya anda dapat mengikuti tes tulis di polbangtan pilihan anda ({{ $data->minstitusi->nama }})
        pada tanggal 01-02-2019, pukul 08:00 WIB
    </div>
@endif

@if($data->state == 'gugur_dokumen')
    <div class="alert alert-danger" role="alert">
        <strong>Mohon Maaf!</strong> Anda dinyatakan gugur pada proses verifikasi dokumen.
        Silahkan mencoba kembali tahun depan, terima kasih.
    </div>
@endif

@if($data->state == 'tes_wawancara')
    <div class="alert alert-success" role="alert">
        <strong>Selamat!</strong> Anda telah berhasil melalui ujian tes tulis.
        Selanjutnya anda dapat mengikuti tes wawancara di polbangtan pusat
        pada tanggal 01-03-2019, pukul 08:00 WIB
    </div>
@endif

@if($data->state == 'gugur_tulis')
    <div class="alert alert-danger" role="alert">
        <strong>Mohon Maaf!</strong> Anda dinyatakan gugur pada ujian tes tulis.
        Silahkan mencoba kembali tahun depan, terima kasih.
    </div>
@endif

@if($data->state == 'tes_kesehatan')
    <div class="alert alert-success" role="alert">
        <strong>Selamat!</strong> Anda telah berhasil melalui ujian tes wawancara.
        Selanjutnya anda dapat mengikuti tes kesehatan di polbangtan pusat
        pada tanggal 01-03-2019, pukul 08:00 WIB
    </div>
@endif

@if($data->state == 'gugur_wawancara')
    <div class="alert alert-danger" role="alert">
        <strong>Mohon Maaf!</strong> Anda dinyatakan gugur pada ujian tes wawancara.
        Silahkan mencoba kembali tahun depan, terima kasih.
    </div>
@endif

@if($data->state == 'verifikasi_akhir')
    <div class="alert alert-success" role="alert">
        <strong>Selamat!</strong> Anda telah berhasil melalui ujian tes kesehatan.
        Silahkan menunggu proses verifikasi akhir.
    </div>
@endif

@if($data->state == 'gugur_kesehatan')
    <div class="alert alert-danger" role="alert">
        <strong>Mohon Maaf!</strong> Anda dinyatakan gugur pada ujian tes kesehatan.
        Silahkan mencoba kembali tahun depan, terima kasih.
    </div>
@endif
