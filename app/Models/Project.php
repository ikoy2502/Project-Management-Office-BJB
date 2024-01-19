<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'project_code', 'project_name', 'project_owner_id', 'lead_subgroup_id', 'secondary_subgroup_id',
        'description', 'category_id', 'priority_id', 'pic_id', 'secondary_pic_id',
        'target_date', 'revision_id', 'status_id', 'triwulan', 'imported_file', 'started_at', 'created_at'
    ];

    public function projectOwner()
    {
        return $this->belongsTo(ProjectOwner::class, 'project_owner_id');
    }

    public function leadSubgroup()
    {
        return $this->belongsTo(ProjectOwner::class, 'lead_subgroup_id');
    }

    public function secondarySubgroup()
    {
        return $this->belongsTo(ProjectOwner::class, 'secondary_subgroup_id');
    }

    public function pic()
    {
        return $this->belongsTo(User::class, 'pic_id');
    }

    public function secondaryPic()
    {
        return $this->belongsTo(User::class, 'secondary_pic_id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }


    public function revision()
    {
        return $this->belongsTo(Revisions::class, 'revision_id');
    }

    public function tasks()
    {
    return $this->hasMany(Task::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    // Define the 'priority' relationship
    public function priority()
    {
        return $this->belongsTo(Priority::class, 'priority_id');
    }
    }

    
    


