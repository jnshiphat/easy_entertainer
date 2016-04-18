<?php namespace App\Models;
	use Illuminate\Auth\Authenticatable;
	use Illuminate\Database\Eloquent\Model;

	class AdminModel extends Model
	{
	    public $table='sys_admins';
	    public $primaryKey='id';
	    public $timestamps=FALSE;
	}
?>