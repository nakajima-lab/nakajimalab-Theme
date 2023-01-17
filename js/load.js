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
)

function loadAnim(){
    tl.to(
        [jsloadlogo, jsBeat],
        {
            opacity:1,
            y:0,
            duration:0.8,
            delay:1,
        }
    ).to(
        [jsloadlogo],
        {
            opacity:0,
            y:-50,
            duration:0.8,
            delay:1,
        },
        '+=1'
    ).to(
        [jsBeat],
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

    