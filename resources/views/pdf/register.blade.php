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
									PT. Tekno Mandala Kreatif<br>
									Intive Studio<br>
									+62 812 3454 3344<br>
								</address>
							</div>
						</div>
                    <center><h3>Stakeholder Register</h3></center>
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
                                        <td>Dokumen Ini Merupakan kumpulan klien dari yang telah bekerjasama dengan PT. Tekno Mandala Kreatif</td>
                                    </tr>
                                    <tr>
                                        <th>Dipersiapkan Oleh</th>
                                        <td>PT. Tekno Mandala Kreatif</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>									
                    </div>
                    <br>
                    <br>
                    <div class="row">
                            <div class="col-md-10">
                                <h3>Registered</h3>
                                <table class="table table-striped">
                                    <thead>
                                        <tr class="line">
                                            <td><strong>No.</strong></td>
                                            <td class="text-center"><strong>Name</strong></td>
                                            <td class="text-center"><strong>Address</strong></td>
                                            <td class="text-center"><strong>Phone</strong></td>
                                            <td class="text-center"><strong>Status</strong></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1 ?>
                                        @foreach($data as $p)
                                        <tr>
                                            <td><?php echo $i; $i++;?></td>
                                            <td><strong>{{ $p->name }}</strong><br></td>
                                            <td><strong>{{ $p->addres }}</strong><br></td>
                                            <td><strong>{{ $p->phone }}</strong></td>
                                            <td><strong>Klien</strong></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>									
                    </div>
                <div class="row">
                    <div class="col-md-9 text-right identity">
                        <?php
                        echo "Surabaya, " . date("Y-m-d"). "<br>";
                        ?>
                        <p>Pimpinan Intive Studio<br>
                            <br>
                            <p></p>
                        <strong>M. Bayu Caesandra</strong></p>
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