<?php

namespace App\Util;

use Illuminate\Support\HtmlString;

class MoneyFormat
{
    protected int $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function html()
    {
        if ($this->value === 0) {
            return new HtmlString("<span class=\"money text-muted\">-</span>");
        }
        $formattedVal = number_format(abs($this->value / 100), 2, '.', ',');
        $sign = $this->value < 0 ? '-' : '+';
        $class = $this->value < 0 ? 'danger' : 'success';
        return new HtmlString("<span class=\"money text-{$class}\">{$sign}£{$formattedVal}</span>");
    }

}
