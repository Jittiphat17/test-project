@extends('layouts.app')

@section('title', 'Ticket Selection')

@section('content')

    <h2 class="mb-4 text-center">Step 2: Ticket Selection</h2>


    <form method="POST" action="{{ route('ticket.submit') }}" enctype="multipart/form-data">

        @csrf

        <div class="mb-3">
            <label for="registration_date" class="form-label">Registration Date *</label>
            <input type="date" name="registration_date" id="registration_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Registered Email *</label>
            <input type="email" name="email" id="email" class="form-control" required
                placeholder="example@email.com">
            <div class="form-text text-muted">ต้องเป็นอีเมลที่ใช้ลงทะเบียนในขั้นตอนก่อนหน้า</div>
        </div>


        <div class="mb-3">
            <label class="form-label">Your Status *</label>
            <select name="status" id="status" class="form-select" required>
                <option value="">-- Select --</option>
                <option value="non_member">Non-member</option>
                <option value="student">Student</option>
                <option value="member">Member</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Select Events *</label>
            <div class="form-check">
                <input class="form-check-input event-check" type="checkbox" name="events[]" value="lecture" id="lecture">
                <label class="form-check-label" for="lecture">Lecture (1–2 Oct 2023)</label>
            </div>
            <div class="form-check">
                <input class="form-check-input event-check" type="checkbox" name="events[]" value="workshop_room_1"
                    id="wr1">
                <label class="form-check-label" for="wr1">Workshop Room 1 (3 Oct 2023)</label>
            </div>
            <div class="form-check">
                <input class="form-check-input event-check" type="checkbox" name="events[]" value="workshop_room_2"
                    id="wr2">
                <label class="form-check-label" for="wr2">Workshop Room 2 (3 Oct 2023)</label>
            </div>
            <div class="form-text text-muted">* Workshop ต้องซื้อพร้อม Lecture</div>
        </div>

        <div class="mb-4">
            <div class="card text-white bg-success shadow">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">รวมทั้งหมด</h5>
                    <h4 class="mb-0"><span id="total-price">$0</span></h4>
                </div>
            </div>
        </div>

        <hr>

        <div class="mb-4">
            <div class="card text-black border-info mb-3 shadow">
                <div class="card-body">
                    <h5 class="card-title mb-2">บัญชีสำหรับโอนเงิน</h5>
                    <p class="card-text mb-1">
                        <strong>ชื่อบัญชี:</strong> The Live eye Co.,Ltd.
                    </p>
                    <p class="card-text mb-1">
                        <strong>เลขบัญชี:</strong> 123-45677-89-0
                    </p>
                    <p class="card-text mb-0">
                        <strong>ธนาคาร:</strong> ABC bank
                    </p>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="slip" class="form-label">แนบสลิปการโอนเงิน *</label>
            <input type="file" name="slip" id="slip" class="form-control" accept="image/*,.pdf" required>
            <div class="form-text text-muted">
                กรุณาแนบไฟล์รูปภาพหรือ PDF สลิปการโอนเงิน (รองรับ .jpg, .png, .pdf)
            </div>
        </div>




        <div class="text-center">
            <button type="submit" class="btn btn-success">ตกลงซื้อตั๋ว</button>
        </div>
    </form>
@endsection

@push('scripts')
    <script src="{{ asset('js/ticket.js') }}"></script>
@endpush
