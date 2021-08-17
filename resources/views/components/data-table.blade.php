<div class="table-responsive">
    <table id="{{ $id }}" class="table-bordered table table-hover row-border nowrap"
      style="border-collapse: collapse; cursor:pointer; border-spacing: 0; width: 100%;">
      <thead style="background-color: #f1f1f1">
        <tr>
          @foreach ($th as $item => $value)
           <th>{{ $value }}</th>
          @endforeach
         
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>