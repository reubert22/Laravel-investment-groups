<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use Exception;
use Auth;

class DashboardController extends Controller{
    private $repository;
    private $validator;
    
    public function __construct(UserRepository $repository, UserValidator $validator){
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    public function index(){
        return "Deu tudo certo (index-dashboard)" ;
    }

    public function auth(Request $request){
        $data = [
            'email'    => $request->get('username'), 
            'password' => $request->get('password')
        ];

        try{
            /**
             * 
             */
            if(env('PASSWORD_HASH')){
                Auth::attempt($data, false);
            }else{
                $user = $this->repository->findWhere(['email' => $request->get('username')])->first();
                
                if(!$user)
                    throw new Exception("E-mail incorreto.");
                
                if($user->password != $request->get('password'))
                    throw new Exception("Senha incorreta.");
                
                Auth::login($user);
            }

            return redirect()->route('user.dashboard');
            
        }catch(Exception $e){
            return $e->getMessage();
        }
        
        
        //dump and die
        //dd($request->all());

    }
}
