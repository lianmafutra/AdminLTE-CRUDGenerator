@extends("layouts.master")

@push("css")
  <link rel="stylesheet" href="{{ URL::asset("plugins/datatables-bs4/css/dataTables.bootstrap4.min.css") }}">
  <link rel="stylesheet" href="{{ URL::asset("plugins/datatables-responsive/css/responsive.bootstrap4.min.css") }}">
  <link rel="stylesheet" href="{{ URL::asset("plugins/datatables-buttons/css/buttons.bootstrap4.min.css") }}">
  <link rel="stylesheet"href="{{ URL::asset("plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css") }}">
  <link rel="stylesheet" href="{{ URL::asset("plugins/select2/css/select2.min.css")}}">
  <link rel="stylesheet" href="{{ URL::asset("css/custom-button.css")}}">
  <link rel="stylesheet" href="{{ URL::asset("plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css")}}">
@endpush()
<meta name="csrf-token" content="{{ csrf_token() }}">
@section("title") Admin Dashboard @endsection
@section("content")

<div style="padding-top: 20px" class="row">
    <section class="col-lg-12 ">
        <div class="card">
            <div class="card-header">
                <h3 style="padding-top: 10px" class="card-title">
                    <i class="fas fa-chart-pie mr-1"></i>student</h3>
               <a href="{{ route('student.create') }}"><button type="button" class="btn_tambah btn btn-primary waves-effect waves-light"
                    style="float:right ;right: 10px; z-index: 40">Add student</button></a>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                  <table id="table-student" class="table-bordered table table-hover row-border nowrap"
                    style="border-collapse: collapse; cursor:pointer; border-spacing: 0; width: 100%;">
                    <thead style="background-color: #f1f1f1">
                      <tr>
                           <th>No</th>
                            <th>Name</th>
                     <th>Photo</th>
                     
                           <th>Created_At</th>
                           <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>

            </div>
        </div>
    </section>
</div>

@endsection
@push("js")
<script src="{{ URL::asset("plugins/datatables/jquery.dataTables.min.js") }}"></script>
<script src="{{ URL::asset("plugins/datatables-bs4/js/dataTables.bootstrap4.min.js") }}"></script>
<script src="{{ URL::asset("plugins/datatables-responsive/js/dataTables.responsive.min.js") }}"></script>
<script src="{{ URL::asset("plugins/datatables-responsive/js/responsive.bootstrap4.min.js") }}"></script>
<script src="{{ URL::asset("plugins/bs-custom-file-input/bs-custom-file-input.min.js") }}"></script>
<script src="{{ URL::asset("plugins/jquery-validation/jquery.validate.min.js")}}"></script>
<script src="{{ URL::asset("plugins/jquery-validation/additional-methods.min.js")}}"></script>
<script src="{{ URL::asset("plugins/select2/js/select2.full.min.js")}}"></script>

<script src="{{ URL::asset("plugins/moment/moment.min.js") }}"></script>
<script src="{{ URL::asset("plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js") }}"></script>
<script>
    $(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

        let table_student = $("#table-student").DataTable({
            processing: true,
            serverSide: true,
            ajax: `{{ route('student.index')}}`,
            columns: [{
                    data: "DT_RowIndex",
                    orderable: false,
                    searchable: false
                },
                {data : 'name'},
{data : 'photo'},
 

                 {
                    data: "created_at",
                },

                {
                    data: "action",
                    orderable: false,
                    searchable: false,
                    width: "40px"

                },
            ]

        });


        //destroy
           $(document).on('click', '.btn_delete', function (e) {
            e.preventDefault();
            let data =  $('#table-student').DataTable().row( $(this).parents('tr')).data();
            let url = $(this).attr('href');
            Swal.fire({
                title: 'Apakah anda yakin Menghapus Data ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Batal'
                }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        success: function(data, textStatus, jqXHR) {
                            table_student.draw();
                        toastr.success('Data Deleted Successfully');
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                        
                        }
                    });
                }
                })
            });

    });
</script>
@endpush