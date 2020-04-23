<?php

namespace Binarcode\NovaChat\Resources;

use Binarcode\NovaChat\Models\MessageModel;
use Binarcode\NovaChat\Models\RecipientModel;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Resource;

class RecipientResource extends Resource
{
    public static $model = RecipientModel::class;

    public static $title = 'first_name';

    public function fields(Request $request)
    {
        return [
            Text::make('Name', function () {
                return "{$this->first_name} {$this->last_name}";
            })->hideFromDetail(),

            Text::make('Your Conversation With', function () {
                return "{$this->first_name} {$this->last_name}";
            })->hideFromIndex(),

            Number::make('Number of Messages', function () {
                return MessageModel::withRecipient($this->id)
                    ->count();
            }),

            Boolean::make('Have Unread', function () {
                return MessageModel::unread()
                    ->withRecipient($this->id)
                    ->count();
            }),


            HasMany::make('Messages', 'messages', MessagesResource::class),
        ];
    }

    public static function label()
    {
        return 'Chat';
    }
}
