@php
    $footerInfo = \App\Models\FooterInfo::first();
    $footerIcons = \App\Models\FooterSocialLink::all();
    $footerContact = \App\Models\FooterContactInfo::first();
    $footerServices = \App\Models\Service::latest()->take(5)->get('name');
    $portfolioItems = \App\Models\PortfolioItem::latest()->take(5)->get(['title', 'website']);
@endphp
<div class="site-footer">
    <div class="container">

        <div class="row">
            <div class="col-lg-3">
                <div class="widget">
                    <h3>Useful Links</h3>
                    <ul class="list-unstyled float-left links">
                        @foreach ($footerUsefulLinks as $usefulLink)
                            <li><a href="{{ $usefulLink->url }}">{{ $usefulLink->name }}</a></li>
                        @endforeach
                    </ul>
                </div> <!-- /.widget -->
            </div> <!-- /.col-lg-3 -->

            <div class="col-lg-3">
                <div class="widget">
                    <h3>My Recent Works</h3>
                    <ul class="list-unstyled float-left links">
                        @foreach ($portfolioItems as $port)
                            <li><a href="{{ $port->website }}" target="__blank">{{ $port->title }}</a></li>
                        @endforeach
                    </ul>
                </div> <!-- /.widget -->
            </div> <!-- /.col-lg-3 -->

            <div class="col-lg-3">
                <div class="widget">
                    <h3>Services</h3>
                    <ul class="list-unstyled float-left links">
                        @foreach ($footerServices as $service)
                            <li><a href="#">{{ $service->name }}</a></li>
                        @endforeach
                    </ul>
                </div> <!-- /.widget -->
            </div> <!-- /.col-lg-3 -->


            <div class="col-lg-3">
                <div class="widget">
                    <h3>Contact</h3>
                    <address>{{ $footerContact?->address }}</address>
                    <ul class="list-unstyled links mb-4">
                        <li><a href="tel://{{ $footerContact?->phone }}">{{ $footerContact?->phone }}</a></li>
                        <li><a href="mailto:{{ $footerContact?->email }}">{{ $footerContact?->email }}</a></li>
                    </ul>

                    <h3>Connect</h3>
                    <ul class="list-unstyled social">
                        @foreach($footerIcons as $icon)
                            <li><a href="{{ $icon->url }}"><span class="{{ $icon->icon }}"></span></a></li>
                        @endforeach
                    </ul>

                </div> <!-- /.widget -->
            </div> <!-- /.col-lg-3 -->

        </div> <!-- /.row -->





        <div class="row mt-5">
            <div class="col-12 text-center">
                <!--
          **==========
          NOTE:
          Please don't remove this copyright link unless you buy the license here https://untree.co/license/

          **==========
        -->
                <p class="mb-0">Copyright &copy; {{ $footerInfo?->copy_right }}
                    <script>
                        document.write(new Date().getFullYear());
                    </script>. All Rights Reserved. &mdash; <a
                        href="{{ url('/', []) }}">{{ $footerInfo?->powered_by }}</a>
                    <!-- License information: https://untree.co/license/ -->
                </p>
            </div>
        </div>
    </div> <!-- /.container -->
</div> <!-- /.site-footer -->
