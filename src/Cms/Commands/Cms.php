<?php

namespace Pelomedusa\Cms\Commands;

use Illuminate\Console\Command;

class Cms extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cms:create-page {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new page';

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

    }
}
