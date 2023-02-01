var path = window.location.pathname;
var page = path.split("/").pop();

//nav links hover
var items = $(".navlink");
items.on("mouseenter",function(){
    $(this).addClass("active");
});
items.on("mouseleave",function(){
    if(!($(this).hasClass('selected'))){
        $(this).removeClass("active");
    }
});

if(page=="" || page=="index"){
    //Animate anchor scroll throw the page instead of moving instantly
    var fiveRems = Number(getComputedStyle(document.body, "").fontSize.match(/(\d*(\.\d*)?)px/)[1]) * 4.5;
    $(document).ready(function(){
        $( ".nav-item a" ).click(function( event ) {
            event.preventDefault();
            $("html, body").animate({ scrollTop: $($(this).attr("href")).offset().top - fiveRems }, 300);
        });
        $( ".headButtonC a" ).click(function( event ) {
            event.preventDefault();
            $("html, body").animate({ scrollTop: $($(this).attr("href")).offset().top - fiveRems }, 300);
        });
        $( ".arrdiv a" ).click(function( event ) {
            event.preventDefault();
            $("html, body").animate({ scrollTop: $($(this).attr("href")).offset().top - fiveRems }, 300);
        });
    });

    //Active function
    var fiveRem = Number(getComputedStyle(document.body, "").fontSize.match(/(\d*(\.\d*)?)px/)[1]) * 4.6;
    const sections = document.getElementsByTagName("section");
    const navList = document.getElementById("navList");
    function addActiv(){
        const scrollCurrent = document.documentElement.scrollTop + fiveRem;
        const navElements = document.getElementsByClassName("nav-link");

        for(let i=1 ; i<5 ; i++){
            const thisSecPosition = sections[i-1].offsetTop;
            const thisSecHeight = sections[i-1].offsetHeight;
            if(scrollCurrent>=thisSecPosition && scrollCurrent<thisSecPosition+thisSecHeight){
                for(let j=0 ; j<navElements.length ; j++){
                    navElements[j].classList.remove("active");
                    navElements[j].classList.remove("selected");
                }

                const elementid = navElements[i-1].id;
                document.getElementById(elementid).classList.add("active");
                document.getElementById(elementid).classList.add("selected");

                if($('#fbg').length){
                    var points = $('.point');
                    var pointC = $('#pointC');
                    var pointS = $('#pointS');
                    var pointA = $('#pointA');
                    var pointF = $('#pointF');
                    points.removeClass('activ');
                    if(elementid=='homeNav'){
                        pointC.toggleClass('activ');
                    }else if(elementid=='servicesNav'){
                        pointS.toggleClass('activ');
                    }else if(elementid=='aboutNav'){
                        pointA.toggleClass('activ');
                    }else if(elementid=='contactsNav'){
                        pointF.toggleClass('activ');
                    }
                }
            }
        }
    }

    //set active on scroll
    document.addEventListener("scroll", addActiv);

    //Arrow animation
    var arra = gsap.timeline({paused:true});
    arra.to(".rightL", {duration:0.25, rotation:90, transformOrigin:"0.1rem 0.35rem", height:"1.5rem"});
    $("#arra").on("mouseenter",function(){
        arra.play();
        $(".leftL").addClass("hidden");
        $(".arrCap").removeClass("hidden");
    });
    $("#arra").on("mouseleave",function(){
        arra.reverse();
        $(".leftL").removeClass("hidden");
        $(".arrCap").addClass("hidden");
    });

    //Service header animation
    var upHov = gsap.timeline({paused:true});
    upHov.to(".slideupHov", {duration: 0.5, y: "20%"});
    $(".slideupHov").on("mouseenter",function(){
        upHov.play();
    });
    $(".slideupHov").on("mouseleave",function(){
        upHov.reverse();
    });

    var LHov = gsap.timeline({paused:true});
    LHov.to(".slideLHov", {duration: 0.5, x: "-20%"});
    $(".slideLHov").on("mouseenter",function(){
        LHov.play();
    });
    $(".slideLHov").on("mouseleave",function(){
        LHov.reverse();
    });

    var RHov = gsap.timeline({paused:true});
    RHov.to(".slideRHov", {duration: 0.5, x: "20%"});
    $(".slideRHov").on("mouseenter",function(){
        RHov.play();
    });
    $(".slideRHov").on("mouseleave",function(){
        RHov.reverse();
    });

    //Home Animation
    var homeA = gsap.timeline({paused:true});
    homeA.to(".home", {duration: 0.5, y: "-150%"});
    $(".home").on("mouseenter",function(){
        homeA.play();
    });
    $(".home").on("mouseleave",function(){
        homeA.reverse();
    });
    
    //More button animation
    var moreWM = gsap.timeline({paused:true});
    moreWM.to(".moreHovWM", {duration:0.5, x: "-80%"});
    var moreAM = gsap.timeline({paused:true});
    moreAM.to(".moreHovAM", {duration:0.5, x: "150%"});
    $(".moreHovM").on("mouseenter",function(){
        moreAM.play();
        moreWM.play();
    });
    $(".moreHovM").on("mouseleave",function(){
        moreWM.reverse();
        moreAM.reverse();
    });
    var moreWL = gsap.timeline({paused:true});
    moreWL.to(".moreHovWL", {duration:0.5, x: "-70%"});
    var moreAL = gsap.timeline({paused:true});
    moreAL.to(".moreHovAL", {duration:0.5, x: "170%"});
    $(".moreHovL").on("mouseenter",function(){
        moreAL.play();
        moreWL.play();
    });
    $(".moreHovL").on("mouseleave",function(){
        moreWL.reverse();
        moreAL.reverse();
    });
    
    //animate scroll from other pages
    const urlParams = new URLSearchParams(window.location.search);
    if(urlParams.has('part')){
        if(urlParams.get('part')=='service'){
            $("html, body").animate({ scrollTop: $("#services").offset().top - fiveRems }, 300);
        }else if(urlParams.get('part')=='aboutus'){
            $("html, body").animate({ scrollTop: $("#aboutus").offset().top - fiveRems }, 300);
        }else if(urlParams.get('part')=='application'){
            $("html, body").animate({ scrollTop: $("#application").offset().top - fiveRems }, 300);
        }
    }
    
    //FAQ Carousel
    let clickDisabled=false;
    let faqLinks = document.querySelectorAll(".faqcarousel .faq-link");
    let faqslides = document.querySelectorAll(".faqcarousel .faqslides .faqslide");
    let faqoverlays = document.querySelectorAll(".faqcarousel .faqbar");
    let faqZIndex = faqLinks.length;
    let easeInOutQuart = "cubic-bezier(0.77, 0, 0.175, 1)";
    faqslides[0].classList.add("active");
    faqLinks[0].classList.add("active");
    faqLinks.forEach((faqLink, activeIndex) => {
        faqoverlays[activeIndex].style.zIndex = `${faqLinks.length - activeIndex}`;
        for(let j=0;j<faqoverlays.length;j++){
            if(j==0){
                faqoverlays[j].style.visibility='visible';
            }else{
                faqoverlays[j].style.visibility='hidden';
            }
        }
        faqLink.addEventListener("click", () => {
            event.preventDefault();
            if(clickDisabled==false){
                clickDisabled=true;
                // nav-link
                faqLinks.forEach(faqLink => faqLink.classList.remove("active"));
                faqLink.classList.add("active");
                // slide
                let currentSlide = document.querySelector(".faqcarousel .faqslides .faqslide.active");
                let slideFadeOut = currentSlide.animate(
                    [
                        { transform: "translateX(0)", opacity: 1 },
                        { transform: "translateX(5%)", opacity: 0 }
                    ],
                    {
                        duration: 600,
                        easing: "ease-in",
                        fill: "forwards"
                    }
                );
                slideFadeOut.onfinish = () => {
                    faqslides.forEach(faqslide => faqslide.classList.remove("active"));
                    let activeSlide = faqslides[activeIndex];
                    activeSlide.classList.add("active");
                    activeSlide.animate(
                        [
                            {
                                transform: "translateX(-5%)",
                                opacity: 0
                            },
                            {
                                transform: "translateX(0)",
                                opacity: 1
                            }
                        ],
                        { duration: 600, easing: "ease-out", fill: "forwards" }
                    );
                };
                // overlay
                faqZIndex += 1;
                let activeOverlay = faqoverlays[activeIndex];
                activeOverlay.style.zIndex = `${faqZIndex}`;
                activeOverlay.style.visibility='visible';
                activeOverlay.animate(
                  [{ transform: "scaleX(0)" }, { transform: "scaleX(1)" }],
                  { duration: 1200, fill: "forwards", easing: easeInOutQuart }
                );
                setTimeout(function() {
                    for(let j=0;j<faqoverlays.length;j++){
                        if(j!=activeIndex){
                            faqoverlays[j].style.visibility='hidden';
                        }
                    }
                    clickDisabled=false;
                }, 1200);
            }
        });
    });

    /*var splide = new Splide( '.splide', {
        type   : 'loop',
        autoplay: false,
        interval:5000,
        speed: 1000,
        arrows: false,
        pauseOnHover:'true',
        dragMinThreshold: {
            mouse: 0,
            touch: 10,
        },
        breakpoints: {
            1024: {
                padding: '20%',
                gap:'-20%',
            },
            767: {
                padding: '10%',
                gap:'-10%',
            },
        },
    } );
    
    splide.mount(); */
}

