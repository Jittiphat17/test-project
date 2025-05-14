<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registrant;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'mobile' => 'required|string',
            'mobile_confirmation' => 'same:mobile',
            'email' => 'required|email|unique:registrants,email',
            'email_confirmation' => 'same:email',
            'receipt_name' => 'required|string|max:255',
            'receipt_address' => 'required|string|max:1000',
            'organization' => 'nullable|string|max:255',
        ], [
            'email.unique' => 'อีเมลนี้ถูกใช้แล้ว กรุณาใช้อีเมลอื่น', // ✅ ข้อความกำหนดเอง
            'email_confirmation.same' => 'ยืนยันอีเมลไม่ตรงกัน',
            'mobile_confirmation.same' => 'ยืนยันเบอร์โทรไม่ตรงกัน',
            
        ]);
        $registrant = Registrant::create($validated);

        session(['registrant_id' => $registrant->id]);

        return redirect()->to('/')->with('success', 'ลงทะเบียนสำเร็จแล้ว!');


    }
}
