<?php
namespace App\Classes;
use Illuminate\Support\Facades\File;

class RouteCrud {


    protected $model_name='';
    protected $form_input='';

    public function __construct() {
       $this->model_name = session('model');
       $this->form_input = session('form_input');
    }


    public function generate(){

        $route_filepond='';
        foreach ($this->form_input as $key => $value) {
            if($value['form_input']=='upload_image'){
                $route_filepond = "
                Route::post('".strtolower($this->model_name)."/filepondUpload', '".$this->model_name."Controller@filepondUpload');
                Route::delete('".strtolower($this->model_name)."/filepondCancel', '".$this->model_name."Controller@filepondCancel');";
            }
        }
        $file_template = file_get_contents(
            app_path('Services/Template/route-template.txt')
        );

        $replace_var = array(
            '{{ $model_name }}'  => $this->model_name,
            '{{ $model_var }}'   => strtolower($this->model_name),
            '{{ $route_filepond }}' => $route_filepond
        );

        $file_template = strtr($file_template, $replace_var);

        $filename = base_path('routes/web.php');
    


        $line_number = '';
        $search = '//route_key_start';
		if ($file_handler = fopen(base_path('routes/web.php'), "r")) {
		   $i = 0;
		   while ($line = fgets($file_handler)) {
			  $i++;
			  //case sensitive is false by default
			  //find the string and store it in an array
			  if(strpos($line, $search) !== false){
                $line_number .=  $i;
			  }
		   }
		}
       

     
            $lines = file( $filename , FILE_IGNORE_NEW_LINES );
            $lines[$line_number-1] = $file_template;
            file_put_contents( $filename , implode( "\n", $lines ) );
   
            return response()->json($line_number);
     
     

       

    }


}