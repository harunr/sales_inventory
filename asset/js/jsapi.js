/* Enabling support for new HTML5 tags for IE6, IE7 and IE8 */
if (navigator.appName == 'Microsoft Internet Explorer') {
    if ((navigator.userAgent.indexOf('MSIE 6.0') >= 0) || (navigator.userAgent.indexOf('MSIE 7.0') >= 0) || (navigator.userAgent.indexOf('MSIE 8.0') >= 0)) {
        document.createElement('header')
        document.createElement('nav')
        document.createElement('section')
        document.createElement('aside')
        document.createElement('footer')
        document.createElement('article')

        document.createElement('hgroup')
        document.createElement('figure')
        document.createElement('figcaption')
    }
}
/* Enabling support for new HTML5 tags for IE6, IE7 and IE8 */

// Conditionally adding IE6 pngfix.js
if ((navigator.appName == 'Microsoft Internet Explorer') && (navigator.userAgent.indexOf('MSIE 6.0') >= 0)) {
    var fileref = document.createElement('script');
    fileref.setAttribute("type", "text/javascript");
    fileref.setAttribute("src", 'scripts/pngfix.js');
    document.getElementsByTagName("head")[0].appendChild(fileref)
}

;
(function ($) {
    $(function () {
        // Begin input common focus and blur for value.
        $('input:text,input:password,textarea')
                .focus(function () {
                    if (this.value == this.defaultValue) {
                        this.value = ''
                    }
                })
                .blur(function () {
                    if (!this.value) {
                        this.value = this.defaultValue;
                    }
                })

        // PIE for < 9
        if (window.PIE) {
            $('.gradient, .rounded, .shadow').each(function () {
                PIE.attach(this)
            });
        }

        // slider slider slider slider
        $('#home-slider').khayerFadeSlider({
            next: 'div.slide-btn-prev',
            prev: 'div.slide-btn-next',
            instantNext: true,
            pagination: '#pagination'
        })

        // Input field null check
        $('#submit').click(function () {
            if ($.trim($('#emptyMessage').val()) == '') {
                alert('Input can not be left blank');
            }
        });


    })// End ready function.

    // Slider
    $.fn.khayerFadeSlider = function (options) {

        var st = $.extend({
            auto: true,
            speed: 400,
            interval: 4000,
            pagination: 'div.slider-pagination',
            next: 'div.slider-right-btn',
            prev: 'div.slider-left-btn',
            pagiClickAutoStop: true,
            hoverToPause: true,
            instantNext: true,
            complete: null
        }, options);

        var $slider
        var totalItems = 0
        var presentlyShown = 0
        var sliderStopped = false
        var sliderIntervalPtr
        var currentlyRunning = false

        // Public method
        this.showAny = function (arg) {
            //
        }

        function init($this) {
            $slider = $this.find('div.sliderInner')

            $slider.height($slider.find('div.leaf:eq(0)').height())
            $slider.find('div.leaf').css({'z-index': 2, 'position': 'absolute'}).hide()
            $slider.find('div.leaf:eq(0)').css({'z-index': 10, 'position': 'relative'}).show()
            $slider.css({'height': 'auto'})

            totalItems = $slider.find('div.leaf').length

            if (st.pagination) {
                var $paginationContainer = st.pagination == 'div.slider-pagination' ? $this.find(st.pagination) : $(st.pagination)

                var $pagination = '<ul class="pagination-bullet"><li class="active"></li>'
                for (var j = 0; j < totalItems - 1; j++) {
                    $pagination += '<li></li>'
                }
                $pagination += '</ul>'
                $paginationContainer.html($pagination)
                $pagination = $paginationContainer.find('>ul')

                if (totalItems < 2)
                    return false

                $pagination.find('li').each(function (i) {
                    $(this).click(function () {
                        if ($(this).hasClass('active') || st.currentlyRunning)
                            return false
                        showParticular(i)
                        if (st.pagiClickAutoStop) {
                            clearInterval(sliderIntervalPtr);
                            sliderStopped = true
                        }
                    })
                })
            }
            else {
                if (totalItems < 2)
                    return false
            }

            if (st.next) {
                var $nextButton = st.next == 'div.next-button' ? $this.find(st.next) : $(st.next)
                $nextButton.each(function (i) {
                    $(this).click(function (e) {
                        e.preventDefault()
                        if (st.currentlyRunning)
                            return false
                        if (!sliderStopped)
                            clearInterval(sliderIntervalPtr)
                        showNext()
                    })
                })
            }

            if (st.prev) {
                var $prevButton = st.next == 'div.prev-button' ? $this.find(st.prev) : $(st.prev)
                $prevButton.each(function () {
                    $(this).click(function (e) {
                        e.preventDefault()
                        if (st.currentlyRunning)
                            return false
                        if (!sliderStopped)
                            clearInterval(sliderIntervalPtr)
                        showParticular(presentlyShown == 0 ? totalItems - 1 : presentlyShown - 1)
                    })
                })
            }

            function showParticular(nextItem) {
                $slider.find('div.leaf').eq(presentlyShown).fadeOut(st.speed, function () {
                    $(this).css({'z-index': 2, 'position': 'absolute'})
                })

                if (st.pagination) {
                    $pagination.find('li.active').removeClass('active');
                    $pagination.find('li').eq(nextItem).addClass('active');
                }

                $slider.animate({'height': $slider.find('div.leaf').eq(nextItem).height()}, st.speed)

                st.currentlyRunning = true
                $slider.find('div.leaf').eq(nextItem).fadeIn(st.speed, function () {
                    presentlyShown = nextItem
                    $(this).css({'z-index': 10, 'position': 'relative'})
                    $slider.css({'height': 'auto'})
                    st.currentlyRunning = false
                })
            }

            function showNext() {
                showParticular(presentlyShown == totalItems - 1 ? 0 : presentlyShown + 1)
            }

            if (st.auto)
                sliderIntervalPtr = setInterval(showNext, st.interval)
            if (st.auto && st.hoverToPause) {
                $slider
                        .mouseenter(function () {
                            if (!sliderStopped)
                                clearInterval(sliderIntervalPtr)
                        })
                        .mouseleave(function () {
                            if (!sliderStopped) {
                                if (st.instantNext)
                                    showNext();
                                sliderIntervalPtr = setInterval(showNext, st.interval)
                            }
                        })
            }
        }

        return this.each(function () {

            init($(this))

            if ($.isFunction(st.complete)) {
                st.complete.call(this);
            }
        });
    }

})(jQuery)

