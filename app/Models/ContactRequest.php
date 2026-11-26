<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ContactRequest extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'type',
        'subject',
        'message',
        'status',
        'admin_notes',
    ];

    public function scopeCitas(Builder $query): Builder
    {
        return $query->where('type', 'solicitud')
            ->where(function (Builder $q) {
                $q->where('subject', 'like', 'Lo llamamos%')
                    ->orWhere('subject', 'like', 'Solicitud de cita%');
            });
    }

    public function scopeMensajes(Builder $query): Builder
    {
        return $query->where('type', 'solicitud')
            ->where('subject', 'not like', 'Lo llamamos%')
            ->where('subject', 'not like', 'Solicitud de cita%');
    }

    public function isCita(): bool
    {
        $subject = (string) $this->subject;
        return strpos($subject, 'Lo llamamos') === 0 || strpos($subject, 'Solicitud de cita') === 0;
    }

    public function whatsappUrl(): ?string
    {
        $digits = preg_replace('/[^0-9]/', '', (string) $this->phone);
        if (!$digits) {
            return null;
        }
        if (strlen($digits) === 10) {
            $digits = '57' . $digits;
        }
        return 'https://wa.me/' . $digits;
    }
}
