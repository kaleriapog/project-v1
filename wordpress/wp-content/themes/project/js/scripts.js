document.addEventListener("DOMContentLoaded", function() {
    let controller = new ScrollMagic.Controller();

    let menuIcon = document.querySelector('.menu-icon')
    let headerNavigation = document.getElementById('site-navigation')
    let body = document.getElementById('body')
    let header = document.querySelector('.header')
    let sectionInteractive = document.querySelector('.section-interactive')
    let arrDotsLists = document.querySelectorAll('.section-interactive__dots-list')

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
        let timelineSectionInteractive = new TimelineMax();
        let arrInteractive = document.querySelectorAll('.section-interactive__item')
        let heightItemInteractive = arrInteractive[0].clientHeight
        let realHeightItemInteractive = document.querySelector('.section-interactive__item-inner').clientHeight + 50

        if(!mediaLaptop || !heightLarge || !heightExtraLarge) {
            if(!mediaTablet) {
                timelineSectionInteractive
                    .fromTo([`header`], {}, {clipPath: 'inset(0 0 100% 0)', duration: 0.1, ease: Linear.easeNone})
            }
        }

        if(heightLarge) {
            timelineSectionInteractive
                .fromTo([`.section-interactive`], {}, {marginTop: '-30vh', duration: 0.5, ease: Linear.easeNone})
                .fromTo([`.section-interactive__item`], {}, {paddingTop: '30vh', duration: 0.5, ease: Linear.easeNone}, '<')

        }

        arrInteractive.forEach((el,idx) => {
            if(!(arrInteractive.length - 1 === idx)) {
                timelineSectionInteractive
                    .fromTo([`.interactive-item-${idx}`], {}, {clipPath: 'inset(0 0 100% 0)', ease: Linear.easeNone})
                    .fromTo([`.interactive-item-${idx} img`], {}, {transform: 'translateY(-20px)', ease: Linear.easeNone}, '<')
            }
        })

        if(heightLarge) {
            timelineSectionInteractive
                .fromTo([`.trigger-margin`], {}, {marginTop: '-30vh', duration: 0.5, ease: Linear.easeNone}, '<')
        }

        if (!mediaLaptop || !heightLarge || !heightExtraLarge) {
            timelineSectionInteractive
                .fromTo([`header`], {}, {clipPath: 'inset(0 0 0% 0)', duration: 0.1, ease: Linear.easeNone})

        }

        let  ScrollMagicInteractive = new ScrollMagic.Scene({triggerElement: ".section-interactive", duration: heightItemInteractive * arrInteractive.length, triggerHook: mediaTabletLandscape ? 'onLeave' : heightLarge ? '0.23' : heightExtraLarge ? '0.3' : 'onLeave'})
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
            let arrIcon = list.querySelectorAll('.dot-content__icon')

            //show first dot
            arrIcon[0].classList.add('active');

            arrIcon.forEach((icon) => {

                icon.addEventListener('click', function() {
                    this.parentNode.classList.toggle('active');

                    //open next dot
                    let nextDot = this.parentNode.nextElementSibling
                    if(nextDot) {
                        nextDot.querySelector('.dot-content__icon').classList.toggle('active');
                    }

                    //close prev dot
                    let prevDot = this.parentNode.previousElementSibling
                    if(prevDot) {
                        console.log(prevDot)
                        prevDot.querySelector('.dot-content__icon').classList.remove('active');
                        prevDot.classList.remove('active');
                    }
                })
            })
        })
    }
})