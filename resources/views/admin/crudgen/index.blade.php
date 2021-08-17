@extends('layouts.master')

@push('css')
<link rel="stylesheet" href="{{ URL::asset('plugins/select2/css/select2.min.css')}}">
@endpush()
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('title') Admin Dashboard @endsection
@section('content')

<div style="padding-top: 20px">
    <section class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 style="padding-top: 10px" class="card-title">
                    <i class="fas fa-chart-pie mr-1"></i>Crud Generator
                </h3>
            </div>
            <form id="form_crud" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <input autofocus required placeholder="Model Name" name="model_name" type="text" id="model_name"
                                        class="input form-control">
                                    <small style="font-style: italic"> Format : CamelCase</small>
                                </div>
                                <div class="col-lg-12 form-group">
                                   
                                    
                                </div>
                                
                                {{-- <div class="form-group">
                                    <input placeholder="Icon Menu" name="" type="text" id=""
                                        class="input form-control">
                                
                                </div> --}}
                             
                            </div>
                            <div class="col-4">
                                {{-- <div class="form-group">
                                    <input autofocus required placeholder="Menu Title & Icon" name="menu" type="text" id="menu"
                                        class="input form-control">
                                    <small style="font-style: italic">Menu in Admin Sidebar</small>
                                </div> --}}
                               
                                {{-- <div style="margin:1px;" class="row">
                                    <div class="col-md-12">
                                        <div class="card-primary  card">
                                            <div style="background-color: #f2f2f2" class="card-header">
                                                <h3 style="color: darkslategray; font-weight: bold" class="card-title">
                                                    <i style="color: darkslategray" class="fas fa-text-width"></i>
                                                    Feature
                                                </h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                    <label class="form-check-label" for="exampleCheck1">Create
                                                        Seeder</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                    <label class="form-check-label" for="exampleCheck1">Soft
                                                        Delete</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                    <label class="form-check-label" for="exampleCheck1">Ajax
                                                        Crud</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div> --}}
                            </div>
                            <div class="col-4">
                                {{-- <div class="card-primary  card">
                                    <div style="background-color: #f2f2f2" class="card-header">
                                        <h3 style="color: darkslategray; font-weight: bold" class="card-title">
                                            <i style="color: darkslategray" class="fas fa-text-width"></i>
                                            Auth Role Setting
                                        </h3>
                                    </div>

                                    <div class="card-body">

                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="container">
                        <h5 align="left">Create Table</h5>
                        <form method="POST">
                            @csrf
                            <table class="table table-bordered" id="dynamicTable">
                                <tr style="background-color: #f2f2f2">
                                    <th style="width: 200px">Name</th>
                                    <th style="width: 150px">DataType</th>
                                    <th style="width: 60px">Length</th>
                                    <th style="width: 150px">Form Input</th>
                                    <th style="width: 55px">Null</th>
                                    <th hidden  style="width: 55px">AI</th>
                                    <th style="width: 100px">Unique</th>
                                    <th style="width: 100px">Show Data</th>
                                    <th style="width: 100px">Required</th>
                                    
                                    <th>Action</th>
                                    <th>Edit</th>
                                </tr>
                                <tr>
                                    <td><input  readonly="true" required type="text" name="addmore[0][name]" placeholder="Field Name"
                                            class="form-control" value="id" /></td>
                                    <td>
                                        <div style="width: 100%" class="form-group is-invalid">
                                            <select readonly="true" required id="addmore[0][select_data_type]"
                                                name="addmore[0][select_data_type]" class="select2 form-control"
                                                data-placeholder="Group">
                                                <option value="INT">INT</option>
                                                <option value="BIGINT">BIGINT</option>
                                                <option value="FLOAT">FLOAT</option>
                                                <option value="VARCHAR">VARCHAR</option>
                                                <option value="TEXT">TEXT</option>
                                            </select>
                                        </div>
                                    </td>
                                </td>
                                <td><input readonly="true"  type="number" name="addmore[0][length]" placeholder="length"
                                        class="form-control" style="width: 80px" /></td>
                                    <td>
                                        <div  style="width: 135px" class="form-group is-invalid">
                                            <select readonly="true" required id="addmore[0][form_input]" name="addmore[0][form_input]"
                                                class="select2 form-control" data-placeholder="Group">
                                                <option value="none">None</option>
                                                <optgroup label="Text Field">
                                                    <option value="text_field">Text</option>
                                                    <option value="text_area">Email</option>
                                                    <option value="text_area">Text Area</option>
                                                    <option value="password">Password</option>
                                                </optgroup>
                                                <optgroup label="Datetime">
                                                    <option value="date">Date Input</option>
                                                    <option value="date">Year Input</option>
                                                    <option value="date">Time Input</option>
                                                    <option value="date">Date/time Input</option>
                                                </optgroup>
                                                <optgroup label="Choice">
                                                    <option value="radio_group">Radio Group</option>
                                                    <option value="radio_group">Checkbox Group</option>
                                                    <option value="radio_group">Select Group</option>
                                                    <option value="radio_group">Select2 </option>
                                                </optgroup>
                                                <optgroup label="File Upload">
                                                    <option value="upload_file">File Upload</option>
                                                    <option value="upload_image">Image Upload</option>
                                                </optgroup>
                                                <optgroup label="Others">
                                                    <option value="upload_image">CKEditor</option>
                                                </optgroup>
                                               

                                            </select>
                                        </div>
                                 
                                    <td><input onclick="return false;" style="margin-left: 10px;" type="checkbox" name="addmore[0][null]"
                                            class="form-check-input"></td>
                                    <td hidden><input onclick="return false;" style="margin-left: 5px;" type="checkbox"
                                            name="addmore[0][auto_increment]" class="form-check-input" checked></td>

                                    <td><input onclick="return false;" style="margin-left: 5px;" type="checkbox" name="addmore[0][unique]"
                                            class="form-check-input"></td>
                                    <td><input onclick="return false;" style="margin-left: 5px;" type="checkbox" name="addmore[0][show]"
                                            class="form-check-input"></td>
                                            <td><input onclick="return false;" style="margin-left: 5px;" type="checkbox" name="addmore[0][fillable]"
                                                class="form-check-input" ></td>
                                            
                                    <td>
                                        <button type="button" name="add" id="add" class="btn btn-success"><i class="fas fa-plus"></i></button>
                                    </td>
                                    <td>
                                        <button type="button" name="edit" id="edit" class="btn btn-primary"><i class="fas fa-edit"></i></button>
                                    </td>
                                    
                                </tr>
                            </table>
                        </form>
                    </div>



                </div>
                {{-- card footer  --}}
                <div class="card-footer">

                    <button type="button" class="btn_generate btn btn-primary waves-effect waves-light"
                        style="float:right ;right: 10px; z-index: 40">GENERATE</button>
                    {{-- 
                        <button type="button" class="btn_preview_form btn btn-Success waves-effect waves-light"
                        style="margin-right: 10px; float:right ;right: 10px; z-index: 40">Preview Form</button> --}}
                </div>
            </form>
    </section>

    <div style="margin:1px;" class="row">
        {{-- <div class="col-md-4">
            <div class="card-primary  card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-text-width"></i>
                        Description
                    </h3>
                </div>
                <div class="card-body">
                    <dl>
                        <dt>- Show Data</dt>
                        <dd>Show/Hide field in DataTable</dd>
                        <dt>- AI</dt>
                        <dd> Auto Increment type (Default PK)</dd>
                        <dt>- Required</dt>
                        <dd>Create Form Request validation</dd>
                    </dl>
                </div>
            </div>
        </div> --}}

        <div class="col-md-12">
            <div style="min-height: 200px" class="card-primary card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-text-width"></i>
                        Console Log
                    </h3>
                </div>

                <div id="print_log" style="background-color: black" class="card-body">
                    <span style="color: white" class="blink">></span>
                </div>
                <script>
                    function blink_text() {
                        $('.blink').fadeOut(500);
                        $('.blink').fadeIn(500);
                    }
                    setInterval(blink_text, 500);
                </script>
            </div>
        </div>
    </div>
</div>

@endsection
@push('js')
<script src="{{ URL::asset('plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{ URL::asset('plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{ URL::asset('plugins/jquery-validation/additional-methods.min.js')}}"></script>
<script>
$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#select_data_type').select2();


    let validator = $("#form_crud").validate({
        rules: {
            name: "required",
            model_name: "required",
            'addmore[][name]' :"required"
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error); 
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });


    $('.btn_generate').click(function (e) {
        e.preventDefault();
        Swal.fire({
            title: 'Generate Crud' + $('#model_name').val(),
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.value) {
                if ($("#form_crud").valid()) {
                    generate('model');
                }
                else{
                    $("#model_name").focus();
                    toastr.warning('Please check input Form Data', {timeOut: 5000})
                }
           
                
            }
        });
    });

    function generate(tipe) {
        let form = document.getElementById('form_crud');
        let formData = new FormData(form);
        formData.append('tipe', tipe);
      
        $.ajax({
            type: 'POST',
            url: `{{ route('crud.generate')}}`,
            data: formData,
            processData: false,
            contentType: false,
            success: function (data, textStatus, jqXHR) {
                $( ".blink" ).remove();
                if (tipe == 'model') {
                    $("#print_log").append(`<p  style="color: white"> <span class=""> > </span>  Creating Model... <span style="font-weight:bold;font-style: italic; color:#0ddd0d">Success</span></p>`);
                    setTimeout(function () {
                        generate('controller');
                    }, 1000);
                }
                if (tipe == 'controller') {
                    $("#print_log").append(`<p  style="color: white"> <span class=""> > </span>  Creating Controller... <span style="font-weight:bold;font-style: italic; color:#0ddd0d">Success</span></p>`);
                    setTimeout(function () {
                        generate('view');
                    }, 1000);
                }
                if (tipe == 'view') {
                    $("#print_log").append(`<p  style="color: white"> <span class=""> > </span>  Creating View Blade... <span style="font-weight:bold;font-style: italic; color:#0ddd0d">Success</span></p>`);
                    setTimeout(function () {
                        generate('migration');
                    }, 1000);
                }
                if (tipe == 'migration') {
                    $("#print_log").append(`<p  style="color: white"> <span class=""> > </span>  Creating Migration... <span style="font-weight:bold;font-style: italic; color:#0ddd0d">Success</span></p>`);
                    setTimeout(function () {
                        generate('route');
                    }, 1000);
                }
                if (tipe == 'route') {
                    $("#print_log").append(`<p  style="color: white"> <span class=""> > </span>   Add New Route... <span style="font-weight:bold;font-style: italic; color:#0ddd0d">Success</span></p>`);
                    setTimeout(function () {
                        generate('action');
                    }, 1000);
                }
                if (tipe == 'action') {
                    $("#print_log").append(`<p  style="color: white"> <span class=""> > </span> Creating Action Blade... <span style="font-weight:bold;font-style: italic; color:#0ddd0d">Success</span></p>`);
                    setTimeout(function () {
                        generate('create');
                    }, 1000);
                }
                if (tipe == 'create') {
                    $("#print_log").append(`<p  style="color: white"> <span class=""> > </span> Creating  Create Form Blade... <span style="font-weight:bold;font-style: italic; color:#0ddd0d">Success</span></p>`);
                    setTimeout(function () {
                        generate('edit');
                    }, 1000);
                   
                }
                if (tipe == 'edit') {
                    $("#print_log").append(`<p  style="color: white"> <span class=""> > </span> Creating Edit Form Blade... <span style="font-weight:bold;font-style: italic; color:#0ddd0d">Success</span></p>`);
                    setTimeout(function () {
                        generate('validation');
                    }, 1000);
                }
                if (tipe == 'validation') {
                    $("#print_log").append(`<p  style="color: white"> <span class=""> > </span> Creating Validation Form Request... <span style="font-weight:bold;font-style: italic; color:#0ddd0d">Success</span></p>`);
                    $("#print_log").append(`<span style="font-weight:bold;font-style: italic; color:#0ddd0d">Crud Generator Conplete :) </span></p>`);
                }
            },
            error: function (response, textStatus, errorThrown) {
                $("#print_log").append(`<p  style="color: white"> <span class="blink"> > </span>  Error <span style="font-weight:bold;font-style: italic; color:red">Failed ->${response.responseJSON.message} </span></p>`);
            }
        });
    }

    let i = 0;
    $("#add").click(function () {
        ++i;
        $("#dynamicTable").append(`
           <tr>
            <td><input required type="text" name="addmore[${i}][name]" placeholder="Field Name" class="form-control" /></td>  
                              <td>
                              <div style="width: 100%" class="form-group is-invalid">
                                  <select required id="addmore[${i}][select_data_type]" name="addmore[${i}][select_data_type]" class="select2 form-control" data-placeholder="Group">
                                    <option value="INT">INT</option>
                                      <option value="BIGINT">BIGINT</option>
                                      <option value="FLOAT">FLOAT</option>
                                      <option value="VARCHAR">VARCHAR</option>
                                      <option value="TEXT">TEXT</option>
                                  </select>
                              </div>
                              </td> 
                              <td><input type="number" name="addmore[${i}][length]" placeholder="length" class="form-control" style="width: 80px" /></td>  
                              <td>
                                    <div style="width: 135px" class="form-group is-invalid">
                                        <select required id="addmore[${i}][form_input]"
                                                name="addmore[${i}][form_input]" class="select2 form-control"
                                                data-placeholder="Group">
                                                <optgroup label="Text Field">
                                                    <option value="text_field">Text</option>
                                                    <option value="text_area">Email</option>
                                                    <option value="text_area">Text Area</option>
                                                    <option value="password">Password</option>
                                                </optgroup>
                                                <optgroup label="Datetime">
                                                    <option value="date">Date Input</option>
                                                    <option value="date">Year Input</option>
                                                    <option value="date">Time Input</option>
                                                    <option value="date">Date/time Input</option>
                                                </optgroup>
                                                <optgroup label="Choice">
                                                    <option value="radio_group">Radio Group</option>
                                                    <option value="radio_group">Checkbox Group</option>
                                                    <option value="radio_group">Select Group</option>
                                                    <option value="radio_group">Select2 </option>
                                                </optgroup>
                                                <optgroup label="File Upload">
                                                    <option value="upload_file">File Upload</option>
                                                    <option value="upload_image">Image Upload</option>
                                                </optgroup>
                                                <optgroup label="Others">
                                                    <option value="upload_image">CKEditor</option>
                                                </optgroup>
                                        </select>
                                    </div>
                              </td> 
                          
                              <td><input style="margin-left: 10px;" type="checkbox"  name="addmore[${i}][null]" class="form-check-input"></td>  
                              <td hidden ><input style="margin-left: 5px;" type="checkbox"  name="addmore[${i}][auto_increment]" class="form-check-input"></td>  
                              <td><input style="margin-left: 5px;" type="checkbox"  name="addmore[${i}][unique]" class="form-check-input"></td>  
                              <td><input style="margin-left: 5px;" type="checkbox"  name="addmore[${i}][show]" class="form-check-input" checked></td>  
                              <td><input style="margin-left: 5px;" type="checkbox" name="addmore[${i}][fillable]" class="form-check-input" checked></td>
           <td><button type="button" class="btn btn-danger remove-tr"><i class="fas fa-backspace"></i></button></td>
           <td><button type="button" name="edit" id="edit" class="btn btn-primary"><i class="fas fa-edit"></i></button></td>
           </tr>`);
    });

    $(document).on('click', '.remove-tr', function () {
        $(this).parents('tr').remove();
    });


});
</script>
@endpush

