(function(){
  const $ = (s, r=document) => r.querySelector(s);
  const $$ = (s, r=document) => Array.from(r.querySelectorAll(s));

  const threadWrap = $('#threadWrap');
  const thread = $('#thread');

  const form = $('#supportForm');
  const fCategory = $('#fCategory');
  const fPriority = $('#fPriority');
  const fName = $('#fName');
  const fMessage = $('#fMessage');
  const btnSend = $('#btnSend');

  const badgeCategory = $('#badgeCategory');
  const badgePriority = $('#badgePriority');

  const sendUrl = $('#supportSendUrl')?.value;
  const csrf = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || 
               $$('input[name="_token"]', form)[0]?.value;

  // reflect current selection on header badges
  function reflectBadges(){
    badgeCategory.textContent = fCategory.value || 'All';
    badgePriority.textContent = fPriority.value || 'Any';
  }
  reflectBadges();
  [fCategory, fPriority].forEach(el => el.addEventListener('change', reflectBadges));

  function scrollBottom(){
    threadWrap.scrollTop = threadWrap.scrollHeight + 200;
  }

  function escapeHtml(str){
    return (str||'').replace(/[&<>"']/g, (m)=>({ '&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;' }[m]));
  }

  function renderUserMsg(item){
    const html = `
      <div class="msg mb-3 msg-out">
        <div class="d-flex justify-content-end">
          <div class="bubble p-3 rounded shadow-sm">
            <div class="small mb-1" style="opacity:.85"><strong>You</strong> • ${escapeHtml(item.name)} • ${item.at}</div>
            <div>${escapeHtml(item.msg)}</div>
            <div class="mt-2 small" style="opacity:.8"># ${escapeHtml(item.meta.category)} • ${escapeHtml(item.meta.priority)}</div>
          </div>
        </div>
      </div>`;
    thread.insertAdjacentHTML('beforeend', html);
  }

  function renderAgentMsg(text){
    const at = new Date().toISOString().slice(0,16).replace('T',' ');
    const html = `
      <div class="msg mb-3 msg-in">
        <div class="d-flex">
          <div class="bubble p-3 rounded shadow-sm">
            <div class="small text-muted mb-1"><strong>Team</strong> • Support Team • ${at}</div>
            <div>${escapeHtml(text)}</div>
          </div>
        </div>
      </div>`;
    thread.insertAdjacentHTML('beforeend', html);
  }

  async function sendMessage(e){
    e.preventDefault();
    const payload = {
      name: fName.value.trim(),
      category: fCategory.value,
      priority: fPriority.value,
      message: fMessage.value.trim()
    };
    if (!payload.name || !payload.message) return;

    // optimistic UI
    btnSend.disabled = true;
    const spinner = document.createElement('span');
    spinner.className = 'spinner-border spinner-border-sm ms-2';
    btnSend.appendChild(spinner);

    try {
      const res = await fetch(sendUrl, {
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN': csrf,
          'Accept': 'application/json',
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(payload)
      });
      const data = await res.json();
      if (!data.ok) throw new Error('Send failed');

      renderUserMsg(data.item);
      fMessage.value = '';
      scrollBottom();

      // fake agent auto-ack
      setTimeout(()=> {
        renderAgentMsg('Thanks! We got your message and will follow up here.');
        scrollBottom();
      }, 500);

      // update header name if guest just set it
      const dn = $('#displayName');
      if (dn && (dn.textContent === 'Guest') && payload.name) {
        dn.textContent = payload.name;
      }

    } catch (err) {
      renderAgentMsg('Sorry, could not send right now. Please retry.');
    } finally {
      btnSend.disabled = false;
      spinner.remove();
    }
  }

  form.addEventListener('submit', sendMessage);
  scrollBottom();
})();
