<?php

namespace App\Actions\Externalsessions\Admin;

use App\Models\Externalsessions;
use Lorisleiva\Actions\Concerns\AsAction;

class DeleteExternalsessionAction
{
    use AsAction;

    public function handle(Externalsessions $externalsession)
    {
        $externalsession->delete();
        return back();
    }
}
