<?php

namespace App\Models;

use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hasrole extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $table='role_has_permissions';

    public function parmission()
    {
        return $this->hasOne(Permission::class);
    }
    public function admin()
    {
        return $this->hasOne(Admin::class);
    }
    public static function JoinTablePermission()
    {
        $result = DB::table('role_has_permissions as a')
                ->join('permissions as b','a.permission_id','=','b.id')
                ->join('submenu as c','b.submenu_id','=','c.id')
                ->select('b.name','b.name_ind','a.role_id','b.submenu_id','b.id')
                ->groupBy('b.id')
                ->orderBy('b.id','ASC')
                ->get();
        return $result;
     }
}

