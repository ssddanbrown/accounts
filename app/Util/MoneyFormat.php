<?php

namespace App\Util;

use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\HtmlString;

class MoneyFormat implements Htmlable
{
    protected int $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function html(): HtmlString
    {
        if ($this->value === 0) {
            return new HtmlString('<span class="money text-muted">-</span>');
        }
        $formattedVal = number_format(abs($this->value / 100), 2, '.', ',');
        $sign = $this->value < 0 ? '-' : '+';
        $class = $this->value < 0 ? 'danger' : 'success';

        return new HtmlString("<span class=\"money text-{$class}\">{$sign}£{$formattedVal}</span>");
    }

    public function input(): string
    {
        return number_format($this->value / 100, 2, '.', '');
    }

    public function toHtml()
    {
        return $this->html();
    }
}
