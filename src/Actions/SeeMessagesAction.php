<?php

namespace Binarcode\NovaChat\Actions;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;

class SeeMessagesAction extends Action
{
    use InteractsWithQueue, Queueable;

    public $name = 'See Messages';

    public function handle(ActionFields $fields, Collection $models)
    {
        return Action::redirect('/admin/resources/messages/'.$models->first()->id);
    }
}

