<?php

namespace App\Actions\Officials\Admin;
use App\Models\official;

use Lorisleiva\Actions\Concerns\AsAction;

class OfficialEditView
{
    use AsAction;

    public function handle($id)
    {
        $official = official::findOrFail($id);
        return view('official.admin.edit', compact('official'));
    }
}
