<?php

namespace Binarcode\NovaChat\Policies;

class RecipientPolicy
{
    public function create()
    {
        return false;
    }

    public function view($user, $chat)
    {
        return true;
    }
}
