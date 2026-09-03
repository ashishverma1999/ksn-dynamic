<?php

namespace App\Http\Controllers;

use App\Models\AdmissionEnquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AdmissionEnquiryController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'student_name' => ['required', 'string', 'max:120'],
            'guardian_name' => ['nullable', 'string', 'max:120'],
            'phone' => ['required', 'string', 'max:30'],
            'email' => ['nullable', 'email', 'max:150'],
            'class_applied' => ['required', 'string', 'max:60'],
            'student_age' => ['nullable', 'integer', 'min:2', 'max:25'],
            'preferred_visit_date' => ['nullable', 'date'],
            'message' => ['nullable', 'string', 'max:2000'],
        ]);

        AdmissionEnquiry::create($validated + [
            'status' => 'new',
            'source' => 'website',
        ]);

        return back()
            ->withInput($request->only('guardian_name', 'phone', 'email'))
            ->with('enquiry_success', 'Thank you. The school office has received your enquiry and will contact you soon.');
    }
}
