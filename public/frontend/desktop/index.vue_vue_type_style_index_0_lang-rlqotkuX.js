import{d as F,u as I,az as N,k as l,o as r,s as C,w as u,f as p,n as g,b as t,c as f,F as b,g as V,e as L,t as d,a as A,_ as D,l as E,aA as O}from"./index-QJ1DP7so.js";const T={key:0},$={class:"text-14"},G=F({__name:"index",props:{current:{},pageSize:{},total:{},maxPagerCount:{default:6}},emits:["update:current"],setup(k,{emit:P}){const s=k,{t:h}=I(),B=P,{currentPage:m,pageCount:i,isFirstPage:x,isLastPage:v}=N({total:l(()=>s.total),page:l(()=>s.current),pageSize:l(()=>s.pageSize)}),w=l(()=>{const e=[];e.push(1);let a=Math.max(2,m.value-2);const n=Math.min(i.value-1,a+5-1);a=Math.max(2,n-5+1),a>2&&e.push("...");for(let o=a;o<=n;o++)e.push(o);return n<i.value-1&&e.push("..."),i.value>1&&e.push(i.value),e});function _(e){B("update:current",e)}function M(){_(s.current-1)}function y(){_(s.current+1)}return(e,z)=>{const a=D,n=E,o=O;return r(),C(o,{class:"sb-pagination flex items-center text-14"},{default:u(()=>[p(n,{class:g(["h-28 w-28",{"bg-transparent":t(x)}]),disabled:t(x),onClick:M},{default:u(()=>[p(a,{name:"chevron-left"})]),_:1},8,["disabled","class"]),(r(!0),f(b,null,V(t(w),(c,S)=>(r(),f(b,{key:S},[c==="..."?(r(),f("span",T,"...")):(r(),C(n,{key:1,class:g(["h-28 w-28 text-14",{"bg-primary color-white":t(m)===c}]),disabled:t(m)===c,onClick:j=>_(c)},{default:u(()=>[L(d(c),1)]),_:2},1032,["class","disabled","onClick"]))],64))),128)),p(n,{class:g(["h-28 w-28",{"bg-transparent":t(v)}]),disabled:t(v),onClick:y},{default:u(()=>[p(a,{name:"chevron-right"})]),_:1},8,["disabled","class"]),A("div",$,d(t(h)("component.pagination.total"))+" "+d(s.total)+" "+d(t(h)("component.pagination.item")),1)]),_:1})}}});export{G as _};