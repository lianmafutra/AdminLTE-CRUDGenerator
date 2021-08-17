<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
  
    <span class="brand-text font-weight-light">Crud Generator</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ URL::asset('dist/img/avatar5.png')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Administrator</a>
      </div>
    </div>
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        {{-- start menu--}}
        <li class="nav-item ">
          <a href="/" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

     
        <li class="nav-item">
          <a  onclick="logout()" href="javascript:void(0)" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p style="color: rgb(255, 98, 98)">
            Logout
            </p>
          </a>
        </li>   
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        {{-- logout form --}}

         {{--end start menu--}}
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
<div class="col-sm-6 col-md-4 col-xl-3">
  <div class="modal_ubah_password modal fade" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true"
    tabindex="-1">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title mt-0" id="modal_layanan_title">Ubah Password</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <div class="row" id="form_editor2">
            <div class="col-12">
                <form id="form_ubah_password" enctype="multipart/form-data" method="POST">
                  @csrf
                <div class="form-group">
                  <label for="example-text-input" class="col-md-12 col-form-label">Password Lama</label>
                  <input required placeholder="Password Lama" name="pass_lama" type="password"
                    id="pass_lama" class="input form-control">
                </div>
                <div class="form-group">
                  <label for="example-text-input" class="col-md-12 col-form-label">Password Baru</label>
                  <input required  placeholder="Password Baru" name="pass_baru" type="password"
                    id="pass_baru" class="input form-control">
                </div>
                <div class="form-group">
                  <label for="example-text-input" class="col-md-12 col-form-label">Password Konfirmasi</label>
                  <input required  placeholder="Password Konfirmasi" name="pass_baru_conf" type="password"
                    id="pass_baru_conf" class="input form-control">
                </div>               
                <div class="modal-footer justify-content-between">
                  <button type="button" data-dismiss="modal" class="btn_kembali btn btn-secondary">Batal</button>
                  <button  value="Validate" class="btn btn-primary">Ubah</button>
                </div>
              </form>
            </div>
            <!-- end col -->
          </div>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
</div>
@push('js')
@endPush

