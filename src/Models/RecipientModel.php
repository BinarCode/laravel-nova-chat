<?php

namespace Binarcode\NovaChat\Models;

use Illuminate\Database\Eloquent\Model;

class RecipientModel extends Model
{
    public function getTable()
    {
        return config('nova-chat.recipients_table', 'users');
    }

    public function messages()
    {
        return $this->hasMany(MessageModel::class, 'from_id', 'id')
            ->where(function ($query) {
                $query->where('from_id', auth()->user()->id)
                    ->orWhere('to_id', auth()->user()->id)
                    ->orWhere(function ($query) {
                        $query->where('to_id', auth()->user()->id)
                            ->orWhere('from_id', auth()->user()->id);
                    });
            })
            ->orWhere(function( $query) {
                $query->where('to_id', $this->id)
                    ->where('from_id', auth()->user()->id);
            })
            ->orWhere(function( $query) {
                $query->where('from_id', auth()->user()->id)
                    ->where('to_id', $this->id);
            });
    }

    public function getNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
