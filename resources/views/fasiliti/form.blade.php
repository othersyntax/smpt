<form action="/fasiliti/simpan" method="POST">
    <div class="modal-body">
        @csrf
        <input type="hidden" name="tanah_id" value="{{ $tanahID }}">
        <input type="hidden" name="fasiliti_id" value="{{ $fasiliti->fasiliti_id }}">

        {{-- {{ Form::hidden('fas_tanah_id', $tanah->tanah_desc )}} --}}
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Nama Fasiliti</label>
                    {{ Form::text('fas_desc', $fasiliti->fas_desc, ['class'=>'form-control', 'id'=>'fas_desc']) }}
                </div> 
            </div>
            <div class="col-md-12"> 
                <div class="form-group">
                    <label>Saiz Kegunaan</label>
                    {{ Form::select('fas_guna',['Keseluruhan'=>'Keseluruhan', 'Sebahagian'=>'Sebahagian'], $fasiliti->fas_guna, ['class'=>'form-control', 'id'=>'fas_size_unit']) }}
                </div>
            </div>
            <div class="col-md-6" id="showSaiz">
                <div class="form-group">
                    <label>Saiz</label>
                    {{ Form::text('fas_size', $fasiliti->fas_size, ['class'=>'form-control', 'id'=>'fas_size']) }}
                </div>
            </div>                          
            <div class="col-md-6"  id="showUnit"> 
                <div class="form-group">
                    <label>Unit Ukuran</label>
                    {{ Form::select('fas_size_unit',[''=>'--Sila pilih--', 'Kaki'=>'Kaki', 'Meter'=>'Meter', 'CM'=>'CM', 'Ekar'=>'Ekar'], $fasiliti->fas_size_unit, ['class'=>'form-control', 'id'=>'fas_size_unit']) }}
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>
<script>
    $('[name=fas_guna]').change(showHideSize);
    showHideSize()

    function showHideSize(){
        let guna = $('[name=fas_guna]').val();
        if(guna =='Keseluruhan'){
            $('#showSaiz').hide();
            $('#showUnit').hide();
        }
        else{
            $('#showSaiz').show();
            $('#showUnit').show();
        }
        // alert(guna);
    }
</script>
