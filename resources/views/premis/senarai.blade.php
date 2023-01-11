@extends('layout.main')
@section('breadcrumb')
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Senarai Tanah</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Utama</a></li>
                <li class="breadcrumb-item active">Tanah</li>
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
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Negeri</label>
                                            {{ Form::select('neg_kod_negeri', negeri(), session('neg_kod_negeri'), ['class'=>'form-control', 'id'=>'neg_kod_negeri']) }}
                                        </div>                                    
                                    </div>
                                    <div class="col-md-4">                                
                                        <div class="form-group">
                                            <label>Daerah/Mukim</label>
                                            <span id="list-daerah">
                                                {{ Form::select('dae_kod_daerah', [''=>'--Sila pilih--'], session('dae_kod_daerah'), ['class'=>'form-control', 'id'=>'dae_kod_daerah']) }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Premis</label>
                                            {{ Form::text('tanah_desc',session('tanah_desc'),['class'=>'form-control']) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="submit" class="btn btn-success" value="Carian" style="float:right;">
                                        <a href="/tanah/senarai" class="btn bg-purple" style="float:right;">Reset Carian</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row mt-2">
                    <table class="table table-striped">
                        <thead>
                            <th class="text-center">Bil</th>
                            <th>Negeri</th>
                            <th>Mukim/Daerah</th>
                            <th>Premis</th>                                
                            <th class="text-center">Tindakan</th>
                        </thead>
                        <tbody>                                        
                            <tr>
                                <td class="text-center">1</td>
                                <td>Selangor</td>
                                <td>Sungai Buloh</td>
                                <td>ILKKM Sungai Buloh</td>                                                                        
                                <td class="text-center">
                                    <a href="/premis/view/" title="Kemaskini tanah">
                                        <i class="fas fa-search text-purple"></i>
                                    </a>
                                    <a href="/premis/ubah/" title="Kemaskini tanah">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">2</td>
                                <td>Negeri Sembilan</td>
                                <td>Seremban</td>
                                <td>ILKKM Seremban</td>                                                                        
                                <td class="text-center">
                                    <a href="/premis/view/" title="Kemaskini tanah">
                                        <i class="fas fa-search text-purple"></i>
                                    </a>
                                    <a href="/premis/ubah/" title="Kemaskini tanah">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">3</td>
                                <td>Sabah</td>
                                <td>Kota Kinabalu</td>
                                <td>ILKKM Kota Kinabalu</td>                                                                        
                                <td class="text-center">
                                    <a href="/premis/view/" title="Kemaskini tanah">
                                        <i class="fas fa-search text-purple"></i>
                                    </a>
                                    <a href="/premis/ubah/" title="Kemaskini tanah">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    </div>                        
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')

@endsection