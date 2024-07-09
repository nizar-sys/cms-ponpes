<section id="experiences" class="features">

    <div class="container" data-aos="fade-up">

        <header class="section-header">
            <h2>My Qualification</h2>
            <p>Education and Experience</p>
        </header>

        <!-- Feature Tabs -->
        <div class="row feture-tabs" data-aos="fade-up">
            <div class="col-lg-6">
                <!-- Tabs -->
                <ul class="nav nav-pills mb-3">
                    <li>
                        <a class="nav-link active" data-bs-toggle="pill" href="#tab1">Education</a>
                    </li>
                    <li>
                        <a class="nav-link" data-bs-toggle="pill" href="#tab2">Experience</a>
                    </li>
                </ul><!-- End Tabs -->

                <!-- Tab Content -->
                <div class="tab-content">

                    <div class="tab-pane fade show active" id="tab1">
                        @foreach ($qualificationEducation as $edu)
                            <div style="cursor: pointer" class="item wow fadeInUp open-modal mb-2"
                                data-content="{!! nl2br($edu->description) !!}" data-type="Education"
                                data-title="{{ $edu->organization_name }}">
                                <h3>{{ $edu->organization_name }}</h3>
                                <h4>{!! nl2br($edu->address) !!}</h4>

                                <div
                                    class="{{ $edu->latest || $qualificationEducation->count() != 1 ? 'v-line' : '' }}">
                                </div>
                            </div>
                            <div class="">
                                {!! $edu->description !!}
                            </div>
                            <div class="time" style="color: #808080"><i class="bi bi-clock"></i> {{ $edu->date }}
                            </div>
                            <div class="mb-3"></div>
                        @endforeach
                    </div><!-- End Tab 1 Content -->

                    <div class="tab-pane fade show" id="tab2">
                        @foreach ($qualificationExperience as $exp)
                            <div style="cursor: pointer" class="item wow fadeInUp open-modal mb-2"
                                data-content="{!! nl2br($exp->description) !!}" data-type="Education"
                                data-title="{{ $exp->organization_name }}">
                                <h3>{{ $exp->organization_name }}</h3>
                                <h4>{!! nl2br($exp->address) !!}</h4>

                                <div
                                    class="{{ $exp->latest || $qualificationEducation->count() != 1 ? 'v-line' : '' }}">
                                </div>
                            </div>
                            <div class="">
                                {!! $exp->description !!}
                            </div>
                            <div class="time" style="color: #808080"><i class="bi bi-clock"></i> {{ $exp->date }}
                            </div>
                            <div class="mb-3"></div>
                        @endforeach
                    </div><!-- End Tab 2 Content -->
                </div>

            </div>

            <div class="col-lg-6">
                <img src="{{ asset('newasset') }}/img/features-2.png" class="img-fluid" alt="">
            </div>

        </div><!-- End Feature Tabs -->
    </div>

</section><!-- End Features Section -->
