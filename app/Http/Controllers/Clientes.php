<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\TraitClientes;
use App\Model as Model;
use Validator;

class Clientes extends Controller
{
	use TraitClientes;

    /**
     * Construtor da classe
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

	/**
	 * Chamando a view principal para gerenciamento de clientes
	 *
	 * @access public
	 */
    public function listarClientes()
    {
        //Dados a serem retornados para a view
    	$dados = [
    		"activeClientes" => "class=active",
    	];

    	$dados['clientes'] = Model\Cliente::lstClientes();

    	return view('clientes.listar-clientes', $dados);
    }

    /**
     * Chama a view de cadastro de clientes
     *
     * @access public
     */
    public function cadastrarClientes()
    {
        //Dados a serem retornados para a view
    	$dados = [
    		"activeClientes" => "class=active",
    	];

    	return view('clientes.cadastrar-clientes', $dados);
    }

    /**
     * Trata os dados e insere um novo cliente no baco de dados
     *
     * @param Request $request
     * @access public
     */
    public function cadastrarValidarClientes(Request $request)
    {
        //Setando configuracoes de validacao
        $validator = Validator::make($request->all(), [
            'nome' => 'required|max:255',
            'cpf' => 'required|max:15',
            'telefone' => 'required|max:17',
            'eMail' => 'required|email',
            'dataNascimento' => 'required|date',
            'endereco' => 'required|max:255',
            'bairro' => 'required|max:255',
            'cep' => 'required|max:10',
            'numero' => 'required|numeric',
        ]);

        //Validando os campos do formulario
        if($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->all()
            );
        }

    	//Tratando os dados
    	$dados = TraitClientes::tratarDadosCliente($request->all());

    	//Inserindo o endereco e pegando o id dele
    	$idEndereco = Model\Endereco::insEnderecoRetornaId($dados['endereco']);

    	//Adicionando o idEndereco aos dados do cliente
    	$dados['cliente']['idEndereco'] = $idEndereco;

    	//Inserindo os dados do cliente
    	$resultInsert = Model\Cliente::insCliente($dados['cliente']);

        //Retorna uma mensagem para o usuario
        if ($resultInsert === true) {
            return redirect()->back()->with(
                'success',
                'Cliente inserido com sucesso!'
            );
        }
        //Caso houver algum erro
        return redirect()->back()->with(
            'error',
            'Cliente não pode ser inserido!'
        );
    }

    /**
     * Chama a view para alterar os dados do cliente
     *
     * @param String $idClienteEndereco
     * @access public
     */
    public function alterarClientes($idClienteEndereco)
    {

    	//Desodificando a string
    	$string = unserialize(base64_decode($idClienteEndereco));

    	//id do cliente
    	$arrayIds = explode("|", $string);

    	//Setando os repectivos ids
    	$idCliente = $arrayIds[0];
    	$idEndereco = $arrayIds[1];

    	//selecionando o cliente especifico
    	$dados['cliente'] = current(Model\Cliente::getClientePorId($idCliente));

    	//pegando o endereco do cliente especifico
    	$dados['endereco'] = current(Model\Endereco::getEnderecoPorId($idEndereco));


    	//chamdo view de alterar cliente
    	return view('clientes.alterar-clientes', $dados);
    }


    /**
     * Altera os dados no banco de dados
     *
     * @access public
     */
    public function alterarValidarClientes(Request $request)
    {
        //Setando configuracoes de validacao
        $validator = Validator::make($request->all(), [
            'nome' => 'required|max:255',
            'cpf' => 'required|max:15',
            'telefone' => 'required|max:17',
            'eMail' => 'required|email',
            'dataNascimento' => 'required|date',
            'endereco' => 'required|max:255',
            'bairro' => 'required|max:255',
            'cep' => 'required|max:10',
            'numero' => 'required|numeric',
        ]);

        //Validando os campos do formulario
        if($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->all()
            );
        }

        //Pegando os dados
        $dados = TraitClientes::tratarDadosCliente($request->all());

        //Alterando o endereco
        $resultEndereco = Model\Endereco::find($dados['idEndereco'])->update($dados['endereco']);

        //Alterando os dados do cliente
        $resultCliente = Model\Cliente::find($dados['idCliente'])->update($dados['cliente']);

        //Retorna uma mensagem para o usuario
        if ($resultEndereco === true && $resultCliente === true) {
            return redirect('clientes')->with(
                'success',
                'Cliente Alterado com sucesso!'
            );
        }
        //Caso houver algum erro
        return redirect()->back()->with(
            'error',
            'Cliente não pode ser Alterado!'
        );
    }

    /**
     * Deleta os dados de um cliente
     *
     * @param String $idClienteEndereco
     * @access public
     */
    public function deletarClientes($idClienteEndereco)
    {
    	//Decodificando os ids
    	$string = unserialize(base64_decode($idClienteEndereco));

    	//Definindo o array de ids
    	$arrayIds = explode("|", $string);

    	//Setando os ids
    	$idCliente = $arrayIds[0];
    	$idEndereco = $arrayIds[1];

    	//Deletando os dados do cliente
    	$resultCliente = Model\Cliente::where('id', '=', $idCliente)->delete();
    	$resultEndereco = Model\Endereco::where('id', '=', $idEndereco)->delete();

        //Retorna uma mensagem para o usuario
        if ($resultCliente == true && $resultEndereco == true) {
            return redirect('clientes')->with(
                'success',
                'Cliente Deletado com sucesso!'
            );
        }
        //Caso houver algum erro
        return redirect()->back()->with(
            'error',
            'Cliente não pode ser Deletado!'
        );
    }


    /**
     * Deleta os dados de um cliente
     *
     * @param Request $request
     * @access public
     */
    public function pagarClientes($idClienteEndereco)
    {
        //Decodificando e pegando o id do cliente
        $idCliente = explode("|", unserialize(
            base64_decode(
                $idClienteEndereco
            )
        ))[0];

        $debito = current(Model\Locacoe::sltSaldoCliente($idCliente));

        if ($debito->total  == 0) {
            //Retorna uma mensagem para o usuario
            return redirect('clientes')->with(
                'error',
                'O cliente não possui débito!'
            );
        }

        //Pegando os ids das locacoes
        $idLocacoe = Model\Locacoe::select('id', 'idVideo')
            ->where('idCliente', '=', $idCliente)
            ->where('pago', '=', 0)
            ->get()->toArray();

        //Marcando as locacoes como pagas e liberando os filmes
        try {
            foreach ($idLocacoe as $value) {
                Model\Locacoe::where('id', '=', $value['id'])
                    ->update(['pago' => 1]);

                Model\Video::where('id', '=', $value['idVideo'])
                    ->update(['disposicao' => 1]);
            }
        } catch (Exception $e) {
            //Caso houver algum erro
            return redirect()->back()->with(
                'error',
                'Algo deu errado entre em Contato com o Suporte!'
            );
        }

        //Retorna uma mensagem para o usuario
        return redirect('clientes')->with(
            'success',
            'O Cliente não contem mais Débitos!'
        );
    }
}
