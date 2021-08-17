<?php
namespace App\Classes;

class ValidationCrud {

    protected $model_name='';
    protected $form_input='';

    public function __construct() {
       $this->model_name = session('model');
       $this->form_input = session('form_input');
    }


    public function generate(){

        $validation='';

        $model_name_table = strtolower(preg_replace('/\B([A-Z])/', '_$1', $this->model_name));
        foreach ($this->form_input as $key => $value) {
            if(isset($value['fillable'])){
                $validation .=  "'".$value['name']."' => 'required'," ; 
               
            }
        }

        $file_template_store = file_get_contents(
            app_path('Services/Template/validation-store-template.txt')
        );

        $file_template_update = file_get_contents(
            app_path('Services/Template/validation-update-template.txt')
        );

        $replace_var = array(
            '{{ $model_name }}'  => $this->model_name,
            '{{ $model_var }}'   => $model_name_table,
            '{{ $validation }}'    => $validation,
        );
       
        $file_store = fopen(app_path("Http/Requests/".$this->model_name."StoreRequest.php"), "w");
        $file_update = fopen(app_path("Http/Requests/".$this->model_name."UpdateRequest.php"), "w");
       
        $file_template_store = strtr($file_template_store, $replace_var);
        $file_template_update = strtr($file_template_update, $replace_var);
      
        fwrite($file_store, $file_template_store);
        fclose($file_store);

        fwrite($file_update, $file_template_update);
        fclose($file_update);

        return response()->json("create Validation Success");

    }


}