<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Novel;
use Illuminate\Support\Facades\Auth;

class NovelController extends Controller
{
    // 🔐 Wajib login
    public function __construct()
    {
        $this->middleware('auth');
    }

    // 📄 List novel milik user
    public function index()
    {
        $novels = Novel::where('user_id', Auth::id())->latest()->get();

        return view('novels.index', compact('novels'));
    }

    // ➕ Form tambah novel
    public function create()
    {
        return view('novels.create');
    }

    // 💾 Simpan novel
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Novel::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'status' => 'ongoing',
            'publish_status' => 'draft',
            'views' => 0,
        ]);

        return redirect()->route('novels.index')
            ->with('success', 'Novel berhasil ditambahkan');
    }

    // 📖 Detail novel
    public function show($id)
    {
        $novel = Novel::with('chapters')->findOrFail($id);

        return view('novels.show', compact('novel'));
    }

    // ✏️ Form edit
    public function edit($id)
    {
        $novel = Novel::where('user_id', Auth::id())->findOrFail($id);

        return view('novels.edit', compact('novel'));
    }

    // 🔄 Update novel
    public function update(Request $request, $id)
    {
        $novel = Novel::where('user_id', Auth::id())->findOrFail($id);

        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $novel->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('novels.index')
            ->with('success', 'Novel berhasil diupdate');
    }

    // 🗑️ Hapus novel
    public function destroy($id)
    {
        $novel = Novel::where('user_id', Auth::id())->findOrFail($id);

        $novel->delete();

        return redirect()->route('novels.index')
            ->with('success', 'Novel berhasil dihapus');
    }
    
}