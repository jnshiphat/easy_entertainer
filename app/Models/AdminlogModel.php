<?php namespace App\Models;
	use Illuminate\Auth\Authenticatable;
	use Illuminate\Database\Eloquent\Model;

	class AdminlogModel extends Model
	{
	    public $table='sys_admins_loggs';
	    public $primaryKey='id';
	    public $timestamps=FALSE;
	}
?>