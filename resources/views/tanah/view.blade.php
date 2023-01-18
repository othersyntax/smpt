@extends('layout.main')
@section('custom-css')
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('/template/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('/template/plugins/toastr/toastr.min.css') }}">
    <style>
        #map {
            height: 500px;
        }

    </style>
@endsection
@section('breadcrumb')
    
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Maklumat Tanah</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Tanah</a></li>
                <li class="breadcrumb-item active">Utama</li>
                </ol>
            </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
@section('content')
    <div class="row">
    <div class="col-12">
        <input type="hidden" name="hide_tanah_id" value="{{ $tanah->tanah_id }}">
        <div class="row">
            <div class="col-12">
            {{-- <h5><i class="fas fa-map-marker"></i> NO. LOT: {{ Str::upper($tanah->tanah_no_lot) }}</h5>
            <i class="fas fa-globe"></i> {{ Str::upper($tanah->tanah_desc) }} --}}
            <div id="map"></div>
            </div>
        </div>


        <!-- Main content -->
        <div class="invoice p-3 mb-3">
        <!-- title row -->
        <div class="row">
            <div class="col-12">
                <h4 class="text-purple">
                    <i class="fas fa-globe"></i> {{ Str::upper($tanah->tanah_desc) }}
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
                <strong>{{ Str::upper($tanah->tanah_desc) }}</strong><br>
                <i>
                {{ $tanah->bandar->ban_nama_bandar }}<br>
                {{ $tanah->daerah->dae_nama_daerah }}<br>
                {{ $tanah->negeri->neg_nama_negeri }}<br>
                </i>
                <b>Koordinat:</b> {{ $tanah->tanah_latitud }} , {{ $tanah->tanah_longitud }} 
            </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
            <p class="lead">MAKLUMAT TANAH</p>
            <dl class="row">
                <dt class="col-sm-4">No Lot</dt>
                <dd class="col-sm-8">{{ $tanah->tanah_no_lot? $tanah->tanah_no_lot: 'Tiada rekod' }}</dd>
                <dt class="col-sm-4">No Hak Milik</dt>
                <dd class="col-sm-8">{{ $tanah->tanah_no_hakmilik ? $tanah->tanah_no_hakmilik: 'Tiada rekod' }}</dd>
                <dt class="col-sm-4">No JKPTG</dt>
                <dd class="col-sm-8">{{ $tanah->tanah_no_jkptg ? $tanah->tanah_no_jkptg: 'Tiada rekod' }}</dd>
                <dt class="col-sm-4">Keluasan</dt>
                <dd class="col-sm-8">{{ $tanah->tanah_luas }} ekar</dd>
                <dt class="col-sm-4">Status Tanah</dt>
                <dd class="col-sm-8">{{ $tanah->statusTanahDB->statt_desc }}</dd>
            </dl>                
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
            <p class="lead">MAKLUMAT PENYELENGGARAAN</p>
            <dl class="row">
                <dt class="col-sm-4">Status</dt>
                <dd class="col-sm-8">{{ statusAktif($tanah->tanah_status) }}</dd>
                <dt class="col-sm-4">Cipta Oleh</dt>
                <dd class="col-sm-8">{{ $tanah->tanah_crtby ? aliasPengguna($tanah->tanah_crtby) : 'Tiada Rekod' }}</dd>
                <dt class="col-sm-4">Cipta Pada</dt>
                <dd class="col-sm-8">{{ date('d-m-Y H:i', strtotime($tanah->tanah_created)) }}</dd>
                <dt class="col-sm-4">Ubah Oleh</dt>
                <dd class="col-sm-8">{{ $tanah->tanah_updby ? aliasPengguna($tanah->tanah_updby) : 'Tiada Rekod' }}</dd>
                <dt class="col-sm-4">Ubah Pada</dt>
                <dd class="col-sm-8">{{ date('d-m-Y H:i', strtotime($tanah->tanah_upddate)) }}</dd>
            </dl>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <!-- accepted payments column -->
            <div class="col-4">
                <p class="lead">CATATAN</p>
                <div class="callout">
                    <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                        @if (isset($tanah->tanah_memo))
                            {!! $tanah->tanah_memo !!}
                        @else
                            Tiada rekod
                        @endif
                        
                    </p>
                </div>
            </div>
            <div class="col-8">
                <p class="lead">UTILITI</p>
                <div class="col-12">
                    <div class="card card-purple card-outline card-tabs">
                        <div class="card-header p-0 pt-1 border-bottom-0">
                            <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Fasiliti</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Penilaian</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill" href="#custom-tabs-three-messages" role="tab" aria-controls="custom-tabs-three-messages" aria-selected="false">Senarai Dokumen</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-three-settings-tab" data-toggle="pill" href="#custom-tabs-three-settings" role="tab" aria-controls="custom-tabs-three-settings" aria-selected="false">Perkara Berbangkit</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-three-premium-tab" data-toggle="pill" href="#custom-tabs-premium-settings" role="tab" aria-controls="custom-tabs-premium-settings" aria-selected="false">Bayaran Premium</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-three-tabContent">
                                {{-- FASILIT --}}
                                <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                                    <div>
                                        <button id="add-new" class="btn btn-outline-success" style="float:right" data-toggle="modal" data-target="#modal-fas" value="fasiliti">
                                            <i class="fa fa-plus"></i> Tambah
                                        </button>
                                    </div>
                                    <div class="clearfix"></div>
                                    <table class="table mt-3">
                                        <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Fasiliti</th>
                                            <th>Keluasan</th>
                                            <th>#</th>
                                        </tr>
                                        </thead>
                                        <tbody>    
                                        @php
                                            $bilfas=1;
                                        @endphp
                                        @if ($fasiliti->count() > 0)
                                            @foreach ($fasiliti as $fas)
                                                <tr>
                                                    <td>{{ $bilfas++ }}</td>
                                                    <td>{{ $fas->fas_desc }}</td>
                                                    <td>{{ $fas->fas_size }} {{ $fas->fas_size_unit }}</td>
                                                    <td class="text-center">
                                                        <a href="#" class="my-edit" val="{{ $fas->fasiliti_id }}" data-toggle="modal" data-target="#modal-fas">
                                                            <i class="far fa-edit"></i>
                                                        </a>
                                                        <a href="#" class="my-del" val="{{ $fas->fasiliti_id }}">
                                                            <i class="fas fa-trash text-danger"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td class="text-center" colspan="4"><i>Tiada Rekod</i></td>
                                            </tr>
                                        @endif                        
                                        </tbody>
                                    </table>
                                </div>
                                {{-- PENILAIAN --}}
                                <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                                    <div>
                                        <button id="add-new-pen"  class="btn btn-outline-success" style="float:right" data-toggle="modal" data-target="#modal-fas" value="penilaian">
                                            <i class="fa fa-plus"></i> Tambah
                                        </button>
                                    </div>
                                    <div class="clearfix"></div>
                                    <table class="table  mt-3">
                                        <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Jenis</th>
                                            <th>Tahun</th>
                                            <th class="text-right">Nilai (RM)</th>
                                            <th>#</th>
                                        </tr>
                                        </thead>
                                        <tbody>    
                                        @php
                                            $bilpen=1;
                                        @endphp
                                        @if ($nilai->count() > 0)
                                            @foreach ($nilai as $nil)
                                                <tr>
                                                    <td>{{$bilpen++}}</td>
                                                    <td>{{ $nil->pen_jenis }}</td>
                                                    <td>{{ $nil->pen_tahun }}</td>
                                                    <td class="text-right">@convert( $nil->pen_nilai )</td>
                                                    <td class="text-center">
                                                        <a href="#" class="my-edit-pen" val="{{ $nil->penilaian_id }}" data-toggle="modal" data-target="#modal-pen">
                                                            <i class="far fa-edit"></i>
                                                        </a>
                                                        <a href="#" class="my-del-pen" val="{{ $nil->penilaian_id }}">
                                                            <i class="fas fa-trash text-danger"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td class="text-center" colspan="4"><i>Tiada Rekod</i></td>
                                            </tr>
                                        @endif                        
                                        </tbody>
                                    </table>
                                </div>
                                {{-- DOKUMEN --}}
                                <div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab">
                                    <div>
                                        <button id="add-new-doc" class="btn btn-outline-success" style="float:right" data-toggle="modal" data-target="#modal-fas" value="dokumen">
                                            <i class="fa fa-plus"></i> Tambah
                                        </button>
                                    </div>
                                    <div class="clearfix"></div>
                                    <table class="table mt-3">
                                        <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Keterangan</th>
                                            <th>Dokumen</th>
                                            <th>Papar</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                        $bildoc=1;
                                        @endphp
                                        @if ($dokumen->count() > 0)
                                            @foreach ($dokumen as $doc)
                                                <tr>
                                                    <td>{{ $bildoc++ }}</td>
                                                    <td>{{ $doc->doc_desc }}</td>
                                                    <td>{{ $doc->doc_type }}</td>
                                                    <td>
                                                        <a href="{{ URL:: asset('storage/files/'.$doc->doc_location)}}" title="Papar Dokumen" target="_blank">
                                                            <i class="fas fa-search text-purple"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td class="text-center" colspan="4"><i>Tiada Rekod</i></td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                                {{-- ISU --}}
                                <div class="tab-pane fade" id="custom-tabs-three-settings" role="tabpanel" aria-labelledby="custom-tabs-three-settings-tab">
                                    <div>
                                        <button id="add-new-isu" class="btn btn-outline-success" style="float:right" data-toggle="modal" data-target="#modal-fas" value="isu">
                                            <i class="fa fa-plus"></i> Tambah
                                        </button>
                                    </div>
                                    <div class="clearfix"></div>
                                    <table class="table mt-3">
                                        <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Jenis</th>
                                            <th>Perkara</th>
                                            <th>Mula</th>
                                            <th>Tamat</th>
                                            <th>#</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $bilisu=1;
                                            @endphp
                                            @if ($isu->count() > 0)
                                                @foreach ($isu as $i)
                                                    <tr>
                                                        <td>{{ $bilisu++ }}</td>
                                                        <td>{{ $i->isue_type_id ? $i->jenis->isuet_name : '-' }}</td>
                                                        <td>{{ $i->isue_desc }}</td>
                                                        <td>{{ date('d-m-Y', strtotime($i->isue_sdate)) }}</td>
                                                        <td>{{ statusAktif($i->isue_status) }}</td>
                                                        <td>
                                                            <a href="">
                                                                <i class="fas fa-edit text-purple"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td class="text-center" colspan="6"><i>Tiada Rekod</i></td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                {{-- Bayaran --}}
                                <div class="tab-pane fade" id="custom-tabs-premium-settings" role="tabpanel" aria-labelledby="custom-tabs-three-premium-tab">
                                    <div>
                                        <button id="add-new-bayar" class="btn btn-outline-success" style="float:right" data-toggle="modal" data-target="#modal-fas" value="premium">
                                            <i class="fa fa-plus"></i> Tambah
                                        </button>
                                    </div>
                                    <div class="clearfix"></div>
                                    <table class="table mt-3">
                                        <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Tahun</th>
                                            <th>Keterangan</th>
                                            <th>Tarikh</th>
                                            <th class="text-right">Amaun (RM)</th>
                                            <th>Papar</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $bilbyr=1;
                                            @endphp
                                            @if ($bayaran->count()>0)
                                                @foreach ($bayaran as $b)
                                                    <tr>
                                                        <td>{{ $bilbyr++ }}</td>
                                                        <td>{{ $b->bayar_year }}</td>
                                                        <td>{{ $b->bayar_desc }}</td>
                                                        <td>{{ date('d-m-Y', strtotime($b->bayar_date)) }}</td>
                                                        <td class="text-right">@convert($b->bayar_amaun)</td>
                                                        <td>
                                                            <a href="#" class="my-edit-bayar" val="{{ $b->bayaran_id }}" data-toggle="modal" data-target="#modal-fas">
                                                                <i class="far fa-edit"></i>
                                                            </a>
                                                            <a href="#" class="my-del" val="{{ $b->bayaran_id }}">
                                                                <i class="fas fa-trash text-danger"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td class="text-center" colspan="6"><i>Tiada Rekod</i></td>
                                                </tr>     
                                            @endif                                        
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </div>
        <!-- this row will not appear when printing -->
        <div class="row no-print">
            <div class="col-12">
            <a href="/tanah/senarai" rel="noopener" class="btn btn-danger"><i class="fas fa-chevron-left"></i> Kembali</a>
            <a href="#" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
            <a href="/tanah/ubah/{{ $tanah->tanah_id }}" class="btn btn-success float-right"><i class="fas fa-cog"></i> Kemakini
            </a>
            <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                <i class="fas fa-download"></i> Generate PDF
            </button>
            </div>
        </div>
        </div>
        <!-- /.invoice -->
    </div><!-- /.col -->
    </div><!-- /.row -->

    <div class="modal fade" id="modal-fas">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $err)
                                {{ $err }} <br>
                            @endforeach
                        </div>
                    @endif
                    <h4 class="modal-title"><p id="form-title"></p></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="my-form"></div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div class="modal fade" id="modal-pen">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $err)
                                {{ $err }} <br>
                            @endforeach
                        </div>
                    @endif
                    <h4 class="modal-title">Tambah Maklumat Penilaian</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="my-form-pen"></div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div class="modal fade" id="modal-doc">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $err)
                                {{ $err }} <br>
                            @endforeach
                        </div>
                    @endif
                    <h4 class="modal-title">Tambah Maklumat Dokumen</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="my-form-doc"></div>            
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div class="modal fade" id="modal-isu">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $err)
                                {{ $err }} <br>
                            @endforeach
                        </div>
                    @endif
                    <h4 class="modal-title">Tambah Maklumat Perkara Berbangkit</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="my-form-isu"></div>            
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection
@section('js')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD4lz4VTknTzKB3PCAhYnV3a1F6vJYDYt0&callback=initMap&v=weekly"
    defer
    ></script>
    <!-- SweetAlert2 -->
    <script src="{{ asset('/template/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- Toastr -->
    <script src="{{ asset('/template/plugins/toastr/toastr.min.js') }}"></script>
    <!-- date-range-picker -->
    <script src="{{ asset('/template/plugins/daterangepicker/daterangepicker.js') }}"></script>  
    <script>
        //MODAL
        // ADD
        $('#add-new').click(function(){
            let modul = 'fasiliti';
            myForm(modul);
        });
        $('#add-new-pen').click(function(){
            let modul = 'penilaian';
            myForm(modul);
        });
        $('#add-new-doc').click(function(){
            let modul = 'dokumen';
            myForm(modul);
        });
        $('#add-new-isu').click(function(){
            let modul = 'isu';
            myForm(modul);
        });
        $('#add-new-bayar').click(function(){
            let modul = 'bayaran';
            myForm(modul);
        });
        
        function myForm(modul){
            let tanah_id = $('[name=hide_tanah_id').val();
            // alert(modul);
            if(modul=='fasiliti'){
                $('#form-title').html('Tambah Maklumat Fasiliti');
            }
            else if(modul=='penilaian'){
                $('#form-title').html('Tambah Maklumat Penilaian');
            } 
            else if(modul=='dokumen'){
                $('#form-title').html('Tambah Maklumat Dokumen');
            }
            else if(modul=='isu'){
                $('#form-title').html('Tambah Maklumat Perkara Berbangkit');
            }
            else{
                $('#form-title').html('Tambah Maklumat Bayaran');                    
            }
            $('#my-form').load('/'+modul+'/myFormAdd/'+tanah_id);
        }

        // EDIT
        $('.my-edit').click(function(){
            let id = $(this).attr('val');
            ubah(id, 'fasiliti');
        });
        $('.my-edit-pen').click(function(){
            let id = $(this).attr('val');
            ubah(id, 'penilaian');
        });
        $('.my-edit-doc').click(function(){
            let id = $(this).attr('val');
            ubah(id, 'dokumen');
        });
        $('.my-edit-isu').click(function(){
            let id = $(this).attr('val');
            ubah(id, 'isu');
        });
        $('.my-edit-bayar').click(function(){
            let id = $(this).attr('val');
            ubah(id, 'bayaran');
        });

        function ubah(id, modul) {
            let tanah_id = $('[name=hide_tanah_id').val();
            if(modul=='fasiliti'){                    
                $('#form-title').html('Kemaskini Maklumat Fasiliti');                
            }
            else if(modul=='penilaian'){
                $('#form-title').html('Kemaskini Maklumat Penilaian');
            }
            else if(modul=='dokumen'){
                $('#form-title').html('Kemaskini Maklumat Dokumen');
            }
            else if(modul=='isu'){
                $('#form-title').html('Kemaskini Maklumat Perkara Berbangkit');
            }
            else{
                $('#form-title').html('Kemaskini Maklumat Bayaran');
            } 
            $('#my-form').load('/'+modul+'/myFormEdit/'+tanah_id+'/'+id);               
        }

        //DELETE           
        $('.my-del').click(function(){
            let modul = 'fasiliti';
            let id = $(this).attr('val');
            myDelete(id, modul);
            // alert(fasiliti_id);
        });

        $('.my-del-pen').click(function(){
            let modul = 'penilaian';
            let id = $(this).attr('val');
            myDelete(id, modul);
            // alert(fasiliti_id);
        });

        // Ubah balik coding delete
        function myDelete(delid, modul) {            
            $.ajax({
                url: "/"+modul+"/delete",                
                data: {
                    "_token": $('#csrf-token')[0].content,
                    "delid":delid
                },
                type: 'post',
                success: function(result){
                    toastr.warning(result);
                }
            });
            // alert(fasiliti_id);
        }

        //TOASTR
        $(function() {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

            // $('.toastrDefaultSuccess').click(function() {
                // toastr.success('aa');
            // });
        });
        //EDN TOASTR

    </script>
    <script>
        //Load Google Maps---START
        let map;

        function initMap() {
            
            const myLatLng = { lat: parseFloat('{{ $tanah->tanah_latitud }}'), lng: parseFloat('{{ $tanah->tanah_longitud }}') };
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 16,
                center: myLatLng,
            });
            new google.maps.Marker({
                position: myLatLng,
                map,
                title: "{{ $tanah->tanah_desc }}",
                label: "{{ $tanah->tanah_desc }}"                
            });
        }

        window.initMap = initMap();
        //Load Google Maps---END
    </script>
@endsection