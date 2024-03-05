<div class="modal fade dialog-modal" data-bs-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title m-auto text-uppercase">Leave_Mission Information</h4>
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
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label class="fw-normal" for="is_leave">Type</label>
                                    <select name="is_leave" class="form-select is_leave">
                                        <option value="1" class="text-danger">Leave</option>
                                        <option value="0" class="text-danger">Mission</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label class="fw-normal" for="name">Name</label>
                                    <input type="text" name="name" class="form-control name"
                                        placeholder="Input the name">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label class="fw-normal" for="duration">Duration</label>
                                    <input type="text" name="duration" class="form-control duration"
                                    placeholder="Input the duration">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label class="fw-normal" for="noted">Description</label>
                                    <textarea name="noted" type="text" class="form-control noted" 
                                    placeholder="Inpunt the description"></textarea>
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
