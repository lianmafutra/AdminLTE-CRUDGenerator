<div class="form-group  is-invalid">
    <label for="example-text-input" class="col-md-12 col-form-label">{{ $label }}</label>
    <div class="select2-blue">
      <select required  id="{{ $id }}"  name="roles[]" class="select2 item-menu" multiple="multiple" data-placeholder="{{ $placeholder }}" data-dropdown-css-class="select2-blue" style="width: 100%;">
         {{ $item }}
      </select>
    </div>
  </div>