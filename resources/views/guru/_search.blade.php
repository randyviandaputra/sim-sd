<form method="GET" action="{{route('guru.index')}}" accept-charset="UTF-8" class="form-inline">
	<div class="form-group">
        <input class="form-control" placeholder="Nama Guru" name="cari_nama" type="text">
    </div>
    <div class="form-group">
        <select class="form-control" name="cari_matpel" >
            <option value="">Pilih Matpel</option>
            @foreach($matpel as $key)
            <option value="{{ $key->id_matpel }}">{{ $key->nama_matpel }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <button class="btn btn-primary" type="submit">Cari</i></button>
    </div>	
</form> 
