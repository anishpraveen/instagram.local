localStorage.setItem('logged', 'true');
        function storageChange (event) {
            if(event.key === 'logged') {
                // alert('Logged ' + event.newValue)
                window.location.replace("/home"); 
            }
        }
        window.addEventListener('storage', storageChange, false)