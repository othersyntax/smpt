@extends('layout.main')
@section('custom-css')
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('/template/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('/template/plugins/toastr/toastr.min.css') }}">
@endsection
@section('breadcrumb')
    
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Maklumat Pengguna</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Pengguna</a></li>
                <li class="breadcrumb-item active">Ubah</li>
                </ol>
            </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-purple card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle"
                                src="{{ asset('/template/dist/img/itsmeareyulookingfor.png') }}"
                                alt="User profile picture">
                        </div>
                        <h3 class="profile-username text-center">Usup bin Keram</h3>
                        <p class="text-muted text-center">Pentadbir Sistem</p>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
                <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#profil" data-toggle="tab">Profil</a></li>
                            <li class="nav-item"><a class="nav-link" href="#modul" data-toggle="tab">Modul</a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="profil">
                                <form class="form-horizontal">
                                    <div class="form-group row">
                                        <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                                        <div class="col-sm-9">
                                            {{ Form::text('user_name',null,['class'=>'form-control', 'id'=>'user_name']) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nokp" class="col-sm-3 col-form-label">No Kad Pengenalan</label>
                                        <div class="col-sm-4">
                                            {{ Form::text('user_nokp',null,['class'=>'form-control', 'id'=>'user_nokp']) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="emel" class="col-sm-3 col-form-label">Emel</label>
                                        <div class="col-sm-9">
                                            {{ Form::email('user_email', null, ['class'=>'form-control', 'id'=>'user_email']) }} 
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nokp" class="col-sm-3 col-form-label">Katalaluan</label>
                                        <div class="col-sm-4">
                                            {{ Form::password('user_pass1', ['class'=>'form-control', 'id'=>'user_pass1']) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nokp" class="col-sm-3 col-form-label">Sah Katalaluan</label>
                                        <div class="col-sm-4">
                                            {{ Form::password('user_pass2', ['class'=>'form-control', 'id'=>'user_pass2']) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label for="ptj" class="col-sm-3 col-form-label">JKN / PTJ / PK</label>
                                        <div class="col-sm-9">
                                            {{ Form::select('user_jkn', pusatTjwb(), null, ['class'=>'form-control', 'id'=>'user_jkn']) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="hadcapaian" class="col-sm-3 col-form-label">Had Capaian</label>
                                        <div class="col-sm-9">
                                        {{ Form::select('user_role', [''=>'--Sila pilih--','1'=>'[1] - Pentadbir','2'=>'[2] - Pegawai','3'=>'[3] - Kakitangan'], null, ['class'=>'form-control', 'id'=>'user_role']) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-3 col-sm-9">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="modul">
                                @php
                                $modul = \Illuminate\Support\Facades\DB::select("SELECT
                                            tbluser_module.user_module_id,
                                            tbluser_module.um_user_id,
                                            if(tbluser_module.um_status=1,'',
                                            tbluser_module.um_modul_id,
                                            tblmodule.mod_name
                                            FROM
                                            tbluser_module
                                            LEFT JOIN tblmodule ON tbluser_module.um_modul_id = tblmodule.module_id");
                                @endphp
                                <table class="table">                                    
                                    <thead>
                                    <tr>
                                        <th>Bil.</th>
                                        <th>Modul</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Tanah</td>
                                        <td>Aktif</td>
                                        <td class="text-right py-0 align-middle">
                                        <div class="btn-group btn-group-sm">
                                            <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                            <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                        </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Premis Demis</td>
                                        <td>Aktif</td>
                                        <td class="text-right py-0 align-middle">
                                        <div class="btn-group btn-group-sm">
                                            <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                            <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                        </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Utiliti</td>
                                        <td>Aktif</td>
                                        <td class="text-right py-0 align-middle">
                                        <div class="btn-group btn-group-sm">
                                            <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                            <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                        </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>                                
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                    <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
    <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
@endsection
@section('js')
    <script src="{{ asset('/template/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('/template/plugins/jquery-validation/additional-methods.min.js') }}"></script>

    <script>

        $('#neg_kod_negeri').change(function() {
            let neg_kod_negeri = $(this).val();
            getDaerah(neg_kod_negeri, 'dae_kod_daerah','#list-daerah');
        });

        //AJAX function. get list of daerah
        function getDaerah(kod_negeri, inputname, list) {
            let url = '/ajax/ajax-daerah?neg_kod_negeri=' + kod_negeri + '&inputname=' + inputname;
            $.get(url, function(data) {
                // bg event pd dropdwon yg baru
                // alert(list);
                $(list).html(data);
                $('#dae_kod_daerah').change(function() {
                    let dae_kod_daerah = $(this).val();
                    let url1 = '/ajax/ajax-mukim?dae_kod_daerah=' + dae_kod_daerah + '&inputname=ban_kod_bandar';
                    $.get(url1, function(data1) {
                        $('#list-mukim').html(data1);
                    });
                });
            });
        }


        $('#insert_form').validate({
            rules: {
                tanah_desc: {
                    required: true
                },
                tanah_no_lot: {
                    required: true
                },
                tanah_jenis_hakmilik: {
                    required: true
                },
                tanah_ptj_id: {
                    required: true
                },
                tanah_pk_id: {
                    required: true
                },
                neg_kod_negeri: {
                    required: true
                },
                dae_kod_daerah: {
                    required: true
                },
                ban_kod_bandar: {
                    required: true
                },
                tanah_longitud: {
                    required: true
                },
                tanah_latitud: {
                    required: true
                },
                tanah_luas: {
                    required: true
                },
                tanah_status_tanah: {
                    required: true
                }
            },
            messages: {
                tanah_desc: {
                    required: "Sila masukkan Keterangan Lot Tanah",
                },
                tanah_no_lot: {
                    required: "Sila masukkan No Lot Tanah",
                },
                tanah_jenis_hakmilik: {
                    required: "Sila pilih Jenis Hak Milik",
                },
                tanah_ptj_id: {
                    required: "Sila pilih Pusat Tanggungjawab"
                },
                tanah_facilities: {
                    required: "Sila pilih Ada Fasiliti?"
                },
                neg_kod_negeri: {
                    required: "Sila pilih Negeri"
                },
                dae_kod_daerah: {
                    required: "Sila pilih Daerah"
                },
                ban_kod_bandar: {
                    required: "Sila pilih Mukim/Bandar"
                },
                tanah_longitud: {
                    required: "Sila masukkan Longitud"
                },
                tanah_latitud: {
                    required: "Sila masukkan Latitud"
                },
                tanah_luas: {
                    required: "Sila masukkan Keluasan Tanah"
                },
                tanah_status_tanah: {
                    required: "Sila masukkan Status Tanah"
                }
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    </script>
@endsection