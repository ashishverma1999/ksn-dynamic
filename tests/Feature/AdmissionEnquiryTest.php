<?php

namespace Tests\Feature;

use App\Models\AdmissionEnquiry;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdmissionEnquiryTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_page_uses_happy_model_public_school_content(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('Happy Model Public School')
            ->assertSee('Admission Enquiry');
    }

    public function test_admission_enquiry_can_be_submitted(): void
    {
        $response = $this->post(route('admissions.store'), [
            'student_name' => 'Aarav Verma',
            'guardian_name' => 'Ravi Verma',
            'phone' => '9876543210',
            'email' => 'parent@example.com',
            'class_applied' => 'Class III',
            'student_age' => 8,
            'message' => 'Please share admission details.',
        ]);

        $response->assertRedirect();

        $this->assertDatabaseHas('admission_enquiries', [
            'student_name' => 'Aarav Verma',
            'phone' => '9876543210',
            'status' => 'new',
            'source' => 'website',
        ]);

        $this->assertSame(1, AdmissionEnquiry::count());
    }
}
