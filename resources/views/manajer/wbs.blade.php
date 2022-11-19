@extends('layouts.main')

@section('container')
		<link href="{{ asset('assets/css/style2.css') }}" rel="stylesheet" type="text/css"/>
		<div class="mt-4">
			<center>
				<h1>Work Breakdown Structure</h1>
				<h3>PT. Tekno Mandala Kreatif</h3>
			</center>
		</div>
		<div class="container">
			<div class="row mb-5 mt-5 pt-3">
				<div class="tree">
					<ul>
						<li> <a href="#"><span>Project IT</span></a>
						<ul>
							<li><a href="#"><span>Konsep</span></a> </li>
                            <li><a href="#"><span>Analisa</span></a> </li>
                            <li><a href="#"><span>Desain</span></a> </li>
                            <li><a href="#"><span>Implementasi</span></a> </li>
                            <li><a href="#"><span>Dukungan</span></a> </li>
				        </ul>
                        <ul>
							<li><a href="#"><span>Meeting</span></a> </li>
                            <li><a href="#"><span>Analisa Scope</span></a></li>
                            <li><a href="#"><span>Desain UI</span></a> </li>
                            <li><a href="#"><span>Coding</span></a> </li>
                            <li><a href="#"><span>Maintenence</span></a> </li>
				        </ul>
                        <ul>
                            <li><a href="#"><span>Fix Konsep</span></a></li>
                            <li><a href="#"><span>Analisa Sistem</span></a></li>
                            <li><a href="#"><span>Implementasi</span></a></li>
                            <li><a href="#"><span>Testing</span></a></li>
                            <li><a href="#"><span>Tambahan Lain</span></a></li>
                        </ul>
			            </li>
		            </ul>
	            </div>
            </div>
        </div>
@endsection