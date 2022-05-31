/*

Polo - Multipurpose HTML5 Template
Version: 5.9.9
Website: https://inspirothemes.com/themes/polo
License: https://inspirothemes.com/themes/polo/license.html
Inspiro Themes (https://inspirothemes.com)
Author: INSPIRO - Ardian Berisha
Copyright 2021

*/

//INSPIRO Global var
var INSPIRO = {},
    $ = jQuery.noConflict();
(function($) {
    "use strict";
    // Predefined Global Variables
    var $window = $(window),
        $theme_color = "#2250fc",
        //Main
        $body = $("body"),
        $bodyInner = $(".body-inner"),
        $section = $("section"),
        //Header
        $topbar = $("#topbar"),
        $header = $("#header"),
        $headerCurrentClasses = $header.attr("class"),
        //Logo
        headerLogo = $("#logo"),
        //Menu
        $mainMenu = $("#mainMenu"),
        $mainMenuTriggerBtn = $("#mainMenu-trigger a, #mainMenu-trigger button"),
        //Slider
        $slider = $("#slider"),
        $inspiroSlider = $(".inspiro-slider"),
        $carousel = $(".carousel"),
        /*Grid Layout*/
        $gridLayout = $(".grid-layout"),
        $gridFilter = $(".grid-filter, .page-grid-filter"),
        windowWidth = $window.width();

    //Check if header exist
    if ($header.length > 0) {
        var $headerOffsetTop = $header.offset().top;
    }
    var Events = {
        browser: {
            isMobile: function() {
                if (
                    navigator.userAgent.match(/(iPhone|iPod|iPad|Android|BlackBerry)/)
                ) {
                    return true;
                } else {
                    return false;
                }
            },
        },
    };
    //Settings
    var Settings = {
        isMobile: Events.browser.isMobile,
        submenuLight: $header.hasClass("submenu-light") == true ? true : false,
        headerHasDarkClass: $header.hasClass("dark") == true ? true : false,
        headerDarkClassRemoved: false,
        sliderDarkClass: false,
        menuIsOpen: false,
        menuOverlayOpened: false,
    };
    //Window breakpoints
    $(window).breakpoints({
        triggerOnInit: true,
        breakpoints: [{
                name: "xs",
                width: 0,
            },
            {
                name: "sm",
                width: 576,
            },
            {
                name: "md",
                width: 768,
            },
            {
                name: "lg",
                width: 1025,
            },
            {
                name: "xl",
                width: 1200,
            },
        ],
    });
    var currentBreakpoint = $(window).breakpoints("getBreakpoint");
    $body.addClass("breakpoint-" + currentBreakpoint);
    $(window).bind("breakpoint-change", function(breakpoint) {
        $body.removeClass("breakpoint-" + breakpoint.from);
        $body.addClass("breakpoint-" + breakpoint.to);
    });

    $(window).bind("breakpoint-change", function(event) {
        $(window).breakpoints("greaterEqualTo", "lg", function() {
            $body.addClass("b--desktop");
            $body.removeClass("b--responsive");
        });
        $(window).breakpoints("lessThan", "lg", function() {
            $body.removeClass("b--desktop");
            $body.addClass("b--responsive");
        });
    });

    INSPIRO.core = {
        functions: function() {
            INSPIRO.core.scrollTop();
            INSPIRO.core.rtlStatus();
            INSPIRO.core.equalize();
            INSPIRO.core.customHeight();
        },
        scrollTop: function() {
            var $scrollTop = $("#scrollTop");
            if ($scrollTop.length > 0) {
                var scrollOffset = $body.attr("data-offset") || 400;
                if ($window.scrollTop() > scrollOffset) {
                    if ($body.hasClass("frame")) {
                        $scrollTop.css({
                            bottom: "46px",
                            opacity: 1,
                            "z-index": 199,
                        });
                    } else {
                        $scrollTop.css({
                            bottom: "26px",
                            opacity: 1,
                            "z-index": 199,
                        });
                    }
                } else {
                    $scrollTop.css({
                        bottom: "16px",
                        opacity: 0,
                    });
                }
                $scrollTop.off("click").on("click", function() {
                    $("body,html").stop(true).animate({
                            scrollTop: 0,
                        },
                        1000,
                        "easeInOutExpo"
                    );
                    return false;
                });
            }
        },
        rtlStatus: function() {
            var $rtlStatusCheck = $("html").attr("dir");
            if ($rtlStatusCheck == "rtl") {
                return true;
            }
            return false;
        },
        equalize: function() {
            var $equalize = $(".equalize");
            if ($equalize.length > 0) {
                $equalize.each(function() {
                    var elem = $(this),
                        selectorItem =
                        elem.find(elem.attr("data-equalize-item")) || "> div",
                        maxHeight = 0;
                    selectorItem.each(function() {
                        if ($(this).outerHeight(true) > maxHeight) {
                            maxHeight = $(this).outerHeight(true);
                        }
                    });
                    selectorItem.height(maxHeight);
                });
            }
        },
        customHeight: function(setHeight) {
            var $customHeight = $(".custom-height");
            if ($customHeight.length > 0) {
                $customHeight.each(function() {
                    var elem = $(this),
                        elemHeight = elem.attr("data-height") || 400,
                        elemHeightLg = elem.attr("data-height-lg") || elemHeight,
                        elemHeightMd = elem.attr("data-height-md") || elemHeightLg,
                        elemHeightSm = elem.attr("data-height-sm") || elemHeightMd,
                        elemHeightXs = elem.attr("data-height-xs") || elemHeightSm;

                    function customHeightBreakpoint(setHeight) {
                        if (setHeight) {
                            elem = setHeight;
                        }
                        switch ($(window).breakpoints("getBreakpoint")) {
                            case "xs":
                                elem.height(elemHeightXs);
                                break;
                            case "sm":
                                elem.height(elemHeightSm);
                                break;
                            case "md":
                                elem.height(elemHeightMd);
                                break;
                            case "lg":
                                elem.height(elemHeightLg);
                                break;
                            case "xl":
                                elem.height(elemHeight);
                                break;
                        }
                    }
                    customHeightBreakpoint(setHeight);
                    $(window).resize(function() {
                        setTimeout(function() {
                            customHeightBreakpoint(setHeight);
                        }, 100);
                    });
                });
            }
        },
    };
    INSPIRO.header = {
        functions: function() {
            INSPIRO.header.logoStatus();
            INSPIRO.header.stickyHeader();
            INSPIRO.header.mainMenu();
            INSPIRO.header.dotsMenu();
        },
        logoStatus: function(status) {
            var headerLogoDefault = headerLogo.find($(".logo-default")),
                headerLogoDark = headerLogo.find($(".logo-dark")),
                headerLogoFixed = headerLogo.find(".logo-fixed"),
                headerLogoResponsive = headerLogo.find(".logo-responsive");

            if ($header.hasClass("header-sticky") && headerLogoFixed.length > 0) {
                headerLogoDefault.css("display", "none");
                headerLogoDark.css("display", "none");
                headerLogoResponsive.css("display", "none");
                headerLogoFixed.css("display", "block");
            } else {
                headerLogoDefault.removeAttr("style");
                headerLogoDark.removeAttr("style");
                headerLogoResponsive.removeAttr("style");
                headerLogoFixed.removeAttr("style");
            }
            $(window).breakpoints("lessThan", "lg", function() {
                if (headerLogoResponsive.length > 0) {
                    headerLogoDefault.css("display", "none");
                    headerLogoDark.css("display", "none");
                    headerLogoFixed.css("display", "none");
                    headerLogoResponsive.css("display", "block");
                }
            });
        },
        stickyHeader: function() {
            var shrinkHeader = $header.attr("data-shrink") || 0,
                shrinkHeaderActive = $header.attr("data-sticky-active") || 200,
                scrollOnTop = $window.scrollTop();
            if ($header.hasClass("header-modern")) {
                shrinkHeader = 300;
            }

            $(window).breakpoints("greaterEqualTo", "lg", function() {
                if (!$header.is(".header-disable-fixed")) {
                    if (scrollOnTop > $headerOffsetTop + shrinkHeader) {
                        $header.addClass("header-sticky");
                        if (scrollOnTop > $headerOffsetTop + shrinkHeaderActive) {
                            $header.addClass("sticky-active");
                            if (Settings.submenuLight && Settings.headerHasDarkClass) {
                                $header.removeClass("dark");
                                Settings.headerDarkClassRemoved = true;
                            }
                            INSPIRO.header.logoStatus();
                        }
                    } else {
                        $header.removeClass().addClass($headerCurrentClasses);
                        if (Settings.sliderDarkClass && Settings.headerHasDarkClass) {
                            $header.removeClass("dark");
                            Settings.headerDarkClassRemoved = true;
                        }
                        INSPIRO.header.logoStatus();
                    }
                }
            });
            $(window).breakpoints("lessThan", "lg", function() {
                if ($header.attr("data-responsive-fixed") == "true") {
                    if (scrollOnTop > $headerOffsetTop + shrinkHeader) {
                        $header.addClass("header-sticky");
                        if (scrollOnTop > $headerOffsetTop + shrinkHeaderActive) {
                            $header.addClass("sticky-active");
                            if (Settings.submenuLight) {
                                $header.removeClass("dark");
                                Settings.headerDarkClassRemoved = true;
                            }
                            INSPIRO.header.logoStatus();
                        }
                    } else {
                        $header.removeClass().addClass($headerCurrentClasses);
                        if (
                            Settings.headerDarkClassRemoved == true &&
                            $body.hasClass("mainMenu-open")
                        ) {
                            $header.removeClass("dark");
                        }
                        INSPIRO.header.logoStatus();
                    }
                }
            });
        },
        mainMenu: function() {
            if ($mainMenu.length > 0) {
                $mainMenu
                    .find(".dropdown, .dropdown-submenu")
                    .prepend('<span class="dropdown-arrow"></span>');

                var $menuItemLinks = $(
                        '#mainMenu nav > ul > li.dropdown > a[href="#"], #mainMenu nav > ul > li.dropdown > .dropdown-arrow, .dropdown-submenu > a[href="#"], .dropdown-submenu > .dropdown-arrow, .dropdown-submenu > span, .page-menu nav > ul > li.dropdown > a'
                    ),
                    $triggerButton = $("#mainMenu-trigger a, #mainMenu-trigger button"),
                    processing = false,
                    triggerEvent;

                $triggerButton.on("click", function(e) {
                    var elem = $(this);
                    e.preventDefault();
                    $(window).breakpoints("lessThan", "lg", function() {
                        var openMenu = function() {
                            if (!processing) {
                                processing = true;
                                Settings.menuIsOpen = true;
                                if (Settings.submenuLight && Settings.headerHasDarkClass) {
                                    $header.removeClass("dark");
                                    Settings.headerDarkClassRemoved = true;
                                } else {
                                    if (
                                        Settings.headerHasDarkClass &&
                                        Settings.headerDarkClassRemoved
                                    ) {
                                        $header.addClass("dark");
                                    }
                                }
                                elem.addClass("toggle-active");
                                $body.addClass("mainMenu-open");
                                INSPIRO.header.logoStatus();
                                $mainMenu.animate({
                                    "min-height": $window.height(),
                                }, {
                                    duration: 500,
                                    easing: "easeInOutQuart",
                                    start: function() {
                                        setTimeout(function() {
                                            $mainMenu.addClass("menu-animate");
                                        }, 300);
                                    },
                                    complete: function() {
                                        processing = false;
                                    },
                                });
                            }
                        };
                        var closeMenu = function() {
                            if (!processing) {
                                processing = true;
                                Settings.menuIsOpen = false;
                                INSPIRO.header.logoStatus();
                                $mainMenu.animate({
                                    "min-height": 0,
                                }, {
                                    start: function() {
                                        $mainMenu.removeClass("menu-animate");
                                    },
                                    done: function() {
                                        $body.removeClass("mainMenu-open");
                                        elem.removeClass("toggle-active");
                                        if (
                                            Settings.submenuLight &&
                                            Settings.headerHasDarkClass &&
                                            Settings.headerDarkClassRemoved &&
                                            !$header.hasClass("header-sticky")
                                        ) {
                                            $header.addClass("dark");
                                        }
                                        if (
                                            Settings.sliderDarkClass &&
                                            Settings.headerHasDarkClass &&
                                            Settings.headerDarkClassRemoved
                                        ) {
                                            $header.removeClass("dark");
                                            Settings.headerDarkClassRemoved = true;
                                        }
                                    },
                                    duration: 500,
                                    easing: "easeInOutQuart",
                                    complete: function() {
                                        processing = false;
                                    },
                                });
                            }
                        };
                        if (!Settings.menuIsOpen) {
                            triggerEvent = openMenu();
                        } else {
                            triggerEvent = closeMenu();
                        }
                    });
                });

                $menuItemLinks.on("click", function(e) {
                    $(this).parent("li").siblings().removeClass("hover-active");
                    if (
                        $body.hasClass("b--responsive") ||
                        $mainMenu.hasClass("menu-onclick")
                    ) {
                        $(this).parent("li").toggleClass("hover-active");
                    }
                    e.stopPropagation();
                    e.preventDefault();
                });

                $body.on("click", function(e) {
                    $mainMenu.find(".hover-active").removeClass("hover-active");
                });

                $(window).on("resize", function() {
                    if ($body.hasClass("mainMenu-open")) {
                        if (Settings.menuIsOpen) {
                            $mainMenuTriggerBtn.trigger("click");
                            $mainMenu.find(".hover-active").removeClass("hover-active");
                        }
                    }
                });

                /*invert menu fix*/
                $(window).breakpoints("greaterEqualTo", "lg", function() {
                    var $menuLastItem = $("nav > ul > li:last-child"),
                        $menuLastItemUl = $("nav > ul > li:last-child > ul"),
                        $menuLastInvert = $menuLastItemUl.width() - $menuLastItem.width(),
                        $menuItems = $("nav > ul > li").find(".dropdown-menu");

                    $menuItems.css("display", "block");

                    $(".dropdown:not(.mega-menu-item) ul ul").each(function(
                        index,
                        element
                    ) {
                        if (
                            $window.width() -
                            ($(element).width() + $(element).offset().left) <
                            0
                        ) {
                            $(element).addClass("menu-invert");
                        }
                    });

                    if ($menuLastItemUl.length > 0) {
                        if (
                            $window.width() -
                            ($menuLastItemUl.width() + $menuLastItem.offset().left) <
                            0
                        ) {
                            $menuLastItemUl.addClass("menu-last");
                        }
                    }
                    $menuItems.css("display", "");
                });
            }



            
        },
        dotsMenu: function() {
            var $dotsMenu = $("#dotsMenu"),
                $dotsMenuItems = $dotsMenu.find("ul > li > a");
            if ($dotsMenu.length > 0) {
                $dotsMenuItems.on("click", function() {
                    $dotsMenuItems.parent("li").removeClass("current");
                    $(this).parent("li").addClass("current");
                     $("html, body").stop(true, false).animate({ scrollTop: $($(this).attr("href")).offset().top}, elem.options.speed, "easeInOutExpo");
                return false;
                });
                $dotsMenuItems.parents("li").removeClass("current");
                $dotsMenu
                    .find('a[href="#' + INSPIRO.header.currentSection() + '"]')
                    .parent("li")
                    .addClass("current");
            }
        },
    };
    INSPIRO.elements = {
        functions: function() {
            INSPIRO.elements.counters();
        },
        counters: function() {
            var $counter = $(".counter");
            if ($counter.length > 0) {
                //Check if countTo plugin is loaded
                if (typeof $.fn.countTo === "undefined") {
                    INSPIRO.elements.notification(
                        "Warning",
                        "jQuery countTo plugin is missing in plugins.js file.",
                        "danger"
                    );
                    return true;
                }
                //Initializing countTo plugin
                $counter.each(function() {
                    var elem = $(this),
                        prefix = elem.find("span").attr("data-prefix") || "",
                        suffix = elem.find("span").attr("data-suffix") || "";
                    setTimeout(function() {
                        new Waypoint({
                            element: elem,
                            handler: function() {
                                elem.find("span").countTo({
                                    refreshInterval: 2,
                                    formatter: function(value, options) {
                                        return (
                                            String(prefix) +
                                            value.toFixed(options.decimals) +
                                            String(suffix)
                                        );
                                    },
                                });
                                this.destroy();
                            },
                            offset: "104%",
                        });
                    }, 100);
                });
            }
        },
    };
    //Load Functions on document ready
    $(document).ready(function() {
        INSPIRO.header.functions();
        INSPIRO.elements.functions();
    });
    //Recall Functions on window scroll
    $window.on("scroll", function() {
        INSPIRO.header.stickyHeader();
        INSPIRO.header.dotsMenu();
    });
    //Recall Functions on window resize
    $window.on("resize", function() {
        INSPIRO.header.logoStatus();
        INSPIRO.header.stickyHeader();
    });
})(jQuery);