<footer id="mt_footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="copyright text-left">
                    <p>&copy;
                        <script>document.write(new Date().getFullYear())</script> - Design by <a
                            href="https://vashukarn.com.np/" target="_blank">{{ getBusinessSetting('meta_site_author') }}</a></p>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="social_icons pull-right">
                    @foreach($social_links as $social_link)
                        <a href="{{ $social_link->link }}" title="{{ $social_link->social->title }}" target="_blank"><i class="{{ $social_link->social->font_awesome_icon }}"></i></a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</footer>
