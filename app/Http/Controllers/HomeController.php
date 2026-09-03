<?php

namespace App\Http\Controllers;

use App\Models\AcademicWing;
use App\Models\Birthday;
use App\Models\Facility;
use App\Models\Faq;
use App\Models\Gallery;
use App\Models\LeadershipMessage;
use App\Models\Notice;
use App\Models\SchoolSetting;
use App\Models\Testimonial;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Throwable;

class HomeController extends Controller
{
    public function __invoke()
    {
        $school = config('school.profile');

        // Allow settings from database to override profile values
        try {
            if (Schema::hasTable('school_settings')) {
                $dbSettings = SchoolSetting::all()->pluck('value', 'key');
                if ($dbSettings->has('school_name')) $school['name'] = $dbSettings->get('school_name');
                if ($dbSettings->has('school_short')) $school['short'] = $dbSettings->get('school_short');
                if ($dbSettings->has('tagline')) $school['tagline'] = $dbSettings->get('tagline');
                if ($dbSettings->has('subheading')) $school['subheading'] = $dbSettings->get('subheading');
                if ($dbSettings->has('email')) $school['email'] = $dbSettings->get('email');
                if ($dbSettings->has('phone')) $school['phone'] = $dbSettings->get('phone');
                if ($dbSettings->has('alternate_phone')) $school['alternate_phone'] = $dbSettings->get('alternate_phone');
                if ($dbSettings->has('whatsapp')) $school['whatsapp'] = $dbSettings->get('whatsapp');
                if ($dbSettings->has('address')) $school['address'] = $dbSettings->get('address');
                if ($dbSettings->has('timing')) $school['timing'] = $dbSettings->get('timing');
            }
        } catch (Throwable) {
            // fallback to config
        }

        $localImages = $this->localImagePaths();
        $galleryItems = $this->galleryItems($localImages);

        // Fetch dynamic Birthdays
        $birthdays = $this->loadBirthdays();

        // Fetch dynamic Testimonials
        $reviews = $this->loadTestimonials();

        // Fetch dynamic Notices
        $notices = $this->loadNotices();

        // Fetch dynamic Facilities
        $facilities = $this->loadFacilities();

        // Fetch dynamic Academic Wings
        $academics = $this->loadAcademicWings();

        // Fetch dynamic Leadership Messages
        $messages = $this->loadLeadershipMessages();

        // Fetch dynamic FAQs
        $faqs = $this->loadFaqs();

        $stats = config('school.stats');
        try {
            if (isset($dbSettings)) {
                if ($dbSettings->has('stat_years')) $stats[0]['value'] = $dbSettings->get('stat_years');
                if ($dbSettings->has('stat_students')) $stats[1]['value'] = $dbSettings->get('stat_students');
                if ($dbSettings->has('stat_teachers')) $stats[2]['value'] = $dbSettings->get('stat_teachers');
                if ($dbSettings->has('stat_results')) $stats[3]['value'] = $dbSettings->get('stat_results');
            }
        } catch (Throwable) {}

        $heroPreferred = [
            'school_building.jpeg',
            'school_gallery.jpeg',
            'WhatsApp Image 2026-08-24 at 1.39.04 PM (1).jpeg',
            'WhatsApp Image 2026-08-24 at 1.39.09 PM (1).jpeg',
            'WhatsApp Image 2026-08-24 at 1.39.07 PM (2).jpeg',
            'classroom1.jpeg',
            'classroom2.jpeg',
            'school_van.jpeg',
        ];

        $aboutPreferred = [
            'school_building.jpeg',
            'classroom1.jpeg',
            'WhatsApp Image 2026-08-24 at 1.39.04 PM (1).jpeg',
            'WhatsApp Image 2026-08-24 at 1.39.08 PM.jpeg',
        ];

        return view('pages.home', [
            'school' => $school,
            'navGroups' => config('school.navigation'),
            'quickLinks' => config('school.quick_links'),
            'notices' => $notices,
            'birthdays' => $birthdays,
            'stats' => $stats,
            'visionMission' => config('school.vision_mission'),
            'academics' => $academics,
            'admissionSteps' => config('school.admission_steps'),
            'facilities' => $facilities,
            'messages' => $messages,
            'reviews' => $reviews,
            'faqs' => $faqs,
            'allImagesCount' => $localImages->count(),
            'heroImages' => $this->preferredImages($localImages, $heroPreferred),
            'aboutImages' => $this->preferredImages($localImages, $aboutPreferred),
            'galleryItems' => $galleryItems,
            'galleryCategories' => $this->extractCategories($galleryItems),
            'brochureImage' => $this->findImage($localImages, 'brochure.jpeg') ?? '/images/brochure.jpeg',
            'transportImage' => $this->findImage($localImages, 'school_van.jpeg') ?? '/images/school_van.jpeg',
            'pageTitle' => "{$school['name']} | Best English Medium School (Pre to 12th) in Mungra Badshahpur, Jaunpur",
            'pageDescription' => "{$school['name']} is a premier English medium K-12 school in Mungra Badshahpur, Jaunpur offering Pre-Nursery to Class 12th education (Science, Commerce & Arts) with smart classrooms, advanced science labs, sports, caring faculty and safe transport.",
        ]);
    }

