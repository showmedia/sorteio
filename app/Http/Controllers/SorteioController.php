<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\Models\Sorteio;

use App\Models\User;



class SorteioController extends Controller

{

    public function welcome(){

        $sorteios = Sorteio::all();

        return view('welcome', ['sorteios' => $sorteios]);

    }



    public function store(Request $request){

        $sorteio = new Sorteio;

        $sorteio->name = $request->name;

        $sorteio->regulamento = $request->description;

        $sorteio->valorCota = str_replace(",",".",$request->valorCota);

        $sorteio->qtnCotas = $request->qtnCotas;

        $sorteio->inicial = $request->inicial;

        $sorteio->final = $request->final;



        // Image upload



        if($request->hasFile('image') && $request->file('image')->isValid()){

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName().strtotime("now")).".".$extension;



            $request->image->move(public_path('img/cursos'), $imageName);



            $sorteio->image = $imageName;

        }



        $sorteio->save();



        return redirect('sorteio/show/'.$sorteio->id)->with('msg', 'Sorteio cadastrado com sucesso!');

    }



    public function show($id){

        $sorteio = Sorteio::findOrFail($id);

        if ($sorteio) {
            $vendasDoSorteio = $sorteio->vendas()->with('user')->get();
        
            $usuarioQueMaisComprou = $vendasDoSorteio->groupBy('users_id')
                ->map(function ($vendas, $userId) {
                    return [
                        'users_id' => $userId,
                        'quantidade_total' => $vendas->sum('quantidade'),
                    ];
                })
                ->sortByDesc('quantidade_total')
                ->first();
        
            if ($usuarioQueMaisComprou) {
                // O usuário que mais comprou cotas no sorteio de ID 38 foi encontrado
                $userId = $usuarioQueMaisComprou['users_id'];
                $userName = User::find($userId)->name;
                $quantidadeComprada = $usuarioQueMaisComprou['quantidade_total'];
        
                // Faça o que precisar com as informações do usuário que mais comprou
            } else {
                // Nenhum usuário encontrado para o sorteio de ID 38
            }
        } else {
            // Sorteio não encontrado
        }

        if(auth()->user()->nivel == 1){
            return view('sorteio.show', ['sorteio' => $sorteio, 'userName' => $userName]);
        }else{
            return redirect('/user/sorteio/show/'.$sorteio->id);
        }

    }



    public function create(){

        

        if(auth()->user()->nivel == 1){
            return view('sorteio.create');
        }else{
            return redirect('/');
        }

    }



    public function edit($id) {

        $sorteio = Sorteio::findOrFail($id);

        if(auth()->user()->nivel == 1){
            return view('sorteio.edit', ['sorteio' => $sorteio]);
        }else{
            return redirect('/user/sorteio/show/'.$sorteio->id);
        }

    }



    public function update(Request $request){

        $sorteio = Sorteio::findOrFail($request->id);

        $sorteio->name = $request->name;

        $sorteio->regulamento = $request->description;

        $sorteio->valorCota = str_replace(",",".",$request->valorCota);

        $sorteio->qtnCotas = $request->qtnCotas;



        // Image upload



        if($request->hasFile('image') && $request->file('image')->isValid()){

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName().strtotime("now")).".".$extension;



            $request->image->move(public_path('img/cursos'), $imageName);



            $sorteio->image = $imageName;

        }



        $sorteio->update();



        return redirect('/sorteio/show/'.$sorteio->id)->with('msg', 'Sorteio editado com sucesso');

    }



    public function userShow($id){

        $sorteio = Sorteio::findOrFail($id);

        $max = 0;

        $maxTotal = 0;

        $users = User::all();

        foreach($users as $user){

            $max = 0;

            foreach($user->compras as $compra){

                if($compra->sorteio->id == $sorteio->id){

                    $max = $max + count($compra->cotas);

                }

            }

            if($max > $maxTotal){

                $maxTotal = $max;

            }

        }

        return view('sorteio.user.show',['sorteio' => $sorteio, 'max' => $maxTotal]);

    }



    public function meusnumeros(){

        return view('meusnumeros');

    }



    public function favorito($id){

        if(auth()->user()->nivel == 0){
            return redirect('/');
        }

        $sorteio = Sorteio::findOrFail($id);

        if($sorteio->is_favorite){

            $sorteio->is_favorite = 0;

        }else{

            $sorteio->is_favorite = 1;

        }

        $sorteio->update();



        return redirect('/sorteio/show/'.$sorteio->id)->with('msg','Status alterado');

    }



    public function ganhadores(){

        $sorteios = Sorteio::where('status','1')->get();

        return view('sorteio.ganhadores', ['sorteios' => $sorteios]);

    }



}

