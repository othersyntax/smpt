<form action="/dokumen/simpan" method="POST">
    <div class="modal-body">
        @csrf
        <input type="hidden" name="tanah_id" value="{{ $tanahID }}">
        <input type="hidden" name="document_id" value="{{ $dokumen->document_id }}">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Keterangan</label>
                    {{ Form::text('pen_tahun', $dokumen->doc_desc, ['class'=>'form-control', 'id'=>'pen_tahun']) }}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Jenis</label>
                    {{ Form::select('pen_jenis',[''=>'--Sila pilih--', 'Geran'=>'Geran', 'Gambar'=>'Gambar', 'Lain'=>'Lain-lain'], $dokumen->doc_type, ['class'=>'form-control', 'id'=>'pen_jenis']) }}
                </div> 
            </div>            
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputFile">Dokumen</label>
                    <div class="input-group">
                      <div class="custom-file">
                        {{-- {{ Form::file('pen_doc', $penilaian->pen_doc, ['class'=>'custom-file-input', 'id'=>'pen_doc']) }} --}}
                        <input type="file" class="custom-file-input" name="doc_location" id="pen_doc" >
                        <label class="custom-file-label" for="exampleInputFile">Pilih dokumen</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Muat naik</span>
                      </div>
                    </div>
                  </div>
            </div>
        </div>        
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>