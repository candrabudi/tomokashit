import{d as A,u as L,r as C,o as i,c as l,a,t,b as e,e as x,f as c,F as w,g as S,p as O,_ as G,h as P,n as B,i as R,j as M,k as T,w as $,l as D,m as E,q as N,s as F,v as K}from"./index-QJ1DP7so.js";import{_ as V}from"./football_icon-C7weDvYc.js";import{f as z}from"./match-CBbeQIDv.js";import{_ as J}from"./CollapseTransitionSfc-DJ4piXiK.js";import{_ as U}from"./gameNavigation.vue_vue_type_script_setup_true_lang-BDowO4qR.js";import"./gameItem.vue_vue_type_script_setup_true_lang-DgMzDE8q.js";import"./useScrollNode-DeCbJBqw.js";const q="/assets/image/banner_registry.jpg",H="/assets/image/home_nav_sport.jpg",Q="/assets/image/home_nav_game.png",W={class:"flex items-center"},X=a("div",{class:"relative mr-12"},[a("div",{class:"h-18 w-18 rd-full bg-primary opacity-20"}),a("div",{class:"absolute left-4 top-4 h-10 w-10 rd-full bg-primary"})],-1),Y={class:"text-16"},Z={class:"mt-20 w-full flex overflow-hidden"},aa=["onClick"],ea={class:"flex items-center"},ta=a("img",{class:"mr-10 h-20 w-20",src:V,alt:"football"},null,-1),na={class:"text-14 opacity-50"},ia={class:"mt-30 flex justify-between overflow-hidden"},sa=["src","alt"],oa=["title"],la={class:"order-1 text-center"},ra=a("div",{class:"text-30 font-bold"}," VS ",-1),da={class:"text-12"},ca={class:"mt-30 flex"},ma={key:0,class:"h-full w-full text-center lh-40"},ua={key:1,class:"h-full w-full flex items-center justify-around overflow-hidden whitespace-nowrap"},pa={class:"overflow-hidden text-ellipsis"},ha={class:"h-40 w-86 rd-10 bg-body text-center lh-40"},ga=A({__name:"hotMatch",setup(I){const{t:m}=L(),g=P(),n=C(!1),_=C([]);function k(){n.value=!0,O({type:4,sportId:1,pageSize:3,isPC:!0}).then(({data:s})=>{_.value=s.records}).finally(()=>{n.value=!1})}k();function f(s){var d,v,r;if((d=s==null?void 0:s.mg)!=null&&d.length){const h=s.mg.find(o=>o.mty===1005&&o.pe===1001);if(h)return(r=(v=h==null?void 0:h.mks)==null?void 0:v[0])==null?void 0:r.op}return[null,null,null,null]}function u(s){g.push({path:"/sport/match/detail/".concat(s.id)})}function p(){g.push("/sport/popular")}return(s,d)=>{const v=G;return i(),l("div",null,[a("div",W,[X,a("div",Y,t(e(m)("title.hotMatch")),1),a("div",{class:"ml-auto flex cursor-pointer items-center opacity-50",onClick:p},[x(t(e(m)("title.showMore"))+" ",1),c(v,{name:"chevron-right"})])]),a("div",Z,[(i(!0),l(w,null,S(e(_),(r,h)=>(i(),l("div",{key:r.id,class:B(["flex-1 cursor-pointer overflow-hidden rd-10 bg-paper p-10",{"ml-10":h!==0}]),onClick:o=>u(r)},[a("div",ea,[ta,a("div",na,t(r.lg.na),1)]),a("div",ia,[(i(!0),l(w,null,S(r.ts,(o,b)=>(i(),l("div",{key:o.id,class:"flex-1 overflow-hidden text-center",style:R("order:".concat(b*2))},[a("img",{class:"h-50 w-50",src:o.lurl||"/assets/image/tram_icon2.png",alt:o.na},null,8,sa),a("div",{class:"mt-12 overflow-hidden text-ellipsis whitespace-nowrap text-16 font-bold",title:o.na},t(o.na),9,oa)],4))),128)),a("div",la,[ra,a("div",da,t(e(z)(r.bt)),1)])]),a("div",ca,[(i(!0),l(w,null,S(f(r),(o,b)=>(i(),l("div",{key:b,class:"mr-10 h-40 flex-1 overflow-hidden rd-10 bg-#FDEFF0 px-5"},[o?(i(),l("div",ua,[a("div",pa,t(o.nm),1),a("div",null,t(o.bod),1)])):(i(),l("div",ma," - "))]))),128)),a("div",ha," +"+t(r.tms),1)])],10,aa))),128))])])}}}),_a={class:"h-512 w-full flex items-center rd-10 bg-paper"},ba={class:"w-630 flex flex-col justify-center pl-120"},ka={class:"text-35 font-[font-title]"},fa=["onClick"],va={class:"max-h-170 overflow-auto b-t b-t-1 b-t-#EAEEF5 b-t-solid px-10 pt-10 text-12"},ya=A({__name:"about",setup(I){const{t:m}=L(),g=P(),n=[{title:"Spotbetæ˜¯ä»€ä¹ˆï¼Ÿ",content:["Spotbet ä»Ž2010å¹´å¼€å§‹å°±é¢†å¯¼äº†çº¿ä¸Šåšå½©è¡Œä¸š,æä¾›å„ç±»çº¿ä¸ŠèµŒåœºå’Œä½“è‚²æŠ•æ³¨é¡¹ç›®ã€‚","Spotbet æ˜¯ä¸€ä¸ªå¯é å®‰å…¨çš„å¹³å°ï¼Œè‡´åŠ›äºŽä¸ºå¹¿å¤§çŽ©å®¶æä¾›å®‰å…¨ã€å…¬å¹³ã€åˆºæ¿€çš„åšå½©ä½“éªŒã€‚æ‚¨å¯ä»¥å°½æƒ…äº«å—å„ç§å„æ ·çš„å¨±ä¹ï¼Œä»Žç»å…¸çš„çœŸäººè·å®˜æ¸¸æˆåˆ°æ¿€åŠ¨äººå¿ƒçš„ä½“è‚²èµ›äº‹æŠ•æ³¨ï¼Œåº”æœ‰å°½æœ‰ã€‚æ”¯æŒå…¨çƒèŒƒå›´å†…çš„æœ¬åœ°è´§å¸å’ŒåŠ å¯†è´§å¸æŠ•æ³¨ï¼ŒSpotbetåœ¨å…¨çƒä¸»è¦ä½“è‚²èµ›äº‹ä¸­æä¾›æœ€ä½³èµ”çŽ‡ã€‚å‡­å€Ÿå¤šå¹´çš„è¡Œä¸šç»éªŒå’Œå¯¹çŽ©å®¶éœ€æ±‚çš„æ·±åˆ»ç†è§£ï¼ŒSpotbetå·²æˆä¸ºå…¨çƒä¼—å¤šåšå½©çˆ±å¥½è€…çš„é¦–é€‰å¹³å°ã€‚","ä¼˜æƒ å¤šå¤šï¼š æˆ‘ä»¬å®šæœŸæŽ¨å‡ºä¸°åŽšçš„æ¬¢è¿Žå¥–é‡‘ã€è¿”çŽ°æ´»åŠ¨ã€VIPä¸“å±žç¤¼é‡ç­‰ï¼Œè®©æ‚¨åœ¨å¨±ä¹çš„åŒæ—¶äº«å—æ›´å¤šç¦åˆ©ã€‚","ä¸“ä¸šå®¢æœï¼š 7*24å°æ—¶åœ¨çº¿å®¢æœå›¢é˜Ÿï¼Œéšæ—¶ä¸ºæ‚¨è§£ç­”ç–‘é—®ï¼Œè§£å†³é—®é¢˜ã€‚"]},{title:"Spotbetæ˜¯å¦æ‹¿åˆ°è®¸å¯ï¼Ÿ",content:["Spotbet Group æ˜¯é¢†å…ˆçš„ä½“è‚²æ•°æ®æä¾›å•†å’Œäº¤æ˜“å•†ï¼Œå—è‹±å›½åšå½©å§”å‘˜ä¼šç›‘ç®¡ï¼ŒæŒæœ‰è‹±å›½åšå½©å§”å‘˜ä¼šè®¸å¯è¯ä»¥åŠ PAGCOR åšå½©è¿è¥è®¸å¯è¯ã€‚åœ¨å¤šé‡ç›‘æŽ§ç³»ç»Ÿçš„ä¿æŠ¤ä¸‹ï¼Œæˆ‘ä»¬è‡´åŠ›äºŽä¸ºç”¨æˆ·æä¾›å®‰å…¨ã€å¯é çš„ä½“è‚²åšå½©å¹³å°å’Œæœ€å¥½çš„æœåŠ¡ã€‚"]},{title:"æŠ•æ³¨Spotbetæ˜¯å¦å®‰å…¨ï¼Ÿ",content:["Spotbetæ˜¯äºšæ´²é¢†å…ˆçš„å®‰å…¨ã€å—ä¿¡èµ–å“ç‰Œä¹‹ä¸€ã€‚ æˆ‘ä»¬æŒæœ‰è‹±å›½åšå½©å§”å‘˜ä¼šè®¸å¯è¯ä»¥åŠ PAGCOR åšå½©è¿è¥è®¸å¯è¯ ï¼Œè¥è¿å¾—åˆ°å®˜æ–¹è®¤è¯å¹¶å—å…¶ç›‘ç®¡ã€‚Spotbetä¸€ç›´å°†å®‰å…¨æ€§æ”¾åœ¨é¦–ä½ã€‚ æˆ‘ä»¬é‡‡ç”¨å…ˆè¿›çš„SSLåŠ å¯†æŠ€æœ¯ï¼Œä¿æŠ¤æ‚¨çš„ä¸ªäººä¿¡æ¯å’Œäº¤æ˜“å®‰å…¨ã€‚æ­¤å¤–ï¼Œæˆ‘ä»¬è¿˜ä¸Žå¤šå®¶å›½é™…çŸ¥åçš„æ”¯ä»˜æœºæž„åˆä½œï¼Œç¡®ä¿æ‚¨çš„èµ„é‡‘å®‰å…¨ã€‚å¹³å°çš„éšæœºæ•°ç”Ÿæˆå™¨ï¼ˆRNGï¼‰ç»è¿‡ç¬¬ä¸‰æ–¹è®¤è¯ï¼Œä¿è¯æ¸¸æˆç»“æžœçš„å…¬å¹³æ€§ã€‚"]},{title:"å¯ä»¥çŽ©é‚£ç§ç±»åž‹çš„å¨±ä¹åœºæ¸¸æˆï¼Ÿ",content:["åœ¨Spotbetï¼Œæ‚¨å¯ä»¥å°½æƒ…äº«å—å„ç§ç±»åž‹çš„å¨±ä¹åœºæ¸¸æˆï¼ŒåŒ…æ‹¬ï¼š","çœŸäººè·å®˜æ¸¸æˆï¼š ç™¾å®¶ä¹ã€è½®ç›˜ã€äºŒåä¸€ç‚¹ã€é¾™è™Žç­‰ç»å…¸æ¸¸æˆï¼Œç”±ä¸“ä¸šè·å®˜å®žæ—¶å‘ç‰Œï¼Œå¸¦æ¥èº«ä¸´å…¶å¢ƒçš„èµŒåœºä½“éªŒã€‚","ç”µå­æ¸¸æˆï¼š æ‹¥æœ‰æ•°åƒæ¬¾ä¸åŒä¸»é¢˜çš„ç”µå­è€è™Žæœºã€è§†é¢‘æ‰‘å…‹ã€åˆ®åˆ®ä¹ç­‰æ¸¸æˆï¼Œä¸ºæ‚¨å¸¦æ¥æ— é™ä¹è¶£ã€‚","ä½“è‚²åšå½©ï¼š è¶³çƒã€ç¯®çƒã€ç½‘çƒã€æ¡Œçƒç­‰å…¨çƒçƒ­é—¨èµ›äº‹ï¼Œæä¾›å¤šç§å¤šæ ·çš„æŠ•æ³¨é€‰é¡¹ï¼Œæ»¡è¶³ä¸åŒçŽ©å®¶çš„éœ€æ±‚ã€‚","ç”µç«žåšå½©ï¼š Dota2ã€LoLã€CS:GOç­‰å…¨çƒçƒ­é—¨èµ›äº‹ä¸­ï¼Œä½“éªŒå¿ƒè·³åŠ é€Ÿçš„æŠ•æ³¨ä¹è¶£ï¼Œèµ¢å–ä¸°åŽšå¥–é‡‘ã€‚"]},{title:"å¯ä»¥æŠ•æ³¨å“ªç§ä½“è‚²ï¼Ÿ",content:["Spotbetè¦†ç›–å…¨çƒèŒƒå›´å†…çš„å„å¤§ä½“è‚²èµ›äº‹ï¼Œæ‚¨å¯ä»¥æŠ•æ³¨çš„ä½“è‚²é¡¹ç›®åŒ…æ‹¬ï¼š","è¶³çƒï¼š è‹±è¶…ã€è¥¿ç”²ã€å¾·ç”²ã€æ„ç”²ç­‰å„å¤§è”èµ›ï¼Œä»¥åŠä¸–ç•Œæ¯ã€æ¬§æ´²æ¯ç­‰å›½é™…èµ›äº‹ã€‚","ç¯®çƒï¼š NBAã€CBAç­‰èŒä¸šç¯®çƒè”èµ›ã€‚","ç½‘çƒï¼š å¤§æ»¡è´¯èµ›äº‹ã€å¤§å¸ˆèµ›ç­‰ã€‚","å…¶ä»–ä½“è‚²ï¼š æ£’çƒã€å†°çƒã€é«˜å°”å¤«ã€èµ›è½¦ã€æ¡Œçƒç­‰çƒ­é—¨ä½“è‚²èµ›äº‹ã€‚"]}],_=[{title:"Apa itu Spotbet?",content:["Spotbet telah menjadi pemimpin dalam industri perjudian online sejak tahun 2010, menawarkan berbagai macam kasino online dan taruhan olahraga.","Spotbet adalah platform yang andal dan aman, berkomitmen untuk memberikan pengalaman perjudian yang aman, adil, dan menarik bagi semua pemain. Anda dapat menikmati berbagai macam hiburan, mulai dari permainan live dealer klasik hingga taruhan pada acara olahraga yang mengasyikkan. Mendukung taruhan dalam mata uang lokal dan cryptocurrency di seluruh dunia, Spotbet menawarkan odds terbaik dalam acara olahraga utama di dunia. Dengan pengalaman bertahun-tahun di industri ini dan pemahaman mendalam tentang kebutuhan pemain, Spotbet telah menjadi platform pilihan bagi banyak penggemar judi di seluruh dunia.","Banyak penawaran: Kami secara teratur meluncurkan bonus sambutan yang besar, promosi cashback, hadiah eksklusif VIP, dan banyak lagi, sehingga Anda dapat menikmati lebih banyak manfaat sambil bersenang-senang.","Pelayanan pelanggan profesional: Tim layanan pelanggan online 24/7 siap membantu Anda menjawab pertanyaan dan menyelesaikan masalah."]},{title:"Apakah Spotbet memiliki lisensi?",content:["Spotbet Group adalah penyedia data dan pedagang olahraga terkemuka, diawasi oleh Komisi Perjudian Inggris, memegang lisensi Komisi Perjudian Inggris dan lisensi operasi perjudian PAGCOR. Dilindungi oleh sistem pemantauan ganda, kami berkomitmen untuk menyediakan platform taruhan olahraga yang aman, andal, dan layanan terbaik bagi pengguna."]},{title:"Apakah aman bertaruh di Spotbet?",content:["Spotbet adalah salah satu merek terkemuka, aman, dan terpercaya di Asia. Kami memegang lisensi Komisi Perjudian Inggris dan lisensi operasi perjudian PAGCOR, yang berarti operasi kami secara resmi diakui dan diatur. Keamanan selalu menjadi prioritas utama Spotbet. Kami menggunakan teknologi enkripsi SSL canggih untuk melindungi informasi pribadi dan transaksi Anda. Selain itu, kami juga bekerja sama dengan beberapa lembaga pembayaran internasional ternama untuk memastikan keamanan dana Anda. Generator angka acak (RNG) platform kami telah disertifikasi oleh pihak ketiga untuk menjamin keadilan hasil permainan."]},{title:"Jenis permainan kasino apa yang bisa dimainkan?",content:["Di Spotbet, Anda dapat menikmati berbagai jenis permainan kasino, termasuk:","Permainan Live Dealer: Baccarat, Roulette, Blackjack, Dragon Tiger, dan permainan klasik lainnya, dibagikan secara real-time oleh dealer profesional, memberikan pengalaman kasino yang imersif.","Permainan Elektronik: Memiliki ribuan slot mesin, video poker, scratch card, dan permainan bertema berbeda lainnya, memberi Anda kesenangan tanpa batas.","Taruhan Olahraga: Sepak bola, basket, tenis, biliar, dan acara populer global lainnya, menawarkan berbagai pilihan taruhan untuk memenuhi kebutuhan pemain yang berbeda.","Taruhan Esports: Dota2, LoL, CS:GO, dan acara populer global lainnya, nikmati keseruan taruhan yang mendebarkan dan menangkan hadiah besar.Terjemahan ke dalam Bahasa Indonesia:"]},{title:"Olahraga apa saja yang bisa dipertaruhkan?",content:["Spotbet mencakup berbagai macam acara olahraga di seluruh dunia. Anda dapat bertaruh pada berbagai jenis olahraga, termasuk:","Sepak Bola: Liga Premier Inggris, La Liga Spanyol, Bundesliga Jerman, Serie A Italia, dan turnamen internasional seperti Piala Dunia dan Piala Eropa.","Basket: NBA, CBA, dan liga basket profesional lainnya.","Tenis: Grand Slam, Masters, dan turnamen lainnya.","Olahraga Lainnya: Baseball, hoki es, golf, balap mobil, biliar, dan acara olahraga populer lainnya."]}],{isChinese:k}=M(),f=T(()=>k.value?n:_),u=C(0);function p(d){d===u.value?u.value=null:u.value=d}function s(){g.push("/tutorial/2?title=".concat(m("mine.serviceList.aboutUs")))}return(d,v)=>{const r=D,h=G,o=J;return i(),l("div",_a,[a("div",ba,[a("div",ka,t(e(m)("home.about.title")),1),c(r,{class:"mt-40 h-44 w-170 rd-22 text-16",type:"primary",onClick:s},{default:$(()=>[x(t(e(m)("home.about.button")),1)]),_:1})]),a("div",null,[(i(!0),l(w,null,S(e(f),(b,y)=>(i(),l("div",{key:y,class:B(["w-450 rd-10 bg-body",{"mt-10":y>0}])},[a("div",{class:"h-44 flex cursor-pointer items-center justify-between px-12 text-14 lh-44",onClick:j=>p(y)},[a("div",null,t(b.title),1),c(h,{name:e(u)===y?"chevron-up":"chevron-down"},null,8,["name"])],8,fa),c(o,{expand:e(u)===y},{default:$(()=>[a("div",va,[(i(!0),l(w,null,S(b.content,j=>(i(),l("div",{key:j,class:"mb-10 lh-20"},t(j),1))),128))])]),_:2},1032,["expand"])],2))),128))])])}}}),xa={class:"pb-20"},wa={class:"relative w-full"},Sa=a("img",{class:"block w-full rd-10",src:q,alt:"registry"},null,-1),$a={class:"absolute left-120 top-1/2 translate-y--1/2"},ja={class:"mt-5 max-w-500 text-20 font-thin lh-40"},Ca={class:"mt-20 flex justify-between"},Aa={class:"relative mr-20 flex-1 overflow-hidden rd-10"},La=a("img",{class:"block w-full",src:H,alt:"sport"},null,-1),Pa={class:"absolute left-60 top-65 color-white"},Ba={class:"text-26 font-extrabold lh-35"},Ia={class:"mt-26 text-20 font-thin lh-26"},Ga={class:"relative flex-1 overflow-hidden rd-10"},Ma=a("img",{class:"block w-full",src:Q,alt:"sport"},null,-1),Da={class:"absolute left-60 top-65 color-white"},Oa={class:"text-26 font-extrabold lh-35"},Ra={class:"mt-26 text-20 font-thin lh-26"},Ja=A({name:"PageHome",__name:"index",setup(I){const m=E(),g=P(),{t:n}=L(),_=N(),{isChinese:k}=M();function f(){m.openLoginPopup("registration")}return(u,p)=>{const s=D;return i(),l("div",xa,[a("div",wa,[Sa,a("div",$a,[a("div",{class:B(["font-extrabold lh-40",e(k)?"text-30":"text-32"])},[a("div",null,t(e(n)("home.registry.title1")),1),a("div",ja,t(e(n)("home.registry.title2")),1)],2),e(_).isLogin?K("",!0):(i(),F(s,{key:0,class:"mt-28 h-44 w-170 rd-22",type:"primary",onClick:f},{default:$(()=>[x(t(e(n)("home.registry.button")),1)]),_:1}))])]),c(U,{class:"mt-20"}),a("div",Ca,[a("div",Aa,[La,a("div",Pa,[a("div",Ba,t(e(n)("home.sport.title")),1),a("div",Ia,[a("div",null,t(e(n)("home.sport.content1")),1),a("div",null,t(e(n)("home.sport.content2")),1)]),c(s,{class:"mt-140 h-50 w-170 rd-25",type:"primary",onClick:p[0]||(p[0]=d=>e(g).push("/sport/live"))},{default:$(()=>[x(t(e(n)("home.sport.button")),1)]),_:1})])]),a("div",Ga,[Ma,a("div",Da,[a("div",Oa,t(e(n)("home.game.title")),1),a("div",Ra,[a("div",null,t(e(n)("home.game.content1")),1),a("div",null,t(e(n)("home.game.content2")),1)]),c(s,{class:"mt-140 h-50 w-170 rd-25",type:"primary",onClick:p[1]||(p[1]=d=>e(g).push("/game"))},{default:$(()=>[x(t(e(n)("home.game.button")),1)]),_:1})])])]),c(ga,{class:"mt-20"}),c(ya,{class:"mt-20"})])}}});export{Ja as default};