gsap.registerPlugin(ScrollTrigger);

gsap.set(".fade-title",{opacity:0});

document.querySelectorAll("#anim-title").forEach((el)=>{
    gsap.to(
        el,
        {
            scrollTrigger:{
                trigger:el,
                start:"top 80%",
                toggleClass:"title_active",
                once:true,
            },
        }
    );
});

document.querySelectorAll(".fade-title").forEach((el) => {
    gsap.fromTo(
      el,
      {
        opacity:0,
    },
      {
        delay:0.5,
        opacity:1,
        duration:0.5,
        scrollTrigger: {
          trigger: el,
          start: "top 80%",
        },
      }
    );
});

// document.querySelectorAll(".fade-title").forEach((el)=>{
//     gsap.to(
//         el,
//         {
//             opacity:1,
//             scrollTrigger:{
//                 trigger:el,
//                 start:"top 70%",
//                 toggleClass:"fadeIn",
//                 once:true,
//                 makers:true,
//             },
//         }
//     );
// });

gsap.fromTo(".article-wrap, .section-area-left",
    {
        opacity:0,
        y:50,
    },
    {
    y:0,
    duration:1,
    opacity:1,
    ease:"power1.inOut",
});

gsap.fromTo(".openbtn, .header-logo",
    {
        opacity:0,
        y:-50,
    },
    {
    y:0,
    duration:1,
    opacity:1,
    ease:"power1.inOut",
});

// $(".openbtn").click(function () {//ボタンがクリックされたら 
//     gsap.to("#glo-nav-sp",
//     {
//     duration:1,
//     autoAlpha:1,
//     ease:"power1.inOut",
// });
// });

// $(".#glo-nav a").click(function () {//ボタンがクリックされたら 
//     gsap.from("#glo-nav-sp",
//     {
//     duration:1,
//     autoAlpha:0,
//     ease:"power1.inOut",
// });
// });

gsap.fromTo(".sns-list__item",
{
    opacity:0,
    x:100,
},
{
    x:0,
    opacity:1,
    stagger:{
        from:"start",
        grid:[1,0],
        each:0.1,
        ease:"expo.out",
    }
});

