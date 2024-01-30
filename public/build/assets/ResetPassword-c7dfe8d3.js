import{r as v,T as x,o as i,d as h,b as o,u as s,a as t,w as p,F as k,Z as V,h as P,c as m,n as S,f as $,p as C,i as R}from"./app-42963b7f.js";import{A as B}from"./AuthenticationCard-f91b8917.js";import{_ as I}from"./AuthenticationCardLogo-3e93230a.js";import{_ as c,a as u}from"./TextInput-b80a9ce1.js";import{_ as f}from"./InputLabel-d3e52db2.js";import{_ as q}from"./PrimaryButton-a083b6c2.js";import{_ as F}from"./_plugin-vue_export-helper-c27b6911.js";import{r as g}from"./EyeSlashIcon-fc805aaf.js";import{r as y}from"./EyeIcon-c117dcfc.js";const w=l=>(C("data-v-407b9f7f"),l=l(),R(),l),N={class:"sm:flex sm:grow"},U={class:"min-h-screen flex flex-col grow sm:justify-center items-center pt-6 sm:pt-0 bg-gray-900 sm:w-0"},j=w(()=>t("h2",{class:"text-xl text-white pt-10 pb-4"},"Reset Password",-1)),A=w(()=>t("p",{class:"text-gray-300 text-sm"},"Set a new password for your account",-1)),E=["onSubmit"],T={class:"relative mt-4"},z={class:"relative mt-4"},M={class:"flex items-center justify-end mt-4"},Z=w(()=>t("div",{class:"flex grow overlay"},null,-1)),D={__name:"ResetPassword",props:{email:String,token:String},setup(l){const _=l,n=v(!1),d=v(!1),e=x({token:_.token,email:_.email,password:"",password_confirmation:""}),b=()=>{e.post(route("password.update"),{onFinish:()=>e.reset("password","password_confirmation")})};return(G,a)=>(i(),h(k,null,[o(s(V),{title:"Reset Password"}),t("div",N,[t("div",U,[o(B,null,{logo:p(()=>[o(I),j,A]),default:p(()=>[t("form",{onSubmit:P(b,["prevent"])},[t("div",null,[o(f,{for:"email",value:"Email"}),o(c,{id:"email",modelValue:s(e).email,"onUpdate:modelValue":a[0]||(a[0]=r=>s(e).email=r),type:"email",class:"mt-1 block w-full",required:"",autofocus:"",autocomplete:"username",disabled:""},null,8,["modelValue"]),o(u,{class:"mt-2",message:s(e).errors.email},null,8,["message"])]),t("div",T,[o(f,{for:"password",value:"Password*"}),o(c,{type:n.value?"text":"password",id:"password",modelValue:s(e).password,"onUpdate:modelValue":a[1]||(a[1]=r=>s(e).password=r),class:"mt-1 block w-full",required:"",autocomplete:"new-password"},null,8,["type","modelValue"]),o(u,{class:"mt-2",message:s(e).errors.password},null,8,["message"]),t("div",{class:"absolute text-gray-500 h-6 w-6 bg-white cursor-pointer top-eye-icon bottom-0 right-4",onClick:a[2]||(a[2]=r=>n.value=!n.value)},[n.value?(i(),m(s(g),{key:0})):(i(),m(s(y),{key:1}))])]),t("div",z,[o(f,{for:"password_confirmation",value:"Confirm Password*"}),o(c,{type:d.value?"text":"password",id:"password_confirmation",modelValue:s(e).password_confirmation,"onUpdate:modelValue":a[3]||(a[3]=r=>s(e).password_confirmation=r),class:"mt-1 block w-full",required:"",autocomplete:"new-password"},null,8,["type","modelValue"]),o(u,{class:"mt-2",message:s(e).errors.password_confirmation},null,8,["message"]),t("div",{class:"absolute text-gray-500 h-6 w-6 bg-white cursor-pointer top-eye-icon bottom-0 right-4",onClick:a[4]||(a[4]=r=>d.value=!d.value)},[d.value?(i(),m(s(g),{key:0})):(i(),m(s(y),{key:1}))])]),t("div",M,[o(q,{class:S(["mt-4 w-full",{"opacity-25":s(e).processing}]),disabled:s(e).processing},{default:p(()=>[$(" Reset Password ")]),_:1},8,["class","disabled"])])],40,E)]),_:1})]),Z])],64))}},ss=F(D,[["__scopeId","data-v-407b9f7f"]]);export{ss as default};
