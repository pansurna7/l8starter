<?php

namespace App\Http\Livewire\Admin\ManagementSystem\User;

use App\Models\Admin;
use Illuminate\Auth\Middleware\Authorize;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class UserComponent extends Component
{
    public $nama;
    public $email;
    public $role;
    public $password;
    public $confpassword;
    public $idu;
    public $selectedrole;
    public $UserIDAkanDihapus=null;
    protected $listeners=['konfirmasiHapus'=>'hapusUser'];

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
        $this->resetForm();
        $user=Admin::find($id);
        $this->idu=$user->id;
        $this->nama=$user->name;
        $this->email=$user->email;
        $this->selectedrole=$user->roles->pluck('id');
    }
    public function update(){
        $user=Admin::find($this->idu);
        DB::beginTransaction();
        if(empty($this->password)){
            $this->validate([
                'nama'=>'required|string|max:30',
                'selectedrole'=>'required',
                'email' => 'required|email|unique:admins,email,'.$user->id,
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
            ]);
            $this->password=$user->password;
        }else{
            $this->validate([
                'nama'=>'required|string|max:30',
                'selectedrole'=>'required',
                'email' => 'required|email|unique:admins,email,'.$user->id,
                'password'=>'required|min:6|same:confpassword',
                'confpassword'=>'same:password',
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
                'password.same' => 'Kata Sandi Tidak Sama',
                'confpassword.same' => 'Kata Sandi Tidak Sama',
            ]);

        }
        try {
            $user->update([
                'name'=>$this->nama,
                'email'=>$this->email,
                'password'=>Hash::make($this->password),
            ]);
            $user->syncRoles($this->selectedrole);
            $this->emit('userUpdate');
            $this->resetForm();
            $this->dispatchBrowserEvent('pesanUpdate',['message'=>'Data Pengguna  Berhasil Diubah']);
        } catch (\Throwable $th) {
            DB::rollBack();
            $this->dispatchBrowserEvent('pesanError',['message'=> $th->getMessage()]);

        }finally{
            DB::commit();
        }
    }
    public function konfirmasiHapusUser($id){
    $this->UserIDAkanDihapus=$id;
    $this->dispatchBrowserEvent('tampil-hapus-konfirmasi');
    }
    public function hapusUser(){
           $user=Admin::findOrFail($this->UserIDAkanDihapus);
           $user->delete();
           $this->dispatchBrowserEvent('pesanHapus',['message'=>'Data User Berhasil Dihapus']);
    }



    public function render()
    {
        if(Auth::guard('admin')->user()->can('user_show')){
            $roles=Role::all();
            $data = Admin::orderBy('id','ASC')->get();
            // with i fungsinya untuk nomor urut di table
            return view('livewire.admin.management-system.user.user-index',['data'=>$data,'roles'=>$roles])->with('i')->layout('BackendAdmin/layouts/base');

        }else{

            abort('403', 'Anda Tidak Punya Akses Ke Halaman Ini.');
        }



    }
}
