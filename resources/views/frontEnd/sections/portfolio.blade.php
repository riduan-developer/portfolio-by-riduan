
        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio section-bg">
            <div class="container">
      
              <div class="section-title">
                <h2>Portfolio</h2>
              </div>
      
              <div class="row" data-aos="fade-up">
                <div class="col-lg-12 d-flex justify-content-center">
                  <ul id="portfolio-flters">
                    <li data-filter="*" class="filter-active">All</li>
                    <li data-filter=".front-end">Front End</li>
                    <li data-filter=".back-end">Back End</li>
                  </ul>
                </div>
              </div>
              <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="100">
      
                @forelse ($portfolios as $portfolio)
                    
                    <div class="col-lg-4 col-md-6 portfolio-item {{ $portfolio->category }}">
                      <div class="portfolio-wrap">
                        <img src="{{ asset('uploads/frontEnd/portfolio/'.$portfolio->p_photo) }}" class="img-fluid" alt="">
                        <div class="portfolio-links">
                          <a href="{{ asset('frontEnd/assets/img/portfolio/portfolio-1.jpg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
                          <a href="{{ route('link_url',$portfolio->project_link) }}" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                      </div>
                    </div>
                @empty
                    
                @endforelse

      
      
              </div>
      
            </div>
          </section><!-- End Portfolio Section -->
