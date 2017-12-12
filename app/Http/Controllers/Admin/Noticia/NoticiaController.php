<?php

namespace App\Http\Controllers\Admin\Noticia;

use App\Noticia;
use App\Empresa;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
  public function __construct() {
    $this->middleware('auth:web');
  }

  public function noticiasView() {
    $noticias = Noticia::orderBy('created_at', 'desc')->orderBy('ativo', 'desc')->where('admin_id', '<>', null)->paginate(10);

    return view('admin.noticia.noticias-view', compact('noticias'));
  }

  // Carrega a página com o formulário de cadastro das notícias
  public function noticiaNovo() {
    return view('admin.noticia.noticia-novo');
  }

  // Submete o formulário e salva a notícia no banco de dados
  // Depois retorna para a página de visualização das notícias
  public function noticiaCadastrar(Request $request) {
    	// $this->validate(request(), [
     //        'title' => 'required|max:15',
     //        'body' => 'required'
     //  ]);

    $filename = config('app.name') . '_noticia_' . $request->file('imagem')->getClientOriginalName();
    $request->imagem->storeAs('admins/noticias', $filename, 'public');

    $principal;

    if($request->get('principal') == "Não") {
      $principal = 0;
    } else {
      $principal = 1;
    }

    auth()->user()->cadastrarNoticia(
      $create = new Noticia(['titulo' => $request->titulo, 'conteudo' => $request->conteudo, 'imagem' => $filename, 'data_final' => $request->data_final, 'ativo' => 1, 'principal' => $principal])
    );

    // Adicionar mensagem de sucesso e retornar para a view
    if ($create)
    {
      $message = parent::returnMessage('success', 'Registro efetuado com sucesso!');
    } else
    {
      $message = parent::returnMessage('danger', 'Erro ao efetuar o registro!');
    }

    return redirect()->route('noticias.view')->with('message', $message);
  }

  public function noticiaInativar(Noticia $noticia) {
    $noticia->ativo = 0;
    $noticia->save();

    $message = parent::returnMessage('success', 'Notícia inativada com sucesso!');

    return redirect()->back()->with('message', $message);
  }

  public function noticiaAtivar(Noticia $noticia) {
    $noticia->ativo = 1;
    $noticia->save();

    $message = parent::returnMessage('success', 'Notícia ativada com sucesso!');

    return redirect()->back()->with('message', $message);
  }
}