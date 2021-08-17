<?php
namespace App\Classes;

class ActionCrud {

    protected $model_name='';
    protected $form_input='';

    public function __construct() {
       $this->model_name = session('model');
    }

    public function generate(){

        $file_template = file_get_contents(
            app_path('Services/Template/view-action-template.txt')
        );

        $replace_var = array(
            '{{ $model_var }}'   => strtolower($this->model_name),
        );
        
        $file_template = strtr($file_template, $replace_var);
        $file_action = fopen(resource_path("views/admin/".strtolower($this->model_name)."/action.blade.php"), "w");
        fwrite($file_action, $file_template);
        fclose($file_action);

        return response()->json("create Action Blade Success");

    }


}