@extends('layouts.frontend')

@section('content')
<section class="contact-page spad pt-0">
	<div class="container">
		<div class="contact-form spad pb-0">
			<div class="section-title text-center">
				<h3>Jadwal PMB 2019/2020</h3>
			</div>
            <table class="table table-striped">
            	<thead>
	            	<tr>
	            		<th>No</th>
	            		<th>Keterangan</th>
	            		<th>Tanggal</th>
	            	</th>
            	</thead>
            	<tbody>
            	@php $no = 1; @endphp
        		@foreach($jadwal as $key => $value)
        			<tr>
						<td>{{ $no }}</td>
						<td>{{ $value->nama }}</td>
						<td>
							@if ($value->tanggal_awal == $value->tanggal_akhir)
								{{ $value->tanggal_awal }}
							@else
								{{ $value->tanggal_awal }} - {{ $value->tanggal_akhir }}
							@endif
						</td>
					</tr>
					@php $no++; @endphp
        		@endforeach
            	</tbody>
            </table>
		</div>
	</div>
</section>
@endsection