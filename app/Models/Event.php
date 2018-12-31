<?php

namespace ProjetoDigital\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use ModelTrait;

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function eventType()
    {
        return $this->belongsTo(EventType::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function eventDocuments()
    {
        return $this->hasMany(EventDocument::class);
    }

    public static function createEvent(Project $project, $event_type_id, $user_id, $obs)
    {

        $event = $project->events()->create([
            'obs' => $obs,
            'event_type_id' => $event_type_id,
            'project_id' => $project->id,
            'user_id' => $user_id,
            //  'created_by' => $user_id
        ]);

        $emails= null;
        foreach($project->people as $person) {
            $emails.= $person->email . ',';
        }

        foreach($project->users as $user) {
            $emails.= $user->email . ',';
        }

        Event::sendMailProjectStatus($emails, $project, $event);

        return $event;
    }

    public static function sendMailProjectStatus($mailList, $project, $event)
    {

        $projectAddresses = $project->projectAddresses[0];

        $subject = 'Projeto ' . $project->id . ' ' . $event->eventType;
        $message = 'Projeto: ' . $project->id . PHP_EOL .
            'Descrição: ' . $project->description . PHP_EOL .
            'Chave de Acesso: ' . $project->access_key . PHP_EOL .
            'Criado por: ' . $project->users[0]->person->name . PHP_EOL .
            'Data: ' . $project->created_at . PHP_EOL .
            'Endereço: ' . $projectAddresses->street . ', ' . $projectAddresses->number . PHP_EOL .
            'Cidade: ' . $projectAddresses->city->name . PHP_EOL .
            'Evento Lançado: ' . $event->eventType->name;

        // "E-Mail Administrator" <postmaster@localhost>

        $header = "FROM: " . 'everton.dewes@gmail.com' . "\r\n".
            "Reply-To: " . 'everton.dewes@gmail.com' . "\r\n".
            "Return-Path: " . 'everton.dewes@gmail.com' . "\r\n".
            "Message-ID: <" . time() . "." . 'everton.dewes@gmail.com' . ">\r\n";

        mail($mailList, $subject, $message, $header );

        return $event;
    }

}
