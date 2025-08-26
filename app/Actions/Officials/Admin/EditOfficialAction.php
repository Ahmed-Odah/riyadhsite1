<?php

namespace App\Actions\Officials\Admin;
use Illuminate\Http\Request;
use App\Models\official;
use Lorisleiva\Actions\Concerns\AsAction;

class EditOfficialAction
{
    use AsAction;

    public function handle(Request $request, official $official)
    {
        $data = [
            'title' => $request->get('title'),
            'description' => $request->get('description'),
        ];

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        if ($request->hasFile('cover_url')) {
            $data['cover_url'] = $request->file('cover_url')->store('pdfs', 'public');
        }

        $official->update($data);

        return redirect()->route('dashboard')->with('success', 'تم تحديث الكتاب بنجاح');
    }

}
