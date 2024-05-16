// Fetch data from connect.php
fetch('connect.php', {
    method: 'POST',
    body: formData
})
.then(response => response.json())
.then(data => {
    if (data.success) {
        // Display success message as alert
        alert(data.success);
    } else if (data.error) {
        // Display error message as alert
        alert(data.error);
    }
})
.catch(error => {
    console.error('Error:', error);
});
