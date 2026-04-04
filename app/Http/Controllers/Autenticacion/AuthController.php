<?php

namespace App\Http\Controllers\Autenticacion;

use App\Http\Controllers\Controller;
use App\Http\Responses\ApiResponse;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'ema_usuario' => 'required|email',
            'pas_usuario' => 'required',
        ]);

        $user = User::where('ema_usuario', $request->ema_usuario)->first();

        if (!$user || !Hash::check($request->pas_usuario, $user->pas_usuario)) {
            throw ValidationException::withMessages([
                'ema_usuario' => ['Credenciales incorrectas.'],
            ]);
        }

        if ($user->est_usuario === 0) {
            return ApiResponse::forbidden('Tu cuenta está inactiva.', 403);
        }

        // Elimina tokens anteriores (sesión única)
        $user->tokens()->delete();

        $token = $user->createToken('auth_token')->plainTextToken;

        return ApiResponse::ok([
            'usuario' => $user,
            'token'   => $token,
        ], 'Inicio de sesión exitoso');
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return ApiResponse::ok(null, 'Sesión cerrada correctamente');
    }
}
