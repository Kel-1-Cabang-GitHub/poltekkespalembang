<?php $this->load->view('templates/navbar', ['nav_link' => base_url()]) ?>
<main>
    <div id="login">
		<a href="<?= base_url(); ?>admin/login">
		    <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="48px" viewBox="0 0 24 24" width="48px" fill="#1f5ba7"><g><rect fill="none" height="24" width="24"/></g><g><path d="M11,7L9.6,8.4l2.6,2.6H2v2h10.2l-2.6,2.6L11,17l5-5L11,7z M20,19h-8v2h8c1.1,0,2-0.9,2-2V5c0-1.1-0.9-2-2-2h-8v2h8V19z"/></g></svg>
		</a>
	</div>
    <h2>Pilih jalur Sipenmaru yang akan diikuti</h2>
    <div class="container ct-20">
        <a href="<?= base_url() ?>form-pendaftaran/pmdp">
            <div class="card">
                <div class="img">
                    <img src="<?= base_url() ?>assets/img/daftar.png" alt="logo login">
                </div>
                <p>Jalur Penelusuran Minat dan Prestasi (PMDP)</p>
            </div>
        </a>
        <a href="<?= base_url() ?>form-pendaftaran/ktmse">
            <div class="card">
                <div class="img">
                    <img src="<?= base_url() ?>assets/img/daftar.png" alt="logo login">
                </div>
                <p>Jalur Keluarga Tidak Mampu secara Ekonomi (KTMSE) / Keluarga Miskin (GAKIN)</p>
            </div>
        </a>
    </div>
	<div class="scroll">
        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#ffffff"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M7.41 15.41L12 10.83l4.59 4.58L18 14l-6-6-6 6 1.41 1.41z"/></svg>
    </div>
</main>
