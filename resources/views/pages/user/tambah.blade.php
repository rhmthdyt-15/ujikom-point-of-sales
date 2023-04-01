<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ route('user.store') }}" method="post" class="form-horizontal">
            @csrf
            @method('post')

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title" id="mediumModalLabel">Tambah Kasir</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name" class="control-label mb-1">Name</label>
                        <input id="name" name="name" type="text" class="form-control" required
                            autofocus>
                        <span class="help-block with-errors"></span>
                    </div>
                    <div class="form-group">
                         <label for="email" class="control-label mb-1">Email</label>
                         <input id="email" name="email" type="text" class="form-control" required
                             autofocus>
                         <span class="help-block with-errors"></span>
                    </div>
                    <div class="form-group">
                        <label for="password" class="control-label mb-1">Password</label>
                        <div class="input-group">
                            <input id="password" name="password" type="password" class="form-control" required autofocus>
                            <div class="input-group-addon">
                                <a href="#" onclick="togglePassword('password')">
                                    <i class="fa fa-fw fa-eye field-icon toggle-password"></i>
                                </a>
                            </div>
                        </div>
                        <span class="help-block with-errors"></span>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation" class="control-label mb-1">Konfirmasi Password</label>
                        <div class="input-group">
                            <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" required autofocus>
                            <div class="input-group-addon">
                                <a href="#" onclick="togglePassword('password_confirmation')">
                                    <i class="fa fa-fw fa-eye field-icon toggle-password"></i>
                                </a>
                            </div>
                        </div>
                        <span class="help-block with-errors"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-flat btn-primary" id="submitForm">
                        Simpan
                    </button>
                    <button type="button" class="btn btn-sm btn-flat btn-warning" data-dismiss="modal">
                        Batal
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    function togglePassword(id) {
        var x = document.getElementById(id);
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
@endpush