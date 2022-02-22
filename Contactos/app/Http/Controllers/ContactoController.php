<?php

namespace App\Http\Controllers;
use App\Models\Contacto;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\ContactosRequest;
class ContactoController extends Controller
{
    


    public function index(){

        $search=request('sarch');

        if($search){
          
            $todos=Contacto::where([
                ['nome','like','%'.$search.'%']
            ])->get();
        }else{
            $todos=Contacto::all();
        }

      
      
        return view('index',['todos'=>$todos]);
    }

    public function  admin(){
        $users=User::all()->count();
        $contactos=Contacto::all()->count();
        $lixo=Contacto::onlyTrashed()->get()->count();
        $nome=auth()->user();
        return view('dashboard',['nome'=>$nome,'users'=>$users,'contactos'=>$contactos,'lixo'=>$lixo]);
    }


    public function meus(){
        $nome=auth()->user();
        $contactos= $nome->contactos;

        return view('admin.meus',['nome'=>$nome,'contactos'=>$contactos]);
    }


// CRUD DE CONTACTOS

public function add(){
    $nome=auth()->user();
    return view('admin.adicionar',['nome'=>$nome]);
}

public function store(ContactosRequest $requst){
  
    $user= auth()->user();
   $contacto= new Contacto;
   $contacto->nome=$requst->nome;
   $contacto->contacto=$requst->contacto;
   $contacto->email=$requst->email;
   $contacto->user_id=$user->id;
   $contacto->save();
    return redirect('/admin/add')->with('smg','Inserido com Sucesso!');

}




    // TODOS SINGLES

    public function visu($id){
        
        $meu=Contacto::findorFail($id);
        return view('admin.single1',['meu'=>$meu]);
    }

    
    public function ver($id){
        $nome=auth()->user();
        $dono=auth()->user();
        $meu=Contacto::findorFail($id);
        if($meu->user_id==$dono->id){
            return view('single2',['meu'=>$meu,'nome'=>$nome]);
        }else{

            return redirect('/dashboard');
        }

    }

        public function destroy($id){

            $delete=Contacto::findorFail($id)->delete();

            return redirect('/admin')->with('smg1','Deletado com sucesso!');
        }

        public function upd($id){
            $dono=auth()->user();
            $edit=Contacto::findorFail($id);
            if ($edit->user_id==$dono->id) {
                $nome=auth()->user();
                return view('admin.editar',['edit'=>$edit,'nome'=>$nome]);
            }else{

                return redirect('/admin');
            }
           

        }


        public function update(ContactosRequest $request,$id){
           
            $edit=Contacto::findorFail($id)->update($request->all());

            return redirect('/admin')->with('smg3','Editado com Sucesso!');

        }



        public function todos(){
            $nome=auth()->user();
            $todos=Contacto::onlyTrashed()->get();
            return view('admin.todos',[ 'todos'=>$todos,'nome'=>$nome]);
        }
  
        public function retaurar($id){

           
            $delete=Contacto::onlyTrashed()->findorFail($id)->restore();

            return redirect('/admin/contactos')->with('smg4','Resturado com sucesso!');
        }


        public function eliminar($id){

           
            $delete=Contacto::onlyTrashed()->findorFail($id)->forceDelete();

            return redirect('/admin/contactos')->with('smg5','Eliminado permanentemente com sucesso!');
        }
}