//button Animation
var readArr= $(".readArr");
var headButton= $(".headButton");
headButton.on("mouseenter",function(){
    readArr.removeClass("hidden");
    readArr.addClass('readArrHov');
    headButton.addClass("headbuttonText")
});
headButton.on("mouseleave",function(){
    readArr.addClass("hidden");
    readArr.removeClass('readArrHov');
    headButton.removeClass("headbuttonText")
});

if(page=="projects"){
    const $menu = document.querySelector('.menu')
    
    //Changing project content function
    var carouselC = document.getElementById('projCarousel');
    var nameC = document.getElementById('nameC');
    var linkC = document.getElementById('linkC');
    var desC = document.getElementById('desC');
    
    function changeProject(n){
        nameC.textContent=projects[n]['name'];
        linkC.href= projects[n]['link'];
        desC.textContent = projects[n]['desc'];
        
        var fPhotos = projects[n]['s_photo'].split(',');
        var frag = document.createDocumentFragment();
        
        var carousel = document.createElement('div');
        carousel.setAttribute('id', 'carouselExampleIndicators');
        carousel.setAttribute('class', 'carousel slide carousel-fade');
        carousel.setAttribute('data-bs-ride', 'carousel');
        
        var innerdiv = document.createElement('div');
        innerdiv.setAttribute('id', 'projInner');
        innerdiv.setAttribute('class', 'carousel-inner');
        
        var prImg = document.createElement('div');
        prImg.setAttribute('class', 'carousel-item active')
        prImg.innerHTML = '<img src="Images/'+projects[n]['p_photo']+'" class="d-block w-100" alt="'+projects[n]['name']+'">';
        innerdiv.appendChild(prImg);
        
        for(let photo of fPhotos){
            var newdiv = document.createElement('div');
            newdiv.setAttribute('class', 'carousel-item');
            newdiv.innerHTML = '<img src="Images/'+photo+'" class="d-block w-100" alt="'+projects[n]['name']+'">';
            innerdiv.appendChild(newdiv);
        }
        
        carousel.appendChild(innerdiv);
        
        var indicatorsdiv = document.createElement('div');
        indicatorsdiv.setAttribute('id', 'carouselInd');
        indicatorsdiv.setAttribute('class', 'carousel-indicators');
        for(var i=0; i<=fPhotos.length; i++){
            var newbutton = document.createElement('button');
            newbutton.setAttribute('type', 'button');
            newbutton.setAttribute('data-bs-target', '#carouselExampleIndicators');
            newbutton.setAttribute('data-bs-slide-to', i);
            newbutton.setAttribute('aria-label', 'Slide '+(i+1));
            if(i==0){
                newbutton.setAttribute('class', 'active');
                newbutton.setAttribute('aria-current', 'true');
            }
            indicatorsdiv.appendChild(newbutton);
        }
        
        carousel.appendChild(indicatorsdiv);
        frag.appendChild(carousel);
        
        carouselC.textContent='';
        carouselC.appendChild(frag);
        $('.carousel').carousel({
          interval: 5000
        });

        var clickedP = document.getElementsByClassName('projectPhoto');
        for(let p of clickedP){
            p.classList.remove('activeP');
            var pOrder = "p"+projects[n]['order']
            if(p.alt == pOrder){
                p.classList.add('activeP');
            }
        }
    }
    
    //Changing projects
    $menu.addEventListener('click', function(event){
        event.preventDefault;
        if(event['target'].classList.contains('singleP')){
            var projectImg = event['target'].firstChild.firstChild;
            if(projectImg.hasAttributes('alt')){
                if(!projectImg.classList.contains('activeP')){
                    var projecIndex = Number(projectImg.alt.substring(1));
                    changeProject(projecIndex);
                }
            }
        }
    });
    
    //Horizontal scroll loop
    /*--------------------
    Vars
    --------------------*/
    
    const $items = document.querySelectorAll('.menu--item')
    const $images = document.querySelectorAll('.menu--item img')
    let menuWidth = $menu.clientWidth
    let itemWidth = $items[0].clientWidth
    let wrapWidth = $items.length * itemWidth

    let scrollSpeed = 0
    let oldScrollY = 0
    let scrollY = 0
    let y = 0


    /*--------------------
    Lerp
    --------------------*/
    const lerp = (v0, v1, t) => {
      return v0 * ( 1 - t ) + v1 * t
    }


    /*--------------------
    Dispose
    --------------------*/
    const dispose = (scroll) => {
      gsap.set($items, {
        x: (i) => {
          return i * itemWidth + scroll
        },
        modifiers: {
          x: (x, target) => {
            const s = gsap.utils.wrap(-itemWidth, wrapWidth - itemWidth, parseInt(x))
            return `${s}px`
          }
        }
      })
    } 
    dispose(0)


    /*--------------------
    Wheel
    --------------------*/
    const handleMouseWheel = (e) => {
      scrollY -= e.deltaY * 0.9
    }


    /*--------------------
    Touch
    --------------------*/
    let touchStart = 0
    let touchX = 0
    let isDragging = false
    const handleTouchStart = (e) => {
      touchStart = e.clientX || e.touches[0].clientX
      isDragging = true
      $menu.classList.add('is-dragging')
    }
    const handleTouchMove = (e) => {
      if (!isDragging) return
      touchX = e.clientX || e.touches[0].clientX
      scrollY += (touchX - touchStart) * 2.5
      touchStart = touchX
    }
    const handleTouchEnd = () => {
      isDragging = false
      $menu.classList.remove('is-dragging')
    }


    /*--------------------
    Listeners
    --------------------*/
    $menu.addEventListener('mousewheel', handleMouseWheel)

    $menu.addEventListener('touchstart', handleTouchStart)
    $menu.addEventListener('touchmove', handleTouchMove)
    $menu.addEventListener('touchend', handleTouchEnd)

    $menu.addEventListener('mousedown', handleTouchStart)
    $menu.addEventListener('mousemove', handleTouchMove)
    $menu.addEventListener('mouseleave', handleTouchEnd)
    $menu.addEventListener('mouseup', handleTouchEnd)

    $menu.addEventListener('selectstart', () => { return false })


    /*--------------------
    Resize
    --------------------*/
    window.addEventListener('resize', () => {
      menuWidth = $menu.clientWidth
      itemWidth = $items[0].clientWidth
      wrapWidth = $items.length * itemWidth
    })


    /*--------------------
    Render
    --------------------*/
    const render = () => {
      requestAnimationFrame(render)
      y = lerp(y, scrollY, .1)
      dispose(y)

      scrollSpeed = y - oldScrollY
      oldScrollY = y

      gsap.to($items, {
        rotate: scrollSpeed * .01,
        scale: 1 - Math.min(100, Math.abs(scrollSpeed)) * 0.003
      })
    }
    render()

}