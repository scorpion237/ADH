<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

#[Fillable(['title', 'slug', 'description', 'content', 'image', 'budget', 'location', 'status', 'seo_title', 'seo_description'])]
class Project extends Model
{
    use HasFactory;
}