//Quad, Cubic, Quart, Quint, Sine, Expo, Circ, Elastic, Back, Bounce
jQuery.easing["jswing"] = jQuery.easing["swing"];
jQuery.extend(jQuery.easing, {def: "easeOutQuad", swing: function (a, b, c, d, e) {
        return jQuery.easing[jQuery.easing.def](a, b, c, d, e)
    }, easeInQuad: function (a, b, c, d, e) {
        return d * (b /= e) * b + c
    }, easeOutQuad: function (a, b, c, d, e) {
        return-d * (b /= e) * (b - 2) + c
    }, easeInOutQuad: function (a, b, c, d, e) {
        if ((b /= e / 2) < 1)
            return d / 2 * b * b + c;
        return-d / 2 * (--b * (b - 2) - 1) + c
    }, easeInCubic: function (a, b, c, d, e) {
        return d * (b /= e) * b * b + c
    }, easeOutCubic: function (a, b, c, d, e) {
        return d * ((b = b / e - 1) * b * b + 1) + c
    }, easeInOutCubic: function (a, b, c, d, e) {
        if ((b /= e / 2) < 1)
            return d / 2 * b * b * b + c;
        return d / 2 * ((b -= 2) * b * b + 2) + c
    }, easeInQuart: function (a, b, c, d, e) {
        return d * (b /= e) * b * b * b + c
    }, easeOutQuart: function (a, b, c, d, e) {
        return-d * ((b = b / e - 1) * b * b * b - 1) + c
    }, easeInOutQuart: function (a, b, c, d, e) {
        if ((b /= e / 2) < 1)
            return d / 2 * b * b * b * b + c;
        return-d / 2 * ((b -= 2) * b * b * b - 2) + c
    }, easeInQuint: function (a, b, c, d, e) {
        return d * (b /= e) * b * b * b * b + c
    }, easeOutQuint: function (a, b, c, d, e) {
        return d * ((b = b / e - 1) * b * b * b * b + 1) + c
    }, easeInOutQuint: function (a, b, c, d, e) {
        if ((b /= e / 2) < 1)
            return d / 2 * b * b * b * b * b + c;
        return d / 2 * ((b -= 2) * b * b * b * b + 2) + c
    }, easeInSine: function (a, b, c, d, e) {
        return-d * Math.cos(b / e * (Math.PI / 2)) + d + c
    }, easeOutSine: function (a, b, c, d, e) {
        return d * Math.sin(b / e * (Math.PI / 2)) + c
    }, easeInOutSine: function (a, b, c, d, e) {
        return-d / 2 * (Math.cos(Math.PI * b / e) - 1) + c
    }, easeInExpo: function (a, b, c, d, e) {
        return b == 0 ? c : d * Math.pow(2, 10 * (b / e - 1)) + c
    }, easeOutExpo: function (a, b, c, d, e) {
        return b == e ? c + d : d * (-Math.pow(2, -10 * b / e) + 1) + c
    }, easeInOutExpo: function (a, b, c, d, e) {
        if (b == 0)
            return c;
        if (b == e)
            return c + d;
        if ((b /= e / 2) < 1)
            return d / 2 * Math.pow(2, 10 * (b - 1)) + c;
        return d / 2 * (-Math.pow(2, -10 * --b) + 2) + c
    }, easeInCirc: function (a, b, c, d, e) {
        return-d * (Math.sqrt(1 - (b /= e) * b) - 1) + c
    }, easeOutCirc: function (a, b, c, d, e) {
        return d * Math.sqrt(1 - (b = b / e - 1) * b) + c
    }, easeInOutCirc: function (a, b, c, d, e) {
        if ((b /= e / 2) < 1)
            return-d / 2 * (Math.sqrt(1 - b * b) - 1) + c;
        return d / 2 * (Math.sqrt(1 - (b -= 2) * b) + 1) + c
    }, easeInElastic: function (a, b, c, d, e) {
        var f = 1.70158;
        var g = 0;
        var h = d;
        if (b == 0)
            return c;
        if ((b /= e) == 1)
            return c + d;
        if (!g)
            g = e * .3;
        if (h < Math.abs(d)) {
            h = d;
            var f = g / 4
        } else
            var f = g / (2 * Math.PI) * Math.asin(d / h);
        return-(h * Math.pow(2, 10 * (b -= 1)) * Math.sin((b * e - f) * 2 * Math.PI / g)) + c
    }, easeOutElastic: function (a, b, c, d, e) {
        var f = 1.70158;
        var g = 0;
        var h = d;
        if (b == 0)
            return c;
        if ((b /= e) == 1)
            return c + d;
        if (!g)
            g = e * .3;
        if (h < Math.abs(d)) {
            h = d;
            var f = g / 4
        } else
            var f = g / (2 * Math.PI) * Math.asin(d / h);
        return h * Math.pow(2, -10 * b) * Math.sin((b * e - f) * 2 * Math.PI / g) + d + c
    }, easeInOutElastic: function (a, b, c, d, e) {
        var f = 1.70158;
        var g = 0;
        var h = d;
        if (b == 0)
            return c;
        if ((b /= e / 2) == 2)
            return c + d;
        if (!g)
            g = e * .3 * 1.5;
        if (h < Math.abs(d)) {
            h = d;
            var f = g / 4
        } else
            var f = g / (2 * Math.PI) * Math.asin(d / h);
        if (b < 1)
            return-.5 * h * Math.pow(2, 10 * (b -= 1)) * Math.sin((b * e - f) * 2 * Math.PI / g) + c;
        return h * Math.pow(2, -10 * (b -= 1)) * Math.sin((b * e - f) * 2 * Math.PI / g) * .5 + d + c
    }, easeInBack: function (a, b, c, d, e, f) {
        if (f == undefined)
            f = 1.70158;
        return d * (b /= e) * b * ((f + 1) * b - f) + c
    }, easeOutBack: function (a, b, c, d, e, f) {
        if (f == undefined)
            f = 1.70158;
        return d * ((b = b / e - 1) * b * ((f + 1) * b + f) + 1) + c
    }, easeInOutBack: function (a, b, c, d, e, f) {
        if (f == undefined)
            f = 1.70158;
        if ((b /= e / 2) < 1)
            return d / 2 * b * b * (((f *= 1.525) + 1) * b - f) + c;
        return d / 2 * ((b -= 2) * b * (((f *= 1.525) + 1) * b + f) + 2) + c
    }, easeInBounce: function (a, b, c, d, e) {
        return d - jQuery.easing.easeOutBounce(a, e - b, 0, d, e) + c
    }, easeOutBounce: function (a, b, c, d, e) {
        if ((b /= e) < 1 / 2.75) {
            return d * 7.5625 * b * b + c
        } else if (b < 2 / 2.75) {
            return d * (7.5625 * (b -= 1.5 / 2.75) * b + .75) + c
        } else if (b < 2.5 / 2.75) {
            return d * (7.5625 * (b -= 2.25 / 2.75) * b + .9375) + c
        } else {
            return d * (7.5625 * (b -= 2.625 / 2.75) * b + .984375) + c
        }
    }, easeInOutBounce: function (a, b, c, d, e) {
        if (b < e / 2)
            return jQuery.easing.easeInBounce(a, b * 2, 0, d, e) * .5 + c;
        return jQuery.easing.easeOutBounce(a, b * 2 - e, 0, d, e) * .5 + d * .5 + c
    }})