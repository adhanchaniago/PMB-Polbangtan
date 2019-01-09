<div class="row top_tiles">
    <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-edit"></i></div>
            <div class="count">500</div>
            <h3>Daftar Akun</h3>
            <p>Pelamar yang baru mendaftarkan akun</p>
        </div>
    </div>
    <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-check-square-o"></i></div>
            <div class="count">300</div>
            <h3>Aktivasi Akun</h3>
            <p>Pelamar yang sudah mengaktifkan akunnya</p>
        </div>
    </div>
    <div class="animated flipInY col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-sign-in"></i></div>
            <div class="count">280</div>
            <h3>Daftar PMB</h3>
            <p>Pelamar yang sudah memilih jalur dan jurusan</p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-7">
        <div class="x_panel">
            <div class="x_title">
                <h2>Hasil Verifikasi Dokumen <small>Grafik</small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <canvas id="canvas1i" style="margin: 5px 10px 10px 0"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="x_panel">
            <div class="x_title">
                <h2>Hasil Verifikasi Dokumen <small>Per Institusi</small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="table">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Institusi</th>
                        <th>Lulus</th>
                        <th>Gugur</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>Polbangtan Medans</td>
                        <td>30</td>
                        <td>10</td>
                        <td>40</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Polbangtan Bogor</td>
                        <td>30</td>
                        <td>20</td>
                        <td>50</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Polbangtan Yogyakarta</td>
                        <td>30</td>
                        <td>20</td>
                        <td>50</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Polbangtan Malang</td>
                        <td>50</td>
                        <td>10</td>
                        <td>60</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Polbangtan Gowa</td>
                        <td>20</td>
                        <td>20</td>
                        <td>40</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Polbangtan Manokwari</td>
                        <td>20</td>
                        <td>20</td>
                        <td>40</td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="2">Total</td>
                        <td>180</td>
                        <td>100</td>
                        <td>280</td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

@section('js')
    <!-- Doughnut Chart -->
    <script>
        $(document).ready(function() {
            var canvasDoughnut,
                options = {
                    legend: {
                        display: true,
                        position: 'bottom',
                    },
                    responsive: true
                };

            new Chart(document.getElementById("canvas1i"), {
                type: 'doughnut',
                tooltipFillColor: "rgba(51, 51, 51, 0.55)",
                data: {
                    labels: [
                        "Lulus",
                        "Gugur"
                    ],
                    datasets: [{
                        data: [180, 100],
                        backgroundColor: [
                            "#E95E4F",
                            "#9B59B6",
                        ],
                        hoverBackgroundColor: [
                            "#E74C3C",
                            "#B370CF",
                        ]

                    }]
                },
                options: options
            });
        });
    </script>
    <!-- /Doughnut Chart -->
@endsection