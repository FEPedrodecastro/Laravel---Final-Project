<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException; // excepções de bd


class UserController extends Controller
{
    private $required = 'O campo é de preenchimento obrigatório';
    private $validEmail = 'Indique um email válido';
    private $uniqueEmail = 'O email inserido já se encontra registado';
    private $passwordMin = 'A password tem de ser no mínimo 8 caracteres';
    private $passwordMatch = 'As passwords inseridas não correspondem';
    private $nifValidation = 'O NIF tem de ser composto por 9 dígitos';
    private $termsAndConditions = 'Tem de aceitar os termos e condições';
    private $errorMessage = 'Ocorreu um erro. Por favor, tente mais tarde';


    public function home() {
        $data = [
            'title' => 'BRP'
        ];
    
        return view('home', $data);
    }

    public function registoEstudante() {
        $data = [
            'title' => 'Registo estudante'
        ];
        return view('registo-estudante', $data);
    }

    public function registoInstituicao() {
        $data = [
            'title' => 'Registo instituição'
        ];

        return view('registo-instituicao', $data);
    }

    public function login() {
        $data = [
            'title' => 'Login'
        ];

        return view('login', $data);
    }

    public function recuperarPassword() {
        $data = [
            'title' => 'Recuperar palavra-passe'
        ];

        return view('recuperar-password', $data);
    }

    public function sobreNos() {
        $data = [
            'title' => 'Sobre nós'
        ];

        return view('sobre-nos', $data);
    }

    // Guia Portal
    public function guiaPortal() {
        $data = [
            'title' => 'Guia Portal Oferta Formativa'
        ];

        return view('guia', $data);
    }

    // Contactos
    public function contactos() {
        $data = [
            'title' => 'Contactos'
        ];

        return view('contactos', $data);
    }

    public function perfil() {
        $data = [
            'title' => 'O meu perfil'
        ];

        return view('perfil', $data);
    }

    public function vocacionaltestIntro() {
        $data = [
            'title' => 'Teste Vocacional - Introdução'
        ];

        return view('teste-vocacional-intro', $data);
    }

    public function testeVocacionalResultados() {
        $data = [
            'title' => 'Teste Vocacional - Resultados'
        ];

        return view('teste-vocacional-resultados', $data);
    }

    public function resultadosInstituicao() {
        $data = [
            'title' => 'Teste Vocacional - Resultados'
        ];

        return view('resultados-estatisticos', $data);
    }



    public function registoEstudante_submit(Request $request) {
        try {
            //Form validation
            $request -> validate([
                'primeiro_nome' => 'required|max:50',
                'ultimo_nome' => 'required|max:50',
                'genero' => 'required',
                'distrito' => 'required|max:50',
                'concelho' => 'required|max:50',
                'freguesia' => 'required|max:50',
                'email' => 'required|email|max:50|unique:users',
                'password' => 'required|min:8|max:50',
                'confirmar_password' => 'required|same:password',
                'aceitar_termos' => 'required',
            ], [
                'primeiro_nome.required' => $this->required,
                'ultimo_nome.required' => $this->required,
                'genero.required' => $this->required,
                'distrito.required' => $this->required,
                'concelho.required' => $this->required,
                'freguesia.required' => $this->required,
                'email.required' => $this->required,
                'email.email' => $this->validEmail,
                'email.unique' => $this->uniqueEmail,
                'password.required' => $this->required,
                'password.min' => $this->passwordMin,
                'confirmar_password.required' => $this->required,
                'confirmar_password.same' => $this->passwordMatch,
                'aceitar_termos' => $this->termsAndConditions,
            ]);

            // ver a form data com o dd
            /* dd($request->all()); */

            // get form data
            $user = new UserModel();
            $user->primeiro_Nome = $request->primeiro_nome;
            $user->ultimo_Nome = $request->ultimo_nome;
            $user->genero = $request->genero;
            $user->distrito = $request->distrito;
            $user->concelho = $request->concelho;
            $user->freguesia = $request->freguesia;
            $user->email = $request->email;
            $user->password = Hash::make($request->password); // password vai encriptada
            $user->tipo = 1; // user estudante é do tipo 1
            $user->save();

            return redirect()
                ->route('login') // redirect to login route after sucess registration
                ->with('success', 'Utilizador criado com sucesso. Faça o login!')
                ->withInput(); // keep the data fill */

        // Se ocorrer um erro com a base de dados
        } catch (QueryException) {
            return redirect()
                ->back()
                ->with('error', $this->errorMessage)
                ->withInput();
        }
    
    }


