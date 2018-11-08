<?php

namespace App\Console\Commands;

use App\Imports\CPsImport;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Excel;

class CodigoPostal extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cp:load';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Carga el codigo postal de todo Méxio';

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
    public function handle()
    {
        //
        ini_set('memory_limit', '-1');
        \Excel::filter('chunk')->load(storage_path("/app/public/CPdescarga.xls"),null,null,true,null)->chunk(250, function($results) {
            set_time_limit(0);
            // dd($results->count());
            if($results->count()) {
                foreach ($results as $sheet) {
                    foreach ($sheet as $value) {
                        CP::updateOrCreate([
                            'codigo_postal' =>$value['d_codigo'],
                            'poblacion'=>$value['d_asenta'],
                        ],
                        [
                            'codigo_postal'  =>$value['d_codigo'],
                            'cestado'=>$value['c_estado'],
                            'poblacion'=>$value['d_asenta'],
                            'municipio'=>$value['d_mnpio'],
                            'estado'=>$value['d_estado'],
                            'ciudad'=>$value['d_ciudad'],
                            
                        ]);
                    }
                }
            }
        });
        return response()->json(['success'=>"hecho"],201);
        // dd($data->count());
    }
}
