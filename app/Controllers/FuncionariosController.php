<?php

namespace App\Controllers;

use App\Components\NotifyComponent;
use App\Models\Funcionario;
use Fmk\MVC\Controller;
use Fmk\Utils\Request;
use Fmk\Utils\Session;
use App\Rules\MinLength;
use App\Rules\MaxLength;

class FuncionariosController extends Controller
{
    public function __construct()
    {
        $this->middlewares('auth');
    }

    public function index()
    {
        return view('funcionarios.list', ['funcionarios' => Funcionario::all()], 'main');
    }

    public function create()
    {
        return view('funcionarios.cadastro', [], 'main');
    }

    public function storage()
    {
        $request = Request::getInstance();
        $nome = $request->validate('nome', 'Nome')->required();
        $cpf = str_replace('.', '', str_replace('-', '', $request->validate('cpf', 'CPF')->required()));
        $login = $request->validate('login', 'Endereço de E-mail')->required();
        $rg = $request->rg;
        $rg_expedidor = $request->rg_expedidor;
        $telefone = $request->telefone;
        $password = $request->validate('password', 'Senha')->required()->confirme($request->confirmacao);

        // Validações de MinLength e MaxLength
        $minl = new MinLength(8);
        $maxl = new MaxLength(10);

        if (!$minl->validate($password)) {
            NotifyComponent::error($minl->getErrorMessage('Senha'));
            return $request->old()->redirect();
        }

        if (!$maxl->validate($password)) {
            NotifyComponent::error($maxl->getErrorMessage('Senha'));
            return $request->old()->redirect();
        }

        if (!$request->validation()) {
            NotifyComponent::error("Existem erros de preenchimento no formulário.");
            return $request->old()->redirect();
        }

        $funcionario = new Funcionario();
        $password = password_hash($password, PASSWORD_DEFAULT);
        $data = compact('nome', 'cpf', 'login', 'password', 'rg', 'rg_expedidor', 'telefone');
        $funcionario->save($data);
        NotifyComponent::success("Funcionário cadastrado com sucesso!");
        return route('funcionario.list')->redirect();
    }

    public function update($id)
    {
        $request = Request::getInstance();
        $request->validate('id')->required()->isInt()->dbExists(Funcionario::class)->confirme($id);
        $nome = $request->validate('nome', 'Nome')->required();
        $cpf = str_replace('.', '', str_replace('-', '', $request->validate('cpf', 'CPF')->required()));
        $login = $request->validate('login', 'Endereço de E-mail')->required();
        $rg = $request->rg;
        $rg_expedidor = $request->rg_expedidor;
        $telefone = $request->telefone;
        $data = compact('nome', 'cpf', 'login', 'rg', 'rg_expedidor', 'telefone');

        if (!empty(trim($request->password))) {
            $password = $request->validate('password', 'Senha')->confirme($request->confirmacao);

            // Validações de MinLength e MaxLength
            $minLengthRule = new MinLength(8);
            $maxl = new MaxLength(10);

            if (!$minLengthRule->validate($password)) {
                NotifyComponent::error($minLengthRule->getErrorMessage('Senha'));
                return $request->old()->redirect();
            }

            if (!$maxl->validate($password)) {
                NotifyComponent::error($maxl->getErrorMessage('Senha'));
                return $request->old()->redirect();
            }

            $password = password_hash($password, PASSWORD_DEFAULT);
            $data['password'] = $password;
        }

        if (!$request->validation()) {
            NotifyComponent::error("Existem erros de preenchimento no formulário.");
            return $request->old()->redirect();
        }

        $funcionario = Funcionario::find($request->id);
        $funcionario->save($data);
        NotifyComponent::success("Funcionário atualizado com sucesso!");
        return route('funcionario.list')->redirect();
    }

    public function edit($id)
    {
        $funcionario = Funcionario::find($id);
        if ($funcionario === false) {
            NotifyComponent::error("Funcionário não encontrado.");
            return route('funcionario.list')->redirect();
        }
        return view('funcionarios.edit', $funcionario->toArray(), 'main');
    }

    public function delete()
    {
        $request = Request::getInstance();
        $request->validate('id')->required()->isInt()->dbExists(Funcionario::class);
        if (!$request->validation()) {
            NotifyComponent::error("Existem erros de preenchimento no formulário.");
            return $request->old()->redirect();
        }

        if ($request->id == user()->id) {
            NotifyComponent::error("Você não pode excluir a conta do usuário logado!");
            return $request->old()->redirect();
        }

        Funcionario::find($request->id)->delete();
        NotifyComponent::success("Funcionário Excluído com sucesso!");
        return $request->old()->redirect();
    }
}
