<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @method static findorfail(int $id)
 * @method static paginate(int $int)
 * @method static pluck(string $string)
 */
class Option extends Model
{
    use HasFactory;
    protected $guarded=[];

}
