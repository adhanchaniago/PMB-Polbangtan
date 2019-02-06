<div class="row">
    <div class="col-md-12">
        <h5>Institusi: <strong>{{ $institusi->nama }}</strong></h5>
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
                <h2>Hasil Verifikasi Dokumen <small>Per Jurusan</small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Jurusan</th>
                            <th>Lulus</th>
                            <th>Gugur</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php $no=1; @endphp
                    @foreach($jurusan as $key => $value)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $value->nama }}</td>
                            <td>10</td>
                            <td>5</td>
                            <td>15</td>
                        </tr>
                        @php $no++; @endphp
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2">Total</td>
                            <td>30</td>
                            <td>15</td>
                            <td>45</td>
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
                        data: [30, 15],
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