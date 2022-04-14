<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;
// Agregar 
use Auth;
use Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View; // Nuevo
use Illuminate\Support\Facades\File; // Nuevo
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

include 'tools/string.php';
include 'tools/function.php'; // Si funciona
include 'tools/json.php'; // Si funciona
// Fin Agregar

class VehiculoController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id) {
        $dataR = DB::table('revision')
                ->select(
                        'revision.*',
                )
                ->where(
                        [
                            ['revision.id_vehiculo', '=', $id],
                        ]
                )
                ->get();
        $revision = objectToArray($dataR);

        if ($revision) {

            $multArray = array();
            $i = 0;
            while ($i < count($revision)) {
                $multArray[$revision[$i]['fecha_inspeccion']][] = $revision[$i];
                $i = $i + 1;
            }

            $array = [];
            foreach ($multArray as $key => $value) {
                for ($f = 0; $f < count($value); $f++) {

                    $id_neumaticos = $value[$f]['id_neumaticos'];
                    $contarcambios = 0;

                    for ($y = 0; $y < count($value); $y++) {
                        // SI LOS INDICES SON DIFERENTES
                        if ($y != $f && $id_neumaticos == $value[$y]['id_neumaticos']) {
                            $contarcambios = $contarcambios + 1;
                        }
                    }
                    if ($contarcambios > 0) {
                        $array[] = array(
                            'id' => $value[$f]['id'],
                            'id_vehiculo' => $value[$f]['id_vehiculo'],
                            'fecha_inspeccion' => $value[$f]['fecha_inspeccion'],
                            'revisionesdeneumatico' => $contarcambios,
                        );
                    }
                }
            }

            if ($array) {
                $json = json('ok', strings('success_read'), $array);
            } else {
                $json = json('error', strings('error_read'), '');
            }
        } else {
            $json = json('error', strings('error_read'), '');
        }

        return jsonPrint($json);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request) {
        $dataR = DB::table('vehiculo')
                ->select(
                        'vehiculo.*',
                )
                ->where(
                        [
                            ['vehiculo.id', '>', 1],
                        ]
                )
                ->get();
        $data = objectToArray($dataR);

        if ($data) {
            $json = json('ok', strings('success_read'), $data);
        } else {
            $json = json('error', strings('error_read'), '');
        }

        return jsonPrint($json);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) {
        //
    }

}
