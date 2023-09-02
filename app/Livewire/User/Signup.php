<?php

namespace App\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Signup extends Component
{
    public $email = '';
    public $fname = '';
    public $lname = '';
    public $password = '';
    public $password_confirmation = '';
    public $registerForm = true;

    protected $rules = [
        'email' => 'required|max:250|email:rfc|unique:users,email',
        'fname' => 'required|min:3|max:50',
        'lname' => 'required|min:3|max:50',
        'password' => 'required|min:8|max:250|confirmed',
        'password_confirmation' => 'required'
    ];
    private function resetInputFields(){
        $this->email = '';
        $this->fname = '';
        $this->lname = '';
        $this->password = '';
        $this->password_confirmation = '';
    }

    public function render()
    {
        return view('livewire.user.signup');
    }

    public function updated($key)
    {
        $this->validateOnly($key);
    }

    public function register()
    {
        $this->registerForm = !$this->registerForm;
    }

    public function registerStore()
    {
        $this->validate();
        $this->createUser();
        $this->resetInputFields();
        $this->register();
    }

    private function hashedPassword()
    {
        return Hash::make($this->password);
    }

    private function createUser()
    {
        $user = new User();
        $user->fill([
            'email' => $this->email,
            'fname' => $this->fname,
            'lname' => $this->lname,
            'password' => $this->hashedPassword()
        ]);
        $user->save();
    }

}
