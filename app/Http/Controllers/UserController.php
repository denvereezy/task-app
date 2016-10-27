<?php

namespace App\Http\Controllers;

use App\User;
use Mail;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $users;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $currentId = $request->user()->id;
        $users = $request->user()->where('id', '!=', $currentId)->get();

        return view('users', [
        'users' => $users,
      ]);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $email = $user->email;
        $subject = 'Task App Account';
        $data = ['name' => 'Task App'];                                           //inject variable into the scope of the closure
      Mail::raw($user->name.' your account has been deleted', function ($message) use ($email, $subject) {
          $message->to($email)
                  ->subject($subject);
          $message->from('denverdaniels52@gmail.com', 'Task App');
      });
        $this->authorize('destroy', $user);
        $user->delete();

        return redirect('/users');
    }

    public function profile(Request $request)
    {
        $user = $request->user();

        return view('profile', [
      'user' => $user,
    ]);
    }

    public function editUserProfile(User $user)
    {
        return view('editProfile', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $this->validate($request, [
          'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $imagePath = $request->image->move(public_path('images'), $imageName);
        $image = str_replace('/home/Projects/denver/public', '', $imagePath);
        $user->update(['image' => $image,
                        'name' => $request->name,
                        'updated_at' => $request->updated_at, ]);

        return redirect('/profile');
    }
}
