<form method="GET" action="{{route('nilai.index')}}" accept-charset="UTF-8" class="form-inline">
    <div class="form-group">
        <input class="form-control" placeholder="Nama Siswa" name="cari_nama" type="text">
    </div>
    <div class="form-group">
        <input class="form-control" placeholder="Nama Nis" name="cari_nis" type="text">
    </div>
    <div class="form-group">
        <select class="form-control" name="cari_kelas" >
            <option value="">Pilih Kelas</option>
            @foreach($kelas as $key)
            <option value="{{ $key->id_kelas."-".$key->nama_kelas }}">{{ $key['tingkat']."-".$key->nama_kelas }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <select class="form-control" name="cari_angkatan" >
            <option value="">Cari tahun angkatan</option>
            <?php 
                 $tahun = date('Y');
                 for ($i=$tahun; $i >= 1980 ; $i--) { ?>
                    <option value="{{$i}}">{{$i}}</option>
            <?php }?>
        </select>
    </div>
    <div class="form-group">
        <button class="btn btn-primary" type="submit">Cari</i></button>
    </div>  
</form> 
