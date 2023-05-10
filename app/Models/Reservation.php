<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Reservation extends Pivot {
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function representation() {
        return $this->belongsTo(Representation::class);
    }
}





