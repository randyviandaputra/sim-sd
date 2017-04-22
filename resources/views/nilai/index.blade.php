@extends('pages.home')

@section('content')

<div class="row">
    <div class="container">
    	<div class="col-sm-12 register">
    		<h3>{{ $title }}</h3>
    		@include('layouts.partials.alert')
			<div class="row">
  				<div class="col-md-12">
					@include('nilai._search')
					<br>
					<div class="panel panel-primary">
						<div class="panel-body">
							<table class="table table-hover table-bordered" id="table">
							  <thead>
							  	<th>No.</th>
							  	<th>NIS</th>
							  	<th>Nama Siswa</th>
							  	<th>Kelas</th>
							  	<th>Mata Pelajaran</th>
							  	<th>Nilai Tugas</th>
							  	<th>Nilai Absensi</th>
							  	<th>Nilai UTS</th>
							  	<th>Nilai UAS</th>
							  	<th>Nilai Rata-Rata</th>
							  	<th>Semester</th>
							  	<th>Angkatan</th>
							  	<th>&nbsp;</th>
							  </thead>
							  <tbody>
							  	<?php $i = 1; ?>
							  	@foreach($data as $row)
							  	<tr>
							  		<td>{{ $i++ }}</td>
							  		<td>{{ $row->no_induk_siswa }}</td>
							  		<td>{{ $row->nama_siswa }}</td>
							  		<td>{{ $row->kelas }}</td>
							  		<td>{{ $row->nama_matpel }}</td>
							  		<td>{{ $row->nilai_tugas }}</td>
							  		<td>{{ $row->nilai_absensi }}</td>
							  		<td>{{ $row->nilai_uts }}</td>
							  		<td>{{ $row->nilai_uas }}</td>
							  		<td>{{ $row->nilai_rata_rata }}</td>
							  		<td>{{ $row->semester }}</td>
							  		<td>{{ $row->angkatan }}</td>
							  		<td style="text-align:center;width:15%;">
					                    <a href="{{ URL::route('nilai.edit', array($row->id_nilai, $row->semester)) }}" class="btn btn-xs btn-primary" title="Edit">
					 	                   <i class="fa fa-edit"></i></a>
					                </td>
							  	</tr>
							  	@endforeach
							  </tbody>
							</table>
						</div>
					</div>
					<?php echo $data->render(); ?>
  				</div>
  			</div>
    	</div>
    </div>
</div>

@endsection()



