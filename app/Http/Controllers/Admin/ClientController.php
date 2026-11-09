<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ClientController extends Controller
{
    public function edit()
    {
        $clients = Client::orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.clients.edit', compact('clients'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'website' => 'nullable|max:255',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'is_active' => 'nullable|boolean',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $logo = null;

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo')
                ->store('clients', 'public');
        }

        Client::create([
            'name' => $validated['name'],
            'website' => $validated['website'] ?? null,
            'logo' => $logo,
            'is_active' => $request->boolean('is_active'),
            'sort_order' => $validated['sort_order'] ?? 0,
        ]);

        return redirect()
            ->route('admin.clients.edit')
            ->with('success', 'Client berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'website' => 'nullable|max:255',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'is_active' => 'nullable|boolean',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        if ($request->hasFile('logo')) {
            if ($client->logo) {
                Storage::disk('public')->delete($client->logo);
            }

            $client->logo = $request->file('logo')
                ->store('clients', 'public');
        }

        $client->name = $validated['name'];
        $client->website = $validated['website'] ?? null;
        $client->is_active = $request->boolean('is_active');
        $client->sort_order = $validated['sort_order'] ?? 0;

        $client->save();

        return redirect()
            ->route('admin.clients.edit')
            ->with('success', 'Client berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $client = Client::findOrFail($id);

        if ($client->logo) {
            Storage::disk('public')->delete($client->logo);
        }

        $client->delete();

        return redirect()
            ->route('admin.clients.edit')
            ->with('success', 'Client berhasil dihapus.');
    }
}
