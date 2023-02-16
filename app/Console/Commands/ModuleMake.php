<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class ModuleMake extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:module {name}
                                                   {--all}
                                                   {--migration}
                                                   {--vue}
                                                   {--view}
                                                   {--controller}
                                                   {--model}
                                                   {--api}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
        if($this->option('all')) {
            $this->input->setOption('migration', true);
            $this->input->setOption('vue', true);
            $this->input->setOption('view', true);
            $this->input->setOption('controller', true);
            $this->input->setOption('model', true);
            $this->input->setOption('api', true);
        }
        if($this->option('model')) {
            $this->createModel();
        }
        if($this->option('controller')) {
            $this->createController();
        }
        if($this->option('api')) {
            $this->createApiController();
        }
        if($this->option('migration')) {
            $this->createMigration();
        }
        if($this->option('vue')) {
            $this->createVueComponent();
        }
        if($this->option('view')) {
            $this->createView();
        }
    }
    private function createModel()
    {
        # здесь я использовала следующие хелперы:
        # 1) Метод Str::studly преобразует строку в StudlyCase
        # 2) Метод Str::singular преобразует слово-строку в единственное число.
        $model = Str::singular(Str::studly(class_basename($this->argument('name'))));

        $this->call('make:model',[
            'name' => "App\\Modules\\".trim($this->argument('name'))."\\Models\\".$model
        ]);

    }

    private function createController()
    {

    }

    private function createApiController()
    {

    }

    private function createMigration()
    {
        # здесь я использовала следующие хелперы:
        # 3) Метод Str::plural преобразует слово-строку во множественное число.
        # 4) Метод Str::snake преобразует строку в snake_case
        $table = Str::plural(Str::snake(class_basename($this->argument('name'))));

        try {
            $this->call('make:migration', [
                'name' => "create_{$table}_table",
                '--create'=>$table,
                '--path' => "App\\Modules\\".trim($this->argument('name'))."\\Migrations"
            ]);
        }
        catch (\Exception $e) {
            $this->error($e->getMessage());
        }

    }

    private function createVueComponent()
    {

    }

    private function createView()
    {

    }
}
