
<nav class="navbar navbar-custom">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="">
        SD 
         <?php 
            $nama_sekolah =  App\Models\datasekolah::where('id',1)->first();
        ?>
        {{$nama_sekolah->nama_sekolah}}
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-custom" id="bs-example-navbar-collapse-1">
       @if(Auth::check())
            <ul class="nav navbar-nav">
                    <li>
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        @if(Auth::user()->level == 3)
                            Data Master
                        @else
                            Menu
                        @endif
                     <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            @if(Auth::user()->level == 3)
                                <li><a href="{{ route('siswa.index') }}">Siswa</a></li>
                                <li><a href="{{ route('guru.index') }}">Guru</a></li>
                                <li><a href="{{ route('kelas.index') }}">Kelas</a></li>
                                <li><a href="{{ route('matpel.index') }}">Matpel</a></li>
                            @elseif(Auth::user()->level == 2)
                                <li><a href="{{ route('nilai.show', Auth::user()->user_id) }}">Nilai</a></li>
                            @elseif(Auth::user()->level == 1)
                                <li><a href="{{ route('siswa.index') }}">Siswa</a></li>
                                <?php 
                                    $walikelas =  App\Models\kelas::where('id_guru',Auth::user()->user_id)->first();
                                ?>
                                @if($walikelas)
                                <li><a href="{{ route('walikelas.index') }}">Wali Kelas</a></li>
                                @endif
                                <li><a href="{{ route('nilai.index') }}">Nilai</a></li>
                            @else

                            @endif
                        </ul>
                    </li>
                </li>
                </ul>
                 <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hello, {{ Auth::user()->username }} <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            @if(Auth::user()->level == 1)
                                <li><a href="{{ route('guru.detail', Auth::user()->user_id) }}">Profile</a></li>
                            @elseif(Auth::user()->level == 2)
                                <li><a href="{{ route('siswa.detail', Auth::user()->user_id) }}">Profile</a></li>
                            @endif
                             <li><a href="{{route('logout')}}">Logout</a></li>
                        </ul>
                    </li>
                 </ul>
            @endif

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


