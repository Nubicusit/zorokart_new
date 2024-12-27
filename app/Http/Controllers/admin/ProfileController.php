<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = $user = Auth::user();

        return view('admin.profile.index', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $profileInput = Auth::user();
        $validatedData = $request->all();
        $profileInput->first_name = $validatedData['first_name'];
        $profileInput->last_name = $validatedData['last_name'];
        $profileInput->email = $validatedData['email'];
        $profileInput->phone = $validatedData['phone'];

        $profileInput->update();

        return redirect()->route('admin.profile.index')->with('success', 'Profile updated successfully');
    }

    public function show()
    {
    }

    public function destroy($id)
    {
    }
}
