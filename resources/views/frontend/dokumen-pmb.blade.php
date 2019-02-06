@extends('layouts.frontend')

@section('content')
<section class="contact-page spad pt-0">
	<div class="container">
		<div class="contact-form spad pb-0">
			<div class="section-title text-center">
				<h3>Brosur PMB 2019/2020</h3>
			</div>
            <table class="table table-striped">
            	<thead>
	            	<tr>
	            		<th>No</th>
	            		<th>Nama Dokumen</th>
	            		<th></th>
	            	</th>
            	</thead>
            	<tbody>
            	@php $no = 1; @endphp
        		@foreach($dokumen as $key => $value)
        			<tr>
						<td>{{ $no }}</td>
						<td>{{ $value->dokumen['nama'] }}</td>
						<td><a class="btn btn-default" href="{{ route('viewfile') . '?file=' . $value->dokumen['file'] }}" target="_blank"><i class="fa fa-download"></i></a></td>
					</tr>
					@php $no++; @endphp
        		@endforeach
            	</tbody>
            </table>
		</div>
	</div>
</section>
@endsection