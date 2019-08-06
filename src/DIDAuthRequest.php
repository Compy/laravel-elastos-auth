<?php
/**
 * Created by PhpStorm.
 * User: compy
 * Date: 8/6/19
 * Time: 8:51 AM
 */

namespace Compy\LaravelElastosAuth;

use Illuminate\Database\Eloquent\Model;

class DIDAuthRequest extends Model
{
    protected $table = 'did_auth_requests';
    protected $fillable = ['state', 'data'];
    protected $casts = [
        'data' => 'array'
    ];
}
