document.addEventListener("DOMContentLoaded", function() {
    let controller = new ScrollMagic.Controller();

    let menuIcon = document.querySelector('.menu-icon')
    let headerNavigation = document.getElementById('site-navigation')
    let body = document.getElementById('body')
    let header = document.querySelector('.header')
    let sectionInteractive = document.querySelector('.section-interactive')

    let orientationLandscape = window.innerHeight < window.innerWidth
    let heightLarge = window.innerHeight > 1000

    if(menuIcon) {
        menuIcon.addEventListener('click', () => {
            menuIcon.classList.toggle('open')
            headerNavigation.classList.toggle('open')
            body.classList.toggle('not-scroll')
        })
    }

    if(sectionInteractive) {
        let timelineSectionInteractive = new TimelineMax();
        let arrInteractive = document.querySelectorAll('.section-interactive__item')
        let heightItemInteractive = arrInteractive[0].clientHeight
        let realHeightItemInteractive = document.querySelector('.section-interactive__item-inner').clientHeight + 50

        timelineSectionInteractive
            .fromTo([`header`], {}, {clipPath: 'inset(0 0 100% 0)', duration: 0.1, ease: Linear.easeNone})

        if(heightLarge) {
            console.log('yep heightLarge')
            timelineSectionInteractive
                .fromTo([`.section-interactive`], {}, {marginTop: '-30vh', duration: 0.5, ease: Linear.easeNone})
                .fromTo([`.section-interactive__item`], {}, {paddingTop: '30vh', duration: 0.5, ease: Linear.easeNone}, '<')

        }

        arrInteractive.forEach((el,idx) => {
            if(!(arrInteractive.length - 1 === idx)) {
                timelineSectionInteractive
                    .fromTo([`.interactive-item-${idx}`], {}, {clipPath: 'inset(0 0 100% 0)', ease: Linear.easeNone})
            }
        })

        if(heightLarge) {
            console.log('yep heightLarge')
            timelineSectionInteractive
                .fromTo([`.trigger-margin`], {}, {marginTop: '-30vh', duration: 0.5, ease: Linear.easeNone}, '<')
        }

        timelineSectionInteractive
            .fromTo([`header`], {}, {clipPath: 'inset(0 0 0% 0)', duration: 0.1, ease: Linear.easeNone})

        let  ScrollMagicInteractive = new ScrollMagic.Scene({triggerElement: ".section-interactive", duration: heightItemInteractive * arrInteractive.length, triggerHook: heightLarge ? '0.3' : 'onLeave'})
            .setPin('.section-interactive')
            .setTween(timelineSectionInteractive)
            // .addIndicators({name: "section-interactive"})
            .addTo(controller)
            .reverse(true);
    }

})