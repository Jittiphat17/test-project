@extends('layouts.app')

@section('title', 'Registration Fee')

@section('content')
    <h2 class="mb-4 text-center">Ticket Fee</h2>

    <div class="table-responsive">
        <table class="table table-bordered table-hover text-center align-middle">
            <thead class="table-light">
                <tr>
                    <th rowspan="2">Registration Type</th>
                    <th colspan="2">Non member</th>
                    <th colspan="2">Student</th>
                    <th colspan="2">Member</th>
                </tr>
                <tr>
                    <th>Early<br><small>until 31 May 2023</small></th>
                    <th>Late<br><small>1 June – 30 June 2023</small></th>
                    <th>Early<br><small>until 31 May 2023</small></th>
                    <th>Late<br><small>1 June – 30 June 2023</small></th>
                    <th>Early<br><small>until 31 May 2023</small></th>
                    <th>Late<br><small>1 June – 30 June 2023</small></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Lecture<br><small>1–2 Oct 2023</small></td>
                    <td>500 USD</td>
                    <td>550 USD</td>
                    <td>350 USD</td>
                    <td>550 USD</td>
                    <td>400 USD</td>
                    <td>550 USD</td>
                </tr>
                <tr>
                    <td>Workshop Room 1<br><small>3 Oct 2023</small></td>
                    <td colspan="6">500 USD<br><small>Must registered together with Lecture</small></td>
                </tr>
                <tr>
                    <td>Workshop Room 2<br><small>3 Oct 2023</small></td>
                    <td colspan="6">250 USD<br><small>Must registered together with Lecture</small></td>
                </tr>
            </tbody>
        </table>
    </div>


@endsection
