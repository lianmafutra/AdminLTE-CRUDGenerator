<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>
  {{-- template head css --}}
  @include('layouts.head')
  @toastr_css
</head>
<style>
.select2-container .select2-selection--single {

 height: 35px !important;

}

</style>

@section('body')
@show

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
  <div class="wrapper">
    @include('sweetalert::alert')
  
    {{-- template navbar --}}
    @include('layouts.navbar')

    {{-- template sidebar --}}
    @include('layouts.sidebar')

    {{-- template content --}}
    <div class="content-wrapper">
    
      <section class="content">
        <div class="container-fluid">
          @yield('content')
        </div>
      </section>
    </div>

    {{-- template footer --}}
    @include('layouts.footer')



  </div>

  {{-- template footer script js --}}
  @include('layouts.footer-script')

  <script>
    function logout(){
    Swal.fire({
      title: 'Apakah anda yakin logout ?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, keluar',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        $("#logout-form").submit();
      } 
    })
  }
  </script>
  @toastr_js
  @toastr_render
</body>

</html>