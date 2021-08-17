@extends('layouts.master')

@push('css')
<link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet" />
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet"/><link href="testing_add_css" rel="stylesheet"/>
@endpush()
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('title') Admin Dashboard @endsection
@section('content')<div style="padding-top: 20px" class="row">
  <section class="col-lg-12 ">
    <div class="card">
      <div class="card-header">
        <h3 style="padding-top: 10px" class="card-title">
          <i class="fas fa-chart-pie mr-1"></i> Create Data Student
        </h3>
     
      </div>
      <div class="card-body">
         @if ($errors->any())
          <div class="alert alert-danger">
              <strong>Gagal,</strong> Terjadi Kesalahan, Periksa inputan dengan benar<br><br>
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif
        <form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-lg-6 ">
                <div class="form-group">
    <label for="example-text-input" class="col-form-label">name</label>
    <input value="{{old("name ") }}"  placeholder="" name="name" type="text" id="name" class="input form-control">
</div><div class="form-group">
               <label>Upload photo <span style="font-size: 10px; color:#ff7272; font-style : italic"> (Jenis file : jpg, png | Max : 100kb)</span> </label>
               <input type="file" data-max-file-size="100kb" class="filepond" accept="image/jpeg, image/png" name="photo">
                </div>
            </div>
       
      </div>
      <div class="card-footer">
                <a class="btn btn-success waves-effect waves-light" style="margin-right:10px; float:left ;right: 10px; z-index: 40" href="{{ route('student.index') }}">Back</a>
          <button type="submit" class="btn_save btn btn-primary waves-effect waves-light" style="float:left ;right: 10px; z-index: 40">Save</button>

      </div>
       </form>
    </div>
  </section>
</div>

@endsection
@push('js')

<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-encode/dist/filepond-plugin-file-encode.js"></script>
<script src="https://unpkg.com/filepond/dist/filepond.js"></script>
<script src="https://nielsboogaard.github.io/filepond-plugin-get-file/dist/filepond-plugin-get-file.js"></script>

<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-poster/dist/filepond-plugin-file-poster.js"></script>
<script type="text/javascript">


  FilePond.registerPlugin(FilePondPluginImagePreview,
      FilePondPluginFileValidateType,FilePondPluginGetFile,
      FilePondPluginFileValidateSize,FilePondPluginFilePoster ,FilePondPluginFileEncode );
  
    const pond_photo = FilePond.create( document.querySelector('input[name="photo"]'),{
        storeAsFile: true,
        files: [
        {
            source: '/uploads/'+{!! json_encode($student->photo) !!},
        },
    ],  
    });
        
        

  </script>

@endpush