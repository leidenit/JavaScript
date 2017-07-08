function upload(file) {
    var ajax = new XMLHttpRequest();
    ajax.upload.onprogress = function(event) {
        uploaded.innerHTML = 'Uploaded ' + event.loaded + ' of ' + event.total;
        progress.setAttribute('max', event.total);
        progress.value = event.loaded;
    }

    ajax.onload = ajax.onerror = function() {
        if (this.status == 200) {
            result.innerHTML = 'Upload success';
        } else {
            result.innerHTML = 'Upload error';
        }
    }

    var formData = new FormData();
    formData.append("userfile", file);
    
    ajax.open("POST", "/", true);
    ajax.send(formData);
}