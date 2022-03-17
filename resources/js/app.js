require('./bootstrap');
import ScrollReveal from 'scrollreveal'

ScrollReveal().reveal('.post',{
    origin: 'top',
    distance: '20px',
    duration: 300,
    interval: 700
})

new VenoBox({
    selector: '.venobox',
    numeration: true,
    infinigall: true,
    share: true,
    spinner: 'rotating-plane'
});
