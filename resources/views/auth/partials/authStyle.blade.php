<style>
    /* ===== Auth pages (login / sign-up) ===== */
    .auth-wrap{
        --auth-bg:#f4f7fa;
        --auth-surface:#ffffff;
        --auth-line:#e3e8ef;
        --auth-line-strong:#cfd8e3;
        --auth-heading:var(--iq-primary,#052953);
        --auth-ink:var(--iq-text-dark,#1f242d);
        --auth-text:#3b4350;
        --auth-muted:var(--iq-text-muted,#59616e);
        --auth-faint:#8a94a3;
        --auth-accent:var(--iq-primary-light,#083a75);
        --auth-accent-tint:#e8eef6;
        --auth-red:#c8102e;
        --auth-red-tint:#fdecef;
        --auth-green:#0f7a4a;
        --auth-green-tint:#e7f5ee;
    }
    .auth-wrap{position:relative;padding:4rem 0 4.5rem;background:var(--auth-bg);overflow:hidden;}
    .auth-wrap::before{content:"";position:absolute;inset:0;background-image:radial-gradient(circle,rgba(5,41,83,.06) 1.5px,transparent 1.5px);background-size:24px 24px;pointer-events:none;}
    .auth-card{position:relative;display:grid;grid-template-columns:5fr 7fr;max-width:1020px;margin:0 auto;background:var(--auth-surface);border:1px solid var(--auth-line);border-radius:24px;overflow:hidden;box-shadow:0 30px 70px rgba(6,38,74,.12);}

    /* Brand panel */
    .auth-aside{position:relative;padding:2.6rem 2.4rem;color:#fff;background:radial-gradient(circle at 85% 10%,#0b4a91 0%,#083a75 38%,#031a34 100%);display:flex;flex-direction:column;overflow:hidden;isolation:isolate;}
    .auth-aside::before,.auth-aside::after{content:"";position:absolute;border-radius:50%;border:1.5px dashed rgba(255,255,255,.18);z-index:-1;}
    .auth-aside::before{width:340px;height:340px;right:-150px;bottom:-120px;}
    .auth-aside::after{width:200px;height:200px;right:-70px;bottom:-40px;background:rgba(255,255,255,.05);}
    .auth-logo{display:inline-flex;align-self:flex-start;background:#fff;border-radius:14px;padding:.5rem .8rem;box-shadow:0 10px 24px rgba(0,0,0,.18);margin-bottom:2rem;}
    .auth-logo img{max-height:46px;max-width:230px;width:auto;}
    .auth-aside h2{color:#fff;font-size:1.65rem;line-height:1.25;margin-bottom:.75rem;}
    .auth-aside > p{color:#d9e3f0;font-size:.95rem;line-height:1.65;margin-bottom:1.8rem;}
    .auth-points{list-style:none;padding:0;margin:0 0 2rem;display:grid;gap:1rem;}
    .auth-points li{display:flex;gap:.85rem;align-items:flex-start;}
    .auth-points .ap-icon{flex-shrink:0;width:38px;height:38px;border-radius:11px;background:rgba(255,255,255,.12);border:1px solid rgba(255,255,255,.2);display:flex;align-items:center;justify-content:center;font-size:.95rem;}
    .auth-points strong{display:block;font-size:.93rem;font-weight:700;color:#fff;}
    .auth-points span{display:block;font-size:.82rem;color:#b8c7da;line-height:1.5;}
    .auth-secure{margin-top:auto;display:flex;align-items:center;gap:.55rem;font-size:.8rem;color:#b8c7da;padding-top:1.2rem;border-top:1px solid rgba(255,255,255,.14);}
    .auth-secure i,.auth-secure svg{color:#5fd3a3;}

    /* Form panel */
    .auth-main{padding:2.8rem 2.8rem 2.4rem;}
    .auth-eyebrow{display:inline-flex;align-items:center;gap:.45rem;font-size:.75rem;font-weight:700;letter-spacing:.08em;text-transform:uppercase;color:var(--auth-accent);background:var(--auth-accent-tint);padding:.35rem .8rem;border-radius:50px;margin-bottom:.9rem;}
    .auth-main h1{font-size:1.75rem;color:var(--auth-heading);margin-bottom:.35rem;}
    .auth-sub{color:var(--auth-muted);font-size:.93rem;margin-bottom:1.6rem;}

    .auth-alert{display:flex;gap:.7rem;align-items:flex-start;border-radius:12px;padding:.8rem 1rem;font-size:.88rem;margin-bottom:1.2rem;border:1px solid transparent;}
    .auth-alert > i,.auth-alert > svg{flex-shrink:0;}
    .auth-alert > i,.auth-alert > svg{margin-top:.15rem;}
    .auth-alert-error{background:var(--auth-red-tint);border-color:rgba(228,0,43,.22);color:#b3001f;}
    .auth-alert-success{background:var(--auth-green-tint);border-color:rgba(15,122,74,.22);color:var(--auth-green);}
    .auth-alert-info{background:var(--auth-accent-tint);border-color:rgba(8,58,117,.22);color:var(--auth-accent);}
    html[data-theme="dark"] .auth-alert-error{color:#ff8fa2;}
    html[data-theme="dark"] .auth-alert-success{color:#6ee7b7;}

    .auth-field{margin-bottom:1.1rem;}
    .auth-field label{display:block;text-align:left;font-size:.86rem;font-weight:600;color:var(--auth-heading);margin-bottom:.45rem;}
    .auth-field label .req{color:var(--auth-red);margin-left:2px;}
    .auth-input{position:relative;display:flex;align-items:center;}
    .auth-input > .ai-lead{position:absolute;left:1rem;top:50%;transform:translateY(-50%);z-index:1;color:var(--auth-faint);font-size:.95rem;pointer-events:none;transition:color .2s ease;}
    .auth-input input{display:block;width:100%;height:50px;margin:0;box-shadow:none;-webkit-appearance:none;appearance:none;border:1.5px solid var(--auth-line-strong);border-radius:12px;background:var(--auth-surface);color:var(--auth-ink);font-size:.95rem;padding:0 1rem 0 2.75rem;transition:border-color .2s ease,box-shadow .2s ease,background .2s ease;}
    .auth-input input::placeholder{color:var(--auth-faint);}
    .auth-input input:hover{border-color:#b9cde2;}
    .auth-input input:focus{outline:0;border-color:var(--auth-accent);box-shadow:0 0 0 4px rgba(8,58,117,.14);}
    .auth-input:focus-within > .ai-lead{color:var(--auth-accent);}
    .auth-input input.has-toggle{padding-right:3rem;}
    .auth-input .ai-toggle{position:absolute;right:.45rem;width:38px;height:38px;border:0;border-radius:9px;background:transparent;color:var(--auth-muted);display:flex;align-items:center;justify-content:center;cursor:pointer;transition:background .2s ease,color .2s ease;}
    .auth-input .ai-toggle:hover{background:var(--auth-accent-tint);color:var(--auth-accent);}
    .auth-input.is-invalid input{border-color:var(--auth-red);background:var(--auth-red-tint);}
    .auth-error{display:flex;align-items:center;gap:.35rem;color:var(--auth-red);font-size:.8rem;font-weight:500;margin-top:.4rem;}
    /* Keep browser autofill on-theme */
    .auth-input input:-webkit-autofill{-webkit-box-shadow:0 0 0 1000px var(--auth-surface) inset;-webkit-text-fill-color:var(--auth-ink);caret-color:var(--auth-ink);}

    .auth-row{display:flex;justify-content:space-between;align-items:center;gap:1rem;margin:.2rem 0 1.4rem;font-size:.87rem;}
    .auth-check{display:inline-flex;align-items:center;gap:.5rem;color:var(--auth-text);cursor:pointer;user-select:none;margin:0;}
    .auth-check input{width:17px;height:17px;accent-color:var(--auth-accent);cursor:pointer;}
    .auth-link{color:var(--auth-accent);font-weight:600;}
    .auth-link:hover{color:var(--auth-heading);text-decoration:underline;}

    .auth-btn{width:100%;height:52px;border:0;border-radius:12px;background:linear-gradient(135deg,#0b4a91,#083a75 55%,#052953);color:#fff;font-weight:700;font-size:1rem;letter-spacing:.02em;display:flex;align-items:center;justify-content:center;gap:.6rem;box-shadow:0 12px 26px rgba(5,41,83,.28);transition:transform .2s ease,box-shadow .2s ease,filter .2s ease;}
    .auth-btn:hover{transform:translateY(-2px);box-shadow:0 16px 32px rgba(5,41,83,.36);filter:brightness(1.05);}
    .auth-btn:disabled{opacity:.75;transform:none;cursor:wait;}
    .auth-btn i,.auth-btn svg{transition:transform .2s ease;}
    .auth-btn:hover i,.auth-btn:hover svg{transform:translateX(4px);}

    .auth-divider{display:flex;align-items:center;gap:.9rem;color:var(--auth-faint);font-size:.8rem;margin:1.5rem 0 1.2rem;}
    .auth-divider::before,.auth-divider::after{content:"";flex:1;height:1px;background:var(--auth-line);}
    .auth-switch{text-align:center;font-size:.92rem;color:var(--auth-muted);margin:0;}

    .auth-req{color:var(--auth-red);}
    .auth-note{font-size:.82rem;color:var(--auth-muted);line-height:1.6;margin:.2rem 0 1.3rem;}

    /* Password strength (sign-up) */
    .auth-strength{display:flex;align-items:center;gap:.6rem;margin-top:.55rem;}
    .auth-strength .bars{flex:1;display:grid;grid-template-columns:repeat(4,1fr);gap:4px;}
    .auth-strength .bars span{height:5px;border-radius:5px;background:var(--auth-line);transition:background .25s ease;}
    .auth-strength small{min-width:64px;text-align:right;font-size:.75rem;font-weight:600;color:var(--auth-faint);}

    @media (max-width: 991.98px){
        .auth-card{grid-template-columns:1fr;max-width:560px;}
        .auth-aside{padding:2rem 1.8rem 2.2rem;}
        .auth-aside > p{margin-bottom:1.2rem;}
        .auth-points{grid-template-columns:1fr 1fr;gap:.8rem;margin-bottom:0;}
        .auth-points span,.auth-secure{display:none;}
        .auth-logo{margin-bottom:1.3rem;}
    }
    @media (max-width: 575.98px){
        .auth-wrap{padding:2rem 0 2.5rem;}
        .auth-card{border-radius:18px;}
        .auth-main{padding:1.9rem 1.3rem 1.7rem;}
        .auth-main h1{font-size:1.45rem;}
        .auth-aside h2{font-size:1.3rem;}
        .auth-points{display:none;}
        .auth-aside > p{margin-bottom:0;font-size:.9rem;}
        .auth-row{flex-wrap:wrap;}
    }
</style>
