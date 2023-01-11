<form action="/dokumen/simpan" method="POST">
    <div class="modal-body">
        @csrf
        <input type="hidden" name="tanah_id" value="{{ $tanahID }}">
        <input type="hidden" name="document_id" value="{{ $isu->isue_id }}">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Jenis</label>
                    {{ Form::select('isue_type_id',$jenisIsu, $isu->isue_type_id, ['class'=>'form-control', 'id'=>'isue_type_id']) }}
                </div> 
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Tarikh Mula</label>
                    <div class="input-group date" id="isue_sdate" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#isue_sdate"/>
                        <div class="input-group-append" data-target="#isue_sdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Tarikh Tamat</label>
                    <div class="input-group date" id="isue_edate" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#isue_edate"/>
                        <div class="input-group-append" data-target="#isue_edate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Keterangan</label>
                    <textarea class="form-control" name="isue_desc" id="isue_desc" rows="5"></textarea>
                </div>
            </div>
        </div>        
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>
<script>
    $(function () {
        //Date picker
        $('#isue_edate').datetimepicker({
            format: 'L'
        });
        //Date picker
        $('#isue_edate').datetimepicker({
            format: 'L'
        });
    });
</script>