<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $pageDescription ?? 'KSN Public School - Premier English Medium School in Mungra Badshahpur, Jaunpur' }}">
    <meta name="keywords" content="KSN Public School, KSNPS, Best School in Mungra Badshahpur, Top School in Jaunpur, English Medium School, Admissions 2026-27">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- OpenGraph / Social Meta -->
    <meta property="og:title" content="{{ $pageTitle ?? 'KSN Public School | Mungra Badshahpur, Jaunpur' }}">
    <meta property="og:description" content="{{ $pageDescription ?? 'Nurturing confident learners with values, discipline and academic excellence.' }}">
    <meta property="og:image" content="{{ asset('images/school_building.jpeg') }}">
    <meta property="og:type" content="website">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}">

    <title>{{ $pageTitle ?? ($school['name'] ?? config('app.name')) }}</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,400;0,700;0,900;1,400&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Outfit:wght@500;600;700;800;900&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Google Translate Container -->
    <div id="google_translate_element" style="display:none;"></div>
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en',
                includedLanguages: 'en,hi',
                autoDisplay: false
            }, 'google_translate_element');
        }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</head>
<body class="bg-slate-50 font-sans text-slate-800 antialiased selection:bg-amber-400 selection:text-slate-900">
    @yield('content')
</body>
</html>
