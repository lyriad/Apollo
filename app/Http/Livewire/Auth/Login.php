<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;

class Login extends Component
{

    var $email;
    var $password;

    public function addErrorMsg(string $key, string $message) {
        $this->resetErrorBag($key);
        $this->addError($key, $message);
    }

    public function login() 
    {
        $this->validate([ 'email' => 'required|email|exists:users,email', 'password' => 'required', ]);

        if (auth()->attempt(['email' => $this->email, 'password' => $this->password]))
        {

            auth('web')->login(auth()->user(), true);

            return redirect()->route('home');
        }

        $this->addErrorMsg('login', 'Your password is incorrect!');
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
