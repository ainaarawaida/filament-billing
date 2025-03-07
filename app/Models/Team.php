<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Product;
use App\Models\Quotation;
use App\Models\CustomMedia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Team extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function members(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function media(): HasMany
    {
        return $this->hasMany(CustomMedia::class);
    }

    public function quotations(): HasMany
    {
        return $this->hasMany(Quotation::class);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

   



    
}
