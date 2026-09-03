<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        $directory = public_path('images');

        if (! File::isDirectory($directory)) {
            return;
        }

        $files = collect(File::files($directory))
            ->filter(fn ($f) => in_array(strtolower($f->getExtension()), ['jpg', 'jpeg', 'png', 'webp'], true));

        $specialMeta = [
            'school_building.jpeg' => [
                'title' => 'Main Academic Campus & Building',
                'category' => 'Campus',
                'description' => 'Exterior view of the Happy Model Public School campus located at Mungra Badshahpur, Jaunpur.',
                'is_featured' => true,
            ],
            'school_gallery.jpeg' => [
                'title' => 'School Assembly Ground & Stage',
                'category' => 'Campus',
                'description' => 'Spacious open-air assembly ground and activity area for morning gatherings and school functions.',
                'is_featured' => true,
            ],
            'school_van.jpeg' => [
                'title' => 'Dedicated School Transport Fleet',
                'category' => 'Transport',
                'description' => 'Safe, reliable and supervised school van service connecting nearby localities in Jaunpur.',
                'is_featured' => true,
            ],
            'classroom1.jpeg' => [
                'title' => 'Interactive Smart Classroom',
                'category' => 'Academics',
                'description' => 'Modern, well-lit classroom environment equipped for concept-driven and active learning.',
                'is_featured' => true,
            ],
            'classroom2.jpeg' => [
                'title' => 'Primary Section Learning Wing',
                'category' => 'Academics',
                'description' => 'Student-centric classrooms encouraging collaborative activities, neat work and focus.',
                'is_featured' => true,
            ],
            'classroom3.jpeg' => [
                'title' => 'Junior Study Room & Practice Session',
                'category' => 'Academics',
                'description' => 'Teacher-guided study routines ensuring foundational clarity in all core subjects.',
                'is_featured' => true,
            ],
            'chairman.jpeg' => [
                'title' => 'Prof. Rajendra Prasad Singh (Chairman)',
                'category' => 'Leadership',
                'description' => 'Ex. Dean - Social Science & Ex. HOD Psychology Department, MGKVP Varanasi. Chairman, HMPS.',
                'is_featured' => true,
            ],
            'director.jpeg' => [
                'title' => 'Dr. Anshuman Singh (Director)',
                'category' => 'Leadership',
                'description' => 'Assistant Professor & HOD Hindi Department, BPGC. D.Phil from Allahabad University. Director, HMPS.',
                'is_featured' => true,
            ],
            'principal.jpeg' => [
                'title' => 'Smt. Rajbala Singh (Principal)',
                'category' => 'Leadership',
                'description' => 'M.A., B.Ed. Experienced Educator & Instructional Leader. Principal, HMPS.',
                'is_featured' => true,
            ],
            'vice_principal.jpeg' => [
                'title' => 'Vice Principal (Academic Coordinator)',
                'category' => 'Leadership',
                'description' => 'Academic coordination, discipline, and student activities management. Vice Principal, HMPS.',
                'is_featured' => true,
            ],
            'brochure.jpeg' => [
                'title' => 'Official School Prospectus & Admission Guidelines',
                'category' => 'Admissions',
                'description' => 'Complete guide to admissions, curriculum highlights, rules and fee structure.',
                'is_featured' => true,
            ],
        ];

        // Specific titles for WhatsApp activity images
        $activityTitles = [
            'WhatsApp Image 2026-08-18 at 8.46.43 PM.jpeg' => ['Cultural Evening & Talent Showcase', 'Celebrations', 'Students displaying their stage confidence and creative performance.'],
            'WhatsApp Image 2026-08-24 at 1.39.04 PM (1).jpeg' => ['Patriotic Celebration & Flag Ceremony', 'Celebrations', 'Grand Independence Day and National festival celebrations on campus.'],
            'WhatsApp Image 2026-08-24 at 1.39.07 PM (2).jpeg' => ['Traditional Folk Dance Performance', 'Celebrations', 'Colourful cultural presentations celebrating India\'s rich cultural diversity.'],
            'WhatsApp Image 2026-08-24 at 1.39.08 PM (1).jpeg' => ['Annual Day Drama & Skit Presentation', 'Celebrations', 'Value-based theatrical performances by junior wing students.'],
            'WhatsApp Image 2026-08-24 at 1.39.08 PM (2).jpeg' => ['Kindergarten Rhyme & Action Song', 'Activities', 'Early childhood learners enjoying interactive musical rhymes and expression.'],
            'WhatsApp Image 2026-08-24 at 1.39.08 PM.jpeg' => ['Prize Distribution Ceremony', 'Celebrations', 'Recognizing academic merit, sports achievements and 100% attendance.'],
            'WhatsApp Image 2026-08-24 at 1.39.09 PM (1).jpeg' => ['Science Exhibition & Creative Models', 'Academics', 'Hands-on experiential learning through working models and science demonstrations.'],
            'WhatsApp Image 2026-08-24 at 1.39.09 PM (2).jpeg' => ['Art & Craft Showcase', 'Activities', 'Young artists showcasing paintings, origami and handicraft creations.'],
            'WhatsApp Image 2026-08-24 at 1.39.09 PM (3).jpeg' => ['Group Music & Choir Recital', 'Celebrations', 'Melodious vocal harmonies and patriotic songs during school assembly.'],
            'WhatsApp Image 2026-08-24 at 1.39.09 PM.jpeg' => ['Yoga & Morning Physical Drill', 'Activities', 'Daily fitness, stretching and mindfulness sessions for healthy living.'],
            'WhatsApp Image 2026-08-24 at 1.39.10 PM (1).jpeg' => ['Classroom Concept Building Session', 'Academics', 'Interactive blackboard explanations and active student participation.'],
            'WhatsApp Image 2026-08-24 at 1.39.10 PM (2).jpeg' => ['Language & Phonics Workshop', 'Academics', 'Building fluent reading, writing and pronunciation skills from early years.'],
            'WhatsApp Image 2026-08-24 at 1.39.10 PM.jpeg' => ['Inter-House Quiz Competition', 'Academics', 'Testing knowledge, logic and general awareness across school houses.'],
            'WhatsApp Image 2026-08-24 at 1.39.11 PM (1).jpeg' => ['Tiny Tots Fun Learning Hour', 'Activities', 'Play-way methodology sparking joy and creativity in pre-primary kids.'],
            'WhatsApp Image 2026-08-24 at 1.39.11 PM (2).jpeg' => ['Festive Celebration & Rangoli Art', 'Celebrations', 'Celebrating festivals with warmth, togetherness and cultural appreciation.'],
            'WhatsApp Image 2026-08-24 at 1.39.11 PM.jpeg' => ['Student Council & Leadership Meet', 'Leadership', 'Empowering prefects and monitors with responsibility and teamwork.'],
            'WhatsApp Image 2026-08-24 at 1.39.12 PM (1).jpeg' => ['Sports Day Sprint & Track Events', 'Activities', 'Athletic spirit, track races and healthy sportsmanship among students.'],
            'WhatsApp Image 2026-08-24 at 1.39.12 PM (2).jpeg' => ['Team Games & Outdoor Play', 'Activities', 'Fostering team spirit, agility and camaraderie on the school playground.'],
            'WhatsApp Image 2026-08-24 at 1.39.12 PM.jpeg' => ['Mathematics Puzzle Workshop', 'Academics', 'Practical mental math, speed calculation and logic problem solving.'],
            'WhatsApp Image 2026-08-24 at 1.39.13 PM (1).jpeg' => ['Reading Corner & Storybook Time', 'Academics', 'Cultivating lifelong reading habits and imaginative thinking in children.'],
            'WhatsApp Image 2026-08-24 at 1.39.13 PM.jpeg' => ['Cleanliness & Environmental Drive', 'Activities', 'Instilling civic sense, environmental care and green campus habits.'],
            'WhatsApp Image 2026-08-24 at 1.39.14 PM (1).jpeg' => ['Teacher-Parent Open House', 'Campus', 'Constructive dialogue ensuring each child\'s continuous academic growth.'],
            'WhatsApp Image 2026-08-24 at 1.39.14 PM.jpeg' => ['Drawing & Color Mixing Competition', 'Activities', 'Unleashing imagination with watercolors, crayons and sketch pens.'],
            'WhatsApp Image 2026-08-24 at 1.39.15 PM (1).jpeg' => ['Patriotic Costume & Fancy Dress', 'Celebrations', 'Junior students dressed as national leaders and inspiring icons.'],
            'WhatsApp Image 2026-08-24 at 1.39.15 PM (2).jpeg' => ['Assembly Speech & Public Speaking', 'Academics', 'Building stage confidence through daily morning assembly speeches.'],
            'WhatsApp Image 2026-08-24 at 1.39.15 PM.jpeg' => ['Campus Joy & Friendship Moments', 'Campus', 'Memorable school moments and lasting friendships in a caring environment.'],
        ];

        foreach ($files as $file) {
            $filename = $file->getFilename();
            $imagePath = '/images/' . $filename;

            if (isset($specialMeta[$filename])) {
                $meta = $specialMeta[$filename];
                $title = $meta['title'];
                $category = $meta['category'];
                $desc = $meta['description'];
                $featured = $meta['is_featured'] ?? false;
            } elseif (isset($activityTitles[$filename])) {
                [$title, $category, $desc] = $activityTitles[$filename];
                $featured = true;
            } else {
                $title = Str::headline(pathinfo($filename, PATHINFO_FILENAME));
                $category = 'Activities';
                $desc = 'Glimpse of vibrant student life and campus activities at Happy Model Public School.';
                $featured = false;
            }

            Gallery::updateOrCreate(
                ['image' => $imagePath],
                [
                    'title' => $title,
                    'category' => $category,
                    'description' => $desc,
                    'published_at' => now()->subDays(rand(1, 30)),
                    'is_featured' => $featured,
                    'is_published' => true,
                ]
            );
        }
    }
}
