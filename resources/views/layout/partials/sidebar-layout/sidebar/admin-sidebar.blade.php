<div data-kt-menu-trigger="click"
    class="menu-item menu-accordion {{ request()->routeIs('dashboard', 'admin.case-studies.*', 'admin-faqs.*', 'admin.testimonials.*', 'admin.kpi-sections.*', 'admin-category.*', 'admin.portfolios.*', 'admin-seo-meta.*', 'admin.teams.*', 'admin.industries.*', 'admin-blogs.*', 'admin-privacy-policy.*', 'admin-terms-conditions.*', 'admin-disclaimer.*', 'admin.brand-we-carry.*') ? 'here show' : '' }}">
    <span class="menu-link">
        <span class="menu-icon">{!! getIcon('element-11', 'fs-2') !!}</span>
        <span class="menu-title">Dashboards</span>
        <span class="menu-arrow"></span>
    </span>

    {{-- <div class="menu-sub menu-sub-accordion">
        <div class="menu-item">
            <a class="menu-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Default</span>
            </a>
        </div>
    </div> --}}

    <div class="menu-sub menu-sub-accordion">
        <div class="menu-item">
            <a class="menu-link {{ request()->routeIs('admin-faqs.*') ? 'active' : '' }}"
                href="{{ route('admin-faqs.index') }}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">{{ __('Create FAQs') }}</span>
            </a>
        </div>
    </div>
    <div class="menu-sub menu-sub-accordion">
        <div class="menu-item">
            <a class="menu-link {{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}"
                href="{{ route('admin.testimonials.list') }}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">{{ __('Create Testimonials') }}</span>
            </a>
        </div>
    </div>

    <div class="menu-sub menu-sub-accordion">
        <div class="menu-item">
            <a class="menu-link {{ request()->routeIs('admin.kpi-sections.*') ? 'active' : '' }}"
                href="{{ route('admin.kpi-sections.list') }}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">{{ __('Create KPI') }}</span>
            </a>
        </div>
    </div>

    <div class="menu-sub menu-sub-accordion">
        <div class="menu-item">
            <a class="menu-link {{ request()->routeIs('admin-category.*') ? 'active' : '' }}"
                href="{{ route('admin-category.list') }}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">{{ __('Categories') }}</span>
            </a>
        </div>
    </div>

    <div class="menu-sub menu-sub-accordion">
        <div class="menu-item">
            <a class="menu-link {{ request()->routeIs('admin.portfolios.*') ? 'active' : '' }}"
                href="{{ route('admin.portfolios.list') }}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">{{ __('Portfolios') }}</span>
            </a>
        </div>
    </div>

    <div class="menu-sub menu-sub-accordion">
        <div class="menu-item">
            <a class="menu-link {{ request()->routeIs('admin-seo-meta.*') ? 'active' : '' }}"
                href="{{ route('admin-seo-meta.list') }}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">{{ __('SEO Meta') }}</span>
            </a>
        </div>
    </div>

    <div class="menu-sub menu-sub-accordion">
        <div class="menu-item">
            <a class="menu-link {{ request()->routeIs('admin.teams.*') ? 'active' : '' }}"
                href="{{ route('admin.teams.list') }}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">{{ __('Create Teams') }}</span>
            </a>
        </div>
    </div>

    <div class="menu-sub menu-sub-accordion">
        <div class="menu-item">
            <a class="menu-link {{ request()->routeIs('admin.industries.*') ? 'active' : '' }}"
                href="{{ route('admin.industries.list') }}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Create Industries</span>
            </a>
        </div>
    </div>

    <div class="menu-sub menu-sub-accordion">
        <div class="menu-item">
            <a class="menu-link {{ request()->routeIs('admin-blogs.*') ? 'active' : '' }}"
                href="{{ route('admin-blogs.list') }}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Create Blogs</span>
            </a>
        </div>
    </div>

    <div class="menu-sub menu-sub-accordion">
        <div class="menu-item">
            <a class="menu-link {{ request()->routeIs('admin-privacy-policy.*') ? 'active' : '' }}"
                href="{{ route('admin-privacy-policy.page') }}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">{{ __('Privacy Policy') }}</span>
            </a>
        </div>
    </div>
    <div class="menu-sub menu-sub-accordion">
        <div class="menu-item">
            <a class="menu-link {{ request()->routeIs('admin-terms-conditions.*') ? 'active' : '' }}"
                href="{{ route('admin-terms-conditions.page') }}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">{{ __('Terms & Conditions') }}</span>
            </a>
        </div>
    </div>

    <div class="menu-sub menu-sub-accordion">
        <div class="menu-item">
            <a class="menu-link {{ request()->routeIs('admin-disclaimer.*') ? 'active' : '' }}"
                href="{{ route('admin-disclaimer.page') }}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">{{ __('Disclaimer') }}</span>
            </a>
        </div>
    </div>

    <div class="menu-sub menu-sub-accordion">
        <div class="menu-item">
            <a class="menu-link {{ request()->routeIs('admin.brand-we-carry.*') ? 'active' : '' }}"
                href="{{ route('admin.brand-we-carry.list') }}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Brand We Carry</span>
            </a>
        </div>
    </div>

    <div class="menu-sub menu-sub-accordion">
        <div class="menu-item">
            <a class="menu-link {{ request()->routeIs('admin.case-studies.*') ? 'active' : '' }}"
                href="{{ route('admin.case-studies.list') }}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Create CaseStudy</span>
            </a>
        </div>
    </div>
