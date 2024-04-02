</div>

<!-- Modal Logout -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda ingin logout?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                <a href="<?= base_url('auth/logout') ?>" class="btn btn-primary">Logout</a>
            </div>
        </div>
    </div>
</div>
<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>copyright &copy; <script>
                    document.write(new Date().getFullYear());
                </script>
                <a href="https://lkputamajaya.net/" target="_blank">Utama Jaya</a>
            </span>
        </div>
    </div>
</footer>
<!-- Footer -->
</div>
</div>

<!-- Scroll to top -->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= base_url('assets/') ?>js/ruang-admin.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?= base_url('assets/') ?>dist/sweetalert2.all.min.js"></script>
<script src="<?= base_url('assets/') ?>dist/myscript.js"></script>
<!-- Select2 -->
<script src="<?= base_url('assets/') ?>vendor/select2/dist/js/select2.min.js"></script>
<!-- Page level custom scripts -->


<script>
    $(document).ready(function() {
        // Checkbox "Pilih Semua"
        $('#check-all').change(function() {
            $('.check-item').prop('checked', $(this).prop('checked'));
        });

        // Checkbox individu
        $('.check-item').change(function() {
            if (!$(this).prop('checked')) {
                $('#check-all').prop('checked', false);
            }
        });
    });
    $(document).ready(function() {
        $('#dataTable').DataTable(); // ID From dataTable 
        $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
    $(document).ready(function() {


        $('.select2-single').select2();

        // Select2 Single  with Placeholder
        $('.select2-single-placeholder').select2({
            placeholder: "Pilih Kelas",
            allowClear: true
        });

        // Select2 Multiple
        $('.select2-multiple').select2();

        // Bootstrap Date Picker
        $('#simple-date1 .input-group.date').datepicker({
            format: 'dd/mm/yyyy',
            todayBtn: 'linked',
            todayHighlight: true,
            autoclose: true,
        });

        $('#simple-date2 .input-group.date').datepicker({
            startView: 1,
            format: 'dd/mm/yyyy',
            autoclose: true,
            todayHighlight: true,
            todayBtn: 'linked',
        });

        $('#simple-date3 .input-group.date').datepicker({
            startView: 2,
            format: 'dd/mm/yyyy',
            autoclose: true,
            todayHighlight: true,
            todayBtn: 'linked',
        });

        $('#simple-date4 .input-daterange').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true,
            todayHighlight: true,
            todayBtn: 'linked',
        });

        // TouchSpin

        $('#touchSpin1').TouchSpin({
            min: 0,
            max: 100,
            boostat: 5,
            maxboostedstep: 10,
            initval: 0
        });

        $('#touchSpin2').TouchSpin({
            min: 0,
            max: 100,
            decimals: 2,
            step: 0.1,
            postfix: '%',
            initval: 0,
            boostat: 5,
            maxboostedstep: 10
        });

        $('#touchSpin3').TouchSpin({
            min: 0,
            max: 100,
            initval: 0,
            boostat: 5,
            maxboostedstep: 10,
            verticalbuttons: true,
        });

        $('#clockPicker1').clockpicker({
            donetext: 'Done'
        });

        $('#clockPicker2').clockpicker({
            autoclose: true
        });

        let input = $('#clockPicker3').clockpicker({
            autoclose: true,
            'default': 'now',
            placement: 'top',
            align: 'left',
        });

        $('#check-minutes').click(function(e) {
            e.stopPropagation();
            input.clockpicker('show').clockpicker('toggleView', 'minutes');
        });

    });

    // Ambil semua elemen dengan class "nilai"
    var inputs = document.getElementsByClassName('nilai');
    // Tambahkan "input" event listener pada setiap elemen
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].addEventListener('input', hitungRataRataDanTotal);
    }
    hitungRataRataDanTotal();

    function hitungRataRataDanTotal() {
        var total = 0;
        // Lakukan perulangan untuk setiap element input
        for (var i = 0; i < inputs.length; i++) {
            // Tambah nilai input ke total
            total += parseInt(inputs[i].value) || 0;
        }
        // Hitung rata-rata
        var rataRata = total / inputs.length;
        // Tampilkan total pada elemen dengan id "totalNilai"
        document.getElementById('totalNilai').innerHTML = total;
        // Tampilkan rata-rata pada elemen dengan id "rataRata"
        document.getElementById('rataRata').innerHTML = rataRata.toFixed(2);
    }

    function updateTotalDanRataRata() {
        // Ambil semua elemen dengan class "nilai"
        var inputs = document.getElementsByClassName('nilai');

        var total = 0;

        // Lakukan perulangan untuk setiap elemen input
        for (var i = 0; i < inputs.length; i++) {
            // Tambahkan nilai input ke total
            total += parseInt(inputs[i].value) || 0;
        }

        // Hitung rata-rata
        var rataRata = total / inputs.length;

        // Tampilkan total pada elemen dengan id "totalNilai"
        document.getElementById('totalNilai').innerHTML = total;

        // Tampilkan rata-rata pada elemen dengan id "rataRata"
        document.getElementById('rataRata').innerHTML = rataRata.toFixed(2);
    }

    function displayFileName() {
        const fileInput = document.getElementById('fileInput');
        const fileNameLabel = document.getElementById('fileNameLabel');

        // Menyimpan nama file yang dipilih
        const fileName = fileInput.files[0].name;

        // Menampilkan nama file di label
        fileNameLabel.innerText = fileName;
    }

   
</script>


</body>

</html>