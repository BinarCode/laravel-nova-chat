<?php

namespace Binarcode\NovaChat\Resources;

use Binarcode\NovaChat\Models\MessageModel;
use Binarcode\NovaChat\Models\RecipientModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Resource;

class MessagesResource extends Resource
{
    public static $displayInNavigation = false;

    public static $model = MessageModel::class;

    public function fields(Request $request)
    {
        return [
            BelongsTo::make('To', 'recipient', RecipientResource::class)
                ->hideWhenCreating(),

            BelongsTo::make('Sender', 'sender', RecipientResource::class)
                ->hideWhenCreating(),


           Heading::make('<p class="text-info">Message to <strong>'. optional(RecipientModel::find($request->viaResourceId))->name .'</strong></p>')->asHtml()
            ->hideFromDetail(),

            Textarea::make('Message', 'body'),

            Text::make('Message', function () {
                return Str::substr(e($this->body), 0, 100);
            })->onlyOnIndex(),

            Text::make('', 'to_id')->default(function ($request) {
                return $request->viaResourceId;
            })->withMeta(['type' => 'hidden']),

            Text::make('When', function () {
                return Carbon::make($this->created_at)->diffForHumans();
            })
        ];
    }

    public static function label()
    {
        return 'Messages';
    }

    public static function uriKey()
    {
        return 'messages';
    }
}
