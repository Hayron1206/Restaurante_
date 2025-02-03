<?php

namespace App\Controllers;

use App\Models\Atendimento;
use Fmk\MVC\Controller;

class HomeController extends Controller{
    public function index(){
        $mesas = array_fill(1, constant('N_MESAS'),null);
        $atendimentos = Atendimento::where('pagamento_data','is', null)->get();
        foreach($atendimentos as $atendimento){
            $mesas[$atendimento->mesa] = $atendimento;
        }
        return view('home',['mesas'=>$mesas], 'main');
    }
}