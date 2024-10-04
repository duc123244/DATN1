<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard'); // Chuyển đến view của dashboard
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validate the form inputs
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Get the credentials from the request
        $credentials = $request->only('email', 'password');

        // Kiểm tra xem email có tồn tại trong cơ sở dữ liệu hay không
        $user = User::where('email', $credentials['email'])->first();

        if ($user) {
            // Nếu email đúng, kiểm tra mật khẩu
            if (Auth::attempt($credentials)) {
                $user = Auth::user();

                // Kiểm tra vai trò của người dùng
                if ($user->role === 'admin' || $user->role === 'employee') {
                    return redirect()->route('admin.dashboard');
                } else {
                    return redirect()->route('user.index');
                }
            } else {
                // Nếu email đúng nhưng mật khẩu sai
                return back()->withErrors([
                    'password' => 'Mật khẩu không chính xác.',
                ])->withInput();
            }
        } else {
            // Nếu email không tồn tại
            return back()->withErrors([
                'email' => 'Email không tồn tại.',
            ])->withInput();
        }
    }


    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name_user' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        try {
            User::create([
                'name_user' => $request->name_user,
                'email' => $request->email,
                'password' => $request->password,
                'role_id' => User::MEMBER_TYPE,
            ]);
            return redirect()->route('login')->with('success', 'Đăng ký thành công. Vui lòng đăng nhập.');
        } catch (\Exception $e) {
            return back()->withErrors(['register' => 'Đã xảy ra lỗi. Vui lòng thử lại.']);
        }

    }
    public function logout(Request $request)
    {
        // Đăng xuất người dùng
        Auth::logout();

        // Xóa tất cả session hiện tại
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        // Chuyển sang trang chủ user
        return redirect()->route('index');


        // Chuyển sang trang login 
        // return redirect()->route('login');

    }

}
