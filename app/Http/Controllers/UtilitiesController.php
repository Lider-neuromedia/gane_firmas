<?php

namespace App\Http\Controllers;

class UtilitiesController extends Controller{

    public function departamentos(){

        return \DB::table('departamentos')->get();
    }

    public function ciudades($departamento){

        $ciudades = \DB::Table('ciudades')
            ->where('departamento_id', $departamento)
            ->orderBy('nombre')
            ->get();

        return $ciudades;
    }

    // public function tiposIdentificacion(){

    //     return \DB::Table('tipos_identificacion')->get();
    // }

    // public function nivelesEstudio(){

    //     return \DB::Table('niveles_estudio')->get();
    // }
}