    private function loadBirthdays(): Collection
    {
        try {
            if (Schema::hasTable('birthdays')) {
                $items = Birthday::active()->get();
                if ($items->isNotEmpty()) {
                    return $items->map(fn (Birthday $b) => [
                        'id' => $b->id,
                        'name' => $b->name,
                        'type' => $b->type,
                        'class_or_role' => $b->class_or_role,
                        'birth_date' => $b->birth_date ? $b->birth_date->format('d M') : null,
                        'image' => $b->image_url,
                        'wishes' => $b->wishes,
                        'badge' => $b->badge ?? 'Birthday Star',
                    ]);
                }
            }
        } catch (Throwable) {}

        return collect([
            [
                'id' => 1,
                'name' => 'Aarav Sharma',
                'type' => 'Student',
                'class_or_role' => 'Class V - A',
                'birth_date' => now()->format('d M'),
                'image' => '/images/classroom1.jpeg',
                'wishes' => 'Wishing Aarav a brilliant year ahead! Keep shining with your curiosity and joyful spirit! 🎂🎉',
                'badge' => 'Birthday Star',
            ],
            [
                'id' => 2,
                'name' => 'Ananya Patel',
                'type' => 'Student',
                'class_or_role' => 'Class X - Science',
                'birth_date' => now()->addDays(2)->format('d M'),
                'image' => '/images/classroom2.jpeg',
                'wishes' => 'Happy Birthday Ananya! Best wishes for your upcoming board prep and science achievements! 🌟🎂',
                'badge' => 'Class Topper',
            ],
            [
                'id' => 3,
                'name' => 'Dr. Abhilaksha Singh',
                'type' => 'Teacher',
                'class_or_role' => 'Vice Principal & Botany Head',
                'birth_date' => now()->addDays(5)->format('d M'),
                'image' => '/images/vice_principal.jpeg',
                'wishes' => 'Warmest birthday greetings to our respected Vice Principal! Thank you for your leadership and guidance! 💐✨',
                'badge' => 'Faculty Mentor',
            ],
        ]);
    }

    private function loadTestimonials(): Collection
    {
        try {
            if (Schema::hasTable('testimonials')) {
                $items = Testimonial::active()->get();
                if ($items->isNotEmpty()) {
                    return $items->map(fn (Testimonial $t) => [
                        'id' => $t->id,
                        'name' => $t->name,
                        'role' => $t->role,
                        'rating' => $t->rating,
                        'text' => $t->quote,
                        'image' => $t->image_url,
                        'is_featured' => $t->is_featured,
                    ]);
                }
            }
        } catch (Throwable) {}

        return collect(config('school.reviews'));
    }

    private function loadNotices(): Collection
    {
        try {
            if (Schema::hasTable('notices')) {
                $items = Notice::active()->get();
                if ($items->isNotEmpty()) {
                    return $items->map(fn (Notice $n) => [
                        'title' => $n->title,
                        'badge' => $n->badge,
                        'date' => $n->notice_date ? $n->notice_date->format('Y-m-d') : now()->format('Y-m-d'),
                        'link' => $n->link_url ?? '#admissions',
                    ]);
                }
            }
        } catch (Throwable) {}

        return collect(config('school.notices'));
    }

    private function loadFacilities(): Collection
    {
        try {
            if (Schema::hasTable('facilities')) {
                $items = Facility::active()->get();
                if ($items->isNotEmpty()) {
                    return $items->map(fn (Facility $f) => [
                        'title' => $f->title,
                        'text' => $f->description,
                        'icon' => $f->icon,
                        'image' => $f->image_url,
                    ]);
                }
            }
        } catch (Throwable) {}

        return collect(config('school.facilities'));
    }

    private function loadAcademicWings(): Collection
    {
        try {
            if (Schema::hasTable('academic_wings')) {
                $items = AcademicWing::active()->get();
                if ($items->isNotEmpty()) {
                    return $items->map(fn (AcademicWing $a) => [
                        'title' => $a->title,
                        'classes' => $a->classes,
                        'tag' => $a->tag,
                        'text' => $a->description,
                        'highlights' => is_array($a->highlights) ? $a->highlights : json_decode($a->highlights ?? '[]', true),
                        'badge_color' => $a->badge_color ?? 'blue',
                    ]);
                }
            }
        } catch (Throwable) {}

        return collect(config('school.academics'));
    }

