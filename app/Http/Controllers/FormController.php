<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FormController extends Controller
{
    public function submit(Request $request): RedirectResponse
    {
        // Валідація даних
        $request->validate([
            'surname' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:1',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Обробка завантаженого фото
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('uploads'), $photoName);
            $photoPath = env('APP_URL').'/uploads/'.$photoName;
        }

        $member = Member::query()->create([
            'surname' => $request->post('surname'),
            'name' => $request->post('name'),
            'age' => $request->post('age'),
            'photo' => $photoPath ?? null,
        ]);

        return redirect()->route('form.show')
            ->with([
                'success' => 'Форма успішно відправлена!',
                'id' => "Ваш ID: $member->id",
            ]);
    }
}
