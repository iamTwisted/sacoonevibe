<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Defer Share Payment
    |--------------------------------------------------------------------------
    |
    | This option allows you to control whether members can be approved without
    | having paid for their shares. If set to true, members can be approved
    | with a pending share payment status. If set to false, members must
    | have an active share payment status before they can be approved.
    |
    */

    'defer_share_payment' => env('DEFER_SHARE_PAYMENT', false),

];
