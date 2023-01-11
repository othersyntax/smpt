@extends('layout.main')
@section('breadcrumb')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Premis</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Premis</a></li>
                <li class="breadcrumb-item active">Papar</li>
                </ol>
            </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
@section('content')
    <div class="row">
    <div class="col-12">
        <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row">
                <div class="col-12">
                    <h4 class="text-primary">
                        <i class="fas fa-globe"></i> ILKKM Sungai Buloh
                        <small class="float-right">Tarikh : {{ date('d-m-Y') }}</small>
                    </h4>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                <p class="lead">LOKASI</p>
                <address>
                    <strong>{{ Str::upper('ILKKM Sungai Buloh') }}</strong><br>
                    <i>
                    Sungai Buloh<br>
                    Selangor<br>
                    </i>
                </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                <p class="lead">MAKLUMAT PREMIS</p>
                <dl class="row">
                    <dt class="col-sm-4">No Lot</dt>
                    <dd class="col-sm-8">Lot 1378</dd>
                    <dt class="col-sm-4">Lot</dt>
                    <dd class="col-sm-8">Institut Latihan KKM Seremban</dd>
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
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <table class="table table-striped">
                        <thead>
                            <th class="text-center">Bil</th>
                            <th>No Perjanjian</th>
                            <th>Penyewa</th>
                            <th>Tapak</th>
                            <th class="text-right">Kadar (RM)</th>                               
                            <th class="text-center">Tindakan</th>
                        </thead>
                        <tbody>                                        
                            <tr>
                                <td class="text-center">1</td>
                                <td>BPL/ILKKMKK/S/10</td>
                                <td>ERA DYMAX ENTERPRISE</td>
                                <td>Ruang Kedai Kafeteria (Stall 1)</td>
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
                                <td class="text-center">2</td>
                                <td>BIL.(5)dlm.ILKKMSB/300-1/3/0/1 Jld.4</td>
                                <td>Berkat Tiga Satu Enterprise</td>
                                <td>Ruang Kedai Kafeteria (Stall 2)</td>
                                <td class="text-right">480.00</td>                                                                       
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
                                <td>BIL.(7)dlm.ILKKMSB/300-1/3/0/1 Jld.4</td>
                                <td>Berkat Tiga Satu Enterprise</td>
                                <td>Ruang Kedai Kafeteria (Stall 3)</td>
                                <td class="text-right">450.00</td>                                                                       
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
                                <td colspan="4" class="text-right">Jumlah Sebulan (RM)</td>
                                <td class="text-right"><b>3,030.00</b></td>
                                <td class="text-right"></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

            </div>
        </div>
    </div>
    </div><!-- /.row -->    
@endsection
@section('js')
    
@endsection