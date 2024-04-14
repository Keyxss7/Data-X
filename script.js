window.addEventListener('scroll', function() {
    var footer = document.getElementById('footer');
    var scrollPosition = window.scrollY;
    var windowHeight = window.innerHeight;
    var bodyHeight = document.body.offsetHeight;

    if ((scrollPosition + windowHeight) >= bodyHeight) {
        footer.classList.remove('hidden'); // Afficher le footer lorsque l'utilisateur atteint le bas de la page
    } else {
        footer.classList.add('hidden'); // Masquer le footer sinon
    }
});


$(document).ready(function(){
    var lastScrollTop = 0;
    var delta = 5;
    var navbarHeight = $('nav').outerHeight();

    $(window).scroll(function(event){
        var st = $(this).scrollTop();

        if(Math.abs(lastScrollTop - st) <= delta)
            return;

        if (st > lastScrollTop && st > navbarHeight){
            $('nav').removeClass('show').addClass('hidden');
        } else {
            if(st + $(window).height() < $(document).height()) {
                $('nav').removeClass('hidden').addClass('show');
            }
        }

        lastScrollTop = st;
    });

    $('.navbar-toggler').click(function(){
        $('.navbar-collapse').toggleClass('menu-open');
    });
    
});

