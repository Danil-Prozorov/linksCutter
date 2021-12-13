{
    function createShortLink(form){ // Here i create function for send AJAX requests to server
        event.preventDefault(); // Do not let it reload the page
        let ajax = new XMLHttpRequest();
        let formdata = new FormData(form);
        let textInput = document.getElementById('url').value;

        if(textInput.slice(0,8) != 'https://'){
            let textArea = document.getElementById('hidden-text');
            textArea.innerText = "Введите верную ссылку";
            return false;
        }

        ajax.open("POST", form.getAttribute('action'),true); // take the action
        ajax.send(formdata); // sent data

        ajax.onreadystatechange = function(){
            if(this.status == 200 && this.readyState == 4){ // If everything was fine, then...
                let textArea = document.getElementById('hidden-text');
                let data = JSON.parse(this.responseText);

                if(data[0] == 200){ // Here we check status in returned data
                    let link = `Ваша ссылка: http://127.0.0.1:8000/${data[1]}`; // If everything ok then return short link

                    textArea.style.display = 'block';
                    textArea.innerText = link;
                } else { // Else, just telling enter correct URL
                    textArea.innerText = "Введите верную ссылку";
                }
            }
        }

        return false;
    }
}
