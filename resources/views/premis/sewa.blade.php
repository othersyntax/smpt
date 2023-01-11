@extends('layout.main')
@section('breadcrumb')
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Sewaan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Premis</a></li>
                <li class="breadcrumb-item active">Sewaan</li>
                </ol>
            </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="/tanah/senarai">
                        @csrf
                        <div class="card card-purple card-outline">
                            <div class="card-body">
                                <div class="row">
                                    <div class="row invoice-info">
                                        <div class="col-sm-3 invoice-col">
                                            <p class="lead">PENYEWA</p>
                                            <address>
                                                <strong>{{ Str::upper('ERA DYMAX ENTERPRISE') }}</strong><br>
                                                <i>
                                                No 3, Jalan Kasturi<br>
                                                Shah Alam, Selangor<br>
                                                </i>
                                            </address>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-5 invoice-col">
                                            <p class="lead">MAKLUMAT SEWAAN</p>
                                            <dl class="row">
                                                <dt class="col-sm-4">No Perjanjian</dt>
                                                <dd class="col-sm-8">BPL/ILKKMKK/S/10</dd>
                                                <dt class="col-sm-4">Tapak</dt>
                                                <dd class="col-sm-8">Ruang Kedai Kafeteria (Stall 1)</dd>
                                                <dt class="col-sm-4">Keluasan (MP)</dt>
                                                <dd class="col-sm-8">81.0</dd>
                                                <dt class="col-sm-4">Amaun (RM)</dt>
                                                <dd class="col-sm-8">2,090.00</dd>
                                                <dt class="col-sm-4">Bayaran Terakhir</dt>
                                                <dd class="col-sm-8">28 Julai 2022</dd>
                                                <dt class="col-sm-4">Tunggakan (RM)</dt>
                                                <dd class="col-sm-8">4,180.00</dd>
                                            </dl>                
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4 invoice-col">
                                            <p class="lead">MAKLUMAT PENYELENGGARAAN</p>
                                            <dl class="row">
                                                <dt class="col-sm-4">Status</dt>
                                                <dd class="col-sm-8">Aktif</dd>
                                                <dt class="col-sm-4">Cipta Oleh</dt>
                                                <dd class="col-sm-8">Pentadbir Sistem</dd>
                                            </dl>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <div class="col-12">
                                        <p class="lead">RINGKASAN BAYARAN</p>
                                        <table class="table">
                                            <tr class="text-center">
                                                <td>JAN</td>
                                                <td>FEB</td>
                                                <td>MAC</td>
                                                <td>APR</td>
                                                <td>MEI</td>
                                                <td>JUN</td>
                                                <td>JUL</td>
                                                <td>OGO</td>
                                                <td>SEP</td>
                                                <td>OKT</td>
                                                <td>NOV</td>
                                                <td>DIS</td>
                                            </tr>
                                            <tr class="text-center">
                                                <td><i class="fa fa-circle text-green"></i></td>
                                                <td><i class="fa fa-circle text-green"></i></td>
                                                <td><i class="fa fa-circle text-green"></i></td>
                                                <td><i class="fa fa-circle text-green"></i></td>
                                                <td><i class="fa fa-circle text-red"></i></td>
                                                <td><i class="fa fa-circle text-red"></i></td>
                                                <td><i class="fa fa-circle text-green"></i></td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-12">
                            <p class="lead">BAYARAN</p>
                            <table class="table table-striped">
                                <thead>
                                    <th class="text-center">Bil</th>
                                    <th>Tarikh</th>
                                    <th>No Resit</th>
                                    <th class="text-right">Amaun (RM)</th>
                                    <th class="text-right">Tunggakan (RM)</th>                               
                                    <th class="text-center">Tindakan</th>
                                </thead>
                                <tbody>                                        
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td>10/01/2022</td>
                                        <td>202242010636R300084</td>
                                        <td class="text-right">2,090.00</td>
                                        <td class="text-right">0.00</td>                                                                       
                                        <td class="text-center">
                                            <a href="/premis/sewa" title="Kemaskini tanah">
                                                <i class="fas fa-search text-purple"></i>
                                            </a>
                                            <a href="#" title="Kemaskini tanah">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr> 
                                    <tr>
                                        <td class="text-center">2</td>
                                        <td>10/01/2022</td>
                                        <td>202242010636R300111</td>
                                        <td class="text-right">2,090.00</td>
                                        <td class="text-right">0.00</td>                                                                       
                                        <td class="text-center">
                                            <a href="/premis/sewa" title="Kemaskini tanah">
                                                <i class="fas fa-search text-purple"></i>
                                            </a>
                                            <a href="#" title="Kemaskini tanah">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">3</td>
                                        <td>10/01/2022</td>
                                        <td>202242010636R300234</td>
                                        <td class="text-right">2,090.00</td>
                                        <td class="text-right">0.00</td>                                                                       
                                        <td class="text-center">
                                            <a href="/premis/sewa" title="Kemaskini tanah">
                                                <i class="fas fa-search text-purple"></i>
                                            </a>
                                            <a href="#" title="Kemaskini tanah">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr> 
                                    <tr>
                                        <td class="text-center">4</td>
                                        <td>10/01/2022</td>
                                        <td>202242010636R300201</td>
                                        <td class="text-right">2,090.00</td>
                                        <td class="text-right">0.00</td>                                                                       
                                        <td class="text-center">
                                            <a href="/premis/sewa" title="Kemaskini tanah">
                                                <i class="fas fa-search text-purple"></i>
                                            </a>
                                            <a href="#" title="Kemaskini tanah">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">5</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td class="text-right">0.00</td>
                                        <td class="text-right">2,090.00</td>                                                                       
                                        <td class="text-center">
                                            <a href="/premis/sewa" title="Kemaskini tanah">
                                                <i class="fas fa-search text-purple"></i>
                                            </a>
                                            <a href="#" title="Kemaskini tanah">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">6</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td class="text-right">0.00</td>
                                        <td class="text-right">4,180.00</td>                                                                       
                                        <td class="text-center">
                                            <a href="/premis/sewa" title="Kemaskini tanah">
                                                <i class="fas fa-search text-purple"></i>
                                            </a>
                                            <a href="#" title="Kemaskini tanah">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">7</td>
                                        <td>10/01/2022</td>
                                        <td>202242010636R300145</td>
                                        <td class="text-right">2,090.00</td>
                                        <td class="text-right">4,180.00</td>                                                                       
                                        <td class="text-center">
                                            <a href="/premis/sewa" title="Kemaskini tanah">
                                                <i class="fas fa-search text-purple"></i>
                                            </a>
                                            <a href="#" title="Kemaskini tanah">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>                             
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4" class="text-right">Jumlah (RM)</td>
                                        <td class="text-right"><b>10,450.00</b></td>
                                        <td class="text-right"></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>                       
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')

@endsection