<?php

namespace App\Http\Livewire\Admin\ManagementSystem\User;

use App\Models\Admin;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;



class UserComponent extends Component
{
    public $nama;
    public $email;
    public $role;
    public $password;
    public $confpassword;

    public function resetForm(){
        $this->nama='';
        $this->idu='';
        $this->email='';
        $this->password='';
        $this->confPassword='';
        $this->resetValidation();
    }
    public function store(){
        $this->validate([
            'nama'=>'required|string|max:30',
            'role'=>'required',
            'email'=>'required|email|unique:admins,email',
            'password'=>'required|min:6|same:confpassword',
            'confpassword'=>'required|same:password',

            // 'filename'=>'mimes:zip,rar,tar.gz|max:2000',
        ],
        [
            'nama.required' => 'Nama Harus Di Isi',
            'nama.string' => 'Nama Harus Berupa Huruf',
            'nama.max' => 'Panjang Karakter Maximal 20',
            'role.required'=>'Pilih Salah Satu Peran Pengguna',
            'email.required' => 'Email Harus Di Isi',
            'email.email' => 'Format Email Salah',
            'email.unique' => 'Email Sudah Terdaftar',
            'password.required' => 'Kata Kunci Harus Di Isi',
            'password.min' => 'Panjang Karakater Minimal 6',
            'password.same' => 'Kata Sandi Tidak Sama',
            'confpassword.same' => 'Kata Sand Tidak Sama',

        ]);
        DB::beginTransaction();
        try {
            $user=Admin::create([
                'name' => $this->nama,
                'email' => $this->email,
                'password' => Hash::make($this->password)
            ]);
            $user->assignRole($this->role);
            $this->emit('userAdd');
            $this->resetForm();
            $this->dispatchBrowserEvent('pesanSimpan',['message'=>'Data Pengguna  Berhasil Dibuat']);
        } catch (\Throwable $th) {
            DB::rollBack();
            $this->dispatchBrowserEvent('pesanError',['message'=> $th->getMessage()]);

        }finally{
            DB::commit();
        }

    }
    public function edit($id){
        
    }

    public function render()
    {
        $roles=Role::all();
        $data = Admin::orderBy('id','ASC')->get();
        // with i fungsinya untuk nomor urut di table
        return view('livewire.admin.management-system.user.user-index',['data'=>$data,'roles'=>$roles])->with('i')->layout('BackendAdmin/layouts/base');
    }
}
