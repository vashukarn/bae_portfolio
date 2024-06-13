<x-guest-layout>
    @section('page_title', $page_title)
    <section id="mt_general_banner">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="banner-wrapper">
                        <div class="banner-caption wow fadeInUp" data-wow-delay="0.3">
                            <h1>About Me</h1>
                            <p>M.Arch at IIT Roorkee. Studio nights fueled by caffeine and creativity. Designing a flood-proof community center. Pushing boundaries, learning from classmates, transforming into the architect I dream of becoming.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="mt_about_me">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="mt_about_me">
                        <h3>Hi There My Name is {{ getBusinessSetting('app_name') }}!</h3>
                        <p>The low hum of the studio vibrates through my fingertips, a constant thrum beneath the
                            scratch of pencil on tracing paper. Outside, the energy of IIT Roorkee thrums – a thousand
                            minds in motion. But here, in this sanctuary of creation, time seems to slow.</p>
                        <p>As a first-year M.Arch student, I, Ankita, am consumed by my design for a community center in
                            a flood-prone region. My B.Arch was a whirlwind, a passionate blur of late nights fueled by
                            caffeine and the relentless pursuit of design principles and construction techniques. But
                            here, at India's premier engineering and technology institute, the focus has shifted. This
                            M.Arch program is a crucible, pushing me to new depths, to explore the intersection of
                            architecture, sustainability, and social impact.</p>
                        <p>My professors, giants in the field with experience etched in the lines on their faces,
                            challenge me to see beyond aesthetics. They demand designs that prioritize people and the
                            environment, that are symbols of resilience and community. This is my kind of environment.
                            The studio is my playground, a space where experimentation is not just tolerated, but
                            encouraged. Boundaries are meant to be pushed, redefined.</p>
                        <p>Hours melt away as I discuss design concepts with my peers. A diverse group, each one
                            bringing a unique perspective from a different corner of the country, we dissect ideas with
                            fervor. We debate the merits of local materials, the lifeblood of natural light and
                            ventilation, the delicate dance between functionality and cultural sensitivity.</p>
                        <p>But the program isn't confined to these walls. Weeks spent on a remote Himalayan village site
                            become an education unlike any other. Studying vernacular architecture, understanding the
                            community's needs firsthand – this real-world experience grounds my design, imbues it with a
                            depth that textbooks can't replicate.</p>
                        <p>As I meticulously render the final design of the community center, a wave of satisfaction
                            washes over me. This isn't just a building; it's a testament to the architect I'm becoming,
                            a promise of a future where architecture can empower and uplift.</p>
                        <p>The journey at IIT Roorkee has just begun, but I know this is where I belong. Here, amidst
                            the challenges and the camaraderie, I am being shaped, not just as an architect, but as
                            someone who builds a better tomorrow.</p>
                        <a href="CV.html" class="mt_btn_color" download="CV">Download CV</a>
                    </div>

                </div>
                <div class="col-xs-12 col-sm-6 col-md-push-1 col-md-5">
                    <div class="about_img">
                        <img src="{{ asset('profile.jpeg') }}" alt="About Me">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="mt_experience_sec">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="mt_experience">
                        <h3>Work &amp; Education</h3>
                        <div class="mt_work_postion">
                            <h4>Indian Institute of Technology - Roorkee (Current)</h4>
                            <p>Master of Architecture - M.Arch</p>
                        </div>
                        <div class="mt_work_postion">
                            <h4>Kathmandu Engineering College - (2016 - 2022)</h4>
                            <p>Bachelor of Architecture (B.Arch)</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mt_skills">
                        <h3>Experience</h3>
                        <div class="mt_work_postion">
                            <h4>Junior Architect (Kathmandu)</h4>
                            <p>SthaanArtha Architects · Jun 2022 - Aug 2022</p>
                        </div>
                        <div class="mt_work_postion">
                            <h4>Architectural Intern (Kathmandu)</h4>
                            <p>Go Green Consultancy Pvt. Ltd. · Nov 2019 - Mar 2020</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{--    <section id="mt_client">--}}
    {{--        <div class="container">--}}
    {{--            <div class="row">--}}
    {{--                <div class="col-sm-12">--}}
    {{--                    <h3>Partners</h3>--}}
    {{--                    <div class="owl-carousel">--}}
    {{--                        <div class="item">--}}
    {{--                            <img src="images/brand-logos/1.png">--}}
    {{--                        </div>--}}
    {{--                        <div class="item">--}}
    {{--                            <img src="images/brand-logos/2.png">--}}
    {{--                        </div>--}}
    {{--                        <div class="item">--}}
    {{--                            <img src="images/brand-logos/3.png">--}}
    {{--                        </div>--}}
    {{--                        <div class="item">--}}
    {{--                            <img src="images/brand-logos/4.png">--}}
    {{--                        </div>--}}
    {{--                        <div class="item">--}}
    {{--                            <img src="images/brand-logos/5.png">--}}
    {{--                        </div>--}}
    {{--                        <div class="item">--}}
    {{--                            <img src="images/brand-logos/6.png">--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}
</x-guest-layout>
