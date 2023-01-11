<form action="/bayaran/simpan" method="POST">
    <div class="modal-body">
        @csrf
        <input type="hidden" name="tanah_id" value="{{ $tanahID }}">
        <input type="hidden" name="bayaran_id" value="{{ $bayaran->bayaran_id }}">

        {{-- {{ Form::hidden('fas_tanah_id', $tanah->tanah_desc )}} --}}
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Tahun</label>
                    {{ Form::text('bayar_year', $bayaran->bayar_year, ['class'=>'form-control', 'id'=>'bayar_year']) }}
                </div>
            </div>                                    
            <div class="col-md-4" > 
                <div class="form-group">
                    <label>Amaun (RM)</label>
                    {{ Form::text('bayar_amaun', $bayaran->bayar_amaun, ['class'=>'form-control', 'id'=>'bayar_amaun']) }}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Tarikh Bayaran</label>
                    <div class="input-group date" id="bayar_date" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#bayar_date" value="{{ date('d-m-Y', strtotime($bayaran->bayar_date)) }}"/>
                        <div class="input-group-append" data-target="#bayar_date" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Keterangan</label>
                    {{ Form::text('bayar_desc', $bayaran->bayar_desc, ['class'=>'form-control', 'id'=>'bayar_desc']) }}
                </div>
            </div> 
        </div>
        
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>