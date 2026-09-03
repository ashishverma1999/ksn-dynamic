<?php

namespace Database\Seeders;

use App\Models\AcademicWing;
use App\Models\Birthday;
use App\Models\Facility;
use App\Models\Faq;
use App\Models\LeadershipMessage;
use App\Models\Notice;
use App\Models\SchoolSetting;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class KsnSchoolDataSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Birthdays & Stars
        $birthdays = [
            [
                'name' => 'Aarav Sharma',
                'type' => 'Student',
                'class_or_role' => 'Class V - A',
                'birth_date' => now()->format('Y-m-d'),
                'image' => '/images/classroom1.jpeg',
                'wishes' => 'Wishing Aarav a brilliant year ahead! Keep shining with your curiosity and joyful spirit! 🎂🎉',
                'badge' => 'Birthday Star',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Ananya Patel',
                'type' => 'Student',
                'class_or_role' => 'Class X - Science',
                'birth_date' => now()->addDays(2)->format('Y-m-d'),
                'image' => '/images/classroom2.jpeg',
                'wishes' => 'Happy Birthday Ananya! Best wishes for your upcoming board prep and science achievements! 🌟🎂',
                'badge' => 'Class Topper',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Dr. Abhilaksha Singh',
                'type' => 'Teacher',
                'class_or_role' => 'Vice Principal & Botany Head',
                'birth_date' => now()->addDays(5)->format('Y-m-d'),
                'image' => '/images/vice_principal.jpeg',
                'wishes' => 'Warmest birthday greetings to our respected Vice Principal! Thank you for your leadership and guidance! 💐✨',
                'badge' => 'Faculty Mentor',
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Rohan Verma',
                'type' => 'Student',
                'class_or_role' => 'Class XII - Commerce',
                'birth_date' => now()->addDays(7)->format('Y-m-d'),
                'image' => '/images/classroom3.jpeg',
                'wishes' => 'Happy Birthday Rohan! Wishing you stellar success in your examinations and future endeavors! 🎊🎈',
                'badge' => 'Sports Champion',
                'is_active' => true,
                'sort_order' => 4,
            ],
        ];

        foreach ($birthdays as $b) {
            Birthday::updateOrCreate(['name' => $b['name'], 'class_or_role' => $b['class_or_role']], $b);
        }

        // 2. Testimonials
        $testimonials = [
            [
                'name' => 'Rajesh Sharma',
                'role' => 'Parent of Class XII Student (Science)',
                'rating' => 5,
                'quote' => 'The senior secondary faculty for 11th and 12th science is outstanding at KSN Public School. The practical laboratories, regular test series, and personalized board mentorship helped my daughter score high percentiles.',
                'image' => '/images/school_building.jpeg',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Sunita Srivastava',
                'role' => 'Parent of Pre-Nursery Student',
                'rating' => 5,
                'quote' => 'The kindergarten teachers are exceptionally caring, attentive, and patient. My child loves going to school every single morning. The classrooms are clean, secure, and full of interactive play-way learning.',
                'image' => '/images/classroom1.jpeg',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Manoj Gupta',
                'role' => 'Parent of Class X Student',
                'rating' => 5,
                'quote' => 'The emphasis on science conceptual depth, mathematics problem-solving, and English speaking has given our son tremendous confidence. The dedicated school van service is always safe and punctual.',
                'image' => '/images/classroom2.jpeg',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Pooja Tiwari',
                'role' => 'Parent of Class IV Student',
                'rating' => 5,
                'quote' => 'From cultural celebrations and annual sports meets to science exhibitions, KSN Public School nurtures every aspect of child development with great enthusiasm and disciplined care.',
                'image' => '/images/classroom3.jpeg',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 4,
            ],
        ];

        foreach ($testimonials as $t) {
            Testimonial::updateOrCreate(['name' => $t['name'], 'role' => $t['role']], $t);
        }

        // 3. Notices
        $notices = [
            [
                'title' => 'Admissions Open for Academic Session 2026–27 (Pre-Nursery to Class XII — Science, Commerce & Arts streams). Limited seats available.',
                'badge' => 'Admissions',
                'notice_date' => '2026-08-25',
                'link_url' => '#admissions',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'Senior Secondary Science Laboratories (Physics, Chemistry, Biology) & AI Computer Lab upgraded with modern equipment.',
                'badge' => 'Facilities',
                'notice_date' => '2026-08-22',
                'link_url' => '#facilities',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'School Van route expansion: Daily pickup & drop operational across Mungra Badshahpur and adjoining localities.',
                'badge' => 'Transport',
                'notice_date' => '2026-08-18',
                'link_url' => '#transport',
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'title' => 'Career Guidance & Board Examination Counseling Seminar scheduled for Classes IX to XII students and parents.',
                'badge' => 'Academic',
                'notice_date' => '2026-08-10',
                'link_url' => '#leadership',
                'is_active' => true,
                'sort_order' => 4,
            ],
        ];

        foreach ($notices as $n) {
            Notice::updateOrCreate(['title' => $n['title']], $n);
        }

        // 4. Facilities
        $facilities = [
            [
                'title' => 'Smart & Ventilated Classrooms',
                'icon' => 'classroom',
                'description' => 'Spacious, bright, and airy classrooms with ergonomic seating and interactive visual learning boards for all grades from pre-primary to 12th.',
                'image' => '/images/classroom1.jpeg',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'Composite & Advanced Science Labs',
                'icon' => 'medical',
                'description' => 'Fully equipped modern Physics, Chemistry, and Biology laboratories enabling hands-on experiments for secondary and senior secondary students.',
                'image' => '/images/school_gallery.jpeg',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'Senior Computer & AI Lab',
                'icon' => 'computer',
                'description' => 'Dedicated workstations providing age-appropriate computer skills, typing, coding fundamentals, IT training, and logic building.',
                'image' => '/images/classroom2.jpeg',
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'title' => 'Library & Competitive Resource Center',
                'icon' => 'library',
                'description' => 'Rich collection of storybooks, encyclopedias, NCERT reference literature, competitive exam journals, and calm reading zones.',
                'image' => '/images/classroom3.jpeg',
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'title' => 'Sports Ground & Physical Fitness',
                'icon' => 'sports',
                'description' => 'Outdoor play area for track events, badminton, cricket, volleyball, morning yoga, physical drills, and inter-house tournaments.',
                'image' => '/images/school_building.jpeg',
                'is_active' => true,
                'sort_order' => 5,
            ],
            [
                'title' => 'Safe Transport Fleet (Vans)',
                'icon' => 'bus',
                'description' => 'Dedicated school van fleet covering Mungra Badshahpur and adjoining localities with trained drivers and caring attendants.',
                'image' => '/images/school_van.jpeg',
                'is_active' => true,
                'sort_order' => 6,
            ],
            [
                'title' => 'CCTV Surveillance & Safety',
                'icon' => 'shield',
                'description' => 'Full campus boundary with round-the-clock CCTV surveillance, gated security, visitor logs, and verified staff members.',
                'image' => '/images/school_building.jpeg',
                'is_active' => true,
                'sort_order' => 7,
            ],
            [
                'title' => 'Career Guidance & Activity Stage',
                'icon' => 'stage',
                'description' => 'Auditorium and open-air stage for morning assemblies, cultural festivals, debates, career seminars, and prize ceremonies.',
                'image' => '/images/school_gallery.jpeg',
                'is_active' => true,
                'sort_order' => 8,
            ],
        ];

        foreach ($facilities as $f) {
            Facility::updateOrCreate(['title' => $f['title']], $f);
        }

        // 5. Academic Wings
        $academics = [
            [
                'title' => 'Pre-Primary / Foundation Wing',
                'classes' => 'Pre-Nursery, Nursery, LKG, UKG',
                'tag' => 'Ages 2.5 – 5 Years',
                'description' => 'Activity-based play-way learning, phonics foundation, interactive rhyme sessions, number games, conversation practice, drawing, music and foundational motor skills.',
                'highlights' => ['Play-way & Montessori methodology', 'Phonics & early reading habits', 'Sensory & motor skills development', 'Caring teacher-student ratio'],
                'badge_color' => 'amber',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'Primary School Wing',
                'classes' => 'Classes I to V',
                'tag' => 'Ages 6 – 10 Years',
                'description' => 'Strong foundational grasp in Hindi, English, Mathematics, Environmental Studies (EVS), Basic Computer Literacy, Art, and Physical Education with activity-based understanding.',
                'highlights' => ['Fluent English & Hindi communication', 'Math logic, speed & mental puzzles', 'EVS projects & hands-on science models', 'Weekly sports, music & art classes'],
                'badge_color' => 'blue',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'Middle School Wing',
                'classes' => 'Classes VI to VIII',
                'tag' => 'Ages 11 – 14 Years',
                'description' => 'In-depth conceptual learning in Science (Physics, Chemistry, Biology), Mathematics, Social Sciences, Computer Applications & Coding, and Third Language (Sanskrit).',
                'highlights' => ['Specialist TGT subject teachers', 'Science practicals & laboratory demos', 'Computer lab hands-on & digital skills', 'Leadership, house system & debates'],
                'badge_color' => 'emerald',
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'title' => 'Secondary School Wing',
                'classes' => 'Classes IX & X',
                'tag' => 'Ages 14 – 16 Years',
                'description' => 'Rigorous board curriculum covering Advanced Science (Physics, Chemistry, Biology), Mathematics, Social Sciences, Information Technology / AI, English & Hindi with continuous assessments.',
                'highlights' => ['Board examination oriented preparation', 'Regular laboratory experiments & projects', 'Comprehensive test series & doubt solving', 'Personality grooming & public speaking'],
                'badge_color' => 'indigo',
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'title' => 'Senior Secondary Wing',
                'classes' => 'Classes XI & XII (Science, Commerce, Arts)',
                'tag' => 'Ages 16 – 18 Years',
                'description' => 'Specialized stream-based education in Science (PCM / PCB), Commerce, and Humanities with fully equipped advanced laboratories, expert PGT faculty, and competitive entrance exam mentorship.',
                'highlights' => ['Science (PCM/PCB), Commerce & Arts streams', 'Modern Physics, Chemistry & Biology labs', 'JEE / NEET / CUET / NDA foundation guidance', 'Career counseling & college admission mentorship'],
                'badge_color' => 'rose',
                'is_active' => true,
                'sort_order' => 5,
            ],
        ];

        foreach ($academics as $a) {
            AcademicWing::updateOrCreate(['title' => $a['title']], $a);
        }

        // 6. Leadership Messages
        $messages = [
            [
                'title' => "Chairman's Message",
                'name' => 'Prof. Rajendra Prasad Singh',
                'role' => 'Chairman, KSNPS',
                'designation' => 'Ex. Dean - Social Science | Ex. HOD Psychology Department, MGKVP Varanasi',
                'image' => '/images/chairman.jpeg',
                'message' => 'Education is not merely about accumulating facts; it is the ignition of character, psychological strength, discipline, and noble aspirations. At KSN Public School, we strive to build a strong foundation of values, modern scientific knowledge, and self-confidence in every student from early childhood to Class XII.',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'title' => "Director's Message",
                'name' => 'Dr. Anshuman Singh',
                'role' => 'Director, KSNPS',
                'designation' => 'Assistant Professor & HOD Hindi Department, BPGC | D.Phil from Allahabad University',
                'image' => '/images/director.jpeg',
                'message' => 'Our vision is to provide an inclusive and intellectually stimulating academic environment where every student discovers their unique strengths. From foundational play-way learning to senior secondary stream mastery, we combine rich linguistic proficiency and cultural values with progressive teaching methodologies.',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'title' => "Principal's Message",
                'name' => 'Smt. Rajbala Singh',
                'role' => 'Principal, KSNPS',
                'designation' => 'M.A., B.Ed. | Experienced Educator & Instructional Leader',
                'image' => '/images/principal.jpeg',
                'message' => 'Every child possesses immense potential waiting to be nurtured with care and discipline. Our dedicated team of educators is committed to providing personalized attention, encouraging active inquiry, hands-on lab experiments, and building strong study habits for lifelong success.',
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'title' => "Vice Principal's Message",
                'name' => 'Dr. Abhilaksha Singh',
                'role' => 'Vice Principal, KSNPS',
                'designation' => 'M.Sc Gold Medalist | D.Phil Botany | B.Ed | Academic Coordinator & Student Activities Head',
                'image' => '/images/vice_principal.jpeg',
                'message' => 'We believe in a harmonious blend of scholastic rigor and co-curricular vibrancy. By cultivating disciplined routines, creative expression, competitive exam foundation, and good habits, we prepare our learners to face future challenges with optimism.',
                'is_active' => true,
                'sort_order' => 4,
            ],
        ];

        foreach ($messages as $m) {
            LeadershipMessage::updateOrCreate(['title' => $m['title']], $m);
        }

        // 7. FAQs
        $faqs = [
            [
                'question' => 'What classes and academic streams are offered at KSN Public School?',
                'answer' => 'KSN Public School provides comprehensive K-12 education from Pre-Nursery to Class XII. For Senior Secondary (Classes XI & XII), we offer Science (PCM & PCB), Commerce, and Humanities/Arts streams with specialized laboratory and faculty support.',
                'category' => 'Academics',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'question' => 'What is the admission procedure for the new session?',
                'answer' => 'Admissions are open for Pre-Nursery to Class XII. Parents can submit an online enquiry form or visit the school office directly. After an informal interaction, stream counseling (for 11th/12th), and document verification, admission is confirmed upon fee submission.',
                'category' => 'Admissions',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'question' => 'What laboratory facilities are available for Secondary & Senior Secondary students?',
                'answer' => 'KSNPS features fully equipped modern Physics, Chemistry, Biology, and Computer Science laboratories with all required apparatus, specimens, and digital equipment for board curriculum experiments and practical assessments.',
                'category' => 'Facilities',
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'question' => 'What are the school operating hours?',
                'answer' => 'School classes run from Monday to Saturday, 8:00 AM to 2:00 PM. The administrative office remains open until 3:30 PM on all working days for parent queries, stream counseling, and admission visits.',
                'category' => 'General',
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'question' => 'Is transport (school van) available for all classes?',
                'answer' => 'Yes, KSN Public School provides supervised school van services covering multiple designated routes in Mungra Badshahpur and neighboring areas. Please consult the school office for specific route stops.',
                'category' => 'Transport',
                'is_active' => true,
                'sort_order' => 5,
            ],
            [
                'question' => 'What documents are required during admission?',
                'answer' => 'Documents required include: Child\'s Birth Certificate, 4 Passport-size photographs of the student, 2 passport photos of parents/guardians, Aadhaar card copy, and previous school Transfer Certificate (TC) / Report card / Marksheet for Class I and above.',
                'category' => 'Admissions',
                'is_active' => true,
                'sort_order' => 6,
            ],
            [
                'question' => 'What is the medium of instruction at KSN Public School?',
                'answer' => 'The medium of instruction is English, with equal emphasis on strong proficiency in Hindi, Sanskrit, and foundational communication skills.',
                'category' => 'Academics',
                'is_active' => true,
                'sort_order' => 7,
            ],
        ];

        foreach ($faqs as $fq) {
            Faq::updateOrCreate(['question' => $fq['question']], $fq);
        }

        // 8. School Settings
        $settings = [
            'school_name' => 'KSN Public School',
            'school_short' => 'KSNPS',
            'tagline' => 'Nurturing confident, creative, and ethical learners from Pre-Nursery to Class XII with modern education, discipline, and core values.',
            'subheading' => 'Premier English Medium Co-Educational K-12 Institution (Pre to 12th) | Mungra Badshahpur, Jaunpur',
            'affiliation' => 'Recognized & Following Modern Progressive Curriculum (Pre-Nursery to Class XII)',
            'email' => 'info@ksnpublicschool.edu.in',
            'phone' => '+91 93692 47677',
            'alternate_phone' => '+91 76076 03165',
            'whatsapp' => '+91 97938 56502',
            'address' => 'KSN Public School, Mungra Badshahpur, Jaunpur, Uttar Pradesh 222202',
            'timings' => 'Monday to Saturday: 8:00 AM – 2:00 PM',
            'stat_years' => '25+',
            'stat_students' => '2000+',
            'stat_teachers' => '65+',
            'stat_results' => '100%',
        ];

        foreach ($settings as $k => $v) {
            SchoolSetting::set($k, $v);
        }
    }
}
