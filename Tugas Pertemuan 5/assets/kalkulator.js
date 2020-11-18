let bilangan1 =document.getElementById("bilangan1");
let bilangan2 =document.getElementById("bilangan2");
let hasil = document.getElementById("hasil");

function tambah() {
    hasil.value = Number(bilangan1.value) + Number(bilangan2.value);
}

function kurang() {
    hasil.value = Number(bilangan1.value) - Number(bilangan2.value);
}

function kali(){
    hasil.value = Number(bilangan1.value) * Number(bilangan2.value);
}

function bagi(){
    hasil.value = Number(bilangan1.value) / Number(bilangan2.value);
}

function clear() {
    document.getElementById("bilangan1").value='';
    document.getElementById("bilangan2").value='';
    document.getElementById("hasil").value='';
}

function ValidasiInput(evt) {
    var charCode = (evt.which) ? evt.which : Event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;

}
