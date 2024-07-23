<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckPermission
{
    public function handle(Request $request, Closure $next, $permission)
    {
        $user = Auth::user();
        if ($user) {
            // Foydalanuvchi roli bo'yicha ruxsatlarni tekshirish
            $role = $user->role; // yoki ruxsatlarni olish uchun boshqa metod
            $hasPermission = DB::table('permissions')
                ->where('role', $role)
                ->exists(); // yoki boshqa shartlar bilan tekshirish

            if ($hasPermission) {
                return $next($request);
            }
        }

        return redirect('/'); // Ruxsat bo'lmasa, qaytish
    }
}
