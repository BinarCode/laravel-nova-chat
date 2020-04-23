<?php

namespace Binarcode\NovaChat\Fields;

use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Field;

class FooField extends Field
{
    public $component = 'foo-field';
}
