<!DOCTYPE html>
<html lang="en">

<head>

  @include('frontEnd.layout.link')

  <title>Riduan - Portfolio</title>

</head>

<body>

        {{-- nav part --}}
        @include('frontEnd.layout.nav')
        
        @include('frontEnd.sections.hero',[
          'hero_data'=> $hero_data, 
        ])

  <main id="main">

        @include('frontEnd.sections.services',[
          'services' => $services,
        ])

        @include('frontEnd.sections.portfolio',[
          'portfolios' => $portfolios,
          ])

        @include('frontEnd.sections.resume',[
          'resumes' => $resumes,
          ])

        @include('frontEnd.sections.skills',[
          'skills' => $skills,
        ])
    
        @include('frontEnd.sections.about',[
          'abt_data'=> $abt_data, 
        ])

        @include('frontEnd.sections.contact')

  </main><!-- End #main -->


  @include('frontEnd.layout.footer')

  {{-- script part --}}
  @extends('frontEnd.layout.script')

</body>

</html>