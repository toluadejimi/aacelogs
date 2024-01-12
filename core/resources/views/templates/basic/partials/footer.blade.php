@php
    $footerContent = getContent('footer.content', true);
    $policyPages = getContent('policy_pages.element', orderById: true);
    $socials = getContent('social_icon.element', orderById: true);
    $contact = getContent('contact_us.content', true);
@endphp
<footer class="footer-area">
   
    <div class="bottom-footer py-3">
        <div class="container">
            <div class="row gy-3">
                <div class="col-sm-6">
                    <div class="bottom-footer__text"> &copy; @lang('Copyright') @php echo date('Y') @endphp . @lang('All rights reserved').</div>
                </div>
                <div class="col-sm-6">
                    <div class="bottom-footer__menu d-flex align-items-end justify-content-end">
                        @foreach ($policyPages as $policy)
                            <a href="{{ route('policy.pages', [slug(@$policy->data_values->title), @$policy->id]) }}" class="bottom-footer__link">
                                {{ __(@$policy->data_values->title) }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
