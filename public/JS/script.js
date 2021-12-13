{
    function createShortLink(form){
        event.preventDefault();
        let ajax = new XMLHttpRequest();
        let formdata = new FormData(form);

        ajax.open("POST", form.getAttribute('action'),true);
        ajax.send(formdata);

        ajax.onreadystatechange = function(){
            if(this.status == 200 && this.readyState == 4){
                let textArea = document.getElementById('hidden-text');
                let link = "Ваша ссылка: http://127.0.0.1:8000/" + this.responseText;

                textArea.style.display = 'block';
                textArea.innerText = link;
            }
        }

        return false;
    }
}
