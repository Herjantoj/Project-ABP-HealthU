<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Dokter;
use Illuminate\Support\Facades\Hash;
use App\Helpers\ResponseFormatter;
use App\Actions\Fortify\PasswordValidationRules;

class UserController extends Controller
{

    use PasswordValidationRules;
    public function loginUser(Request $request){
        try {
            //Memvalidasi Email Password Benar Atau Tidak
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required'
            ]);
            //Jika Validator False, Akan memunculkan Response error dengan code 400
            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }

            // Mengecek credentials
            $credentials = request(['email', 'password']);
            if (!Auth::attempt($credentials)) {
                return ResponseFormatter::error([
                    'message' => 'Unauthorized'
                ], 'Authentication Failed', 500);
            }

            // Jika hash tidak sesuai maka beri error
            $user = User::where('email', $request->email)->first();
            if (!Hash::check($request->password, $user->password, [])) {
                throw new \Exception('Invalid Credentials');
            }

            //Create Token Untuk Login
            $tokenResult = $user->createToken('authToken')->plainTextToken;

            //Jika berjasil maka akan beri response JSON yang akan diconsume oleh frontend
            return ResponseFormatter::success([
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
                'user' => $user
            ], 'Authenticated');
            // Jika berhasil maka loginkan
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $error
            ], 'Authenticated Failed', 500);
        }
    }

    public function getUser(Request $request)
    {
        try{
            $authUser = Auth::user();
            $user = User::where('email', $authUser->email)->first();
            if($user == null){
                return ResponseFormatter::error([
                    'message' => 'User not found',
                ], 'User not found', 404);
            }
            $user = User::where('nim', $user->nim)->first();
            if ($user != null) {
                $user->name = $user->name;
            } else {
                $user->name = '';
            }
            return ResponseFormatter::success($user, 'User found');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $error
            ], 'Internal Server Error', 500);
        }
    }

    public function registerUser(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:255'],
                'nim' => ['required', 'string'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:user'],
                'password' => $this->passwordRules()
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }

            User::create([
                'name' => $request->name,
                'nim' => $request->nim,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            $user = User::where('email', $request->email)->first();
            

            return ResponseFormatter::success([
                'token_type' => 'Bearer',
                'user' => $user
            ],'Registrasi Success');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $error
            ], 'Authentication Failed', 500);
        }
    }

    public function createDokter(Request $request)
    {
        try {

            $request->validate([
                'nama' => 'required',
                'spesialis' => 'required',
                'no_telepon' => 'required',
                'hari_praktik' => 'required',

            ]);
            $dokter = Dokter::create([
                'nama' => $request->nama,
                'spesialis' => $request->spesialis,
                'no_telepon' => $request->no_telepon,
                'hari_praktik' => $request->hari_praktik,

            ]);
            return response()->json([
                'success' => true,
                'message' => 'Daftar data Dokter success',
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'success' => false,
                'message' => 'Daftar data Dokter gagal',
                'data' => $error,
            ], 500);
        }
    }

    public function getAllUser(Request $request)
    {
        try {
            $user = User::all();
            return ResponseFormatter::success($user, 'User found');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $error
            ], 'Internal Server Error', 500);
        }
    }

    public function getDokter(Request $request)
    {
        try {
            $dokter = Dokter::all();
            return ResponseFormatter::success($dokter, 'User found');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $error
            ], 'Internal Server Error', 500);
        }
    }
}
