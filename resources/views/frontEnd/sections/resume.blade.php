       <!-- ======= Resume Section ======= -->
        <section id="resume" class="resume">
            <div class="container">
      
              <div class="section-title">
                <h2>Resume</h2>
              </div>
      
              <div class="row">
                <div class="col-lg-6" data-aos="fade-up">
                  <h3 class="resume-title">Sumary</h3>
                  
                  @forelse ($resumes as $resume)

                  @if (strtolower($resume->header) == 'summary')
                    <div class="resume-item pb-0">
                      <p><em>Innovative and deadline-driven Graphic Designer with 3+ years of experience designing and developing user-centered digital/print marketing material from initial concept to final, polished deliverable.</em></p>
                      <ul style="text-transform: uppercase; font-weight:bold">
                        <li>BSc. in CSE, Professional IT Course</li>
                        <li>Ex. ICT Teacher</li>
                        <li>Various Project Experience </li>
                      </ul>
                    </div>
                  @endif

                  @if (strtolower($resume->header) == 'education')
                      <h4 class="resume-title">{{ $resume->header }}</h4>
                      <div class="resume-item">
                        <h5>{{ $resume->title }}</h5><br>
                        <h5>{{ Carbon\Carbon::parse($resume->date_from)->format('Y')}} - {{ $resume->date_to == NULL ? 'Present' : Carbon\Carbon::parse($resume->date_to)->format('Y')}}</h5>
                        <p><em>{{ $resume->institution }}</em></p>
                        <p>{{ $resume->description }}</p>
                      </div>
                  @endif

                  
                  @empty
                      
                  @endforelse
                </div>

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                  
                  @forelse ($resumes as $resume)
                  @if (strtolower($resume->header) == 'professional experience')    
                    <h4 class="resume-title">{{ $resume->header }}</h4>
                      <div class="resume-item">
                        <h5>{{ $resume->title }}</h5><br>
                        <h5>{{ Carbon\Carbon::parse($resume->date_from)->format('Y')}} - {{ $resume->date_to == NULL ? 'Present' : Carbon\Carbon::parse($resume->date_to)->format('Y')}}</h5>
                        <p><em>{{ $resume->institution }} </em></p>
                        <ul>
                          <li>{{ $resume->description }}</li>
                        </ul>
                      </div>
                      @endif
                    @empty
                      
                    @endforelse


                    @forelse ($resumes as $resume)
                      @if (strtolower($resume->header) == 'project')    
                      <h4 class="resume-title">{{ $resume->header }}</h4>
                        <div class="resume-item">
                          <h5>{{ $resume->title }}</h5>
                          <p><em>{{ $resume->institution }} </em></p>
                          <ul>
                            <li>{{ $resume->description }}</li>
                          </ul>
                        </div>
                        @endif
                    @empty
                      
                    @endforelse

                </div>
              </div>
      
            </div>
          </section><!-- End Resume Section -->
