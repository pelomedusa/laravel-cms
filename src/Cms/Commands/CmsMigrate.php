<?php

namespace Pelomedusa\Cms\Commands;

use Illuminate\Console\Command;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Pelomedusa\Cms\Controllers\PostTypeController;

class CmsMigrate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cms:migrate'; //{slug?}

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Create post-types tables";

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        if ( $post_types_classes = config("cms.post_types") ){
            foreach ($post_types_classes as $post_types_class){

                /** @var PostTypeController $post_types_class */
                $slug = $post_types_class::getSlug();
                $table_name = "cms_$slug";
                $table_values_name = "cms_${slug}_values";

                if (!Schema::hasTable($table_name)){
                    Schema::create($table_name, function (Blueprint $table) use ($slug){
                        $table->increments('id');
                        $table->string('title');
                        $table->string('slug');
                        $table->timestamps();
                    });
                }

                if (!Schema::hasTable($table_values_name)){
                    Schema::create($table_values_name, function (Blueprint $table) use ($table_name) {
                        $table->increments('id');

                        $table->string('key');
                        $table->string('value');

                        $table->unsignedInteger('post_id');
                        $table->foreign('post_id')->references('id')->on($table_name);
                    });
                }
            }
        }
    }
}
