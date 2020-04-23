<?php

namespace Binarcode\NovaChat\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MessageModel
 *
 * @method static Builder|MessageModel unread
 * @method static Builder|MessageModel mines
 * @method static Builder|MessageModel withRecipient(int $id)
 * @property int from_id
 * @property int to_id
 * @package Binarcode\NovaChat\Models
 */
class MessageModel extends Model
{
    protected $dates = [
        'seen_at',
    ];

    protected $with = [
        'to',
    ];

    protected static function booted()
    {
        static::creating(function(self $model) {
            $model->from_id = auth()->user()->id;
        });
    }

    public function getTable()
    {
        return config('nova-chat.messages_table', 'messages');
    }

    public function sender()
    {
        return $this->belongsTo(config('nova-chat.recipients_model'), 'from_id', 'id');
    }

    public function recipient()
    {
        return $this->belongsTo(config('nova-chat.recipients_model'), 'to_id', 'id');
    }

    public function scopeUnread($query)
    {
        $query->whereNull('seen_at')->where('from_id', '!=', auth()->user()->id);
    }

    public function scopeMines($query)
    {
        $query->where('from_id', auth()->user()->id)
            ->orWhere('to_id', auth()->user()->id);
    }

    public function scopeWithRecipient(Builder $query, $id)
    {
        $query
            ->where('from_id', auth()->user()->id)
            ->where('to_id', $id)
            ->orWhere(function ($query) use ($id) {
                $query->where('to_id', auth()->user()->id)
                    ->where('from_id', $id);
            });
    }

    public static function markSeenWithRecipientUntil(RecipientModel $recipient, int $id)
    {
        return static::query()
            ->where('id', '<=', $id)
            ->whereNull('seen_at')
            ->where('from_id', $recipient->id)
            ->orWhere('to_id', $recipient->id)
            ->update([
                'seen_at' => now()
            ]);
    }

    public function scopeFromRecipient($query, RecipientModel $recipient)
    {
        $query->where('from_id', $recipient->id);
    }
}