    public function registoInstituicao_submit(Request $request) {
        try {
            //Form validation
            $request -> validate([
                'nome' => 'required|max:100',
                'nif' => 'required|unique:users|min:9|max:9',
                'tipo_instituicao' => 'required',
                'email' => 'required|email|max:50|unique:users',
                'password' => 'required|min:8|max:50',
                'confirmar_password' => 'required|same:password',
                'aceitar_termos' => 'required',
            ], [
                'nome.required' => $this->required,
                'nif.required' => $this->required,
                'nif.unique' => 'NIF já se encontra registado',
                'nif.min' => $this->nifValidation,
                'nif.max' => $this->nifValidation,
                'tipo_instituicao.required' => $this->required,
                'email.required' => $this->required,
                'email.email' => $this->validEmail,
                'email.unique' => $this->uniqueEmail,
                'password.required' => $this->required,
                'password.min' => $this->passwordMin,
                'confirmar_password.required' => $this->required,
                'confirmar_password.same' => $this->passwordMatch,
                'aceitar_termos' => $this->termsAndConditions,
            ]);

            // ver a form data com o dd
            /* dd($request->all()); */

            // get form data
            $user = new UserModel();
            $user->nome = $request->nome;
            $user->nif = $request->nif;
            $user->tipo_instituicao = $request->tipo_instituicao;
            $user->email = $request->email;
            $user->password = Hash::make($request->password); // password vai encriptada
            $user->tipo = 2; // user instituição é do tipo 2
            $user->save();

            return redirect()
                ->route('login') // redirect to login route after sucess registration
                ->with('success', 'Utilizador criado com sucesso. Faça o login!')
                ->withInput(); // keep the data fill */

        // Se ocorrer um erro com a base de dados
        } catch (QueryException) {
            return redirect()
                ->back()
                ->with('error', $this->errorMessage)
                ->withInput();
        }
    }


    public function login_submit(Request $request) {
    /*          //fake login
        session()->put('email', 'student');
    */
        try {
            //Form validation
            $request -> validate([
                'email' => 'required|email',
                'password' => 'required',
            ], [
                'email.required' => $this->required,
                'email.email' => $this->validEmail,
                'password.required' => $this->required
            ]);

            // get form data
            $email = $request->input('email');
            $password = $request->input('password');

            // check if user exists in DB
            $model = new UserModel();
            $user = $model->where('email', '=', $email)
                        ->whereNull('deleted_at') // ignore deleted users
                        ->first();

            // check is user exists
            if ($user) {
                //if user exists check if password is correct
                if (password_verify($password, $user->password)) {
                    $session_data = [
                        'id' => $user->id,
                        'tipo' => $user->tipo,
                        'email' => $user->email,
                        'primeiro_nome' => $user->primeiro_nome,
                        'ultimo_nome' => $user->ultimo_nome,
                        'genero' => $user->genero,
                        'freguesia' => $user->freguesia,
                        'concelho' => $user->concelho,
                        'distrito' => $user->distrito,
                        'nome' => $user->nome,
                        'nif' => $user->nif,
                        'tipo_instituicao' => $user->tipo_instituicao,
                    ];
                    session()->put($session_data);
                    return redirect()->route('home');
                }
            }

            // invalid login
            return redirect()
                ->route('login') // redirect to login route
                ->withInput() // manter os dados preenchidos
                ->with('login_error', 'Login inválido'); // return message

        // Se ocorrer um erro com a base de dados
        } catch (QueryException) {
            return redirect()
                ->back()
                ->with('error', $this->errorMessage)
                ->withInput();
        }
    }
        
        
    // logout
    public function logout() {
        session()->forget('email');
        session()->forget('primeiro_nome');
        session()->forget('ultimo_nome');
        session()->forget('nome');
        return redirect()->route('home');
    }

    
    public function enviarMensagem(Request $request) {
        //Form validation
        $request -> validate([
            'nome' => 'required|max:50',
            'email' => 'required|email',
            'assunto' => 'required',
            'mensagem' => 'required|min:30'
        ], [
            'nome.required' => $this->required,
            'email.required' => $this->required,
            'email.email' => $this->validEmail,
            'assunto.required' => $this->required,
            'mensagem.required' => $this->required,
            'mensagem.min' => 'Mensagem demasiado curta. Tem de ter no mínimo 30 caracteres.'
        ]);

        return redirect()
            ->route('contactos')
            ->with('success', 'Mensagem enviada com sucesso!')
            ->withInput();
    }

}

