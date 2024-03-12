<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Frontend\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{

    public function index()
    {
        $supports = Support::latest()->paginate(10);
        return view('backend.pages.support.frontend_support', [
            'supports'=>$supports
        ]);
    }

    //---delete new support 
    public function delete($id)
    {
        $data = Support::findOrFail($id);
        $data->delete();
        return back()->with('success', 'Support Message Delete Successfully!');
    }

    public function allMessages()
    {
        $supports = Contact::orderByDesc('created_at')->paginate(10);
        return view('backend.pages.support.contact', compact('supports'));
    }

    public function makeMark(Request $request, $supportId)
    {
        $marked = Contact::where('id', $supportId)->update(['seen' => 1]);
        if ($marked) {
            return redirect()->back()->with('success', 'You have marked as seen.');
        }
        return redirect()->back()->with('error', 'Error to mark as seen.');
    }

    public function unseen(Request $request)
    {
        $supports = Contact::where('seen', 0)->orderByDesc('created_at')->paginate(10);
        return view('backend.pages.support.support',  compact('supports'));
    }

    //-contact_message_delete
    public function contact_message_delete($id)
    {
        $data = Contact::findOrFail($id);
        $data->delete();
        return back()->with('message', 'Contact Message Delete Successfully!');
    }
}
