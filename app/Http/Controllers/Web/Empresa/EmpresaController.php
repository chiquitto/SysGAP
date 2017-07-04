<?php

namespace App\Http\Controllers\Web\Empresa;

use App\Empresa;
use App\Endereco;
use Illuminate\Http\Request;
use Storage;

class EmpresaController extends Controller
{
    public function __construct() {
        $this->middleware('guest:empresa')->except('logout');
    }

    public function empresaNovo(Request $request) {        
        $endereco = Endereco::create([
            'cep' => request('cep'), 
            'logradouro' => request('logradouro'), 
            'numero' => request('numero'),
            'complemento' => request('complemento'),
            'bairro' => request('bairro'),
            'cidade' => request('cidade'),
            'uf' => request('uf'),
        ]);        

        $endereco->save();

        // Salvar empresa 

        // $filename = config('app.name') . '_foto_perfil_' . $request->id . str_slug($request->name, '_') . '.' . $request->profile_photo .'.png';
        // $request->profile_photo->storeAs('empresas/perfil', $filename, 'public');

        $empresa = Empresa::create([
            'nome' => $request->nome,
            'email' => $request->email, 
            'cnpj' => $request->cnpj,
            'senha' => bcrypt($request->password),
            'categoria' => $request->categoria,
            'endereco_id' => $endereco['id'],
            'foto_perfil' => 'teste',
            'ativo' => 1,
        ]);

        $empresa->save();

        return redirect('/');
    }    


    public function loginEmpresa(Request $request) {        
        // $this->validate($request, [
        //     'email' => 'required|email',
        //     'password' => 'required|min:6'
        // ]);

        if (auth()->guard('empresa')->attempt(['email' => $request->email, 'password' => bcrypt($request->password)], $request->remember)) {            
            dd('logado');
            return redirect('/');        
        }
        dd('Erro');
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }    

    public function logout()                
    {                                        
        auth()->guard('empresa')->logout();
        return redirect('/');
    }
}
