const notifBtn     = document.getElementById('notification-btn');
const notifPopup   = document.getElementById('notification-popup');
const closeNotif   = document.getElementById('close-notification');

const accountBtn   = document.getElementById('account-btn');
const accountPopup = document.getElementById('account-popup');
const closeAccount = document.getElementById('close-account');

notifBtn?.addEventListener('click', e => {
  e.preventDefault();
  notifPopup.classList.toggle('hidden');
});
closeNotif?.addEventListener('click', () => {
  notifPopup.classList.add('hidden');
});

accountBtn?.addEventListener('click', e => {
  e.preventDefault();
  accountPopup.classList.toggle('hidden');
});
closeAccount?.addEventListener('click', () => {
  accountPopup.classList.add('hidden');
});

document.addEventListener('click', e => {
  if (!notifPopup.contains(e.target) && !notifBtn.contains(e.target)) {
    notifPopup.classList.add('hidden');
  }
  if (!accountPopup.contains(e.target) && !accountBtn.contains(e.target)) {
    accountPopup.classList.add('hidden');
  }
});
