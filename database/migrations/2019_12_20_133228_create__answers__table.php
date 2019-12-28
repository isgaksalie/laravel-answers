<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('question_id')->unsigned();
            $table->text('content');
            $table->timestamps();

            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            /**
             *to set up a relationship you would need to $table->foreign, referring to the table to be related
             *the you would need to use the references function that refers to the column in the other table that you
             * to be related to the other tables column that you would like to use, then you need to use the on function,
             * that refers to the other table,where the reference parameter is sitting in/on
             * When you want to delete an entry and everything that is related to that entry you would then need
             * make use of the onDelete function that laravel has, to do this, you would need to use that cascade parameter
             * this will delete from the parent to the child. by default the onDelete function, will use the 'RESTRICTED'
             * parameter, this will not allow you to delete anything as there is an id link to it, there will be
             * an exception thrown
             */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('answers', function (Blueprint $table) {
            $table->dropforeign('answers_question_id_foreign');
        });

        /**
         * if there is an index populated in the table , mysql will not allow you delete it, so for thr rollback to work
         * you would need to first drop the content and then you would be able to drop the table
         * do some more research on the naming parameter, as this needs to be specific to work
         */

        Schema::dropIfExists('answers');
    }
}
