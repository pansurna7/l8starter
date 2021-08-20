<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mainmenu;

class Submenu extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $table='submenu';

    public function mainMenu()
    {
       return $this->belongsTo(Mainmenu::class,'menu_id');
    }
}
