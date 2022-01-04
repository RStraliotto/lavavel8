<?php

namespace App\Http\Controllers;
use App\Models\Contato;

use Illuminate\Http\Request;

class ContatoController extends Controller
{

   
    public function index(){

        $data = Contato::latest()->paginate(5);
    
        return view('app.listar',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    public function create()
    {
        return view('app.create');
      
    }

    public function store(Request $request)
    {
         
    
        Contato::create($request->all());
               return redirect()->route('app.listar')
                        ->with('success','Post created successfully.');
    }

    public function show(Contato $contato)
    {
        return view('app.show',compact('contato'));
    }

    public function edit(Contato $contato)
    {
        return view('app.edit',compact('contato'));
    }

    public function update(Request $request, Contato $contato)
    {
        $contato->update($request->all());
    
        return redirect()->route('/contato')
                        ->with('success','Post updated successfully');
    }

    public function destroy(Contato $contato)
    {
        $contato->delete();
    
        return redirect()->route('/')
                        ->with('success','Post deleted successfully');
    }


}
