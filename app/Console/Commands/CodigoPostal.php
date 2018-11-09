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
        for ($i = 0; $i <= 31 ; $i++) {
            \Excel::filter('chunk')->selectSheetsByIndex($i)
                ->load(storage_path("/app/public/CPdescarga.xls"),null,null,true,null)
                ->chunk(250, function($results) {
                set_time_limit(0);
                // dd($results);
                if($results->count()) {
                    foreach ($results as $value) {                  
                        // dd($value);
                        CP::create(
                            [
                            'codigo_postal' =>$value['d_codigo'],
                            'municipio' =>$value['d_mnpio'],
                            'poblacion'=>$value['d_asenta'],
                            'estado' =>$value['d_estado'],
                            'ciudad' =>$value['d_ciudad'],
                            'cestado' => $value->c_estado,
                        ]);
                    }
                }
            });
            
        }
        return response()->json(['success'=>"hecho"],201);
        // dd($data->count());
    }
}
