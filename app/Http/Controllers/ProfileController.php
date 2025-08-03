<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;  // Request khusus untuk update profile
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Menampilkan form edit profil
     */
    
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),  // Mengirim data user ke view
        ]);
    }

    /**
     * Memperbarui informasi profil user
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // Mengisi data user dengan data yang divalidasi
        $user = $request->user(); // ← Ini bantu editor paham type-nya
    
    $user->fill($request->validated());

    if ($user->isDirty('email')) {
        $user->email_verified_at = null; // ← Garis kuning hilang
    }

         $user->save();
    return Redirect::route('profile.edit')->with('status', 'profile-updated');
}
    /**
     * Menghapus akun user
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Validasi password saat menghapus akun
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();  // Logout user

        $user->delete();  // Hapus user

        // Invalidate session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect ke halaman home
        return Redirect::to('/');
    }
}