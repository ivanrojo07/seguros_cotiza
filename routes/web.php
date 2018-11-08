<?php
use App\CP;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Excel;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	
    return view('index');
});
Route::get('/excel', function(){
    ini_set('memory_limit', '-1');
    for ($i = 0; $i <= 31 ; $i++) {
		\Excel::filter('chunk')->selectSheetsByIndex($i)
			->load(storage_path("/app/public/CPdescarga.xls"),null,null,true,null)
			->chunk(250, function($results) {
			set_time_limit(0);
	        // dd($results);
	        if($results->count()) {
	            foreach ($results as $value) {	                
                    CP::updateOrCreate([
                    	'codigo_postal' =>$value['d_codigo'],
                    	'municipio' =>$value['d_mnpio'],
                    ],
                    	[
                    	'codigo_postal' =>$value['d_codigo'],
                    	'municipio' =>$value['d_mnpio'],
                    	'poblacion' => $value['c_estado'],
						'estado' =>$value['d_estado'],
						'ciudad' =>$value['d_ciudad'],
                    ]);
	            }
	        }
	    });
    	
    }
    return response()->json(['success'=>"hecho"],201);
});


