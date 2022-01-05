<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page_title ?></title>
    <link rel="shortcut icon" href="<?= base_url() ?>assets/img/logo.jpg" type="image/x-icon">
	<link rel="stylesheet" href="<?= base_url() ?>assets/styles/base-style.css">
	<?php if ($styles): ?>
		<?php foreach ($styles as $style): ?>
			<link rel="stylesheet" href="<?= base_url() ?>assets/styles/<?= $style ?>-style.css">
		<?php endforeach; ?>
	<?php endif; ?>
	<script defer src="<?= base_url() ?>assets/scripts/jquery-3.6.0.min.js"></script>
    <script defer src="<?= base_url() ?>assets/scripts/base-script.js"></script>
	<?php if ($scripts): ?>
		<?php foreach ($scripts as $script): ?>
			<script defer src="<?= base_url() ?>assets/scripts/<?= $script ?>-script.js"></script>
		<?php endforeach; ?>
	<?php endif; ?>
</head>
<body>
