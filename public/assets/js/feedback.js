(function(){
  const $ = (s, r=document)=>r.querySelector(s);

  // --- Feedback submit ---
  const form = $('#fbForm');
  const sendBtn = $('#btnFbSend');
  const submitUrl = $('#fbSubmitUrl')?.value;

  function toast(msg){
    let el = document.getElementById('fbToast');
    if(!el){ el = document.createElement('div'); el.id='fbToast';
      el.style.position='fixed'; el.style.bottom='16px'; el.style.right='16px'; el.style.zIndex='1080';
      document.body.appendChild(el);
    }
    el.innerHTML = `<div class="alert alert-dark border-0 shadow-sm py-2 px-3">${msg}</div>`;
    setTimeout(()=> el.innerHTML='', 2200);
  }

  form?.addEventListener('submit', async (e)=>{
    e.preventDefault();
    const fd = new FormData(form);
    const payload = Object.fromEntries(fd.entries());
    payload.anonymous = $('#fbAnon')?.checked ? 1 : 0;
    if (!payload.name && !payload.anonymous){ toast('Add your name or tick anonymous.'); return; }

    sendBtn.disabled = true;
    const sp = document.createElement('span'); sp.className='spinner-border spinner-border-sm ms-2'; sendBtn.appendChild(sp);
    try{
      const res = await fetch(submitUrl, {
        method:'POST',
        headers:{
          'Accept':'application/json',
          'Content-Type':'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
        },
        body: JSON.stringify(payload)
      });
      const data = await res.json();
      if(!data.ok) throw new Error('failed');
      toast(data.msg || 'Thanks!');
      form.reset();
    }catch(e){
      toast('Could not send right now.');
    }finally{
      sendBtn.disabled = false;
      sp.remove();
    }
  });

  // --- Quick Poll ---
  const POLL_KEY = 'investor_poll_votes';
  const pollUrl = $('#pollUrl')?.value;

  function hasVoted(id){
    try{
      const map = JSON.parse(localStorage.getItem(POLL_KEY)||'{}');
      return !!map[id];
    }catch{ return false; }
  }
  function setVoted(id, opt){
    const map = JSON.parse(localStorage.getItem(POLL_KEY)||'{}');
    map[id] = opt; localStorage.setItem(POLL_KEY, JSON.stringify(map));
  }

  document.querySelectorAll('.poll-btn').forEach(btn=>{
    const id = btn.getAttribute('data-id');
    if (hasVoted(id)) { btn.classList.remove('btn-outline-secondary'); btn.classList.add('btn-secondary'); btn.disabled = true; }
    btn.addEventListener('click', async ()=>{
      if (hasVoted(id)) return;
      const opt = btn.getAttribute('data-opt');
      btn.disabled = true;
      try{
        const res = await fetch(pollUrl, {
          method:'POST',
          headers:{
            'Accept':'application/json',
            'Content-Type':'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
          },
          body: JSON.stringify({ poll_id: Number(id), option: opt })
        });
        const data = await res.json();
        if(!data.ok) throw new Error('fail');
        setVoted(id, opt);
        btn.classList.remove('btn-outline-secondary'); btn.classList.add('btn-secondary');
        toast('Vote recorded. Thanks!');
      }catch(e){
        btn.disabled = false;
        toast('Could not vote right now.');
      }
    });
  });
})();
