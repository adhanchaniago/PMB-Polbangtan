<?php

use App\Content;
use Illuminate\Database\Seeder;

class CmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	/* HOMEPAGE */
        Content::create([
        	'key' => 'judul',
        	'value' => 'Penerimaan Mahasiswa Baru 2018/2019'
        ]);
        Content::create([
        	'key' => 'sub-judul',
        	'value' => 'Politeknik Pembangunan Pertanian (POLBANGTAN)'
        ]);
        Content::create([
        	'key' => 'deskripsi',
        	'value' => 'Penerimaan Mahasiswa Baru Politeknik Pembangunan Pertanian (POLBANGTAN) Lingkup Kementerian Pertanian Tahun Akademik 2018/2019'
        ]);
        Content::create([
        	'key' => 'countdown',
        	'value' => '2019-04-01'
        ]);
        Content::create([
        	'key' => 'alamat',
        	'value' => 'Pusdiktan, BPPSDMP, Kementan. Jl. Harsono RM, No.3, Jakarta 12550'
        ]);
        Content::create([
        	'key' => 'no-telepon',
        	'value' => '021 7815380, Fax 021 78839233'
        ]);
        /* HOMEPAGE */

        /* INFORMASI PENDAFTARAN */
        Content::create([
        	'key' => 'informasi-pendaftaran',
        	'value' => '<h3><strong>KETENTUAN UMUM PMB</strong></h3>
				<p>Persyaratan umum pendaftaran mahasiswa baru sebagai berikut:</p>
				<ul>
					<li>Warga Negara Indonesia (WNI) atau Warga Negara Asing (WNA) yang dilengkapi bukti kewarganegaraan</li>
					<li>Memiliki ijazah atau Surat Keterangan Lulus (SKL) dari Asal Sekolah</li>
					<li>Lulusan SMK-PP/SMK Pertanian/SMA IPA/MA IPA, dan SMA IPS/MA IPS untuk jurusan Penyuluhan Pertanian Berkelanjutan, Penyuluhan Perkebunan Presisi, Penyuluhan Peternakan dan Kesejahteraan Hewan, sedangkan lulusan SMK jurusan Mesin hanya untuk Program Studi Mekanisasi Pertanian</li>
					<li>Mengisi formulir pendaftaran</li>
					<li>Memiliki tinggi badan paling rendah 155 cm bagi calon mahasiswa baru puteri dan 160 cm bagi calon mahasiswa baru putera</li>
					<li>Surat Keterangan Sehat dari Dokter</li>
				</ul>'
        ]);
        /* INFORMASI PENDAFTARAN */

        /* BROSUR */
        Content::create([
        	'key' => 'brosur-pmb',
        	'value' => 'default\/brosur.jpg'
        ]);
        /* BROSUR */

        /* DOKUMEN PMB */
        Content::create([
        	'key' => 'dokumen-pmb',
        	'value' => '{"nama":"Formulir Pendaftaran Jalur Tugas Belajar","file":"default\/form1a.png"}'
        ]);
        Content::create([
        	'key' => 'dokumen-pmb',
        	'value' => '{"nama":"Formulir Pendaftaran Jalur Undangan dan Kerjasama","file":"default\/form1b.png"}'
        ]);
        Content::create([
        	'key' => 'dokumen-pmb',
        	'value' => '{"nama":"Formulir Pendaftaran Jalur Umum","file":"default\/form1c.png"}'
        ]);
        Content::create([
        	'key' => 'dokumen-pmb',
        	'value' => '{"nama":"Keterangan Kesehatan","file":"default\/form2.png"}'
        ]);
        Content::create([
        	'key' => 'dokumen-pmb',
        	'value' => '{"nama":"Surat Pernyataan Mentaati Peraturan Akademik di Polbangtan","file":"default\/form3.png"}'
        ]);
        Content::create([
        	'key' => 'dokumen-pmb',
        	'value' => '{"nama":"Usulan Calon Peserta Tugas Belajar Dalam Negeri","file":"default\/form4.png"}'
        ]);
        Content::create([
        	'key' => 'dokumen-pmb',
        	'value' => '{"nama":"Surat Perjanjian Tugas Belajar Dalam Negeri","file":"default\/form5.pdf"}'
        ]);
        Content::create([
        	'key' => 'dokumen-pmb',
        	'value' => '{"nama":"Daftar Riwayat Hidup Peserta Pendidikan dan Tugas Belajar","file":"default\/form6.png"}'
        ]);
        Content::create([
        	'key' => 'dokumen-pmb',
        	'value' => '{"nama":"Surat Pernyataan Tidak Menikah Selama Mengikuti Pendidikan","file":"default\/form7.png"}'
        ]);
        Content::create([
        	'key' => 'dokumen-pmb',
        	'value' => '{"nama":"Surat Pernyataan Tidak Hamil Selama Mengikuti Pendidikan","file":"default\/form8.png"}'
        ]);
        Content::create([
        	'key' => 'dokumen-pmb',
        	'value' => '{"nama":"Surat Pernyataan Tidak Menuntuk Diangkat Aparatur Sipil Negara (PNS/P3K)","file":"default\/form9.png"}'
        ]);
        /* DOKUMEN */
    }
}
