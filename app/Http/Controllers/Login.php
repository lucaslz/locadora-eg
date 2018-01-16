<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use App\Traits as Traits;
use Validator;
use App\User;
use Redirect;
use Auth;

class Login extends Controller
{
    /**
     * Metodo que chama a tela de login
     *
     * @access public
     */
    public function showLogin()
    {
    	if (Auth::check()) {
    		return Redirect::to('filme');
    	} else {
    		return view('login');
    	}
    }

    /**
     * Metodo que faz o controle do login
     *
     * @access public
     */
    public function doLogin(Request $request)
    {
    	//Validando as informacoes de login
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'password' => 'required|string|min:3'
        ]);

        //Validando os campos do formulario
        if($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->all()
            );
        } else {
		    //formatando dados do usuario para autenticacao
		    $dadosUsuario = array(
		        'name' => $request->get('name'),
		        'password' => $request->get('password')
		    );

		    //Tentando fazer o login com o usuario
		    if (Auth::attempt($dadosUsuario)) {
		    	//Caso a validacao ocorra com sucesso eu posso liberar o acesso
		        return Redirect::to('filme');

		    } else {
		        //Caso a validacao nao ocorra com sucesso volta para o formulario
		        //E também mostra uma mensagem
		        return redirect('/')->with('error', 'Login ou Senha incorretos!');
		    }
        }
    }

    /**
     * Metodo que faz faz o logout do usuario
     *
     * @access public
     */
    public function logout()
    {
    	//Fazendo logout no sistema
    	Auth::logout();

    	//Chamado a view
    	return redirect('/');
    }

    /**
     * Rota que leva para tera de alteracao de usuario
     *
     * @access public
     */
    public function alterar()
    {
        //dados do usuario
        $dados = [
            "id" => Auth::user()->id,
            "name" => Auth::user()->name,
            "email" => Auth::user()->email,
            "palavraPasse" => Auth::user()->palavraPasse,
            "activeUser" => "class=active",
        ];

        //Chamado a view
        return view('alterar-user-login', $dados);
    }


    /**
     * Valida e altera o usuario
     *
     * @access public
     */
    public function alterarValidar(Request $request)
    {
        //Dados a serem retornados para a view
        $dados["activeUser"]= "class=active";

        //Pegando os dados
        $dados = $request->all();

        //Pegando id do usuarios
        $idUser = ['id' => $dados['id']];

        //dados da validacao
        $dadosValidacao = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'palavraPasse' => 'required|string|min:6|max:255',
        ];

        //Verificando se o email pertence ao usuario
        if (!is_null($dados['email']) && !empty($dados['email'])) {
            $email = User::find($idUser['id'])->toArray()['email'];

            if ($dados['email'] != $email) {
                $dadosValidacao['email'] = 'required|string|email|max:255|unique:users';
            }
        }

        //Se o usuario quiser trocar a senha valida a senha
        if (!is_null($dados['password']) && !empty($dados['password'])) {
            $dadosValidacao['password'] =  'required|string|min:6|confirmed';
        }

        //Validando as informacoes de login
        $validator = Validator::make($request->all(), $dadosValidacao);

        //Validando os campos do formulario
        if($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->all()
            );
        }

        //Tratar dados para inserir
        unset($dados['id']);
        unset($dados['_token']);
        unset($dados['password_confirmation']);
        $dados['password'] = bcrypt($dados['password']);

        //Alterar usuario
        $result = User::find($idUser['id'])->update($dados);

        //Retorna uma mensagem para o usuario
        if ($result === true) {
            return redirect()->back()->with(
                'success',
                'Usuario alterado com sucesso!'
            );
        }
        //Caso houver algum erro
        return redirect()->back()->with(
            'error',
            'Usuario não pode ser alterado!'
        );
    }

    /**
     * Tela de controle de usuarios
     *
     * @access public
     */
    public function controleUsuario()
    {
        //dados do usuario
        $dados = [
            "activeUser" => "class=active",
        ];

        //Buscar todos os usuarios
        $dados['usuarios'] = User::select(
            'id',
            'name',
            'email'
        )->get()->toArray();

        //Chamado a view
        return view('controlar-user', $dados);
    }

    /**
     * Tela que busca o usuario e manda para tela de alterar
     *
     * @access public
     */
    public function controleUsuarioAlterar($id)
    {
        //decodificando o id
        $id = unserialize(base64_decode($id));

        //buscando o usuario
        $usuario = current(User::where('id', $id)->get()->toArray());

        //dados do usuario
        $dados = [
            "id" => $usuario['id'],
            "name" => $usuario['name'],
            "email" => $usuario['email'],
            "palavraPasse" => "Cachorro Louco",
            "activeUser" => "class=active",
        ];

        //Chamado a view
        return view('alterar-user-login', $dados);
    }


    public function resetePassword(Request $request)
    {
        $token = $request->get('_token');
        $name = $request->get('name');
        $password = $request->get('palavraPasse');

        $reset = User::where([
            'name' => $name,
            'palavraPasse' => $password
        ])->first();

        if(!empty($reset)) {
            $user = User::where([
                'name' => $name,
                'palavraPasse' => $password
            ])->first();

            //GErando a senha aleatorio
            $senha = Traits\TraitLogin::gerarSenha(10, true, true, true, true);

            $user->password = bcrypt($senha);
            $result = $user->save();

            if ($result == true) {
                return redirect()->back()->with(
                    'success',
                    'Sua nova senha é: '. $senha
                );
            }
        }

        return redirect()->back()->with(
            'error',
            'Não foi possível alterar a senha verifique suas credenciais.'
        );
    }

    public function criarPassword(Request $request)
    {
        $dados = $request->all();
        //Setando configuracoes de validacao
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'palavraPasse' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed'
        ]);

        //Validando os campos do formulario
        if($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->all()
            );
        }

        $result = User::create([
            'name' => $dados['name'],
            'email' => $dados['email'],
            'palavraPasse' => $dados['palavraPasse'],
            'password' => bcrypt($dados['password']),
        ]);

        if ($result == true) {
            return redirect()->back()->with(
                'success',
                'Usuário criado com sucesso!'
            );
        }

        return redirect()->back()->with(
            'error',
            'Não foi possivel criar o usuário'
        );
    }
}
