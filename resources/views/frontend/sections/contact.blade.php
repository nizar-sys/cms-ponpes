{{-- <section class="contact-area section-padding" id="contact-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 text-center">
                <div class="section-title">
                    <h3 class="title">{{ $contactTitle->title }}</h3>
                    <div class="desc">
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <!-- Contact-Form -->
                <form class="contact-form" id="contact-form">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-box">
                                <input type="text" name="name" id="form-name" class="input-box"
                                    placeholder="Name">
                             
                                <label for="form-name" class="icon lb-name"><i class="fal fa-user"></i></label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-box">
                                <input type="text" name="email" id="form-email" class="input-box"
                                    placeholder="Email">
                                <label for="form-email" class="icon lb-email"><i
                                        class="fal fa-envelope"></i></label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-box">
                                <input type="text" name="subject" id="form-subject" class="input-box"
                                    placeholder="Subject">
                                <label for="form-subject" class="icon lb-subject"><i
                                        class="fal fa-check-square"></i></label>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-box">
                                <textarea class="input-box" id="form-message" placeholder="Message" cols="30"
                                    rows="4" name="message"></textarea>
                                <label for="form-message" class="icon lb-message"><i
                                        class="fal fa-edit"></i></label>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-box">
                                <button class="button-primary mouse-dir" type="submit" id="submit_btn">Send Now <span
                                        class="dir-part"></span></button>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- Contact-Form / -->
            </div>
        </div>
    </div>
</section>

 --}}

<section id="contact" class="contact">

    <div class="container" data-aos="fade-up">

        <header class="section-header">
            <h2>{{ $contactTitle->title }}</h2>
            <p>{!! $contactTitle->sub_title !!}</p>
        </header>

        <div class="row gy-4">

            <div class="col-lg-6">

                <div class="row gy-4">
                    <div class="col-md-6">
                        <div class="info-box">
                            <i class="bi bi-geo-alt"></i>
                            <h3>Address</h3>
                            <p>{{ $footerContact->address }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-box">
                            <i class="bi bi-telephone"></i>
                            <h3>Call Us</h3>
                            <p>+{{ $footerContact->phone }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-box">
                            <i class="bi bi-envelope"></i>
                            <h3>Email Us</h3>
                            <p>{{ $footerContact->email }}</p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-6">
                <form action="{{ route('contact', []) }}" id="contact-form" method="post" class="php-email-form">
                    <div class="row gy-4">

                        <div class="col-md-6">
                            <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                        </div>

                        <div class="col-md-6 ">
                            <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                        </div>

                        <div class="col-md-12">
                            <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                        </div>

                        <div class="col-md-12">
                            <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
                        </div>

                        <div class="col-md-12 text-center">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>

                            <button type="submit" id="submit_btn">Send Message</button>
                        </div>

                    </div>
                </form>

            </div>

        </div>

    </div>

</section>

@push('scripts')
    <script>
        $(document).ready(function() {
            // Csrf token
            let csrfToken = $('meta[name="csrf-token"]').attr('content') || "{{ csrf_token() }}";
            if (!csrfToken) {
                console.error('CSRF token not found!');
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            });

            $(document).on('submit', '#contact-form', function(e) {
                e.preventDefault();
                let $form = $(this);
                $.ajax({
                    type: "POST",
                    url: `{{route('contact')}}`,
                    data: $form.serialize(),
                    dataType: "JSON",
                    beforeSend: function() {
                        $('#submit_btn').prop("disabled", true).text('Loading...');
                    },
                    success: function(response) {
                        if (response.status == 'success') {
                            $form.trigger('reset');
                            $('.sent-message').text(response.message).show();
                            $('.error-message').addClass('d-none')
                            $('.error-message').text('').addClass('d-none')
                        } else {
                            $('.error-message').text(response.message).show();
                            $('.sent-message').addClass('d-none')
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr, status, error);
                        $('.error-message').text('Something went wrong! Please try again later.').show();
                        $('.sent-message').addClass('d-none')
                    },
                    complete: function() {
                        $('#submit_btn').prop("disabled", false).text('Send Message');
                        // hide loading
                        $('.loading').addClass('d-none');
                    }
                });
            });
        });
    </script>
@endpush
