(function ($) {
    'use strict';
    function initTopbar() {
        const $topbarContainer = $('.setCustomTopbar');

        if ($topbarContainer.length) {
            const $topbarLinks = $('.topbar-link');
            const $targetSections = [];

            $topbarLinks.each(function () {
                const targetId = $(this).attr('data-target');
                const $target = $(`#${targetId}`);

                if ($target.length) {
                    $target.addClass('targetan');
                    $targetSections.push($target);
                }
            });

            if ($targetSections.length) {
                let ticking = false;
                $(window).on('scroll', function () {
                    if (!ticking) {
                        window.requestAnimationFrame(function () {
                            updateActiveLink();
                            ticking = false;
                        });
                        ticking = true;
                    }
                });

                function updateActiveLink() {
                    const scrollPosition = $(window).scrollTop();
                    let currentSection = '';

                    $targetSections.forEach(function ($section) {
                        const sectionTop = $section.offset().top;
                        const sectionHeight = $section.outerHeight();

                        if (scrollPosition >= sectionTop - sectionHeight / 3) {
                            currentSection = $section.attr('id');
                        }
                    });

                    $topbarLinks.removeClass('active');
                    if (currentSection) {
                        $(`.topbar-link[data-target="${currentSection}"]`).addClass('active');
                    }
                }

                updateActiveLink();
            }
        }
    }

    $(document).ready(function () {
        initTopbar();
    });

    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/topbar-id-for-elementor.default', function () {
            initTopbar();
        });
    });

})(jQuery);