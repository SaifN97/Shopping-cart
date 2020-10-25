<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function purchase()
    {
        return $this->purchased = true;
    }

    public function isPurchased()
    {
        if ($this->purchased) {
            return true;
        }
        return false;
    }
}
