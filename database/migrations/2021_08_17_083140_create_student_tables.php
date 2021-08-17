<?php

        use Illuminate\Support\Facades\Schema;
        use Illuminate\Database\Schema\Blueprint;
        use Illuminate\Database\Migrations\Migration;
        
        class CreateStudentTables extends Migration
        {
            public function up()
            {
                Schema::create("student", function (Blueprint $table) {
                    $table->increments("id");
                     $table->string("name");
                     $table->text("photo");
                     
                    $table->timestamps();
                });
            }

            public function down()
            {
                Schema::dropIfExists("student");
            }
        }