@extends('layouts.app')

@section('content')
    <div class="panel panel-success">
        <div class="panel-heading">
        	Beranda
        </div>

        <div class="panel-body">
        	<h3 class="text-center">
        		SELAMAT DATANG DI WEBSITE SISTEM PAKAR DIAGNOSA PENYAKIT IKAN MAS
        	</h3>
        	<br>
            <p class="text-justify">
            <img src="{{ asset('img/ikanmas.jpg') }}" style="float:left; margin: 0 9px 3px 0px; width: 17%; " class="img-responsive" alt="Image"> Ikan mas (<i>Conprinus carpio</i>) merupakan salah satu komoditas perikanan air tawar yang saat ini menjadi primadona di sub sector perikanan.Ikan ini di pasaran memiliki nilai ekonomis tinggi dan jumlah permintaan yang besar terutama untuk beberapa pasar local di Kalimantan selatan. Ikan mas atau yang juga dikenal dengan sebutan <i>Common carp </i> adalah ikan yang sudah mendunia. Hal ini tentunya menjadikan peluang untuk pengembangan budidaya ikan mas.
			<br><br>
			Website Sistem Pakar ini bertujuan untuk memberikan kemudahan bagi masyarakat dalam mendiagnosa penyakit Ikan Mas. Sistem pakar ini menggunakan metode Teorema Bayes dalam mencari nilai kepastiannya.
			<br><br>
			Untuk melakukan proses pendiagnosaan penyakit caranya cukup mudah, yaitu pengguna cukup memasukkan nama, pertanyaan-pertanyaan dari sistem berupa gejala yang terdapat pada ikan mas. Setelah itu system akan menampilkan hasil diagnosa penyakit pada ikan mas.
            </p>
        </div>
    </div>
@endsection
