<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

/**
 * @method static create(array $array)
 * @method static findorfail(int $id)
 * @method static orederBy(string $string, string $string1)
 * @method static orderBy(string $string, string $string1)
 * @method static paginate(int $int)
 * @method static where(string $string, string $string1, $input)
 * @method static whereIn(string $string, string $string1, \App\Http\Requests\SearchPropertyRequest $request)
 */
class Proprety extends Model
{
    use HasFactory;
    protected $guarded=[];
    /**
     * @var mixed
     */

    public function options():BelongsToMany
    {
      return   $this->belongsToMany(Option::class);
    }
    public function amin():string
    {
        return Str::slug($this->title);
    }
}
