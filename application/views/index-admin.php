<div class="container ct-luar">
<div class="block"></div>
<?php $this->load->view('templates/navbar', ['nav_link' => base_url() . 'admin']) ?>
<main>
    <div class="confirm-alert" id="confirm-alert">
                <div class="ca-head danger">
                    <svg xmlns="http://www.w3.org/2000/svg" height="46px" viewBox="0 0 24 24" width="46px" fill="#ffffff"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M11 7h2v2h-2zm0 4h2v6h-2zm1-9C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>
                    <h2>Konfirmasi</h2>
                </div>
                <div class="ca-body">
                    <p>Anda yakin ingin logout?</p>
                    <div class="ca-button">
                        <a class="a-btn btn-danger hapus" id="ca-logout" href="<?= base_url(); ?>admin/logout">Logout</a>
                        <a class="a-btn btn-primary batal" id="ca-cancel">Batal</a>
                    </div>
                </div>
    </div>
    <div id="logout">
        <a id="logout">
        <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="48px" viewBox="0 0 24 24" width="48px" fill="#1f5ba7"><g><path d="M0,0h24v24H0V0z" fill="none"/></g><g><path d="M17,8l-1.41,1.41L17.17,11H9v2h8.17l-1.58,1.58L17,16l4-4L17,8z M5,5h7V3H5C3.9,3,3,3.9,3,5v14c0,1.1,0.9,2,2,2h7v-2H5V5z"/></g></svg>
        </a>
    </div>
    <h2>Data Sipenmaru Berdasarkan Jalur</h2>
    <div class="container ct-20">
        <a href="<?= base_url() ?>admin/data-pendaftar/pmdp">
            <div class="card">
                <div class="img">
                    <img src="<?= base_url() ?>assets/img/people.png" alt="logo login">
                </div>
                <p>Jalur Penelusuran Minat dan Prestasi (PMDP)</p>
            </div>
        </a>
        <a href="<?= base_url() ?>admin/data-pendaftar/ktmse">
            <div class="card">
                <div class="img">
                    <img src="<?= base_url() ?>assets/img/people.png" alt="logo login">
                </div>
                <p>Jalur Keluarga Tidak Mampu secara Ekonomi (KTMSE) / Keluarga Miskin (GAKIN)</p>
            </div>
        </a>
        <a href="<?= base_url() ?>admin/data-pendaftar/pmdp-ktmse">
            <div class="card">
                <div class="img">
                    <img src="<?= base_url() ?>assets/img/people.png" alt="logo login">
                </div>
                <p>Semua Jalur (PMDP & KTMSE/GAKIN)</p>
            </div>
        </a>
    </div>
	<div class="scroll">
        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#ffffff"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M7.41 15.41L12 10.83l4.59 4.58L18 14l-6-6-6 6 1.41 1.41z"/></svg>
    </div>
</main>
</div>