<?php

namespace Binarcode\NovaChat\Tools;

use Binarcode\NovaChat\Resources\MessagesResource;
use Binarcode\NovaChat\Resources\RecipientResource;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;
use Laravel\Nova\Tool;

class ChatTool extends Tool
{
    public $messagesResource = MessagesResource::class;

    public $recipientResource = RecipientResource::class;

    public function boot()
    {
        Nova::resources([
            $this->recipientResource,
            $this->messagesResource,
        ]);

        Nova::serving(function (ServingNova $event) {
            Nova::script('chat-script', __DIR__ . '/../../dist/js/chat.js');
        });
    }

    public function chatResource(string $chatResource)
    {
        $this->messagesResource = $chatResource;

        return $this;
    }

    public function recipientResource(string $resource)
    {
        $this->recipientResource = $resource;

        return $this;
    }
}
