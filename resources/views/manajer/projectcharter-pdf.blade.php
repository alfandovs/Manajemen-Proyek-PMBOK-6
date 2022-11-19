<html>
<head>
<style>
body{margin-top:20px;
background:#eee;
}

.invoice {
    padding: 30px;
}

.invoice h2 {
	margin-top: 0px;
	line-height: 0.8em;
}

.invoice .small {
	font-weight: 300;
}

.invoice hr {
	margin-top: 10px;
	border-color: #ddd;
}

.invoice .table tr.line {
	border-bottom: 1px solid #ccc;
}

.invoice .table td {
	border: none;
}

.invoice .identity {
	margin-top: 10px;
	font-size: 1.1em;
	font-weight: 300;
}

.invoice .identity strong {
	font-weight: 600;
}


.grid {
    position: relative;
	width: 100%;
	background: #fff;
	color: #666666;
	border-radius: 2px;
	margin-bottom: 25px;
	box-shadow: 0px 1px 4px rgba(0, 0, 0, 0.1);
}
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row">
		<!-- BEGIN INVOICE -->
		<div class="col-xs-12">
			<div class="grid invoice">
				<div class="grid-body">
					<div class="invoice-title">
						<div class="row">
							<div class="col-xs-12">
								<center><img src="assets/images/logo.png" alt="" height="100"></center>
							</div>
						</div>
						<br>
					</div>
					<hr>
					<div class="row">
						<div class="col-xs-6">
							<address>
								<strong>From:</strong><br>
								PT. Tekno Mandala Kreatif<br>
								Intive Studio<br>
								+62 812 3454 3344<br>
							</address>
						</div>
						<div class="col-xs-6 text-right">
							<address>
							@foreach($td as $new)
								<strong>To:</strong><br>
								{{ $new->client}}<br>
								{{ $new->name }}<br>
							@endforeach
							</address>
						</div>
					</div>
					<center><h3> Project Management Plan</h3></center>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-md-10">
                            <table class="table table-striped">
                                <thead>
                                    <tr class="line">
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1 ?>
                                    <tr>
                                        <th>Abstrak</th>
                                        <td>Dokumen Ini Merupakan Dokumen Project Management Plan yang berisi tentang semua informasi proyek yang akan dikerjakan</td>
                                    </tr>
                                    <tr>
                                        <th>Dipersiapkan Oleh</th>
                                        <td>PT. Tekno Mandala Kreatif</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>									
                    </div>
					<div class="row">
						<div class="col-md-10">
							<h3>Aktivitas</h3>
							<table class="table table-striped">
								<thead>
									<tr class="line">
										<td><strong>#</strong></td>
										<td class="text-center"><strong>Date</strong></td>
										<td class="text-center"><strong>Deskripsi</strong></td>
										<td class="text-right"><strong>Biaya</strong></td>
									</tr>
								</thead>
								<tbody>
									<?php $i=1 ?>
									@foreach($gn as $gnc)
									<tr>
										<td><?php echo $i; $i++;?></td>
										<td><strong>{{ $gnc->start }}</strong><br></td>
										<td><strong>{{ $gnc->kegiatan }}</strong><br></td>
										<td class="text-right">Rp. {{ number_format($gnc->biaya, 2, ',','.') }}</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>									
					</div>
					<h3>ESTIMASI BIAYA</h3>
					@foreach ($data as $old)
					@if($old->biaya > '1')
						<div class="row">
							<div class="col-md-10">
								<table class="table table-striped">
									<thead>
										<tr class="line">
											<td><strong>#</strong></td>
											<td class="text-center"><strong>Date</strong></td>
											<td class="text-right"><strong>Biaya Lama</strong></td>
										</tr>
									</thead>
									<tbody>
										<?php $i=1 ?>
										@foreach($data as $old)
										@if($old->biaya > '1')
										<tr>
											<td><?php echo $i; $i++;?></td>
											<td><strong>{{ $old->tgl_ubah }}</strong><br></td>
											<td class="text-right">Rp. {{ number_format($old->biaya, 2, ',','.') }}</td>
										</tr>
										@endif
										@endforeach
									</tbody>
								</table>
							</div>									
						</div>
					@endif
					@endforeach
					<div class="row">
						<div class="col-md-10">
							<table class="table table-striped">
								<thead>
									<tr class="line">
										<td><strong>#</strong></td>
										<td class="text-center"><strong>Name</strong></td>
										<td class="text-center"><strong>Deskripsi</strong></td>
										<td class="text-right"><strong>Biaya Total</strong></td>
									</tr>
								</thead>
								<tbody>
									<tr>
									@foreach($td as $new)
										<td>1</td>
										<td><strong>{{ $new->name }}</strong><br></td>
										<td><strong>{{ $new->deskripsi }}</strong><br></td>
										<td class="text-right">Rp. {{ number_format($new->biaya, 2, ',','.') }}</td>
									@endforeach
									</tr>
								</tbody>
							</table>
						</div>									
					</div>
					<div class="row">
						<div class="col-md-9 text-right identity">
							<?php
							echo "Surabaya, " . date("Y-m-d"). "<br>";
							?>
							<p>Pemilik Proyek<br>
								<br>
								<p></p>
						@foreach($td as $new)
							<strong>{{ $new->client }}</strong></p>
						@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END INVOICE -->
		</div>
	</div>
</body>
</html>
