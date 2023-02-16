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
                    <div class="col-sm-12 mt-2">
                        <table class="table table-striped">
                            <thead>
                                <th class="text-center">Bil</th>
                                <th>Negeri</th>
                                <th>Mukim/Daerah</th>
                                <th>Premis</th>                                
                                <th class="text-center">Penyewaan</th>
                            </thead>
                            <tbody>
                                @if ($sewa->count() > 0)
                                    @php $no = $sewa->firstItem() @endphp
                                    @foreach ($sewa as $s)                                                                  
                                        <tr>
                                            <td class="text-center">{{ $no++ }}</td>
                                            <td>{{ $s->neg_nama_negeri }}</td>
                                            <td>{{ $s->ban_nama_bandar }}</td>
                                            <td>{{ $s->tanah_desc }}</td>                                                                        
                                            <td class="text-center">
                                                <a href="/premis/view/{{ $s->tanah_id }}" title="Papar Penyewaan">
                                                    ({{ $s->bilangan }}) <i class="fas fa-search text-purple"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" class="text-center"><i>Tiada Rekod</i></td>
                                    </tr>
                                @endif                       
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-12 mt-1">
                        {{ $sewa->links() }}
                    </div>                      
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')

@endsection