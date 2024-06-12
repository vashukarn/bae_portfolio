<x-guest-layout>
    @section('page_title', $page_title)
    <section class="pt-65 pb-65 position-relative">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <h6 class="text-uppercase font-heading text-muted mb-15">About Our Company</h6>
                    <h2 class="font-heading mb-50">
                        Welcome to {{ getBusinessSetting('app_name') }}, Your Source for Quality Education!
                    </h2>
                    <p>Here, we're passionate about providing top-notch education tailored for law students and other
                        faculty members. Our mission is simple: to empower learners with the best possible information,
                        equipping them for success in their academic journeys and beyond.</p>
                </div>
                <div class="col-lg-6">
                    <img src="{{ getBusinessSetting('logo') }}" alt="">
                </div>
            </div>
        </div>
        <div class="shape-arrow">
            <img src="{{ asset('assets/imgs/theme/arrow.png') }}" alt="">
        </div>
    </section>
    <section class="pt-65 pb-65 position-relative">
        <div class="container">
            <h6 class="text-uppercase font-heading text-muted mb-15">Our Approach to Education</h6>
            <div class="row mb-30">
                <div class="col-lg-12">
                    <p>We believe in the power of knowledge to transform lives. That's why we're dedicated to delivering
                        educational content that's not only informative but also engaging and accessible. From
                        expert-authored articles to interactive resources, we strive to make learning a rewarding and
                        enriching experience for every user.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="pb-65 position-relative">
        <div class="hr mb-65"></div>
        <div class="container">
            <div class="row mb-20">
                <div class="col-lg-8">
                    <h6 class="text-uppercase font-heading text-muted mb-15">Our Commitment to Excellence</h6>
                    <p>Quality is at the heart of everything we do. We're committed to delivering the most accurate,
                        up-to-date, and comprehensive information available. Our team of educators and subject matter
                        experts works tirelessly to ensure that our content meets the highest standards of
                        excellence.</p>
                </div>
                <div class="col-lg-4 text-right">
                    <img src="{{ asset('assets/imgs/theme/darts.png') }}" alt="">
                </div>
            </div>
        </div>
    </section>
    <section class="pt-65 pb-65 position-relative">
        <div class="bg-square-2"></div>
        <div class="container">
            <h6 class="text-uppercase font-heading text-muted mb-15">Meet Our Team</h6>
            <h2 class="font-heading mb-50">
                Our leadership team
            </h2>
            <div class="row">
                <p>Behind every great educational platform is a team of dedicated professionals. Our team brings
                    together a wealth of experience and expertise in the fields of education and law. With backgrounds
                    ranging from academia to legal practice, we're passionate about making a positive impact on the
                    lives of our students.</p>
                <div class="col-lg-6 col-md-6 mb-30">
                    <h5>Madhu Dahal</h5>
                    <p class="font-sm">I am passionate about combining education and technology to create impactful learning experiences. With a strong background in law and a commitment to academic excellence, we founded Ankita Kesari to help fellow students and educators access high-quality educational resources.</p>
                </div>
                <div class="col-lg-6 col-md-6 mb-md-30">
                    <h5>Manish Rajak</h5>
                    <p class="font-sm">I have keen interest in leveraging innovative approaches to education. As a Founder, i will bring a wealth of knowledge and dedication to ensuring that Ankita Kesari operates smoothly and effectively, providing top-quality resources for our users.</p>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
