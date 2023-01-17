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

////一t字保存/////////
// gsap.fromTo(".article-wrap, .section-area-left",
//     {
//         opacity:0,
//         y:50,
//     },
//     {
//     y:0,
//     duration:1,
//     opacity:1,
//     ease:"power1.inOut",
// });

// gsap.fromTo(".header-logo",
//     {
//         y:-50,
//     },
//     {
//         y:0,
//         duration:1,
//         toggleClass:"fadeIn",
//         ease:"power1.inOut",
// });
//////////////////

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

//あにめ一時保存 /////////
// gsap.fromTo(".sns-list__item",
// {
//     opacity:0,
//     x:100,
// },
// {
//     x:0,
//     opacity:1,
//     stagger:{
//         from:"start",
//         grid:[1,0],
//         each:0.1,
//         ease:"expo.out",
//     }
// });

// gsap.fromTo(".openbtn",
// {
//     opacity:0,
//     x:20,
// },
// {
//     x:0,
//     delay:1,
//     opacity:1,
// });

// gsap.fromTo(".glo-nav__item",
// {
//     opacity:0,
//     y:-50,
// },
// {
//     y:0,
//     opacity:1,
//     stagger:{
//         from:"start",
//         each:0.1,
//         ease:"expo.out",
//     }
// });
/////////////////////

// let beatAnim = new Vivus("beat", {
//     type: 'scenario-sync',
//     duration:100,
//     animTimingFunction:Vivus.EASE,
// },function(obj){
//     beatAnim.reset().play();
// });

// gsap.fromTo("#beat",{
//     opacity:0,
// },{
//     opacity:1,
//     duration:1,
//     repeat: 999,
// });

const jsloadbg = "#js-load-bg";
const jsloadlogo = "#js-load-logo";
const jsBeat = "#beat";
const jsGlonav = ".glo-nav__item";
const jshum = ".openbtn";
const jsSidebar = ".sns-list__item";
const jsHead = ".header-logo";
const jsContent=".article-wrap, .section-area-left";

const tl = gsap.timeline();

gsap.set(
    [jsloadlogo, jsHead, jsGlonav],
    {
        opacity: 0,
        y: -50,
    }
);

gsap.set(
    jsloadbg,
    {
        opacity:0,
    }
)

gsap.set(
    jsSidebar,
    {
        opacity:0,
        x:100,
    }
);

gsap.set(
    jshum,
    {
        opacity:0,
        x:20,
    }
);

gsap.set(
    jsContent,
    {
        opacity: 0,
        y:50,
    }
);

gsap.set(
    jsBeat,
    {
        opacity:0,
        y:50,
    }
);

function loadedPage() {
    const loadingID = document.getElementByClassName("js_loading");
    loadingID.classList.add("loaded");
  }
  
  if (!sessionStorage.getItem('visited')) {
    sessionStorage.setItem('visited', 'first');
    window.addEventListener('load', function () {
      loadAnim();
    });
  }else {
    moveAnim();
    loadedPage();
  }

function moveAnim(){

    tl.to(
        jsloadbg,
        {
            opacity:1,
        }
    ).to(
        jsloadlogo,
        {
            opacity:1,
            y:0,
            duration:0.8,
            delay:0.5,
        }
    ).to(
        jsBeat,
        {
            opacity:0,
        }
    ).to(
        jsloadlogo,
        {
            opacity:0,
            y:-50,
            duration:0.8,
        },
        '-=0.2'
    ).to(
        jsloadbg,
        {
            opacity:0,
        }
    )
    .to(
        [jsHead, jsContent],
        {
            opacity:1,
            y:0,
            ease:"power1.inOot"
        }
    ).to(
        jsGlonav,
        {
            opacity:1,
            y:0,
            stagger:{
                from:"start",
                each:0.1,
                ease:"expo.out",
            }
        },
        '<'
    ).to(
        jsSidebar,
        {
            x:0,
            opacity:1,
            stagger:{
                from:"start",
                grid:[1,0],
                each:0.1,
                ease:"expo.out",
            }
        },
        '<'
    ).to(
        jshum,
        {
            x:0,
            delay:0.3,
            opacity:1,
        }
    );
}



function loadAnim(){


    tl.to(
        jsloadbg,
        {
            opacity:1,
        }
    ).to(
        [jsloadlogo, jsBeat],
        {
            opacity:1,
            y:0,
            duration:0.8,
            delay:1,
        }
    ).to(
        jsloadlogo,
        {
            opacity:0,
            y:-50,
            duration:0.8,
            delay:1,
        },
        '+=1'
    ).to(
        jsBeat,
        {
            opacity:0,
            y:50,
            duration:0.8,
        },
        '<'
    ).to(
        jsloadbg,
        {
            opacity:0,
        }
    )
    .to(
        [jsHead, jsContent],
        {
            opacity:1,
            y:0,
            ease:"power1.inOot"
        }
    ).to(
        jsGlonav,
        {
            opacity:1,
            y:0,
            stagger:{
                from:"start",
                each:0.1,
                ease:"expo.out",
            }
        },
        '<'
    ).to(
        jsSidebar,
        {
            x:0,
            opacity:1,
            stagger:{
                from:"start",
                grid:[1,0],
                each:0.1,
                ease:"expo.out",
            }
        },
        '<'
    ).to(
        jshum,
        {
            x:0,
            delay:0.3,
            opacity:1,
        }
    );
}


// const Loadbg = "#splash";

// const closeLoadingScreen = (Loadbg) => {
//     gsap.timeline().to(Loadbg, {
//       opacity: 0,
//       direction: 1.1
//     });
//   };

// const showLoadingScreen = (Loadbg)=>{
//     gsap.to(Loadbg, {
//         opacity: 1,
//     });
// };

// window.onload = () =>{
//     setTimeout(()=>{
//         closeLoadingScreen(Loadbg);
//     }, 1500);
// };

// $(window).on('load',function(){
//     $("#splash").delay(500).fadeOut('slow');//ローディング画面を1.5秒（1500ms）待機してからフェードアウト
//     $("#splash_logo").delay(1200).fadeOut('slow');//ロゴを1.2秒（1200ms）待機してからフェードアウト
//   });

