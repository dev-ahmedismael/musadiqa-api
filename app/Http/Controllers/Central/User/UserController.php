<?php

namespace App\Http\Controllers\Central\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Central\User\LoginRequest;
use App\Http\Requests\Central\User\RegisterRequest;
use App\Models\Central\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function register(RegisterRequest $request)
    {
        if (User::where('email', $request->email)->exists()) {
            return response()->json(['message' => 'البريد الإلكتروني الذي أدخلته مستخدم بالفعل.'], 409);
        }

        if (User::where('phone', $request->phone)->exists()) {
            return response()->json(['message' => 'رقم الجوال الذي أدخلته مستخدم بالفعل.'], 409);
        }

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        Auth::login($user);

        return response()->json([
            'message' => 'تم إنشاء حسابك بنجاح.',
            'token' => $token
        ], 201);
    }

    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json(['message' => 'البريد الإلكتروني الذي أدخلته غير مسجل لدينا.'], 404);
        }

        if (!Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'كلمة المرور غير صحيحة.'], 401);
        }

        $tenant = $user->tenants()->first();

        Auth::login($user);

        if (!$tenant) {
            return response()->json(['message' => 'تم تسجيل الدخول بنجاح.', 'domain' =>  'authentication/create-new-organization'], 200);
        }

        session()->put('tenant_id', $tenant->id);

        $domain = $tenant->domains()->first()->domain ?? null;

        if (!$domain) {
            return response()->json(['message' => 'لم يتم العثور على نطاق للمؤسسة.'], 404);
        }

        $response = ['message' => 'تم تسجيل الدخول بنجاح.', 'domain' => $domain];

        return response()->json($response, 200);
    }

    public function user_organizations(Request $request)
    {
        $user = Auth::user()->load(['tenants.domains', 'tenants.media', 'media']);

        $user['profile_picture'] = $user->media->first()?->original_url;

        $tenants = $user->tenants->map(function ($tenant) {
            return [
                'name' => $tenant->name,
                'domain' => $tenant->domains->first()?->domain,
                'logo' => $tenant->getFirstMediaUrl('organization_logo'),
            ];
        });

        return response()->json([
            'user' => $user,
            'organizations' => $tenants,
        ], 200);
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return response()->json([
            'message' => 'تم تسجيل الخروج بنجاح.'
        ]);
    }
}
