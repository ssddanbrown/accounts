<?php

use App\Util\MoneyFormat;

function money(int $val) {
    return new MoneyFormat($val);
}
