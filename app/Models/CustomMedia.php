<?php

namespace App\Models;

use Awcodes\Curator\Models\Media;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CustomMedia extends Media
{
    public function teams(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

}