    private function loadLeadershipMessages(): Collection
    {
        try {
            if (Schema::hasTable('leadership_messages')) {
                $items = LeadershipMessage::active()->get();
                if ($items->isNotEmpty()) {
                    return $items->map(fn (LeadershipMessage $m) => [
                        'title' => $m->title,
                        'name' => $m->name,
                        'role' => $m->role,
                        'designation' => $m->designation,
                        'image' => $m->image_url,
                        'text' => $m->message,
                    ]);
                }
            }
        } catch (Throwable) {}

        return collect(config('school.messages'));
    }

    private function loadFaqs(): Collection
    {
        try {
            if (Schema::hasTable('faqs')) {
                $items = Faq::active()->get();
                if ($items->isNotEmpty()) {
                    return $items->map(fn (Faq $f) => [
                        'q' => $f->question,
                        'a' => $f->answer,
                        'category' => $f->category,
                    ]);
                }
            }
        } catch (Throwable) {}

        return collect(config('school.faqs'));
    }

    private function localImagePaths(): Collection
    {
        return collect(['images', 'asset/image'])
            ->flatMap(function (string $directory): array {
                $absolutePath = public_path($directory);

                if (! File::isDirectory($absolutePath)) {
                    return [];
                }

                return collect(File::files($absolutePath))
                    ->filter(function ($file): bool {
                        $filename = strtolower($file->getFilename());
                        $ext = strtolower($file->getExtension());
                        return in_array($ext, ['jpg', 'jpeg', 'png', 'webp'], true) && $filename !== 'logo.png';
                    })
                    ->map(fn ($file): string => '/' . $directory . '/' . $file->getFilename())
                    ->all();
            })
            ->unique(fn (string $path) => basename($path))
            ->sortBy(fn (string $path): string => basename($path))
            ->values();
    }

    private function galleryItems(Collection $localImages): Collection
    {
        try {
            if (Schema::hasTable('galleries')) {
                $dbItems = Gallery::query()
                    ->published()
                    ->orderBy('is_featured', 'desc')
                    ->orderBy('id', 'asc')
                    ->get();

                if ($dbItems->isNotEmpty()) {
                    return $dbItems->map(fn (Gallery $g) => [
                        'id' => $g->id,
                        'title' => $g->title,
                        'category' => $g->category ?: 'Activities',
                        'image' => $g->image_url,
                        'description' => $g->description ?: 'Campus life at KSN Public School.',
                        'is_featured' => (bool) $g->is_featured,
                    ]);
                }
            }
        } catch (Throwable) {
            // fallback
        }

        return $localImages->map(fn (string $path, int $index) => [
            'id' => $index + 1,
            'title' => $this->imageTitle($path),
            'category' => $this->imageCategory($path),
            'image' => $path,
            'description' => 'A glimpse of students and campus life at KSN Public School.',
            'is_featured' => $index < 8,
        ]);
    }

    private function extractCategories(Collection $items): array
    {
        $categories = $items->pluck('category')->unique()->values()->all();
        $priorityOrder = ['Celebrations', 'Academics', 'Activities', 'Campus', 'Leadership', 'Transport', 'Admissions'];

        usort($categories, function ($a, $b) use ($priorityOrder) {
            $posA = array_search($a, $priorityOrder);
            $posB = array_search($b, $priorityOrder);

            if ($posA === false && $posB === false) return strcmp($a, $b);
            if ($posA === false) return 1;
            if ($posB === false) return -1;

            return $posA <=> $posB;
        });

        return $categories;
    }

    private function preferredImages(Collection $images, array $filenames): Collection
    {
        $matched = collect($filenames)
            ->map(fn (string $filename): ?string => $this->findImage($images, $filename))
            ->filter();

        return $matched->merge($images)->unique()->values();
    }

    private function findImage(Collection $images, string $filename): ?string
    {
        return $images->first(fn (string $path): bool => basename($path) === $filename);
    }

    private function imageTitle(string $path): string
    {
        $name = pathinfo($path, PATHINFO_FILENAME);

        return Str::of($name)
            ->replace('WhatsApp Image 2026-08-24 at ', 'Campus Activity ')
            ->replace('WhatsApp Image 2026-08-18 at ', 'School Celebration ')
            ->replace(['_', '-'], ' ')
            ->replaceMatches('/\s+/', ' ')
            ->trim()
            ->headline()
            ->toString();
    }

    private function imageCategory(string $path): string
    {
        $name = Str::of(basename($path))->lower();

        return match (true) {
            $name->contains('classroom') => 'Academics',
            $name->contains('principal') || $name->contains('director') || $name->contains('chairman') => 'Leadership',
            $name->contains('van') => 'Transport',
            $name->contains('brochure') => 'Admissions',
            $name->contains('building') || $name->contains('gallery') => 'Campus',
            $name->contains('2026-08-24') || $name->contains('2026-08-18') => 'Celebrations',
            default => 'Activities',
        };
    }
}
