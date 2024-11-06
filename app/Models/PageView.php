<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageView extends Model
{
    use HasFactory;
    // Explicitly define the table if it's not following Laravel's naming conventions
    protected $table = 'page_views';

    // Define the fields that can be mass-assigned (if you plan to create new entries)
    protected $fillable = ['page', 'session_id', 'user_agent'];

    // If you don't have timestamps in your table (created_at, updated_at), you can disable them
    public $timestamps = false;
}
