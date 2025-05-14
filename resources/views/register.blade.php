@extends('layouts.app')

@section('title', 'Personal Info Registration')

@section('content')
    <h2 class="mb-4 text-center">Step 1: Personal Information</h2>

    <form method="POST" action="{{ route('register.store') }}">
        @csrf

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">First Name *</label>
                <input type="text" name="first_name" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Last Name *</label>
                <input type="text" name="last_name" class="form-control" required>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Mobile *</label>
            <input type="tel" name="mobile" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Confirm Mobile *</label>
            <input type="tel" name="mobile_confirmation" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email *</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Confirm Email *</label>
            <input type="email" name="email_confirmation" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Organization / School / University</label>
            <input type="text" name="organization" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Name for Receipt *</label>
            <input type="text" name="receipt_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Address for Receipt *</label>
            <textarea name="receipt_address" class="form-control" rows="3" required></textarea>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">ลงทะเบียน</button>
        </div>
    </form>
@endsection
