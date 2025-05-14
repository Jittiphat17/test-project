<?php

namespace App\Http\Controllers;

use App\Models\Registrant;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class TicketController extends Controller
{

    public function create()
    {
        return view('ticket');
    }
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|exists:registrants,email',
            'registration_date' => 'required|date',
            'status' => 'required|in:non_member,student,member',
            'events' => 'required|array|min:1',
            'slip' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ], [
            'email.exists' => 'ไม่พบบัญชีที่ลงทะเบียนไว้ด้วยอีเมลนี้ กรุณาตรวจสอบอีกครั้ง',
            'slip.required' => 'กรุณาแนบสลิปการโอนเงิน',
            'slip.mimes' => 'สลิปต้องเป็นไฟล์ .jpg, .png หรือ .pdf',
        ]);
    
        $registrant = Registrant::where('email', $validated['email'])->first();
        $status = $validated['status'];
        $date = Carbon::parse($validated['registration_date']);
        $events = $validated['events'];
    
        $earlyDeadline = Carbon::create(2023, 5, 31);
        $period = $date->lte($earlyDeadline) ? 'early' : 'late';
    
        $pricing = [
            'non_member' => ['early' => 500, 'late' => 550],
            'student'    => ['early' => 350, 'late' => 550],
            'member'     => ['early' => 400, 'late' => 550],
            'workshop_room_1' => 500,
            'workshop_room_2' => 250,
        ];
    
        $total = 0;
    
        if (in_array('lecture', $events)) {
            $total += $pricing[$status][$period];
        }
    
        if (in_array('workshop_room_1', $events)) {
            if (!in_array('lecture', $events)) {
                return back()->withErrors(['events' => 'หากเลือก Workshop Room 1 ต้องเลือก Lecture ด้วย']);
            }
            $total += $pricing['workshop_room_1'];
        }
    
        if (in_array('workshop_room_2', $events)) {
            if (!in_array('lecture', $events)) {
                return back()->withErrors(['events' => 'หากเลือก Workshop Room 2 ต้องเลือก Lecture ด้วย']);
            }
            $total += $pricing['workshop_room_2'];
        }
    
       
        $slipPath = $request->file('slip')->store('slips', 'public');
    
        
        Ticket::create([
            'registrant_id'     => $registrant->id,
            'status'            => $status,
            'registration_date' => $date,
            'events'            => $events,
            'total_price'       => $total,
            'slip_path'         => $slipPath,
        ]);
    
        return redirect()->to('/')->with('success', ':ซื้อตั๋วสำเร็จ! ราคารวม: $' . $total);
    }
}   
