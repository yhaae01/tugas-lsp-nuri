    <script src="<?= base_url('assets/js/jquery.slim.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/sweetalert2/dist/sweetalert2.all.js') ?>"></script>
    <script src="<?= base_url('assets/js/myalert.js') ?>"></script>
    <script>
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
    </script>

</body>
</html>