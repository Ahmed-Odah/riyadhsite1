<?php

namespace App\Actions\BlackAndWhite;

use App\Models\BlackAndWhite;
use Lorisleiva\Actions\Concerns\AsAction;

class BlackAndWhitetIndexAction
{
    use AsAction;

    public function handle()
    {
        $photos=BlackAndWhite::query()->get();
        return view('BlackAndWhite.Index', compact('photos'));
    }
}
