<?php

namespace App\Controllers;

use App\Components\NotifyComponent;
use App\Models\Funcionario;
use Fmk\MVC\Controller;
use Fmk\Utils\Request;
use Fmk\Utils\Router;
use Fmk\Utils\Session;
use App\Rules\MinLength;
use App\Rules\MaxLength;

class LoginController extends Controller{

    public function index(){
        return view('auth.login', [], 'blank');
    }

    public function logar(){
        $request = Request::getInstance();
        
        // Captura os campos do formulário
        $login = $request->validate('login', 'Usuário')->required();
        $senha = $request->validate('senha', 'Senha')->required();

        // Validações personalizadas para a senha
        $minLengthRule = new MinLength(4);
        $maxLengthRule = new MaxLength(10);

         if (!$minLengthRule->validate($senha)) {
             NotifyComponent::error($minLengthRule->getErrorMessage('Senha'));
             return Router::getRouteByName('login')->redirect();
         }

        if (!$maxLengthRule->validate($senha)) {
            NotifyComponent::error($maxLengthRule->getErrorMessage('Senha'));
            return Router::getRouteByName('login')->redirect();
        }

        // Se passou nas validações, tenta autenticar o usuário
        if (Funcionario::Auth($login, $senha)) {
            return Router::getRouteByName('home')->redirect();
        }

        NotifyComponent::warning('Credenciais inválidas!');
        return Router::getRouteByName('login')->redirect();
    }

    public function logout(){
        Session::getInstance()->userUnregister();
        return Router::getRouteByName('login')->redirect();
    }
}
