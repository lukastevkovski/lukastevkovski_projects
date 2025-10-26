<?php
namespace App\Http\Controllers;
use App\Models\Discussion;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiscussionController extends Controller {
    public function index() {
        $discussions = Discussion::where('is_approved', true)->with(['user', 'category'])->latest()->get();
        return view('discussions.index', compact('discussions'));
    }

    public function create() {
        $categories = Category::all();
        return view('discussions.create', compact('categories'));
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'picture' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::id();
        if ($request->hasFile('picture')) {
            $data['picture'] = $request->file('picture')->store('pictures', 'public');
        }

        Discussion::create($data);
        return redirect()->route('home')->with('success', 'Discussion created and pending approval.');
    }

    public function show(Discussion $discussion) {
        if (!$discussion->is_approved) {
            abort(403, 'Discussion not approved');
        }
        $discussion->load(['user', 'category', 'comments.user']);
        return view('discussions.show', compact('discussion'));
    }
}