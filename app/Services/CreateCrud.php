<?php
namespace App\Classes;
use App\Services\Config\Data;

class CreateCrud {

    use Data;

    protected $model_name='';
    protected $form_input='';

    public function __construct() {
       $this->model_name = session('model');
       $this->form_input = session('form_input');
    }

    public function generate(){

        $file_template = file_get_contents(
            app_path('Services/Template/view-create-template.txt')
        );

        $form_input = '';

        foreach ($this->form_input as $key => $value) {
            if($value['form_input']=='text_field'){
                $form_input .=  $this->text_field($value['name']);
            }
            if($value['form_input']=='text_area'){
                $form_input .=  $this->text_area($value['name']);
            }
            if($value['form_input']=='upload_image'){
                $form_input .= $this->upload_image($value['name']); 
            }
        }
  
        $replace_var = array(
            '{{ $model_var }}'   => strtolower($this->model_name),
            '{{ $model_name }}'  => $this->model_name,
            '{{ $form_input }}'  => $form_input,
            '{{ $add_css }}'     => $this->addCss(),
            '{{ $add_js }}'      =>  $this->addJs(),
        );
       
        $file_template = strtr($file_template, $replace_var);
    
        $file = fopen(resource_path("views/admin/".strtolower($this->model_name)."/create.blade.php"), "w");
        fwrite($file, $file_template);
        fclose($file);
        return response()->json("create View Create Success");
    }


}