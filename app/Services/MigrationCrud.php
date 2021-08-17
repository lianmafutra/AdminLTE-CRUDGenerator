<?php
namespace App\Classes;

use Carbon\Carbon;
use Illuminate\Support\Facades\Artisan;



class MigrationCrud {

    protected $model_name='';
    protected $form_input='';

    public function __construct() {
       $this->model_name = session('model');
       $this->form_input = session('form_input');
    }

    public function generate(){

        $table_data='';
        $type_data='';
        $length_empty='';
        $nullable='';
        $unique='';

        foreach ($this->form_input as $key => $value) {
            if($value['select_data_type']=='INT') {
                $type_data = 'integer';
            }
            if($value['select_data_type']=='VARCHAR') {
                $type_data = 'string';
            }
            if($value['select_data_type']=='FLOAT') {
                $type_data = 'float';
            }
            if($value['select_data_type']=='TEXT') {
                $type_data = 'text';
            }
            if($value['select_data_type']=='BIGINT') {
                $type_data = 'bigInteger';
            }
            if(isset($value['auto_increment'])){
                $type_data = 'increments';
            }

            if(isset($value['null'])){
                $nullable = '->nullable()';
            }
          
            if(isset($value['unique'])){
                $unique = '->unique()';
            }
      
            if(isset($value['length'])&& is_null($value['length'])==false){
                $length_empty = '("'.$value['name'].'", '.$value['length'].')'.$nullable.$unique.';';
            }
            else{
                $length_empty='("'.$value['name'].'")'.$nullable.$unique.';';
            }

            $table_data .= '$table->'.$type_data.$length_empty.PHP_EOL.str_repeat("   ",7);
        }

        $migration ='<?php

        use Illuminate\Support\Facades\Schema;
        use Illuminate\Database\Schema\Blueprint;
        use Illuminate\Database\Migrations\Migration;
        
        class Create'.$this->model_name.'Tables extends Migration
        {
            public function up()
            {
                Schema::create("'.strtolower($this->model_name).'", function (Blueprint $table) {
                    '.$table_data.'
                    $table->timestamps();
                });
            }

            public function down()
            {
                Schema::dropIfExists("'.strtolower($this->model_name).'");
            }
        }';

        $time = Carbon::now()->format('Y_m_d_His');
        $file = fopen(database_path(strtolower('migrations/'.$time.'_create_'.strtolower($this->model_name).'_tables.php')), "w");
        fwrite($file, $migration);
        fclose($file);

        $run_migrate = \Artisan::call('migrate', array('--path' => 'database/migrations','--force' => true));
      
        return response()->json("create Migration Success");

    }


}