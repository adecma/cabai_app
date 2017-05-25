<div class="list-group">
    <!-- <a href="#" class="list-group-item disabled"><strong>Menu Master</strong></a> -->
    <a href="{{ route('beranda') }}" class="list-group-item {{ active_menu(Route::currentRouteName(), 'beranda', 0, 7) }}">Beranda</a>
    @if(Auth::user())
		<a href="{{ route('gejala.index') }}" class="list-group-item {{ active_menu(Route::currentRouteName(), 'gejala', 0, 6) }}">Gejala</a>
		<a href="{{ route('penyakit.index') }}" class="list-group-item {{ active_menu(Route::currentRouteName(), 'penyakit', 0, 8) }}">Penyakit</a>
		<a href="{{ route('hubungan.index') }}" class="list-group-item {{ active_menu(Route::currentRouteName(), 'hubungan', 0, 8) }}">Hubungan</a>
		<a href="{{ route('riwayat.index') }}" class="list-group-item {{ active_menu(Route::currentRouteName(), 'riwayat', 0, 7) }}">Riwayat</a>
    @endif

    <a href="{{ route('konsultasi.index') }}" class="list-group-item {{ active_menu(Route::currentRouteName(), 'konsultasi', 0, 10) }}">Konsultasi</a>
    <a href="{{ route('infopenyakit') }}" class="list-group-item {{ active_menu(Route::currentRouteName(), 'infopenyakit', 0, 12) }}">Tentang Penyakit</a>
    @if(Auth::guest())
    	<a href="{{ route('login') }}" class="list-group-item {{ active_menu(Route::currentRouteName(), 'login', 0, 5) }}">Login Admin</a>
    @endif
</div>