<?php

namespace Sinarajabpour1998\AclManager\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Sinarajabpour1998\AclManager\Http\Requests\UserRequest;
use App\Models\Province;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    public function create()
    {
        $provinces = Province::all();
        return view('vendor.AclManager.users.create', compact('provinces'));
    }

    public function store(UserRequest $request , User $user)
    {
        $user->fill($request->except('status', 'mobile', 'email'));
        if ($request->status == 'verified'){
            $user->email_verified_at = Carbon::now();
        }
        $user->mobile = encryptString($request->mobile);
        $user->mobile_key = makeHash($request->mobile);
        $user->email = encryptString($request->email);
        $user->email_key = makeHash($request->email);
        $user->password = Hash::make($request->password);
        $user->save();
        session()->flash('success', 'مشخصات کاربر با موفقیت ثبت شد.');
        return redirect()->route('users.edit', $user);
    }

    public function edit(User $user)
    {
        $provinces = Province::all();
        $status = 'verified';
        $user->mobile = decryptString($user->mobile);
        $user->email = decryptString($user->email);
        if (is_null($user->email_verified_at)){
            $status = 'not_verified';
        }
        return view('vendor.AclManager.users.edit', compact('user', 'status', 'provinces'));
    }

    public function update(UserRequest $request, User $user)
    {
        dd($request->all());
        $user->fill($request->except('status', 'mobile', 'email', 'nid', 'city', 'postal_code', 'address'));
        if ($request->status == 'verified'){
            $user->email_verified_at = Carbon::now();
        }else{
            $user->email_verified_at = null;
        }
        $user->mobile = encryptString($request->mobile);
        $user->mobile_key = makeHash($request->mobile);
        $user->email = encryptString($request->email);
        $user->email_key = makeHash($request->email);
        // need to change nid column to string 256
        $user->nid = encryptString($request->nid);
        $user->save();
        session()->flash('success', 'مشخصات کاربر با موفقیت ویرایش شد.');
        return redirect()->back();
    }

    public function destroy(User $user)
    {

    }

    public function userResetPasswordForm(User $user) {
        return view('vendor.AclManager.users.user_reset_password', compact('user'));
    }

    public function userResetPassword(\Illuminate\Http\Request $request, User $user)
    {
        $request->validate([
            'password' => 'required|min:8|confirmed',
        ]);

        $user->password = Hash::make($request->password);
        $user->save();

        session()->flash('success', 'کاربر گرامی رمز عبور با موفقیت بروزرسانی گردید.');

        return redirect()->back();
    }
}
