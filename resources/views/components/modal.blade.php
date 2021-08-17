<div class="col-sm-6 col-md-4 col-xl-3">
    <div id="{{ $id }}"  class="modal fade" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true"
      tabindex="-1">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title mt-0" id="modal_title">{{ $title }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <div class="row" id="form_editor">
              <div class="col-12">
                <form  id="{{ $form }}" enctype="multipart/form-data">
                  @csrf

                  <div class="form-group">
                    <input  name="id" type="text"
                      id="id" hidden class="input form-control">
                  </div>

                  {{ $slot }}

                  <div class="modal-footer justify-content-between">
                    <button type="button" data-dismiss="modal" class="btn_kembali btn btn-secondary">Batal</button>
                    <button  value="Validate" class="btn_action btn btn-primary">Simpan</button>
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