</div>


<div data-kt-menu-trigger="click"
    class="menu-item menu-accordion {{ request()->routeIs('admin.services.*', 'admin.sub-services.*') ? 'here show' : '' }}">
    <span class="menu-link">
        <span class="menu-icon"><i class="ki-solid ki-wrench fs-2x"></i></span>
        <span class="menu-title">Services</span>
        <span class="menu-arrow"></span>
    </span>

    <div class="menu-sub menu-sub-accordion">
        <div class="menu-item">
            <a class="menu-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}"
                href="{{ route('admin.services.list') }}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Create Services</span>
            </a>
        </div>
    </div>
    <div class="menu-sub menu-sub-accordion">
        <div class="menu-item">
            <a class="menu-link {{ request()->routeIs('admin.sub-services.*') ? 'active' : '' }}"
                href="{{ route('admin.sub-services.list') }}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Create Sub Services</span>
            </a>
        </div>
    </div>
</div>

<div data-kt-menu-trigger="click"
    class="menu-item menu-accordion {{ request()->routeIs('admin.project-requests.*', 'admin.questions.*', 'admin.case-study-downloads.*', 'admin.contact-inquiries.*', 'admin.service-inquiries.*') ? 'here show' : '' }}">
    <span class="menu-link">
        <span class="menu-icon"><i class="ki-duotone ki-question fs-2x">
                <span class="path1"></span>
                <span class="path2"></span>
                <span class="path3"></span>
            </i></span>
        <span class="menu-title">Queries</span>
        <span class="menu-arrow"></span>
    </span>

    <div class="menu-sub menu-sub-accordion">
        <div class="menu-item">
            <a class="menu-link {{ request()->routeIs('admin.project-requests.*') ? 'active' : '' }}"
                href="{{ route('admin.project-requests.list') }}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Project Requests</span>
            </a>
        </div>
    </div>

    <div class="menu-sub menu-sub-accordion">
        <div class="menu-item">
            <a class="menu-link {{ request()->routeIs('admin.questions.*') ? 'active' : '' }}"
                href="{{ route('admin.questions.list') }}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Questions</span>
            </a>
        </div>
    </div>

    <div class="menu-sub menu-sub-accordion">
        <div class="menu-item">
            <a class="menu-link {{ request()->routeIs('admin.service-inquiries.*') ? 'active' : '' }}"
                href="{{ route('admin.service-inquiries.list') }}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Service Inquiries</span>
            </a>
        </div>
    </div>

    <div class="menu-sub menu-sub-accordion">
        <div class="menu-item">
            <a class="menu-link {{ request()->routeIs('admin.case-study-downloads.*') ? 'active' : '' }}"
                href="{{ route('admin.case-study-downloads.list') }}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Case Study Downloads</span>
            </a>
        </div>
    </div>

    <div class="menu-sub menu-sub-accordion">
        <div class="menu-item">
            <a class="menu-link {{ request()->routeIs('admin.contact-inquiries.*') ? 'active' : '' }}"
                href="{{ route('admin.contact-inquiries.list') }}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Contact Inquiries</span>
            </a>
        </div>
    </div>
</div>

<div class="menu-item">
    <a class="menu-link" href="{{ route('admin-general.settings') }}">
        <span class="menu-icon"><i class="ki-outline ki-gear fs-2x"></i></span>
        <span class="menu-title">General Setting</span>
    </a>
</div>