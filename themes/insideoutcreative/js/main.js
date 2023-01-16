// start of bars
let colFullBackground = document.querySelectorAll('.col-full-background');

// Create a media condition that targets viewports at least 768px wide
const mediaQuery = window.matchMedia('(min-width: 1200px)')


if (mediaQuery.matches) {
    for (i = 0; i < colFullBackground.length; i++) {
        let parentRow = colFullBackground[i].parentElement;
        let innerContentOuter = colFullBackground[i].querySelector('.inner-content-outer');
        let innerContent = innerContentOuter.querySelector('.inner-content');
        let backgroundImage = colFullBackground[i].querySelector('.img-full-background');

        // console.log(colFullBackground[i].getBoundingClientRect().x);

        backgroundImage.style.left = `-${colFullBackground[i].getBoundingClientRect().x}px`;
        // console.log(backgroundImage.getBoundingClientRect());
        // let imageTitle = innerContentOuter.querySelector('.image-title');
        // let transformHeight = innerContentOuter.offsetHeight - imageTitle.offsetHeight;

        innerContentOuter.style.transform = `translate(0px, ${(innerContent.offsetHeight) + 10}px)`;

        // window.addEventListener('resize', function () {
        innerContentOuter.addEventListener('mouseenter', function () {
            parentRow.classList.add('active-inner-col');
            innerContentOuter.parentElement.classList.add('active');
            innerContentOuter.style.transform = `translate(0px, 0px)`;
        })

        innerContentOuter.addEventListener('mouseleave', function () {
            innerContentOuter.parentElement.classList.remove('active');
            parentRow.classList.remove('active-inner-col');
            innerContentOuter.style.transform = `translate(0px, ${(innerContent.offsetHeight) + 10}px)`;
        })
        // });

    }
}
// end of bars