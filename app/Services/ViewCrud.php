<?php
namespace App\Classes;

class ViewCrud {

  protected $model_name='';
  protected $form_input='';

  public function __construct() {
     $this->model_name = session('model');
     $this->form_input = session('form_input');
  }

    public function generate(){

    $table_th ='';
    $table_ajax ='';

    foreach ( $this->form_input as $key => $value) {
        if(isset($value['show'])){
            $table_th .=   '<th>'.ucwords($value['name']).'</th>'.PHP_EOL.str_repeat("   ",7);
            $table_ajax .="{data : '".$value['name']."'},".PHP_EOL;
         }

         
    }

      $modal_name_lowercase = strtolower(preg_replace("/\B([A-Z])/", "_$1", $this->model_name));

      $file_template = file_get_contents(
          app_path('Services/Template/view-index-template.blade.txt')
      );

      $replace_var = array(
          '{{ $model_var }}'  => $modal_name_lowercase,
          '{{ $table_th }}'   => $table_th,
          '{{ $table_ajax }}' => $table_ajax,
      );

      if (!file_exists(resource_path("views/admin/".$modal_name_lowercase))) {
        mkdir(resource_path("views/admin/".$modal_name_lowercase));
      }
    
      $file_template = strtr($file_template, $replace_var);
      $file_index = fopen(resource_path("views/admin/".$modal_name_lowercase."/index.blade.php"), "w");     
      fwrite($file_index, $file_template);
      fclose($file_index);
        
      return response()->json("create Index Blade Success");

    }


}