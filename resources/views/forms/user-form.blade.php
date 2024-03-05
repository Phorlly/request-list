<div class="modal fade dialog-modal" data-bs-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title m-auto text-uppercase">User Information</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <form method="post" id="data-form" enctype="multipart/form-data">
                <input type="hidden" id="id" name="id">
                @csrf
                <div class="modal-body">
                    <section>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="fw-normal" for="name">Full Name</label>
                                    <input type="text" name="name" class="form-control name"
                                        placeholder="Input your full name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="fw-normal" for="gender">Gender</label>
                                    <select name="gender" class="form-select gender">
                                        <option value="0">Female</option>
                                        <option value="1">Male</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="fw-normal" for="email">Email Addess</label>
                                    <input type="email" name="email" class="form-control email"
                                        placeholder="Input your email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="fw-normal" for="role">Role Permission</label>
                                    <select name="role" class="form-select role">
                                        <option value="-1" class="text-danger">---Select the role---</option>
                                        @foreach ($items as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="fw-normal" for="phone">Phone number</label>
                                    <input type="text" name="phone" class="form-control phone" maxlength="12"
                                        placeholder="Input your phone number" autocomplete="tel">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="fw-normal" for="password">Password</label>
                                    <input name="password" type="password" class="form-control password"
                                        placeholder="Input your password" autocomplete="current-password">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="fw-normal" for="address">Current Address</label>
                                    <textarea name="address" type="text" class="form-control address" placeholder="Input your current address"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="fw-normal" for="noted">Description</label>
                                    <textarea name="noted" type="text" class="form-control noted" placeholder="Inpunt your description"></textarea>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

                <div class="modal-footer">
                    <section>
                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">
                            <i class=" fas fa-times-circle"></i>
                            <span class="text-uppercase">Close</span>
                        </button>
                        <button type="button" class="btn btn-success update">
                            <i class=" fas fas fa-redo-alt"></i>
                            <span class="text-uppercase">Update</span>
                        </button>
                        <button type="button" class="btn btn-info save">
                            <i class=" fas fa-save"></i>
                            <span class="text-uppercase">Save</span>
                        </button>
                    </section>
                </div>
            </form>
        </div>

        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
