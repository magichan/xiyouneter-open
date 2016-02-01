<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
  public function up()
  {
        
    /* if(Schema::hasTable(users)) */
    /* { */
    /*   Scheam::table('user',function(Blueprint $table){ */
    /*       $table->boolean()->default(false); */
    /*   }); */
    /* }else{ */


        Schema::create('users', function (Blueprint $table) { 
          $table->increments('id'); 
          $table->string('name');
        

            $table->string('email')->unique();
            $table->boolean('email_authority')->default(true);

            $table->string('password', 60); $table->enum('sex',['male','female']);
            $table->boolean('sex_authority')->default(true);

            $table->string('address',100);
            $table->boolean('address_authority')->default(true);
            
            $table->string('admission_year',6);
            $table->boolean('admission_authority')->default(true);

            $table->string('tel');
            $table->boolean('tel_authority')->default(true);

            $table->string('photo');
            $table->boolean('photo_authority')->default(true);

            /* student */
            $table->string('class');
            $table->boolean('class_authority')->default(true);

            $table->string("group");
            $table->boolean('group_authority')->default(true);
         
            /* graduate */
            $table->string('company');
            $table->boolean('company_authority')->default(true);

            $table->string('position');
            $table->boolean('position_authority')->default(true);

            $table->enum('status',['student','graduate','delete'])->defalut('student');
            $table->boolean('active')->default(false);
            $table->rememberToken();
            $table->timestamps();
      });

    /* } */
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
