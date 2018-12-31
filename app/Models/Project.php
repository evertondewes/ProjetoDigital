<?php

namespace ProjetoDigital\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use ModelTrait, SoftDeletes;

    protected $dates = ['deleted_at'];

    public function projectType()
    {
        return $this->belongsTo(ProjectType::class);
    }

    public function projectAddresses()
    {
        return $this->hasMany(ProjectAddress::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function people()
    {
        return $this->belongsToMany(Person::class)->withTimestamps();
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

//    public function projectDocuments()
//    {
//        return $this->hasMany(ProjectDocument::class);
//    }

    public function lastEvent()
    {
        return $this->events()->latest()->first();
    }

    public function formattedAddress()
    {
        $address = $this->address;

        return "{$address->street} {$address->number},{$address->district}, {$address->complement}";
    }

    public function getAddressAttribute()
    {
        return $this->projectAddresses()->latest()->first();
    }

    public function getTechnicalManagerAttribute()
    {
        return $this->filterUser('responsavel_tecnico');
    }

    public function getOwnerAttribute()
    {
        return $this->people()->first();
    }

    protected function filterUser($roleName)
    {
        return $this->users()
            ->join('roles', 'roles.id', '=', 'users.role_id')
            ->whereRaw("roles.name = '{$roleName}'")
            ->first();
    }

    public function deletedBy($id)
    {
        $this->deleted_by = $id;

        $this->save();

        return $this;
    }

    public function save(array $options = array())
    {
        if(empty($this->access_key)) {
            $this->access_key = rand(100000, 999999);
        }
        return parent::save($options);
    }
}
