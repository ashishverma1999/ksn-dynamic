<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
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
        $localImages = $this->localImagePaths();
        $galleryItems = $this->galleryItems($localImages);

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
            'notices' => config('school.notices'),
            'stats' => config('school.stats'),
            'visionMission' => config('school.vision_mission'),
            'academics' => config('school.academics'),
            'admissionSteps' => config('school.admission_steps'),
            'facilities' => config('school.facilities'),
            'messages' => config('school.messages'),
            'reviews' => config('school.reviews'),
            'faqs' => config('school.faqs'),
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
                        'description' => $g->description ?: 'Campus life at Happy Model Public School.',
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
            'description' => 'A glimpse of students and campus life at Happy Model Public School.',
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
