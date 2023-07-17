
<!-- ======= About Section ======= -->
<section id="about" class="about">
    <div class="container">
    
    
      
      <div class="row">
        <div class="col-lg-4" data-aos="fade-right">
          @forelse ($abt_data as $abt)
            @if ($abt->about_field == 'PHOTO')
              <img src="{{ asset('uploads/frontend/about') }}/{{ $abt->about_value }}" class="img-fluid" alt="">
            @endif
              
          @empty
              
          @endforelse
              
        </div>
        <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
          <h3>Full Stack Web Developer.</h3>
          <p class="fst-italic">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
            magna aliqua.
          </p>
          <div class="row">
            @forelse ($abt_data as $index => $abt)
              @if ($abt->status != 0)
                  @if ($index < 5)
                    
                    <div class="col-lg-6">
                      <ul>
                        <li><i class="bi bi-chevron-right"></i> <strong>{{ $abt->about_field }}:</strong> <span>{{ $abt->about_value }}:</span></li>
                      </ul>  
                    </div>
                  
                  @endif
                  @if ($index > 4)
                    <div class="col-lg-6">
                        <ul>
                          <li><i class="bi bi-chevron-right"></i> <strong>{{ $abt->about_field }}:</strong> <span>{{ $abt->about_value }}:</span></li>
                        </ul>
                    </div>
                  @endif  
                @else
              @endif
                 
              @empty
            @endforelse
          </div>
          <p>
            @forelse ($abt_data as $abt)
                @if ($abt->about_field == "BIO")
                  {{ Str::limit($abt->about_value, 500) }}
                @endif
              @empty
                
            @endforelse
          </p>
        </div>
      </div>

    </div>
  </section><!-- End About Section -->
    
