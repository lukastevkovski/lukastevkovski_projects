<?php
namespace App\Http\Controllers;
use App\Models\Discussion;
use Illuminate\Http\Request;

class AdminController extends Controller {
    public function __construct() {
        $this->middleware('admin');
    }

    public function pending() {
        $discussions = Discussion::where('is_approved', false)->with(['user', 'category'])->get();
        return view('admin.pending', compact('discussions'));
    }

    public function approve(Discussion $discussion) {
        $discussion->update(['is_approved' => true]);
        return redirect()->route('admin.pending')->with('success', 'Discussion approved.');
    }
}