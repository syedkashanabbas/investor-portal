document.addEventListener('DOMContentLoaded', () => {
  const addForm = document.getElementById('addDepositForm');
  const editForm = document.getElementById('editDepositForm');
  const table = document.getElementById('depositTable');

  // Add new deposit
  addForm?.addEventListener('submit', async e => {
    e.preventDefault();
    const formData = new FormData(addForm);
    const response = await fetch('/investor/deposits', {
      method: 'POST',
      headers: { 'X-CSRF-TOKEN': formData.get('_token') },
      body: formData
    });
    const data = await response.json();

    if (data.success) {
      Swal.fire('Fatto!', data.message, 'success').then(() => location.reload());
    } else {
      Swal.fire('Errore', 'Qualcosa è andato storto', 'error');
    }
  });

  // Fill edit modal
  document.querySelectorAll('.edit-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      const dep = JSON.parse(btn.dataset.deposit);
      editForm.querySelector('[name=id]').value = dep.id;
      editForm.querySelector('[name=amount]').value = dep.amount;
      editForm.querySelector('[name=payment_method]').value = dep.payment_method;
      editForm.querySelector('[name=remarks]').value = dep.remarks ?? '';
    });
  });

  // Submit edit form
  editForm?.addEventListener('submit', async e => {
    e.preventDefault();
    const id = editForm.querySelector('[name=id]').value;
    const formData = new FormData(editForm);
    const response = await fetch(`/investor/deposits/${id}`, {
      method: 'POST',
      headers: { 'X-CSRF-TOKEN': formData.get('_token'), 'X-HTTP-Method-Override': 'PUT' },
      body: formData
    });
    const data = await response.json();

    if (data.success) {
      Swal.fire('Aggiornato!', data.message, 'success').then(() => location.reload());
    } else {
      Swal.fire('Errore', 'Impossibile aggiornare', 'error');
    }
  });

  // Delete deposit
  document.querySelectorAll('.delete-btn').forEach(btn => {
    btn.addEventListener('click', async () => {
      const id = btn.dataset.id;
      const confirm = await Swal.fire({
        title: 'Sei sicuro?',
        text: 'Questa azione non può essere annullata!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sì, elimina',
        cancelButtonText: 'Annulla'
      });

      if (confirm.isConfirmed) {
        const response = await fetch(`/investor/deposits/${id}`, {
          method: 'DELETE',
          headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content }
        });
        const data = await response.json();

        if (data.success) {
          Swal.fire('Eliminato!', data.message, 'success').then(() => location.reload());
        } else {
          Swal.fire('Errore', 'Impossibile eliminare', 'error');
        }
      }
    });
  });
});
