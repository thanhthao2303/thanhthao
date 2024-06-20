import './bootstrap';
let showAlertFlag = false; 

function closeAlert() {
  const alert = document.getElementById('alert');
  if (alert) {
    alert.style.display = 'none';
    showAlertFlag = false;
  }
}

function showAlert() {
    const alert = document.getElementById('alert');
    if (alert) {
        if (showAlertFlag) {
            alert.style.display = 'block';
        }
    } else {
        console.error('Alert element with ID "alert" not found.');
    }
}

const rows = document.querySelectorAll('tbody tr');

rows.forEach(row => {
    row.addEventListener('click', () => {
        window.location.href = row.getAttribute('href');
    });
});

document.getElementById('confirm-button').addEventListener('click', function() {
    showAlertFlag = true;
    showAlert();
});
document.getElementById('OK-button').addEventListener('click', closeAlert);
