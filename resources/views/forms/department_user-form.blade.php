<div class="modal fade dialog-modal" data-bs-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title m-auto text-uppercase">User to Departments</h4>
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
                                    <label class="fw-normal" for="user">From User</label>
                                    <select name="user_id" class="form-select user_id">
                                        <option value="-1" class="text-danger">---Select the from user---
                                        </option>
                                        @foreach ($users as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label class="fw-normal" for="department_ids">To Departments</label>
                                    <select name="department_ids[]" multiple class="form-select department_ids">
                                        @foreach ($deparments as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
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
