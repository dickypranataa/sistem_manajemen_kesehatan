<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'alamat' => ['required', 'string', 'max:255'],
            'no_ktp' => ['required', 'string', 'max:20'],
            'no_hp' => ['required', 'string', 'max:255'],
        ]);
    }

    protected function create(array $data)
    {
        // Generate nomor RM terakhir
        $lastUser = User::where('role', 'pasien')
            ->orderBy('no_rm', 'desc')
            ->first();

        if ($lastUser && preg_match('/RM(\d+)/', $lastUser->no_rm, $matches)) {
            $number = intval($matches[1]) + 1;
        } else {
            $number = 1;
        }

        // Format RM jadi RM + 5 digit angka 00001 dst
        $no_rm = 'RM' . str_pad($number, 5, '0', STR_PAD_LEFT);

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'pasien',  // set otomatis
            'alamat' => $data['alamat'] ?? null,
            'no_ktp' => $data['no_ktp'] ?? null,
            'no_hp' => $data['no_hp'] ?? null,
            'no_rm' => $no_rm,
        ]);
    }


    public function __construct()
    {
        $this->middleware('guest');
    }
}
