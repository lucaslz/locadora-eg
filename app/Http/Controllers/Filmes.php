<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Model as Model;
use App\Traits as Traits;
use App\Enum as Enum;
use Validator;
use Auth;

class Filmes extends Controller
{
    use Traits\TraitFilme, Traits\TraitImagens, Traits\TraitDados;


    /**
     * Construtor da classe
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

	/**
	 * Lista todos os filmes e gera a tela inicial
	 *
	 * @access public
	 */
    public function listarFilmes()
    {
        //Dados a serem retornados para a view
    	$dados = [
    		"activeListar" => "class=active",
            "filmes" => Model\Video::listarVideos(),
    	];

        //Trando os id's dos filmes
        $dados["filmes"] = Traits\TraitFilme::tratarIdFilme($dados["filmes"]);

        //View que ira renderizar os dados
    	return view('listar-filmes', $dados);
    }

    /**
     * Cadastra um filme de acordo com um formulario
     *
     * @access public
     */
    public function cadastrarFilme()
    {
        //Dados a serem retornados para a view
        $dados = [
            "activeCadastrar" => "class=active",
            "genero" => Model\Genero::listarGeneros(),
        ];

        //View que ira renderizar os dados
        return view('cadastrar-filme', $dados);
    }

    /**
     * Valida e cadastra os filmes
     *
     * @access public
     *
     * @param Request $request
     */
    public function create(Request $request)
    {
        //Setando configuracoes de validacao
        $validator = Validator::make($request->all(), [
            'titulo' => 'required|max:255',
            'descricao' => 'required|max:255',
            'idGenero' => 'required|numeric',
            'imagem' => 'required|image',
        ]);

        //Validando os campos do formulario
        if($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->all()
            );
        }

        //Fazendo upload da imagem
        $fileName = Traits\TraitImagens::salvarImagem($request->file('imagem'));

        //Pegando os dados e tratando os mesmos
        $dados = Traits\TraitFilme::tratarDadosParaInserirAlterarFilme(
            $request->all(),
            $fileName
        );

        //Inserindo os dados no banco
        $resultInsert = Model\Video::inserirVideos($dados);

        //Retorna uma mensagem para o usuario
        if ($resultInsert === true) {
            return redirect()->back()->with(
                'success',
                'Filme inserido com sucesso!'
            );
        }
        //Caso houver algum erro
        return redirect()->back()->with(
            'error',
            'Filme não pode ser inserido!'
        );
    }

    /**
     * Visualiza algumas informacoes do filme
     *
     * @access public
     *
     * @param int $idFilme
     */
    public function visualizarFilme($idFilme)
    {
        //Dados a serem retornados para a view
        $dados = [
            "activeListar" => "class=active",
        ];

        //Decodifica o id do filme
        $idFilme = Traits\TraitDados::decode($idFilme);

        //Buscando dados do filme especifico
        $filme = current(Model\Video::buscaFilmePorId($idFilme));

        //Tratando os dados para exibi-los
        $dados['filme'] = Traits\TraitFilme::tratarFilmeParaVisualizer($filme);

        //View que ira renderizar os dados
        return view('visualizar-filme', $dados);
    }

    /**
     * Modifica os dados a serem alterados
     *
     * @access public
     *
     * @param int $idFilme
     */
    public function alterarFilme($idFilme)
    {
        //Dados a serem retornados para a view
        $dados = [
            "activeListar" => "class=active",
            "genero" => Model\Genero::listarGeneros(),
        ];

        //Decodifica o id do filme
        $idFilme = Traits\TraitDados::decode($idFilme);

        //Buscando dados do filme especifico
        $filme = current(Model\Video::buscaFilmePorId($idFilme));

        //Tratando filme para exibir na tela
        $dados['filme'] = Traits\TraitFilme::tratarFilmeParaVisualizer($filme);

        //View que ira renderizar os dados
        return view('alterar-filme', $dados);
    }

    /**
     * Altera os dados do filme
     *
     * @access public
     */
    public function update(Request $request)
    {
        //Setando configuracoes de validacao
        $validator = Validator::make($request->all(), [
            'titulo' => 'required|max:255',
            'descricao' => 'required|max:255',
            'idGenero' => 'required|numeric',
        ]);

        //Validando os campos do formulario
        if($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->all()
            );
        }

        //Fazendo upload da imagem
        if ($request->has('imagem')) {
            $fileName = Traits\TraitImagens::salvarImagem($request->file('imagem'));
        }

        //Pegando os dados e tratando os mesmos
        $dados = Traits\TraitFilme::tratarDadosParaInserirAlterarFilme(
            $request->all(),
            $fileName = isset($fileName) ? $fileName : ""
        );

        //Inserindo os dados no banco
        $id = $dados['id'];
        $resultUpdate = Model\Video::find($id)->update($dados);

        //Retorna uma mensagem para o usuario
        if ($resultUpdate === true) {
            return redirect()->back()->with(
                'success',
                'Filme Alterado com sucesso!'
            );
        }
        //Caso houver algum erro
        return redirect()->back()->with(
            'error',
            'Filme não pode ser Alterado!'
        );
    }

    /**
     * Deleta um filme especifico
     *
     * @access public
     */
    public function delete(Request $request)
    {
        //Decodificando o id
        $id = unserialize(base64_decode($request->input('idFilme')));

        //Deletando o filme
        $resultDelete = Model\Video::find($id)->delete();

        if ($resultDelete === true) {
            return redirect('/')->with(
                'success',
                'Filme Deletado com sucesso!'
            );
        }

        //Caso houver algum erro
        return redirect()->back()->with(
            'error',
            'Filme não pode ser Deletado!'
        );
    }

    /**
     * Controla o genero de filmes
     *
     * @access public
     */
    public function controlarGenero()
    {
        $dados = [
            "activeGenero" => "class=active",
            "fazerGenero" => [
                [
                    "id" => 1,
                    "genero" => "Cadastrar Genero",
                ],
                [
                    "id" => 2,
                    "genero" => "Deletar Genero",
                ],
            ],
            "genero" => Model\Genero::listarGeneros(),
        ];

        //View que ira renderizar os dados
        return view('controlar-genero', $dados);
    }

    /**
     * Deleta ou cadastrar um genero especifico
     *
     * @param Request $request
     * @return boolean true or false
     */
    public function deletarECadastrarGenero(Request $request)
    {
        $frase = "";
        $dados = $request->all();

        if ($dados['decisao'] == Enum\Genero::ADD_GENERO) {
            $result= Model\Genero::inserirGenero($dados['generoAdd']);
            $frase = "Adicionado";
        }else if($dados['decisao'] == Enum\Genero::DELETE_GENERO){
            $result = Model\Genero::find($dados['generoDelete'])->delete();
            $frase = "Deletado";
        }

        //Retorna uma mensagem para o usuario
        if ($result === true) {
            return redirect()->back()->with(
                'success',
                'Genero ' . $frase . ' com sucesso!'
            );
        }
        //Caso houver algum erro
        return redirect()->back()->with(
            'error',
            'Genero não pode ser ' . $frase . '!'
        );
    }
}
