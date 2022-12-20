document.addEventListener("DOMContentLoaded", function() {
    let controller = new ScrollMagic.Controller()

    let menuIcon = document.querySelector('.menu-icon')
    let headerNavigation = document.getElementById('site-navigation')
    let body = document.getElementById('body')
    let header = document.querySelector('.header')
    let sectionInteractive = document.querySelector('.section-interactive')
    let arrDotsLists = document.querySelectorAll('.section-interactive__dots-list')
    let sliderRatings = document.querySelector('.slider-ratings')
    let ratings = document.querySelectorAll('.section-ratings__card-rating')
    let accordion = document.querySelectorAll('.section-accordion__item')
    let generateLinkButton = document.querySelector('.hero__generate-link-meeting-button')
    let logoList = document.querySelector('.hero__logos-list')


    let orientationLandscape = window.innerHeight < window.innerWidth
    let heightLarge = window.innerHeight > 1025
    let heightExtraLarge = window.innerHeight > 1200
    let mediaHeight = window.innerHeight < 900
    let mediaLaptop = window.innerWidth < 1025
    let mediaTablet = (window.innerWidth < 991 && window.innerHeight < 1025)
    let mediaTabletLandscape = (window.innerHeight < 991 && window.innerWidth < 1025)
    let mediaMobile = (window.innerWidth < 768)

    if(menuIcon) {
        menuIcon.addEventListener('click', () => {
            menuIcon.classList.toggle('open')
            headerNavigation.classList.toggle('open')
            body.classList.toggle('not-scroll')
        })
    }

    if(sectionInteractive && !mediaLaptop) {
        sectionInteractive.nextElementSibling.classList.add('trigger-margin')

        let timelineSectionInteractive = new TimelineMax();
        let arrInteractive = document.querySelectorAll('.section-interactive__item')
        let heightItemInteractive = arrInteractive[0].clientHeight
        let realHeightItemInteractive = document.querySelector('.section-interactive__item-inner').clientHeight + 50

        if(heightLarge) {
            timelineSectionInteractive
                .fromTo([`.section-interactive`], {}, {marginTop: '-30vh', duration: 0.5, ease: Linear.easeNone})
                // .fromTo([`.section-interactive__item`], {}, {paddingTop: '30vh', duration: 0.5, ease: Linear.easeNone}, '<')

        }

        arrInteractive.forEach((el,idx) => {
            if(!(arrInteractive.length - 1 === idx)) {
                timelineSectionInteractive
                    .fromTo([`.interactive-item-${idx}`], {}, {clipPath: 'inset(0 0 100% 0)', ease: Circ.easeNone})
                    // .fromTo([`.interactive-item-${idx} img`], {}, {transform: 'translateY(-20px)', ease: Linear.easeNone}, '<')
            }
        })

        if(heightLarge) {
            timelineSectionInteractive
                .fromTo([`.trigger-margin`], {}, {marginTop: '-30vh', duration: 0.5, ease: Linear.easeNone}, '<')
        }

        let  ScrollMagicInteractive = new ScrollMagic.Scene({triggerElement: ".section-interactive", duration: heightItemInteractive * arrInteractive.length, triggerHook: mediaTabletLandscape ? 'onLeave' : heightLarge ? '0.3' : heightExtraLarge ? '0.3' : 'onLeave'})
            .setPin('.section-interactive')
            .setTween(timelineSectionInteractive)
            // .addIndicators({name: "section-interactive"})
            .addTo(controller)
            .reverse(true);
    }

    if(sectionInteractive && mediaLaptop) {
        let timelineSectionInteractive = new TimelineMax();
        let arrInteractive = document.querySelectorAll('.section-interactive__item')

        arrInteractive.forEach((el,idx) => {

            new ScrollMagic.Scene({triggerElement: `.interactive-item-${idx}`, duration: '100%', triggerHook: 0.9})
                .setTween(`.interactive-item-${idx} .section-interactive__item-image`, {transform: 'translateY(-30px)'})
                // .addIndicators({name: "section-interactive"})
                .addTo(controller)
                .reverse(true);
        })
    }

    if(arrDotsLists) {
        arrDotsLists.forEach((list) => {
            let arrIcon = list.querySelectorAll('.dots-list-desktop .dot-content__icon')

            //show first dot
            if(arrIcon[0]) {
                arrIcon[0].classList.add('active');
            }

            if(!mediaMobile) {
                arrIcon.forEach((icon) => {

                    icon.addEventListener('click', function() {
                        let parentMain = this.closest('.section-interactive__item-image')
                        let thisImageChange = parentMain.querySelector('.image-interactive-change')

                        if (thisImageChange) {
                            thisImageChange.classList.add('active')
                        }

                        this.parentNode.classList.toggle('active');

                        //open next dot
                        let nextDot = this.parentNode.nextElementSibling
                        if(nextDot) {
                            nextDot.querySelector('.dot-content__icon').classList.toggle('active');
                        }

                        //close prev dot
                        let prevDot = this.parentNode.previousElementSibling
                        if(prevDot) {
                            prevDot.querySelector('.dot-content__icon').classList.remove('active');
                            prevDot.classList.remove('active');
                        }
                    })

                })
            }

            if(mediaMobile) {

                arrIcon.forEach((icon) => {

                    icon.addEventListener('click', function() {
                        let parentMain = this.closest('.section-interactive__item-image')
                        let thisImageChange = parentMain.querySelector('.image-interactive-change')

                        if (thisImageChange) {
                            thisImageChange.classList.add('active')
                        }

                        this.parentNode.classList.toggle('active');

                        let currentIdx = this.parentNode.getAttribute('data-current') * 1
                        let currentItemMobile =  this.closest('.section-interactive__item-inner').querySelector('.dots-list-mobile').querySelector(`[data-current="${currentIdx}"]`)

                        //open next dot
                        let nextDot = this.parentNode.nextElementSibling

                        if(currentItemMobile) {
                            currentItemMobile.classList.toggle('active') //open mobile description

                            if(currentItemMobile.previousElementSibling) {

                                currentItemMobile.previousElementSibling.classList.remove('active');
                            }
                            if(nextDot) {
                                nextDot.querySelector('.dot-content__icon').classList.toggle('active');
                            }
                        }

                        //close prev dot
                        let prevDot = this.parentNode.previousElementSibling
                        if(prevDot) {
                            prevDot.querySelector('.dot-content__icon').classList.remove('active');
                            currentItemMobile.previousElementSibling.classList.remove('active');
                        }
                    })

                })
            }
        })

    }

    if(sliderRatings) {
        const sliderRatingsSwiper = new Swiper('.slider-ratings', {
            direction: 'horizontal',
            spaceBetween: 40,
            loop: true,
            slidesPerView: 3,
            // centeredSlides: true,
            preventInteractionOnTransition: true,
            navigation: {
                nextEl: ".slider-button-next",
                prevEl: ".slider-button-prev",
            },
            breakpoints: {
                320: {
                    slidesPerView: 1,
                    spaceBetween: 20
                },
                640: {
                    slidesPerView: 2,
                    spaceBetween: 30
                },
                992: {
                    slidesPerView: 3,
                    spaceBetween: 40
                },
            },
            pagination: {
                el: '.swiper-pagination',
                type: 'bullets',
                clickable: true
            },
        });
    }

    if(ratings) {
        ratings.forEach((rating) => {
            let dataRating = rating.getAttribute('data-rating')
            let currentRatingInStars = 100 * dataRating / 5
            let currentIconStar = rating.querySelector('.ratings-icon__fill')

            currentIconStar.style.clipPath = `inset(0 ${100 - currentRatingInStars}% 0 0)`

        })
    }

    if(accordion) {
        function toggleAccordion() {
            let thisItem = this.closest('.section-accordion__item');

            accordion.forEach(item => {
                if (thisItem === item) {
                    thisItem.classList.toggle('active');
                    return;
                }

                item.classList.remove('active');

            });
        }

        accordion.forEach(question => question.addEventListener('click', toggleAccordion))
    }

    if(generateLinkButton) {
        let generateLinkInput = document.querySelector('.hero__generate-link-meeting-input')

        function openNewLink() {
            let codeMeet = generateLinkInput.value.trim()
            let linkMeet = generateLinkInput.getAttribute('data-link')
            let generateLinkMeet = linkMeet + codeMeet

            window.open(generateLinkMeet, '_blank');
        }

        generateLinkButton.addEventListener('click', openNewLink)
        generateLinkInput.addEventListener("keyup", function(e) {
            if (e.keyCode === 13) {
                openNewLink()
            }
        })
    }

    if(logoList && mediaMobile) {
        logoList.classList.add('swiper-wrapper')
        logoList.parentNode.classList.add('swiper')

        logoList.parentNode.append(document.createElement('div'))
        logoList.nextElementSibling.classList.add('swiper-pagination')

        let logoListItem = document.querySelectorAll('.hero__logos-list li')

        logoListItem.forEach((li) => {
            li.classList.add('swiper-slide')
        })

        const sliderLogosSwiper = new Swiper('.hero__logos-items', {
            direction: 'horizontal',
            spaceBetween: 20,
            // loop: true,
            slidesPerView: 'auto',
            // centeredSlides: true,
            preventInteractionOnTransition: true,
            // width: 'auto'
            pagination: {
                el: ".hero__logos-items .swiper-pagination",
                clickable: true,
            },
        });
    }
})