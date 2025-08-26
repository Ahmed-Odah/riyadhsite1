<?php

namespace App\Actions\Officials\Admin;

use Lorisleiva\Actions\Concerns\AsAction;
use App\Models\official;

class DeleteOfficialAction
{
    use AsAction;

    public function handle(official $official)
    {
        $official->delete();
        return back();
    }
}
