<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use App\Models\Contato;

class ContatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if($_GET && isset($_GET['contato'])){
            $contatos = Contato::whereRaw("nome = '".$_GET['contato']."'")->Paginate(10);
        } else {
            $contatos = Contato::Paginate(10);
        }

        foreach ($contatos->all() as $key => $value) {
            if($value->data_nasc != null && $value->data_nasc != "0000-00-00"){
                $data_nasc = $value->data_nasc;
                $contatos[$key]->data_nasc_fmt = date("d/m/Y", strtotime($data_nasc));
            } else {
                $contatos[$key]->data_nasc_fmt = "---";
            }
        }

        return view('contato.index', compact('contatos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contato.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   

        if (Contato::find($id)) {
            
            $contatos = Contato::find($id);

            $data_nasc = $contatos->data_nasc;
            $contatos->data_nasc_fmt = date("d/m/Y", strtotime($data_nasc));

            $telefone = $contatos->telefone;
            $contatos->telefone_fmt = preg_replace("/[^0-9]/", "", $telefone);

            return view('contato.show', compact("contatos"));
        
        } else{

            return redirect('contatos');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        if (Contato::find($id)) {
            
            $contatoedt = Contato::find($id);

            $data_formatada = $contatoedt->data_nasc;
            $contatoedt->data_fmt = date("d/m/Y", strtotime($data_formatada));

            return view('contato.edit', compact('contatoedt'));

        } else{

            return redirect('contatos');
        }


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = \Validator::make($request->all(), [
            'nome'     => ['required', 'max:100', 'regex:/^[\pL\s\-]+$/u'],
            'telefone' => ['required', 'min:10', 'max:15', Rule::unique('contatos')->ignore($id)],
            'email'    => ['required', 'max:50', Rule::unique('contatos')->ignore($id)],
            'email'    => 'email:rfc',
            'tipotelef' => ['required',
                            function ($attribute, $value, $fail) {
                                if ($value != 'Celular' && $value != 'Fixo' && $value != 'Fax') {
                                    $fail("Tipo de contato inválido.");
                                }
                            },],
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data_formatada = preg_replace('/\//', '-', $request->data_nasc);
        $data_formatada = date("Y-m-d", strtotime($data_formatada));


        $contato = array();
        $contato['nome']      = $request->nome;
        $contato['telefone']  = $request->telefone;
        $contato['email']     = $request->email;
        $contato['tipotelef'] = $request->tipotelef;
        $contato['data_nasc'] = $data_formatada;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            
            $image_del = Contato::find($id);
            Storage::disk('public')->delete( $image_del->image );

            $requestimage = $request->image;
            $extension = $requestimage->extension();
            $imagename = md5($requestimage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestimage->move(public_path('storage'), $imagename);
            $contato['image'] = $imagename;
        }

        Contato::where(['id'=>$id])->update($contato);


        return redirect('contatos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        Contato::find($id)->delete();

        return redirect()->back();
    }

    public function store(Request $request)
    {
        
        $validator = \Validator::make($request->all(), [
            'nome'      => ['required', 'max:100', 'regex:/^[\pL\s\-]+$/u'],
            'telefone'  => ['required', 'min:14', 'max:15', Rule::unique('contatos')],
            'email'     => ['required', 'max:50', Rule::unique('contatos')],
            'email'     => 'email:rfc,dns',
            'tipotelef' => [function ($attribute, $value, $fail) {
                                if ($value != 'Celular' && $value != 'Fixo' && $value != 'Fax') {
                                    $fail("Tipo de contato inválido.");
                                }
                            },],
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data_formatada = preg_replace('/\//', '-', $request->data_nasc);
        $data_formatada = date("Y-m-d", strtotime($data_formatada));

        $contato = array();
        $contato['nome']      = $request->nome;
        $contato['telefone']  = $request->telefone;
        $contato['email']     = $request->email;
        $contato['tipotelef'] = $request->tipotelef;
        $contato['data_nasc'] = $data_formatada;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            
            $requestimage = $request->image;
            $extension = $requestimage->extension();
            $imagename = md5($requestimage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestimage->move(public_path('storage'), $imagename);
            $contato['image'] = $imagename;
        }

        $cad = Contato::create($contato);

        if ($cad) {
            return redirect('contatos');
        }
    }

    public function deleteimage($id)
    {
        Contato::where(['id'=>$id])->update(['image'=>'']);

        return redirect()->back();
        view('contato.edit', compact('imagenull'));

    }
}
