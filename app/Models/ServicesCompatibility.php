<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ServicesCompatibility extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'disabled_service_id',
    ];

    /**
     * @return BelongsToMany
     */
    public function services(): BelongsToMany
    {
        return $this->belongsToMany(Service::class, 'services_compatibilities', 'id', 'service_id');
    }
}
