<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Data Statistik Penduduk</title>
	<script src="{{ URL::asset('plugins/jquery/jquery.min.js')}}"></script>
  	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	  <link rel="stylesheet" href="{{ URL::asset('css/materialize.min.css') }}">
	  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	  <script src="{{  URL::asset('js/materialize.min.js')}}"></script> 

  <style type="text/css">
  		.ajax-load{
  			background: #e1e1e1;
		    padding: 10px 0px;
		    width: 100%;
  		},
		  body{
              /* padding: 10px; */
          }

		  nav{
			  height: 0px !important;
		  }
  	</style>
</head>
<body>


<div class="container">
        <div  style="padding-top: 10px" class="col s12">
          <div class="row">
            <div  class="input-field col s9">
              <i class="material-icons prefix">search</i>
              <input type="text" id="input_cari" class="autocomplete">
			  <label for="input_cari">Cari Dokumen</label>
			</div>
			<a id="btn_cari" style="margin-top: 20px" class="waves-effect waves-light btn">Cari</a>
          </div>
        </div>
		<div style="text-align: center ; display: none" id="data_empty">
			<p style="color: grey">Data Tidak Ditemukan</p>
		</div>
<div class="infinite-scroll">
	@foreach($statistik as $data)  
	<a href="http://127.0.0.1:8000/plugins/pdf/viewpdf/web/viewer.html?url=http://127.0.0.1:8000/file/{{$data->file}}">
	<div class="col s12 m7">
		<div class="waves-effect  card horizontal">
		<div style="padding: 20px 0 0 20px " >
			<i class="small material-icons">insert_drive_file</i> 
		</div>
		<div class=" card-stacked">
			<div class="card-content">
			<p id="judul">{{ $data->judul }}</p>
			<p id="tgl_terbit" style="font-size: 80%; color:#9e9e9e; font-style: italic;" >Tanggal Terbit : {{ $data->terbit}}</p>
			</div>
		</div>
		<div style="padding : 30px 20px 0 0" class="card-image">
			<i class="small material-icons">navigate_next</i> 
		</div>
		</div>	
  </div>
</a>

@endforeach
{{ $statistik->links() }}
	</div>
	<div id="btn_refresh" class="fixed-action-btn">
		<a class=" waves-effect btn-floating btn-large ">
		  <i class="large material-icons">refresh</i>
		</a>
	  </div>
</div>


<div class="ajax-load text-center" style="display:none">
	<p><img src="">Loading More post</p>
</div>

<script src="{{ URL::asset('js/jquery.jscroll.min.js')}}"></script>
<script type="text/javascript">
	
$(document).ready(function() {
	let statistik = {!! json_encode($statistik) !!} ;
	if($.isEmptyObject(Object.keys(statistik.data))){
		$('#data_empty').css('display','block');
	}
	
    $('ul.pagination').hide();
    $(function() {
        $('.infinite-scroll').jscroll({
            autoTrigger: true,
			loadingHtml: '<img style="width:40px; margin-bottom:20px; height:40px" class="center-block" src="{{ URL::asset("dist/img/loading.gif")}}" alt="Loading..." />',
            padding: 0,
            nextSelector: '.pagination li.active + li a',
			contentSelector: 'div.infinite-scroll',
            callback: function() {
                $('ul.pagination').remove();
            }
        });
    });

	$('#btn_cari').click(function(e) {
		e.preventDefault();  
		
		
		window.location.replace("?key="+$('#input_cari').val());
	
  });

  $('#btn_refresh').click(function(e) {
		e.preventDefault();  
	
		location.replace("data");
		
  });


});
</script>

</body>
</html>