console.log("jAVASCRIPT BERHASIL DIAKSES!");

const form = document.getElementById("form_bimbel");

if (form) {
    form.addEventListener("submit", function (e) {

        e.preventDefault();

        const nama = document.getElementById("nama").value.trim();
        const pilihanpaket = document.querySelector('input[name="paket"]:checked');
        const paket = pilihanpaket ? pilihanpaket.value : "-";

        if (confirm(
            "Halo, " + nama +
            ". Anda memilih paket bimbel: " + paket +
            ".\nApakah Anda yakin ingin melanjutkan?"
        )) {
            this.submit();
        } else {
            alert("Pendaftaran dibatalkan");
        }
    });
} else {
    console.error("Form dengan id='form_bimbel' tidak ditemukan!");
}