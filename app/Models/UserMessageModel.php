<?php
/**
 * Created by PhpStorm.
 * User: JN
 * Date: 4/26/2016
 * Time: 3:46 PM
 */

namespace app\Models;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class UserMessageModel extends Model
{
    public $table='user_message';
    public $primaryKey='mid';
    public $timestamps=FALSE;
}