<form method="GET" action="{{route('kelas.index')}}" accept-charset="UTF-8" class="form-inline">
	<div class="form-group">
        <input class="form-control" placeholder="Nama Kelas" name="cari_nama" type="text">
    </div>
    <div class="form-group">
        <select class="form-control" name="cari_guru" >
            <option value="">Pilih Wali Kelas</option>
            @foreach($guru as $key)
            <option value="{{ $key->id_guru }}">{{ $key->nama_guru }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <button class="btn btn-primary" type="submit">Cari</i></button>
    </div>	
</form> 
