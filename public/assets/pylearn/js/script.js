// ==========================
// MODAL BADGE
// ==========================
function showBadgeModal(title, desc) {
    const modal = document.getElementById('badgeModal');
    document.getElementById('badgeTitle').innerText = title;
    document.getElementById('badgeDesc').innerText = desc;

    modal.classList.add('open');
}

function closeBadgeModal() {
    document.getElementById('badgeModal').classList.remove('open');
}

// ==========================
// MODAL LOCKED
// ==========================
function showLockedModal() {
    document.getElementById('lockedModal').classList.add('open');
}

function closeLockedModal() {
    document.getElementById('lockedModal').classList.remove('open');
}

// ==========================
// TOAST SYSTEM
// ==========================
function showToast(message, type = 'success') {
    const container = document.getElementById('toastContainer');

    const toast = document.createElement('div');
    toast.className = `toast toast-${type}`;

    let icon = '✅';
    if (type === 'error') icon = '❌';
    if (type === 'info') icon = 'ℹ️';

    toast.innerHTML = `
        <span class="toast-icon">${icon}</span>
        <span>${message}</span>
    `;

    container.appendChild(toast);

    // auto remove
    setTimeout(() => {
        toast.style.opacity = '0';
        toast.style.transform = 'translateX(100%)';
        setTimeout(() => toast.remove(), 300);
    }, 3000);
}