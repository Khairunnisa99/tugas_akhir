<html>
<head>
	<title>Laporan</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Rapat : Manajemen </h4>
	</center>

	<table class='table table-bordered'>
		<thead>
            @php $i=0 @endphp
			@foreach($rapat as $p)
			<tr>
				<th>Nama Rapat</th>
                <td>{{$p->namaRapat}}</td>
            </tr>
            <tr>
				<th>Waktu Rapat</th>
                <td>{{$p->WaktuRapat}}</td>
            </tr>
            <tr>
				<th>Agenda Rapat</th>
                <td>{{$p->KeteranganRapat}}</td>
            </tr>
            <tr>
				<th>Peserta Rapat</th>
                <td>{{$p->PesertaRapat}}</td>
            </tr>
            <tr>
				<th>Notulen Rapat</th>
                <td>{{$p->NotulenRapat}}</td>
            </tr>
            <tr>
                <th>Materi Rapat</th>
                <td>{{$p->MateriRapat}}</td>
            </tr>
            <tr>
                <th>Rekomendasi</th>
                <td>{{$p->Rekomendasi}}</td>
            </tr>
            <tr>
                <th>Tindak Lanjut</th>
                <td>{{$p->TindakLanjut}}</td>
			</tr>
		</thead>

			@endforeach
	</table>

</body>
</html>
