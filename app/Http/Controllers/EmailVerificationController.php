<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailVerificationController extends Controller
{
    /**
     * Menampilkan form verifikasi email.
     *
     * @return \Illuminate\View\View
     */
    public function showVerificationForm()
    {
        return redirect()->route('verification.notice', ['locale' => app()->getLocale()]);
    }

    /**
     * Mengirim notifikasi verifikasi email.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendVerificationEmail(Request $request)
    {
        // Verifikasi email pengguna
        $request->user()->sendEmailVerificationNotification();

        // Tampilkan pesan sukses
        session()->flash('message', 'Email verifikasi telah dikirim. Silakan cek email Anda.');

        // Redirect pengguna kembali ke halaman verifikasi email
        return redirect()->route('verification.notice', ['locale' => app()->getLocale()]);
    }
}