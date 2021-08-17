<?php
namespace App\Classes;

class ModelCrud {

    protected $model_name='';
    protected $form_input='';

    public function __construct() {
       $this->model_name = session('model');
       $this->form_input = session('form_input');
    }

    public function generate(){

        $fillable='';

        $modal_name_table = strtolower(preg_replace('/\B([A-Z])/', '_$1', $this->model_name));
        foreach ($this->form_input as $key => $value) {
            if(!isset($value['id'])){
                $fillable .= "'".$value['name']."',";
            }
        }

        $file_template = file_get_contents(
            app_path('Services/Template/model-template.txt')
        );

        $replace_var = array(
            '{{ $model_name }}'  => $this->model_name,
            '{{ $model_var }}'   => $modal_name_table,
            '{{ $fillable }}'    => $fillable,
        );
       
        $file = fopen(app_path($this->model_name.'.php'), "w");
        $file_template = strtr($file_template, $replace_var);
        fwrite($file, $file_template);
        fclose($file);

        return response()->json("create Model Success");

    }


}