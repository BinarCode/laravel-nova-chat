<?php

return [
    'messages_table' => 'messages',

    'recipients_table' => 'users',

    'recipients_model' => \Binarcode\NovaChat\Models\RecipientModel::class,

    'messages_model' => \Binarcode\NovaChat\Models\MessageModel::class,

    'realtime' => false,
];
