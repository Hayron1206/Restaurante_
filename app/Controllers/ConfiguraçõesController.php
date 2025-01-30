<?php

namespace App\Controllers;

use App\Components\NotifyComponent;
use App\Models\Config;
use Fmk\MVC\Controller;

class ConfiguraçõesController extends Controller{
    public function __construct(){
        $this->middlewares('auth');
    }

    public function index(){
        return view('configuracoes.list',['configs' =>Config:: all()], 'main');
    }

    public function update(){
        $configs = Config::all();
        $request = $this->request();
        foreach($configs as $config){
            $config->value = $request->Validade($config->name,$config->label)->required();
        }
        if($request->validation()){
            foreach($configs as $config){
                $config->save();
            }

        NotifyComponent::success('Salvo', 'sucesso');
        route('home')->redirect();
        }
        NotifyComponent::success('tem alguma coisa errada', 'erro');
        $request->old()->redirect;
    }
}