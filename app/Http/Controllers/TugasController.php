<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TugasController extends Controller
{
    public function index(): View
    {
        $daftar = Tugas::latest()->get();

        return view('tugas.index', ['daftar' => $daftar]);
    }

    public function create(): View
    {
        return view('tugas.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Tugas::create($this->validated($request));

        return redirect()->route('tugas.index')->with('status', 'Tugas berhasil ditambahkan.');
    }

    public function show(Tugas $tugas): View
    {
        return view('tugas.show', ['tugas' => $tugas]);
    }

    public function edit(Tugas $tugas): View
    {
        return view('tugas.edit', ['tugas' => $tugas]);
    }

    public function update(Request $request, Tugas $tugas): RedirectResponse
    {
        $tugas->update($this->validated($request));

        return redirect()->route('tugas.index')->with('status', 'Tugas berhasil diperbarui.');
    }

    public function destroy(Tugas $tugas): RedirectResponse
    {
        $tugas->delete();

        return redirect()->route('tugas.index')->with('status', 'Tugas berhasil dihapus.');
    }

    /**
     * Validasi input; checkbox yang tidak dicentang dikirim sebagai tidak ada, jadi dikonversi ke boolean.
     *
     * @return array{judul: string, deskripsi: ?string, selesai: bool}
     */
    private function validated(Request $request): array
    {
        $data = $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'deskripsi' => ['nullable', 'string'],
        ]);

        $data['selesai'] = $request->boolean('selesai');

        return $data;
    }
}
