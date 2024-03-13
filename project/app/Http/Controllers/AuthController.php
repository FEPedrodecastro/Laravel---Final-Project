<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException; // excepções de bd

class AuthController extends Controller
{
    private $required = 'O campo é de preenchimento obrigatório';
    private $validEmail = 'Indique um email válido';
    private $uniqueEmail = 'O email inserido já se encontra registado';
    private $passwordMin = 'A password tem de ser no mínimo 8 caracteres';
    private $passwordMatch = 'As passwords inseridas não correspondem';
    private $nifValidation = 'O NIF tem de ser composto por 9 dígitos';
    private $termsAndConditions = 'Tem de aceitar os termos e condições';
    private $errorMessage = 'Ocorreu um erro. Por favor, tente mais tarde';


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
                'nif' => 'required|min:9|max:9',
                'tipo_instituicao' => 'required',
                'email' => 'required|email|max:50|unique:users',
                'password' => 'required|min:8|max:50',
                'confirmar_password' => 'required|same:password',
                'aceitar_termos' => 'required',
            ], [
                'nome.required' => $this->required,
                'nif.required' => $this->required,
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

    //Login
    public function login() {
        $data = [
            'title' => 'Login'
        ];

        return view('login', $data);
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
        return redirect()->route('home');
    }


    //Recover password
    public function recuperarPassword() {
        $data = [
            'title' => 'Recuperar palavra-passe'
        ];

        return view('recuperar-password', $data);
    }

    public function recuperarPassword_submit(Request $request) {
        // Form validation
        $request->validate([
            'email' => 'required|email',
        ], [
            'email.required' => $this->required,
            'email.email' => $this->validEmail,
        ]);


         // Get the email from the request
         $email = $request->input('email');
    
         // Check if the email exists in the database
        $model = new UserModel();
        $user = $model->where('email', '=', $email)
                        ->whereNull('deleted_at') // ignore deleted users
                        ->first();

/*      $user = UserModel::where('email', $email)->whereNull('deleted_at')->first(); */
     
        // If the email exists:
         if ($user) {
            // Send a password recovery email or generate a reset token, etc.
            // Return a success message or redirect to a success page
         }

         return redirect()
            ->route('recuperar-password')
            ->withInput() // manter os dados preenchidos
            ->with('password_feedback', 'Caso o seu email se encontre registado, receberá em breve um email com instruções para redefinir a sua palavra-passe.'); // retornar mensagem
    
    }


}
