import{g as I,a as J,E as K,P as Q,S as U}from"./effect-coverflow-D7VrIAMs.js";import{d as W,M as X,r as b,ey as Y,o as M,c as R,f as Z,w as q,F as ee,g as te,b as c,s as ae,a as V,A as ne}from"./index-QJ1DP7so.js";import{a as se}from"./detail.vue_vue_type_script_setup_true_lang-o17iJPcR.js";function re(O){let{swiper:e,extendParams:l,on:r,emit:n,params:p}=O;e.autoplay={running:!1,paused:!1,timeLeft:0},l({autoplay:{enabled:!1,delay:3e3,waitForTransition:!0,disableOnInteraction:!1,stopOnLastSlide:!1,reverseDirection:!1,pauseOnMouseEnter:!1}});let f,T,E=p&&p.autoplay?p.autoplay.delay:3e3,g=p&&p.autoplay?p.autoplay.delay:3e3,t,s=new Date().getTime(),o,m,y,P,L,d,D;function x(a){!e||e.destroyed||!e.wrapperEl||a.target===e.wrapperEl&&(e.wrapperEl.removeEventListener("transitionend",x),!(D||a.detail&&a.detail.bySwiperTouchMove)&&v())}const C=()=>{if(e.destroyed||!e.autoplay.running)return;e.autoplay.paused?o=!0:o&&(g=t,o=!1);const a=e.autoplay.paused?t:s+g-new Date().getTime();e.autoplay.timeLeft=a,n("autoplayTimeLeft",a,a/E),T=requestAnimationFrame(()=>{C()})},$=()=>{let a;return e.virtual&&e.params.virtual.enabled?a=e.slides.filter(i=>i.classList.contains("swiper-slide-active"))[0]:a=e.slides[e.activeIndex],a?parseInt(a.getAttribute("data-swiper-autoplay"),10):void 0},S=a=>{if(e.destroyed||!e.autoplay.running)return;cancelAnimationFrame(T),C();let u=typeof a>"u"?e.params.autoplay.delay:a;E=e.params.autoplay.delay,g=e.params.autoplay.delay;const i=$();!Number.isNaN(i)&&i>0&&typeof a>"u"&&(u=i,E=i,g=i),t=u;const _=e.params.speed,F=()=>{!e||e.destroyed||(e.params.autoplay.reverseDirection?!e.isBeginning||e.params.loop||e.params.rewind?(e.slidePrev(_,!0,!0),n("autoplay")):e.params.autoplay.stopOnLastSlide||(e.slideTo(e.slides.length-1,_,!0,!0),n("autoplay")):!e.isEnd||e.params.loop||e.params.rewind?(e.slideNext(_,!0,!0),n("autoplay")):e.params.autoplay.stopOnLastSlide||(e.slideTo(0,_,!0,!0),n("autoplay")),e.params.cssMode&&(s=new Date().getTime(),requestAnimationFrame(()=>{S()})))};return u>0?(clearTimeout(f),f=setTimeout(()=>{F()},u)):requestAnimationFrame(()=>{F()}),u},B=()=>{s=new Date().getTime(),e.autoplay.running=!0,S(),n("autoplayStart")},h=()=>{e.autoplay.running=!1,clearTimeout(f),cancelAnimationFrame(T),n("autoplayStop")},w=(a,u)=>{if(e.destroyed||!e.autoplay.running)return;clearTimeout(f),a||(d=!0);const i=()=>{n("autoplayPause"),e.params.autoplay.waitForTransition?e.wrapperEl.addEventListener("transitionend",x):v()};if(e.autoplay.paused=!0,u){L&&(t=e.params.autoplay.delay),L=!1,i();return}t=(t||e.params.autoplay.delay)-(new Date().getTime()-s),!(e.isEnd&&t<0&&!e.params.loop)&&(t<0&&(t=0),i())},v=()=>{e.isEnd&&t<0&&!e.params.loop||e.destroyed||!e.autoplay.running||(s=new Date().getTime(),d?(d=!1,S(t)):S(),e.autoplay.paused=!1,n("autoplayResume"))},N=()=>{if(e.destroyed||!e.autoplay.running)return;const a=I();a.visibilityState==="hidden"&&(d=!0,w(!0)),a.visibilityState==="visible"&&v()},k=a=>{a.pointerType==="mouse"&&(d=!0,D=!0,!(e.animating||e.autoplay.paused)&&w(!0))},A=a=>{a.pointerType==="mouse"&&(D=!1,e.autoplay.paused&&v())},j=()=>{e.params.autoplay.pauseOnMouseEnter&&(e.el.addEventListener("pointerenter",k),e.el.addEventListener("pointerleave",A))},G=()=>{e.el&&typeof e.el!="string"&&(e.el.removeEventListener("pointerenter",k),e.el.removeEventListener("pointerleave",A))},z=()=>{I().addEventListener("visibilitychange",N)},H=()=>{I().removeEventListener("visibilitychange",N)};r("init",()=>{e.params.autoplay.enabled&&(j(),z(),B())}),r("destroy",()=>{G(),H(),e.autoplay.running&&h()}),r("_freeModeStaticRelease",()=>{(y||d)&&v()}),r("_freeModeNoMomentumRelease",()=>{e.params.autoplay.disableOnInteraction?h():w(!0,!0)}),r("beforeTransitionStart",(a,u,i)=>{e.destroyed||!e.autoplay.running||(i||!e.params.autoplay.disableOnInteraction?w(!0,!0):h())}),r("sliderFirstMove",()=>{if(!(e.destroyed||!e.autoplay.running)){if(e.params.autoplay.disableOnInteraction){h();return}m=!0,y=!1,d=!1,P=setTimeout(()=>{d=!0,y=!0,w(!0)},200)}}),r("touchEnd",()=>{if(!(e.destroyed||!e.autoplay.running||!m)){if(clearTimeout(P),clearTimeout(f),e.params.autoplay.disableOnInteraction){y=!1,m=!1;return}y&&e.params.cssMode&&v(),y=!1,m=!1}}),r("slideChange",()=>{e.destroyed||!e.autoplay.running||(L=!0)}),Object.assign(e.autoplay,{start:B,stop:h,pause:w,resume:v})}const ie={class:"carousel flex items-center"},oe={class:"carousel-box"},le=["src"],ue=W({__name:"index",setup(O){const e=X(),l=b(null),r=b([]),n=b(0),p=b({delay:5e3,disableOnInteraction:!1}),f=b({rotate:0,stretch:0,depth:444}),T=e.matched.find(t=>t.name==="LayoutGame")?2:e.matched.find(t=>t.name==="LayoutSport")?1:0;Y({layoutType:T}).then(({data:t})=>{t.items.length===1?t.items=[...t.items,...t.items,...t.items,...t.items]:t.items.length<4&&(t.items=[...t.items,...t.items]),r.value=t.items});function E(t){l.value=t}function g(t,s){s===n.value?se(t):n.value===0?s===1?l.value.slideNext():l.value.slidePrev():n.value===r.value.length-1?s===0?l.value.slideNext():l.value.slidePrev():s<n.value?l.value.slidePrev():l.value.slideNext()}return(t,s)=>(M(),R("div",ie,[Z(c(U),{ref_key:"swipeRef",ref:l,"grab-cursor":!0,effect:"coverflow","centered-slides":!0,"slides-per-view":"auto",loop:!0,autoplay:c(p),"coverflow-effect":c(f),modules:[c(re),c(K),c(Q)],onSwiper:E,onRealIndexChange:s[0]||(s[0]=({realIndex:o})=>{n.value=o})},{default:q(()=>[(M(!0),R(ee,null,te(c(r),(o,m)=>(M(),ae(c(J),{key:"".concat(o==null?void 0:o.taskId).concat(m),class:"carousel-item cursor-pointer",onClick:y=>g(o,m)},{default:q(()=>[V("div",oe,[V("img",{class:"carousel-img",src:o.img},null,8,le)])]),_:2},1032,["onClick"]))),128))]),_:1},8,["autoplay","coverflow-effect","modules"])]))}}),fe=ne(ue,[["__scopeId","data-v-5b1da60d"]]);export{fe as _};