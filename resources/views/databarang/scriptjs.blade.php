<script src="js/main.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.js"></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
    <script>
        $(document).ready(function() {
            $('#tabledatabarang').DataTable({
                processing: true,
                serverside: true,
                ajax: "{{ url('routedatabarang')}}",
                columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                }, {
                    data: 'sku',
                    name: 'SKU'
                },{
                    data: 'nm_barang',
                    name: 'Nama Barang'
                }, {
                    data: 'varian',
                    name: 'Varian'
                }, {
                    data: 'jumlah',
                    name: 'Jumlah'
                }, {
                    data: 'aksi',
                    name: 'Aksi'
                }]
            });
        })

        // GLOBAL SETUP 
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        // PROSES HAPUS
        $('body').on('click', '.tombol-hapus', function(e) {
        if (confirm('Yakin Hapus Data?') == true) {
            var sku = $(this).data('sku');
            $.ajax({
                url: 'routedatabarang/'+sku,
                type: 'DELETE',
            });
            $('#tabledatabarang').DataTable().ajax.reload();
        }
    });

        // PROSES SIMPAN
        $('body').on('click', '.tomboltambah', function (e) {
            e.preventDefault(); //agar saat klik modal tidak refresh otomatis
            $('#modaldatabarang').modal('show');
            
            $('.tombol-simpan').click(function() {
                // kirim data dari form ke DB
                simpan();
            });
        });

        // PROSES EDIT
        $('body').on('click', '.tombol-edit', function (e) {
            var sku = $(this).data('sku');
            $.ajax({
                url: 'routedatabarang/' + sku + '/edit',
                type: 'GET',
                success: function (response) {
                    $('#modaldatabarang').modal('show');
                    $('#sku').val(response.result.sku);
                    $('#nm_barang').val(response.result.nm_barang);
                    $('#varian').val(response.result.varian);
                    console.log(response.result);
                     $('.tombol-simpan').click(function() {
                    simpan(sku);
            });
                }
            });

        });

        // FUNGSI SIMPAN DAN UPDATE
        function simpan(sku = '') {
            if (sku == '') {
                var var_urlroute = 'routedatabarang';
                var var_type = 'POST';
            }else{
                var var_urlroute = 'routedatabarang/' + sku;
                var var_type = 'PUT';
            }
            $.ajax({
                    url: var_urlroute,
                    type: var_type,
                    data: {
                        sku : $('#sku').val(),
                        nm_barang : $('#nm_barang').val(),
                        varian : $('#varian').val()
                        // jumlah : $('#jumlah').val()
                    },
                    success:function (response) {
                        // ALERT MODAL FAILS
                        if (response.errors){
                            console.log(response.errors);
                            $('.alert-danger').removeClass('d-none');
                            $('.alert-danger').html("<ul style='margin-top:-5px; margin-bottom:-5px;'>");
                                $.each(response.errors, function(key, value) {
                                    $('.alert-danger').find('ul').append("<li>" + value + "</li>");
                                });
                                $('.alert-danger').append("</ul>");
                        } else {
                            // ALERT MODAL SUKSES
                            $('.alert-danger').addClass('d-none');
                            $('.alert-success').removeClass('d-none');
                            $('.alert-success').html(response.success);
                        }
                        $('#tabledatabarang').DataTable().ajax.reload();
                    },
                }); 
        }

        // REMOVE MODAL JIKA TOMBOL CLOSE DI HAPUS
        $('#modaldatabarang').on('hidden.bs.modal', function() {
        $('#sku').val('');
        $('#nm_barang').val('');
        $('#varian').val('');

        $('.alert-danger').addClass('d-none');
        $('.alert-danger').html('');

        $('.alert-success').addClass('d-none');
        $('.alert-success').html('');
    });
    </script>