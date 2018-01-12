<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
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
            'password' => 'required|alphaNum|min:3'
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
		        return redirect('login')->with('error', 'Login ou Senha incorretos!');
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
    	return view('login');
    }
}
